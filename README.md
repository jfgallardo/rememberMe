## Sobre Remember-Me

Aplicación desarollada con el fin de poder crear tareas y notificar al usuario mediante correo electrónico sobre las mismas.


## Características

- Envio de correo haciendo usos de Jobs.
- Programación de tareas diarias para el envio de notificaciones.


## Instalación

### Instalación de dependencias
```
composer install
cd vue
npm install
```
### Despliegue de BD
```
php artisan queue:table
php artisan migrate

```
### Iniciar servidor
```
php artisan serve
npm run dev
```

## Imágenes

!(/resources/images/login.png)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
