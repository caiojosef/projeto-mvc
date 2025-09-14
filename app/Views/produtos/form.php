<?php
$isEdit = !empty($produto) && isset($produto['id']);
$action = $isEdit ? $base . '/produtos/' . (int) $produto['id'] : $base . '/produtos';
$title = $isEdit ? 'Editar produto' : 'Novo produto';
?>
<h1><?= $title ?></h1>

<form method="post" action="<?= $action ?>">
    <p>
        <label>Nome<br>
            <input name="nome" value="<?= htmlspecialchars($produto['nome'] ?? '') ?>">
        </label><br>
        <small style="color:red;"><?= $erros['nome'] ?? '' ?></small>
    </p>

    <p>
        <label>SKU<br>
            <input name="sku" value="<?= htmlspecialchars($produto['sku'] ?? '') ?>">
        </label><br>
        <small style="color:red;"><?= $erros['sku'] ?? '' ?></small>
    </p>

    <p>
        <label>Preço<br>
            <input name="preco" value="<?= htmlspecialchars($produto['preco'] ?? '') ?>" placeholder="ex.: 59,90">
        </label><br>
        <small style="color:red;"><?= $erros['preco'] ?? '' ?></small>
    </p>

    <p>
        <label>Estoque<br>
            <input type="number" name="estoque" value="<?= htmlspecialchars($produto['estoque'] ?? 0) ?>" min="0">
        </label><br>
        <small style="color:red;"><?= $erros['estoque'] ?? '' ?></small>
    </p>

    <p>
        <label>Status<br>
            <select name="status">
                <?php $st = $produto['status'] ?? 'ativo'; ?>
                <option value="ativo" <?= $st === 'ativo' ? 'selected' : '' ?>>Ativo</option>
                <option value="inativo" <?= $st === 'inativo' ? 'selected' : '' ?>>Inativo</option>
            </select>
        </label><br>
        <small style="color:red;"><?= $erros['status'] ?? '' ?></small>
    </p>

    <p>
        <button type="submit">Salvar</button>
        <a href="<?= $base ?>/produtos">Cancelar</a>

    </p>
</form>