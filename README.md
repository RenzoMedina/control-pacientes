# 🩺 Control de Pacientes

Sistema modular para la gestión de pacientes, desarrollado en PHP con integración de estilos Tailwind y despliegue en contenedores Docker. Ideal para entornos clínicos o educativos que requieren trazabilidad, monitoreo y escalabilidad.

## 🚀 Características

- Gestión de rutas y vistas con PHP nativo
- Estilos personalizados con Tailwind CSS
- Configuración de Nginx y supervisord para despliegue en producción
- Integración lista para monitoreo y logging
- Dockerfile optimizado para entornos reproducibles

## 📁 Estructura del proyecto

``` plaintext
├── app/        
├── resources/css/  
├── routes/
├── test/  
├── index.php  
├── nginx.conf  
├── supervisord.conf  
├── Dockerfile 
└── tailwind.config.js 

```

## 🐳 Despliegue con Docker

``` bash
docker build -t control-pacientes .
docker-compose up -d

```
    
## 🧪 Test

Correremos las pruebas con PHPUnit

```bash
composer test

```
## 📋 Requisitos

- Docker & Docker Compose
- PHP >= 8.0
- Node.js (para compilar Tailwind)

## Authors
- Backend Developer & DevOps Jr
- [@renzomedina](https://github.com/RenzoMedina)

