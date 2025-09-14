$(document).ready(function () {
    let idEditando = null; // Controla se estamos editando um produto

    carregarProdutos();

    // SUBMIT DO FORMULÁRIO
    $('#form-produto').submit(function (e) {
        e.preventDefault();
        const formData = $(this).serialize();

        let url = 'http://localhost/projeto-mvc/public/produtos';
        let type = 'POST';

        if (idEditando) {
            url += `/${idEditando}`;
        }

        $.ajax({
            url: url,
            type: type,
            data: formData,
            success: function () {
                mostrarFlash(idEditando ? 'Produto atualizado com sucesso!' : 'Produto cadastrado com sucesso!', 'sucesso');
                carregarProdutos();
                $('#form-produto')[0].reset();
                $('#form-produto button[type="submit"]').text('Salvar');
                idEditando = null;
            },
            error: function () {
                mostrarFlash('Erro ao salvar o produto.', 'erro');
            }
        });
    });

    // FUNÇÃO PARA LISTAR PRODUTOS
    function carregarProdutos() {
        $.ajax({
            url: 'http://localhost/projeto-mvc/public/produtos',
            type: 'GET',
            dataType: 'json',
            success: function (dados) {
                let html = '';
                dados.forEach(p => {
                    html += `<tr>
                        <td>${p.id}</td>
                        <td>${p.nome}</td>
                        <td>${p.sku}</td>
                        <td>${p.preco}</td>
                        <td>${p.estoque}</td>
                        <td>${p.status}</td>
                        <td>
                            <button class="btn-editar" data-id="${p.id}">Editar</button>
                            <button class="btn-excluir" data-id="${p.id}">Excluir</button>
                        </td>
                    </tr>`;
                });
                $('#tabela-produtos tbody').html(html);
            }
        });
    }

    // BOTÃO EDITAR
    $(document).on('click', '.btn-editar', function () {
        const id = $(this).data('id');

        $.ajax({
            url: `http://localhost/projeto-mvc/public/produtos/${id}`,
            type: 'GET',
            dataType: 'json',
            success: function (produto) {
                $('#form-produto [name="nome"]').val(produto.nome);
                $('#form-produto [name="sku"]').val(produto.sku);
                $('#form-produto [name="preco"]').val(produto.preco);
                $('#form-produto [name="estoque"]').val(produto.estoque);
                $('#form-produto [name="status"]').val(produto.status);

                idEditando = produto.id;
                $('#form-produto button[type="submit"]').text('Atualizar');
            }
        });
    });

    // BOTÃO EXCLUIR
    $(document).on('click', '.btn-excluir', function () {
        const id = $(this).data('id');

        if (confirm('Tem certeza que deseja excluir este produto?')) {
            $.ajax({
                url: `http://localhost/projeto-mvc/public/produtos/${id}/delete`,
                type: 'POST',
                success: function () {
                    mostrarFlash('Produto excluído com sucesso!', 'sucesso');
                    carregarProdutos();
                },
                error: function () {
                    mostrarFlash('Erro ao excluir o produto.', 'erro');
                }
            });
        }
    });

    // FUNÇÃO PARA MOSTRAR FLASH MENSAGEM
    function mostrarFlash(mensagem, tipo) {
        const flashDiv = $(`
            <div class="flash ${tipo}">
                ${mensagem}
            </div>
        `);

        $('body').prepend(flashDiv);

        setTimeout(() => {
            flashDiv.fadeOut(300, () => flashDiv.remove());
        }, 3000);
    }
});
