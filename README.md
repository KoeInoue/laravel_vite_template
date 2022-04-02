# About Laravel template

- Localized Japan
- Dockerized
- for AWS ECS & ECR
- SPA

## Quick Start

Clone this project
`$ cd laravel_ecs_template`
`$ make up-build` // docker-compose up -d --build
`$ cp .env.example .env`
`$ make php`
`# composer install`
`# php artisan key:generate`
`# npm install`
`# npm run dev` // Start Vite server 

## Environment

### Docker multi-stage build

#### For local

- php8.1-fpm (node16)
- nginx
- mariadb
- phpmyadmin
- mailhog

#### For production

- php8.1-fpm
- nginx

## Backend

### Authentication

- AWS Cognite
→ To assume mobile service as well. Because it requires browser-independent authentication

#### Repository Pattern Architecture

- Model
→ Define DB object and attribute.
- Controller
→ Receive requests, use Service, pass data to View or return json response.
- Request
    → Validation
- Service
→ Business logic. Receive requests from Controller and use Repository interface
- Repository Interface
→ Call repository. Only used for Service.
- Repository
→ Execute SQL Query. Only called from Repository interface.

## Frontend

- Typescript ES6
- Vue3
- Vue Composition API
- Vue Router4
- Vuex 4
- Laravel Vite

## Formatting

- phpcs
- Eslint
- Prettier

To fix codes
`make npm-fix`
`make comoser-fixer`

## Coding rule

- Define return type and argument type.

```php
public function doSomething(string text) : string {
    // Do something
}
```
