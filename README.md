Backend Test!
===================

Solución de examen que consta de 2 partes.

1ra Parte
------------- 

Se desarrollan las clases de los enunciados, se tiene que ejecutar las clases para ver los resultados.

2ra Parte
------------- 

Esta se desarrolla usando el Framework **LARAVEL**. Primero se tiene que configurar el archivo **.env**, en el se debe hacer referencia a una Base de Datos (Mysql 5.7.19) vacia pára hacer la migracion de los empleados.

- La versión de PHP debe ser >=5.6.4

- El archivo **.env** se puede crear en base al contenido del archivo **.env.example**.

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

- Para probar el servicio de lista de empleados en base a un rango salarial, se debera agregar ingresar a la url siguiente.

**URL**:  DOMINIO/api/v1/employee/get-search-by-salary/RANGE1-RANGE2

Formato Rango salarial
----------------------

```
Ejemplo: rango entre 1000 y 2000
RANGE1-RANGE2   <=>   1000-2000
Quedando en la URL: 
DOMINIO/api/v1/employee/get-search-by-salary/1000-2000

```
