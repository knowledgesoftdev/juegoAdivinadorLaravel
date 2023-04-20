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

	[![Screenshot-1.png](https://i.postimg.cc/B6kMBhWV/Screenshot-1.png)](https://postimg.cc/LYktH38t)

- Luego lo migramos: php artisan migrate


