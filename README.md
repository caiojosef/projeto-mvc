# Projeto MVC Simples em PHP

Este projeto é um exemplo prático e funcional de um CRUD de produtos utilizando o padrão **MVC (Model-View-Controller)** com **PHP**, **MySQL** e **AJAX (jQuery)**.

## ✅ Funcionalidades

- Listagem de produtos
- Cadastro de novo produto
- Edição de produto existente
- Exclusão de produto
- Interface 100% dinâmica com AJAX
- Mensagens de feedback (flash messages)

---

## 🗂 Estrutura de Pastas

```
projeto-mvc/
├── app/
│   ├── Controllers/       # Controladores (lógica da aplicação)
│   ├── Core/              # Roteador e conexão DB
│   ├── Models/            # Modelo Produto
│   └── Views/             # View HTML com AJAX (index.php)
├── config/                # Configurações do banco de dados
├── database/              # Script SQL de criação
├── public/                # Ponto de entrada da aplicação (index.php)
│   ├── assets/            # JS e CSS
│   └── .htaccess          # Reescrita de URL para rotas limpas
```

---

## 💻 Como rodar localmente

### 1. Requisitos

- PHP 8.1+ (ou superior)
- MySQL 5.7+
- Apache com `mod_rewrite` ativado
- Navegador moderno
- Recomendado: **USBWebserver** ou **XAMPP**

### 2. Configurar banco de dados

- Acesse o **phpMyAdmin**
- Importe o arquivo `database/schema.sql`
- Ele criará o banco `mvc_estudo` com uma tabela `produtos` e dados de exemplo

### 3. Verificar credenciais no arquivo:

```
config/config.php
```

Padrão USBWebserver:

```php
return [
    'db' => [
        'host' => '127.0.0.1',
        'port' => '3306',
        'name' => 'mvc_estudo',
        'user' => 'root',
        'pass' => 'usbw',
        'charset' => 'utf8mb4',
    ],
];
```

### 4. Acessar no navegador

```
http://localhost/projeto-mvc/public/produtos/pagina
```

> A interface será exibida com o formulário e a tabela de produtos carregados via AJAX.

---

## 🧠 Tecnologias usadas

- PHP 8.1 (procedural + OO)
- MySQL (com PDO)
- JavaScript (jQuery)
- HTML5 + CSS3
- Roteador personalizado em PHP
- Sessão com flash message

---




## ✍️ Observações

- O arquivo `form.php` **não é mais usado** — toda a interface está dentro de `Views/produtos/index.php` com AJAX.
- O projeto é modular e pode ser evoluído com autenticação, paginação, filtros, etc.
- A estrutura foi pensada para ser didática e funcional.

---

## 👨‍💻 Autor

Projeto desenvolvido por Caio (2025).
