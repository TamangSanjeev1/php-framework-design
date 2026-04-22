# PHP Framework Design Project

A lightweight, modular, and extensible PHP framework built from scratch to demonstrate core backend architecture principles such as MVC design, routing, dependency injection, and middleware handling.

---

## Overview

This project showcases how a custom PHP framework can be structured without relying on large external frameworks like Laravel or Symfony.  
It is designed for learning, experimentation, and understanding the internal workings of modern web frameworks.

---

## Features

- MVC Architecture
- Custom Routing System
- Middleware Support
- Dependency Injection (DI Container)
- Database Abstraction Layer (PDO-based)
- Basic Authentication & Session Handling
- Template Rendering Engine
- Lightweight and fast

---

## Project Structure
project-root/
│── config/
│ ├── database.php
│ ├── paths.php
│
│── controllers/
│ ├── index.php
│ ├── dashboard.php
│ ├── login.php
│
│── libs/
│ ├── bootstrap.php
│ ├── database.php
│
│── public/
│ ├── index.php
│
│── models/
│ ├── dashboard_model.php
│
│── .htaccess
│
│── index.php
│── README.md


---

## ⚙️ Installation

### 1. Clone the repository
### 2. Copy the project to XAMPP htdocs
### 3. Run the FYP.sql file on your sql server
### 4. Access the project through path e.g. localhost/php-framework-design