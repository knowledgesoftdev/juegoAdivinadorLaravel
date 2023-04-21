## Laravel 10 + AdminLte

- Crearemos un proyecto en laravel: laravel new juegoAdivinador

- Integraremos el AdminLte:
	composer require jeroennoten/laravel-adminlte

- Instalaremos los recursos de AdminLte:
	php artisan adminlte:install

- Instalaremos el paquete de autentificacion:
	composer require laravel/ui

- Creamos la vistas de login y register:
	php artisan ui bootstrap --auth

- Reemplazamos nuestras vistas de login y register por el de AdminLte:
	php artisan adminlte:install --only=auth_views

- Corremos la aplicación: php artisan serve

## Migraciones

- Crearemos la base de datos que llevara de nombre: juegoAdivinador.

- Una vez creado lo colocamos en la conexion que se encontrara en el env.

- Creamos su modelo con su respectiva migracion y controlador: php artsan make:model Point -mc

- Colocamos unos campos en la migracion creada:

    [![Screenshot-1.png](https://i.postimg.cc/ryhn6LkW/Screenshot-1.png)](https://postimg.cc/0rwdmFr2)

- Luego lo migramos: php artisan migrate

## Modificando el home que trae por defecto por el de AdminLte

- Primero corremos nuestra aplicación: php artisan serve

- Tambien para los estilos: npm run dev

- El codigo que cambiaremos en resources->views->home.blade.php:

    [![fonto1.png](https://i.postimg.cc/sxds5Qc1/fonto1.png)](https://postimg.cc/YG35HSTw)

- Luego vamos config->adminlte.php en la linea 292 'menu' reemplazamos por este código:

    [![foto2.png](https://i.postimg.cc/JzydZ1TB/foto2.png)](https://postimg.cc/DSTgKK32)


