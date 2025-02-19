# **🏥 MediSys - Sistema de Gestión Médica**  

MediSys es una aplicación web desarrollada en **PHP, HTML, CSS y MySQL** que permite al personal médico **gestionar pacientes, crear recetas médicas, registrar notas médicas y agendar citas** de forma segura y eficiente.  

---

## **✨ Características Principales**  

✅ **Gestión de Usuarios**: Registro e inicio de sesión para el personal médico.  
✅ **Recetas Médicas**: Creación y almacenamiento de recetas para pacientes.  
✅ **Notas Médicas**: Registro de notas con historial clínico y diagnóstico.  
✅ **Gestión de Pacientes**: CRUD (Crear, Leer, Actualizar, Eliminar) de pacientes.  
✅ **Agendamiento de Citas**: Programación y visualización de próximas consultas.  
✅ **Seguridad Mejorada**: Uso de **variables de entorno. 

---

## **📌 Tecnologías Utilizadas**  

- **Frontend:** HTML, CSS (Responsive y Minimalista).  
- **Backend:** PHP con MySQL.  
- **Base de Datos:** MySQL en XAMPP.  
- **Seguridad:** Variables de entorno.

---

## **🚀 Instalación y Configuración**  

### **1️⃣ Requisitos Previos**  

1. Tener **XAMPP** instalado ([Descargar aquí](https://www.apachefriends.org/es/index.html)).  
2. Tener **Composer** instalado ([Descargar aquí](https://getcomposer.org/)).  

### **2️⃣ Clonar el Repositorio**  

Para descargar el código fuente del proyecto:  

```sh
git https://github.com/Esteban77orjuela/MediSys
cd MediSys
```

### **3️⃣ Instalar Dependencias**  

Ejecuta el siguiente comando en la terminal dentro de la carpeta del proyecto:  

```sh
composer install
```

### **4️⃣ Configurar la Base de Datos**  

1. Abre **XAMPP** y **enciende Apache y MySQL**.  
2. Abre `phpMyAdmin` desde `http://localhost/phpmyadmin/`.  
3. Crea una base de datos llamada **usuarios**.  
4. Importa el archivo SQL `db/usuarios.sql` en `phpMyAdmin`.  

### **5️⃣ Configurar Variables de Entorno**  

1. En la raíz del proyecto (`C:\xampp\htdocs\MediSys\`), crea un archivo llamado **`.env`** con este contenido:  

```
DB_HOST=
DB_USER=
DB_PASSWORD=
DB_NAME=
```

### **6️⃣ Ejecutar el Proyecto**  

Abre tu navegador y accede a:  

```
http://localhost/MediSys
```

---

## **🔐 Seguridad Implementada**  

- **Variables de entorno (`.env`)** para credenciales.   

---

## **📂 Estructura del Proyecto**  

📦 **MediSys/**  
┣ 📂 `php/` (Archivos backend)  
┃ ┣ `config.php` → Conexión segura a la base de datos.  
┃ ┣ `iniciar-sesion.php` → Verificación de credenciales.  
┃ ┣ `register.php` → Registro de personal médico.  
┃ ┣ `recetas.php` → Crear recetas médicas.  
┃ ┣ `notas.php` → Crear notas médicas.  
┃ ┣ `pacientes.php` → Gestión CRUD de pacientes.  
┃ ┣ `citas.php` → Agendar citas médicas.  
┃ ┣ `listar_citas.php` → Ver todas las citas registradas.  
┃ ┗ `eliminar_cita.php` → Eliminar citas.  
┣ 📂 `css/` (Estilos de la aplicación)  
┃ ┣ `estilo.css` → Estilos globales.  
┃ ┣ `estilo-recetas.css` → Estilos para recetas médicas.  
┃ ┣ `estilo-notas.css` → Estilos para notas médicas.  
┃ ┗ `estilo-citas.css` → Estilos para citas.  
┣ 📂 `db/` (Base de datos)  
┃ ┗ `usuarios.sql` → Script para crear la base de datos.  
┗ 📜 `README.md` → Documentación del proyecto.  

---

## **📄 Licencia**  

Este proyecto está bajo la **Licencia MIT**, lo que significa que puedes usarlo y modificarlo libremente.  

---

## **💡 Contribuciones**  

Si deseas contribuir al proyecto:  

1. **Haz un fork** del repositorio.  
2. **Crea una nueva rama** (`git checkout -b nueva-funcionalidad`).  
3. **Realiza tus cambios y haz un commit** (`git commit -m "Añadida nueva funcionalidad"`).  
4. **Envía un pull request** y revisaremos tus cambios.  

---
