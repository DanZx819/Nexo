<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🛒 E-commerce Laravel

> Um sistema completo de e-commerce desenvolvido com Laravel 12, incluindo painel administrativo, carrinho de compras e integração com Mercado Pago.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-Templates-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)

## 👋 Sobre o Projeto

Este é um projeto completo de **e-commerce** desenvolvido por **Daniel de Oliveira Zanchetta** ([@DanZx819](https://github.com/DanZx819)), onde apliquei diversos conceitos fundamentais e avançados do Laravel, demonstrando boas práticas de desenvolvimento web moderno.

O sistema oferece uma experiência completa tanto para administradores quanto para clientes, com funcionalidades robustas de gerenciamento de produtos, carrinho de compras e processamento de pagamentos.

## ✨ Features Principais

### 🔐 Sistema de Autenticação
- ✅ Registro de usuários
- ✅ Login/Logout seguro
- ✅ Controle de acesso por tipo de usuário (Admin/Cliente)
- ✅ Rotas protegidas por middleware

### 🛍️ Funcionalidades do E-commerce
- ✅ **Catálogo de Produtos** - Listagem com paginação e filtros
- ✅ **Carrinho de Compras** - Persistente por usuário autenticado
- ✅ **Checkout Completo** - Integração com Mercado Pago
- ✅ **Gerenciamento de Pedidos** - Histórico e status

### ⚙️ Painel Administrativo
- ✅ **CRUD de Produtos** - Criação, edição e exclusão
- ✅ **Upload de Imagens** - Com tratamento e otimização
- ✅ **Gerenciamento de Usuários**
- ✅ **Dashboard com Estatísticas**

### 💳 Sistema de Pagamentos
- ✅ **Checkout Pro** - Redirecionamento para Mercado Pago
- ✅ **Checkout Transparente** - Pagamento sem sair do site
- ✅ **Webhooks** - Confirmação automática de pagamentos

## 🛠️ Tecnologias Utilizadas

| Tecnologia | Descrição | Versão |
|------------|-----------|---------|
| **Laravel** | Framework PHP | 12.x |
| **Blade** | Engine de Templates | Nativo |
| **Eloquent ORM** | Mapeamento Objeto-Relacional | Nativo |
| **MySQL** | Banco de Dados | 8.0+ |
| **Shopping Cart** | [darryldecode/cart](https://github.com/darryldecode/laravelshoppingcart) | ^4.0 |
| **Mercado Pago SDK** | Gateway de Pagamento | Oficial |

## 🚀 Instalação e Configuração

### Pré-requisitos
- PHP 8.2 ou superior
- Composer
- MySQL 8.0+
- Node.js e NPM (para assets)

### Passo a passo

1. **Clone o repositório**
```bash
git clone https://github.com/DanZx819/ecommerce-laravel.git
cd ecommerce-laravel
```

2. **Instale as dependências**
```bash
composer install
npm install
```

3. **Configure o ambiente**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure o banco de dados no `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_laravel
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

5. **Configure o Mercado Pago no `.env`**
```env
MERCADO_PAGO_ACCESS_TOKEN=seu_access_token
MERCADO_PAGO_PUBLIC_KEY=sua_public_key
```

6. **Execute as migrações e seeders**
```bash
php artisan migrate --seed
```

7. **Compile os assets**
```bash
npm run build
```

8. **Inicie o servidor**
```bash
php artisan serve
```

## 📁 Estrutura do Projeto

```
📦 ecommerce-laravel
├── 📂 app/
│   ├── 📂 Http/Controllers/
│   │   ├── AdminController.php
│   │   ├── CartController.php
│   │   ├── CheckoutController.php
│   │   └── ProductController.php
│   ├── 📂 Models/
│   │   ├── Product.php
│   │   ├── Order.php
│   │   └── User.php
│   └── 📂 Services/
│       └── MercadoPagoService.php
├── 📂 resources/
│   ├── 📂 views/
│   │   ├── 📂 admin/
│   │   ├── 📂 cart/
│   │   └── 📂 products/
└── 📂 database/
    ├── 📂 migrations/
    └── 📂 seeders/
```

## 🎯 Funcionalidades Detalhadas

### Para Clientes
- **Navegação Intuitiva** - Interface limpa e responsiva
- **Busca Avançada** - Filtros por categoria, preço e disponibilidade
- **Carrinho Inteligente** - Cálculo automático de frete e impostos
- **Checkout Rápido** - Processo simplificado em poucos passos

### Para Administradores
- **Dashboard Completo** - Métricas de vendas e produtos
- **Gestão de Estoque** - Controle de quantidade e disponibilidade
- **Relatórios** - Análise de vendas e performance
- **Configurações** - Personalização do sistema

## 🧠 Conceitos Aplicados

Durante o desenvolvimento, foram aplicados diversos conceitos importantes:

- **Arquitetura MVC** - Separação clara de responsabilidades
- **Eloquent Relationships** - Relacionamentos entre modelos
- **Middleware Customizado** - Controle de acesso e validações
- **Service Layer** - Lógica de negócio isolada
- **Form Requests** - Validações robustas
- **Observers** - Eventos e listeners
- **Storage Management** - Gerenciamento de arquivos

## 🔒 Segurança

- **CSRF Protection** - Proteção contra ataques CSRF
- **SQL Injection** - Prevenção através do Eloquent ORM
- **XSS Protection** - Sanitização de dados
- **Authentication** - Sistema robusto de autenticação
- **Authorization** - Controle de permissões por usuário

## 📚 Aprendizados

Durante o desenvolvimento deste projeto, consolidei conhecimentos em:

✅ **Laravel Framework** - Domínio completo da estrutura MVC  
✅ **Eloquent ORM** - Relacionamentos complexos e otimização de queries  
✅ **Blade Templates** - Criação de interfaces dinâmicas e reutilizáveis  
✅ **Middleware** - Implementação de filtros e validações  
✅ **APIs Externas** - Integração com gateways de pagamento  
✅ **Storage** - Gerenciamento de uploads e arquivos  
✅ **Validações** - Tanto client-side quanto server-side  
✅ **Composer** - Gerenciamento de dependências PHP  

## 🤝 Contribuindo

Contribuições são sempre bem-vindas! Se você tem alguma sugestão para melhorar este projeto:

1. Faça um Fork do projeto
2. Crie uma Branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a Branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👨‍💻 Autor

**Daniel de Oliveira Zanchetta**  
*Desenvolvedor Web Full Stack*

🔗 **Conecte-se comigo:**  
[![GitHub](https://img.shields.io/badge/GitHub-@DanZx819-181717?style=flat&logo=github)](https://github.com/DanZx819)  
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Daniel_Zanchetta-0A66C2?style=flat&logo=linkedin)](https://www.linkedin.com/in/daniel-de-oliveira-zanchetta-512a3b311)  

---

<div align="center">

### ⭐ Se este projeto foi útil para você, considere dar uma estrela!

**Desenvolvido com 💜 por [Daniel Zanchetta](https://github.com/DanZx819)**

</div>
