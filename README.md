# About Laravel template

- Localized Japan
- Dockerized
- for AWS ECS & ECR

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

- Javascript ES6
- Vue3
- Vue Composition API
- Laravel ~~Mix~~ Vite

## Formatting

- phpcs
- Eslint
- Prettier

## Coding rule

- Define return type and argument type.

```php
public function doSomething(string text) : string {
    // Do something
}
```
