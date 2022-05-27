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

![login](https://user-images.githubusercontent.com/37257742/170623645-9f36cb9b-2811-4c7b-b38d-83df95aa7536.png)

![register](https://user-images.githubusercontent.com/37257742/170623682-98033b10-677a-4da2-88ed-6e7d1716ca67.png)

![app](https://user-images.githubusercontent.com/37257742/170624244-3f825dad-a589-47d0-85a9-4e984c03df1c.png)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
