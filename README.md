Laravel Jetstream Blog

Este es un proyecto basado en Laravel Jetstream que permite a los usuarios crear, editar y gestionar artículos y etiquetas. Incluye autenticación, autorización y un formulario de contacto.

Requisitos

Asegúrate de tener instalados los siguientes requisitos antes de continuar:

PHP >= 8.1

Composer

Node.js y NPM

MySQL o PostgreSQL (según configuración en .env)

Laravel 10

Instalación

1. Clonar el repositorio

 git clone https://github.com/tu-usuario/tu-repositorio.git
 cd tu-repositorio

2. Instalar dependencias

composer install
npm install && npm run dev

3. Configurar el entorno

Copia el archivo de configuración y edítalo según tus necesidades:

cp .env.example .env

Luego, actualiza las credenciales de la base de datos en el archivo .env.

4. Generar clave de la aplicación

php artisan key:generate

5. Migrar la base de datos y seeders

php artisan migrate --seed

Esto creará las tablas necesarias y generará datos de prueba.

6. Configurar almacenamiento de archivos

php artisan storage:link

7. Servir la aplicación

php artisan serve

La aplicación estará disponible en http://127.0.0.1:8000.

Funcionalidades Implementadas

Autenticación y verificación de email con Laravel Jetstream.

CRUD de artículos con Livewire, solo el propietario puede editar y eliminar sus artículos.

CRUD de etiquetas restringido a administradores.

Middleware personalizado para restringir accesos según rol de usuario.

Formulario de contacto con validación y envío de correos usando Mailtrap.

Seeders y factories para generar datos de prueba.

Accesos de Prueba

Para probar como administrador, puedes usar:

Email: admin@example.com
Password: password

Para probar como usuario normal:

Email: user@example.com
Password: password

Contribuciones

Si deseas contribuir, por favor haz un fork del repositorio, crea una rama con tus cambios y abre un Pull Request.

Licencia

Este proyecto está bajo la licencia MIT.

