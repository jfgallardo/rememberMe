# 💼 Remember-Me - Gestión de Tareas 📧

## 📌 Descripción
Aplicación desarrollada para gestionar tareas y notificar al usuario mediante correo electrónico sobre ellas. Utiliza **Laravel** para la parte backend y **Vue.js** en el frontend.

## 🚀 Características
- 📧 Envío de correos utilizando **Jobs**.
- 🗓️ Programación de tareas diarias para el envío de notificaciones.

## 🛠️ Tecnologías utilizadas
- **Laravel** - Framework PHP para el backend.
- **Vue.js** - Framework para la interfaz de usuario.
- **Jobs** - Para el envío programado de correos electrónicos.

## ⚙️ Instalación y configuración

### 📝 Instalación de dependencias
1. Instala las dependencias de backend:
   ```sh
   composer install
   ```
2. Navega a la carpeta del frontend y instala las dependencias de Vue.js:
   ```sh
   cd vue
   npm install
   ```

### 🛠️ Despliegue de la base de datos
1. Crea las tablas necesarias para las colas:
   ```sh
   php artisan queue:table
   ```
2. Ejecuta las migraciones:
   ```sh
   php artisan migrate
   ```

### ▶️ Iniciar el servidor
1. Inicia el servidor de **Laravel**:
   ```sh
   php artisan serve
   ```
2. Inicia el servidor de **Vue.js**:
   ```sh
   npm run dev
   ```

## 🖼️ Imágenes

![login](https://user-images.githubusercontent.com/37257742/170623645-9f36cb9b-2811-4c7b-b38d-83df95aa7536.png)

![register](https://user-images.githubusercontent.com/37257742/170623682-98033b10-677a-4da2-88ed-6e7d1716ca67.png)

![app](https://user-images.githubusercontent.com/37257742/170624244-3f825dad-a589-47d0-85a9-4e984c03df1c.png)

## 📜 Licencia

El framework **Laravel** es un software de código abierto con licencia bajo la [licencia MIT](https://opensource.org/licenses/MIT).
