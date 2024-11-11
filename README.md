# Medop - Sistema de Gestión para Ópticas

Medop es una plataforma diseñada para la centralización de datos y la gestión de inventario en ópticas. Este sistema permite a las ópticas gestionar de manera eficiente su inventario de productos, controlar ventas y mantener un registro de clientes, todo desde una sola plataforma accesible tanto en versión web como móvil.
Tecnologías utilizadas
Backend:
> [!NOTE]
> Laravel: Framework PHP para el desarrollo del backend, gestionando las operaciones CRUD, rutas y lógica de negocio.
Backpack for Laravel: Herramienta para crear paneles de administración de manera rápida y flexible.
MySQL: Base de datos relacional para almacenar la información del inventario, clientes, ventas, entre otros.
Aiven: Servicio de base de datos remoto que facilita la gestión y escalabilidad de MySQL en la nube.

Frontend:
> [!NOTE]
> HTML: Lenguaje de marcado utilizado para la estructura de las páginas web informativas de la óptica.
CSS: Estilos para las interfaces web, mejorando la presentación y experiencia de usuario.

Móvil:
> [!NOTE]
>Kotlin: Lenguaje de programación para desarrollar la aplicación móvil, permitiendo acceso al sistema desde dispositivos Android.

Objetivo del Sistema

El objetivo de Medop es centralizar todos los procesos relacionados con la gestión de una óptica en un solo sistema. Esto incluye:
> [!NOTE]
    Gestión de inventario: Control de productos en existencia, productos vendidos, nuevas adquisiciones y alertas de bajo inventario.
    Gestión de clientes: Registro y seguimiento de clientes, incluyendo historial de compras, datos de contacto y preferencias.
    Centralización de datos: Todos los datos son almacenados en una base de datos remota (Aiven), lo que asegura que la información esté siempre disponible y actualizada en tiempo real.
    Accesibilidad multiplataforma: Acceso al sistema tanto desde la web como desde dispositivos móviles, lo que facilita el uso en cualquier lugar y en cualquier momento.

Instalación
Requisitos previos
> [!NOTE]
    PHP 7.4 o superior
    Composer (para gestionar dependencias de PHP)
    MySQL (o acceso a una base de datos remota como Aiven)
    Node.js y NPM (para el desarrollo frontend)
    Java y Android Studio (si deseas trabajar en la aplicación móvil Kotlin)

Pasos para la instalación

```
1. Clonar el repositorio
```

git clone https://github.com/tu-usuario/medop.git
cd medop

2. Instalar dependencias de backend
```
composer install
```
3. Configurar el archivo .env

Configura tu archivo .env para que apunte a tu base de datos MySQL (o la base de datos de Aiven).
```
DB_CONNECTION=mysql
DB_HOST=your-database-host
DB_PORT=3306
DB_DATABASE=medop_db
DB_USERNAME=your-username
DB_PASSWORD=your-password
```
4. Migrar la base de datos
```
php artisan migrate
```
5. Instalar dependencias de frontend
```
npm install
```
6. Ejecutar el servidor
```
php artisan serve
```
Tu aplicación debería estar accesible en http://localhost:8000.
Desarrollo de la aplicación móvil (Android)

Para trabajar en el desarrollo de la aplicación móvil en Kotlin, abre el proyecto en Android Studio y sigue las instrucciones de configuración del entorno Android.
