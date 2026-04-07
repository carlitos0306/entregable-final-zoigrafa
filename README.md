# 🚀 Sistema de Inventario Bilingüe - Zoigrafa

Este es el Proyecto Final. Consiste en un sistema de gestión de inventario para la tienda de ropa de trabajo y seguridad "Zoigrafa", desarrollado en CakePHP y orquestado con contenedores.

## 🏗️ Arquitectura del Proyecto
El sistema funciona bajo una arquitectura de microservicios usando Podman/Docker Compose, con separación clara de contenedores:
* **php-app:** Servidor web Apache con PHP 8.4 y CakePHP, con soporte bilingüe e internacionalización (i18n).
* **db:** Base de datos MariaDB 10.11, aislada y persistente mediante volúmenes locales.

## ⚙️ Requisitos Previos
* Podman o Docker y Docker Compose instalados.
* Git.

## 🚀 Cómo levantar el proyecto
1. Clonar el repositorio:
   `git clone https://github.com/carlitos0306/entregable-final-zoigrafa.git`
2. Entrar a la carpeta:
   `cd entregable-final-zoigrafa`
3. Levantar los servicios (la base de datos incluye persistencia de datos):
   `podman-compose up -d`
4. Acceder al sistema desde el navegador: `http://localhost:8080` (O mediante la IP de la máquina en red local).

## 🔐 Credenciales de Acceso para Evaluación
Para comprobar el sistema de roles y el cambio de idioma dinámico (i18n), se han configurado dos usuarios de prueba en la base de datos persistente:

**1. Perfil Administrador (Idioma: Español)**
* **Ruta de Login:** `/users/login`
* **Usuario:** `pablo@gmail.com`
* **Contraseña:** `123456`
* *Nota:* Este perfil tiene acceso total al sistema, incluyendo la pestaña de gestión de "Usuarios" y la edición del catálogo. La interfaz se muestra en Español.

**2. Perfil Cliente (Idioma: Inglés)**
* **Ruta de Login:** `/users/login`
* **Usuario:** `jared@gmail.com`
* **Contraseña:** `123456`
* *Nota:* Este perfil tiene una vista restringida (solo visualizar catálogo de productos). El sistema detecta su configuración y traduce automáticamente las acciones de la interfaz al Inglés.

## ✨ Características Principales
* Soporte Multilingüe Automático (Inglés/Español) según el perfil del usuario.
* Autenticación segura de usuarios y control de acceso por roles.
* CRUD completo de Productos de seguridad industrial.