# 🚀 Sistema de Inventario Bilingüe - Zoigrafa

Este es el Proyecto Final de la materia de TecWebII. Consiste en un sistema de gestión de inventario para la tienda de ropa de trabajo y seguridad "Zoigrafa", desarrollado en CakePHP y orquestado con contenedores.

## 🏗️ Arquitectura del Proyecto
El sistema funciona bajo una arquitectura de microservicios usando Podman/Docker Compose, con separación clara de contenedores:
* **php-app:** Servidor web Apache con PHP 8.4 y CakePHP, con soporte bilingüe (extensión `intl` configurada).
* **db:** Base de datos MariaDB 10.11, aislada y persistente mediante volúmenes.

## ⚙️ Requisitos Previos
* Podman o Docker y Docker Compose instalados.
* Git.

## 🚀 Cómo levantar el proyecto (Reproducción)
1. Clonar el repositorio:
   `git clone https://github.com/carlitos0306/entregable-final-zoigrafa.git`
2. Entrar a la carpeta:
   `cd entregable-final-zoigrafa`
3. Levantar los servicios (la base de datos se poblará automáticamente mediante `init.sql`):
   `podman-compose up -d`
4. Acceder al sistema desde el navegador: `http://localhost:8080`

## 🔐 Credenciales de Acceso
* **Ruta de Login:** `http://localhost:8080/users/login`
* **Usuario Administrador:** `eduardo@gmail.com`
* **Contraseña:** `101010`

## ✨ Características Principales
* Soporte Multilingüe (Inglés/Español)
* Autenticación segura de usuarios (Passwords hasheados)
* CRUD de Productos de seguridad industrial.
* Menú dinámico con saludo personalizado al usuario logueado.