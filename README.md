
![Laravel Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)


## Instalación
Paso a paso para instalación y despliegue de prueba técnica

1. **Instalar Composer**

    ```bash 
    composer install

2. **Generar llaves**

    ```bash 
    php artisan key:generate

3. **Publicar enlace simbólico**

    ```bash 
    php artisan storage:link

4. **Correr migraciones**

    ```bash 
    php artisan migrate --seed

5. **Ejecutar tests**
    ```bash
    php artisan test 

6. **Instalar Node Modules**
    ```bash 
    npm i

7. **Compilar y empaquetar el código fuente de vue**
    ```bash
    npm run build
  
## Levantar servidores

1. **Laravel**
    ```bash
    php artisan serve

2. **Vite**
    ```bash
    npm run dev

## Servidores 
- Xampp https://www.apachefriends.org/es/index.html
- Wamp https://www.wampserver.com/en/

### Requerimientos
- PHP 8.2
- Basic PHP extensions for laravel https://laravel.com/docs/10.x/deployment#server-requirements
  
### Entornos
copiar contenido de .env.example
crear archivo .env y pegar contenido 



#### Branches
- Master: `master`
