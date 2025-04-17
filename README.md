<a href="https://www.redeparcerias.com">
  <img width="200" src="https://redeparcerias.com/wp-content/uploads/2023/09/rede-parcerias-vertical.svg"/>
</a>

# 🚀 Desafio: Fullstack Pleno - Rede Parcerias

Sistema de controle de estoque fullstack construído com **Laravel 12 (API JWT)** no backend e **React + TypeScript com Inertia.js** no frontend. O projeto é 100% Dockerizado e utiliza boas práticas como **DDD, SOLID** e **Clean Architecture**.

---

## 🛠️ Tecnologias Utilizadas

- **Backend:** Laravel 12, JWT, Inertia.js, Docker, MySQL
- **Frontend:** React, TypeScript, Inertia.js, TailwindCSS, Styled-components
- **Outros:** Docker Compose, Eslint, Prettier

---

## ⚙️ Como executar o projeto

### 📦 Pré-requisitos

- Docker
- Docker Compose

### 🚀 Subindo o projeto

```bash
# Clone o repositório
git clone https://github.com/RodrigoBCastro/rede-parcerias-teste
cd rede-parcerias-teste

# Suba os containers
docker compose up -d

# Acesse o container do app
docker exec -it laravel_rede_parcerias bash

# Instale as dependências do Laravel
composer install

# Copie o .env e gere a key
cp .env.example .env
php artisan key:generate

# Gere o token JWT
php artisan jwt:secret

# Rode as migrations e seeders (se tiver)
php artisan migrate --seed
```

> 🔐 A autenticação já está integrada com JWT. Após o login, o token será usado nas requisições protegidas da API.

---

## 🔐 Controle de Acesso (ACL)

Os usuários possuem 3 níveis de acesso:

| Nível         | Ações Permitidas                                                    |
|---------------|---------------------------------------------------------------------|
| Administrador | Criar, editar, excluir e visualizar produtos                        |
| Operador      | Visualizar produtos e atualizar quantidade em estoque              |
| Usuário comum | Apenas visualizar produtos                                          |

---

## 📦 API Versionada

- As rotas da API seguem o padrão: `/api/v1/...`
- Exemplo: `GET /api/v1/products` (Requer autenticação JWT)


---

## 🔓 Rotas Públicas (Sem Autenticação)

| Método | Endpoint       | Descrição                    |
|--------|----------------|------------------------------|
| POST   | `/login`       | Realiza o login do usuário   |
| POST   | `/register`    | Registra um novo usuário     |

---

## 🔐 Rotas Protegidas (Requer token JWT e role apropriada)

### 📁 Produtos (`/products`)

| Método | Endpoint                | Acesso permitido           | Descrição                            |
|--------|-------------------------|----------------------------|----------------------------------------|
| GET    | `/products`             | admin, operator, common    | Lista todos os produtos                |
| GET    | `/products/{id}`        | admin, operator, common    | Detalha um produto específico          |
| POST   | `/products`             | admin                      | Cria um novo produto                   |
| PUT    | `/products/{id}`        | admin, operator            | Atualiza um produto                    |
| DELETE | `/products/{id}`        | admin                      | Remove um produto                      |


### 📁 Users (`/users`)

| Método | Endpoint | Acesso permitido           | Descrição               |
|--------|----------|----------------------------|-------------------------|
| GET    | `/users` | admin, operator, common    | Lista todos os usuarios |

---

## ✨ Funcionalidades

- Login / Registro com JWT
- CRUD de produtos
- Filtragem por nome, categoria e faixa de preço
- Validações avançadas (SKU único, quantidade mínima, etc.)
- ACL integrada no front e no back
- Painel totalmente responsivo e estilizado

---

## 📌 Observações

- Todas as rotas protegidas utilizam `auth:api`.
- Tokens JWT devem ser enviados no header `Authorization: Bearer {token}`.
- A comunicação entre backend e frontend é feita via Inertia.js.

---

## 🪄 Extras e Diferenciais

- ✅ Clean Architecture + DDD + SOLID
- ✅ Versionamento de API
- ✅ Uso de Docker para facilitar o setup
- ✅ Styled-components + TailwindCSS
- ✅ ACL com Spatie Permission
- ✅ Validações centralizadas via Form Request
- ✅ Mensagens de erro e status code apropriados
- ✅ Código organizado