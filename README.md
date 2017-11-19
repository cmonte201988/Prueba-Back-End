Backend Test!
===================

Solución de examen que consta de 2 partes.

1ra Parte
------------- 

Se desarrollan las clases de los enunciados, se tiene que ejecutar las clases para ver los resultados.

2ra Parte
------------- 

Esta se desarrolla usando el Framework **LARAVEL**. Primero se tiene que configurar el archivo **.env**, en el se debe hacer referencia a una BD vacia pára hacer la migracion de los empleados.

- Luego de configurar el archivo .env, ejecutar los siguientes comandos.

```
// Descargar Vendor 
composer install

// 
composer dump-autoload

// Crear Tabla Employee 
php artisan migrate

// Volcar Informacion a la tabla Employee
php artisan db:seed

// Iniciar Proyecto
php artisan serve
```
