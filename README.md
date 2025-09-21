# VentasFix Cart Starter (Laravel 11)

Este ZIP contiene **migraciones, modelos, servicios, controladores, requests, resources, policies y rutas** para implementar
el **carro de compras** y CRUDs base de Usuarios, Productos y Clientes, más un Dashboard básico.

## Requisitos
- PHP 8.2+
- Composer
- MySQL 8+ o PostgreSQL 14+
- Redis (opcional, para cache/colas)
- Node 18+ (para assets del template)

## Instrucciones de instalación (proyecto nuevo)
1. Crear proyecto Laravel 11:
   ```bash
   composer create-project laravel/laravel ventasfix
   cd ventasfix
   composer require laravel/sanctum
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   php artisan migrate
   ```
2. Copiar el contenido de este módulo dentro de tu proyecto **manteniendo** la estructura de carpetas (app/, database/, routes/, resources/...).  
   Si te pide reemplazar archivos de rutas, **fusiona** manualmente.
3. Configura tu `.env` (DB, APP_URL, etc.). Opcional: `IVA_PCT=19`.
4. Ejecuta migraciones y seeders:
   ```bash
   php artisan migrate --seed
   ```
5. Autenticación web (sugerido): instala Breeze o Jetstream para login/backoffice.
6. Inicia el servidor:
   ```bash
   php artisan serve
   ```

## Rutas clave
- Web (protegidas por `auth`): `/`, `/cart`, CRUD de users/products/clients.
- API v1 (Sanctum): `/api/v1/...` (users, products, clients, cart).

## Notas
- Montos en **centavos** (ints).
- Stock reservado en operaciones del carro.
- Totales recalculados en el servicio de pricing.
- Stubs listos para integración Softland (Job + comentarios).
