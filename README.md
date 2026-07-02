# Catálogo de Produtos

Aplicação web de catálogo de produtos com vitrine pública e painel de administração, desenvolvida como projecto final do módulo de desenvolvimento backend.

O sistema permite que qualquer visitante consulte, filtre e pesquise produtos organizados por categoria, enquanto um administrador autenticado gere todo o conteúdo (produtos, categorias e imagens) através de um painel protegido.

## Funcionalidades

### Vitrine pública
- Listagem de todos os produtos com imagem, nome, preço, categoria e estado
- Filtro de produtos por categoria
- Pesquisa de produtos por nome
- Página de detalhe de cada produto

### Painel de administração
- Autenticação de utilizador e palavra-passe (protegida com hashing)
- Todas as páginas do admin protegidas — redireccionamento automático para o login
- CRUD completo de produtos (criar, listar, editar, apagar)
- CRUD completo de categorias (criar, listar, editar, apagar)
- Upload de imagem do produto, guardada na pasta `public/uploads/`
- Dashboard com totais de produtos, categorias, produtos esgotados e produtos em promoção

## Tecnologias usadas

- **Backend:** PHP 8 / Laravel
- **Base de dados:** MySQL
- **Frontend:** Blade (templates HTML/CSS integrados)
- **Autenticação:** Laravel Breeze
- **ORM / Acesso a dados:** Eloquent (PDO, prepared statements)
- **Controlo de versões:** Git / GitHub

## Estrutura do projecto

O projecto segue a arquitectura MVC nativa do Laravel:

```
app/
  Http/
    Controllers/     → Controllers (recebem pedidos, chamam os Models)
    Requests/         → Form Requests (validação do lado do servidor)
  Models/             → Models (lógica de acesso a dados e regras de negócio)
database/
  migrations/         → Definição das tabelas
  seeders/            → Dados de exemplo (categorias e produtos)
resources/
  views/              → Views Blade (apresentação, sem lógica de negócio)
public/
  uploads/            → Imagens de produtos carregadas via admin
database.sql          → Script de criação das tabelas e dados de exemplo
```

## Base de dados

Tabelas principais:

- **categorias** — id, nome, descricao, criado_em
- **produtos** — id, categoria_id, nome, descricao, preco, preco_antigo, imagem, estado (`disponivel` / `esgotado` / `promocao`), criado_em
- **users** (utilizadores) — id, name/utilizador, email, password (hash), criado_em

O script `database.sql` na raiz do repositório contém a criação de todas as tabelas e dados de exemplo (pelo menos 3 categorias e 6 produtos).

## Instalação local

### Pré-requisitos
- PHP >= 8.1
- Composer
- MySQL
- Node.js e npm (para compilar assets, se aplicável)

### Passos

```bash
# 1. Clonar o repositório
git clone https://github.com/<teu-utilizador>/catalogo-produtos.git
cd catalogo-produtos

# 2. Instalar dependências
composer install
npm install

# 3. Configurar o ambiente
cp .env.example .env
php artisan key:generate

# 4. Configurar a base de dados no ficheiro .env
# DB_DATABASE=catalogo
# DB_USERNAME=root
# DB_PASSWORD=

# 5. Correr as migrations e popular a base de dados
php artisan migrate --seed

# 6. (Opcional) Compilar assets
npm run dev

# 7. Iniciar o servidor local
php artisan serve
```

A aplicação fica disponível em `http://localhost:8000`.

### Utilizador de teste (admin)

```
Utilizador: admin@catalogo.com
Palavra-passe: password
```

> Alterar estas credenciais antes de publicar em produção.

## Segurança

- Palavras-passe encriptadas com hashing (bcrypt) e nunca guardadas em texto simples
- Todas as queries feitas via Eloquent/PDO com prepared statements
- Dados apresentados nas views escapados automaticamente pelo Blade (prevenção de XSS)
- Sessão usada para autenticação, com todas as rotas do admin protegidas por middleware
- Validação de todos os formulários no servidor antes de qualquer operação na base de dados
- Upload de imagens restrito a JPG/PNG, com limite de 2 MB e renomeação do ficheiro

## Aplicação hospedada

🔗 [https://Saldanha.capacitacfti.xyz](https://<teu-nome>.capacitacfti.xyz)

## Autor

**José** — Formando de Desenvolvimento Backend
