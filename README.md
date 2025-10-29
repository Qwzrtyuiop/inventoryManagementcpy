<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

# Inventory Management System

## Project Description / Overview
The **Inventory Management System** is a web-based application built with **Laravel** that allows users to manage products, categories, and stock levels efficiently.  
It includes an integrated logging system that automatically records all item and category modifications for transparent tracking and audit purposes.

---

## Features

### Core Modules
- **Item Management**
  - Create, edit, and delete items.
  - Track item category, stock count, and descriptive information.
  - Automatically log all actions (creation, updates, and deletion).
- **Category Management**
  - Create, rename, and delete categories.
  - Category changes are also logged independently.

### Logging System
- Automatically generates a log entry for every action:
  - Item created, updated, or deleted.
  - Category created, renamed, or deleted.
- Logs are stored in the database and linked via `batch_id` for grouped actions.
- Keeps logs even when related items are deleted (via snapshot data).

---

## Installation Instructions

### Prerequisites
- PHP ≥ 8.1  
- Composer  
- MySQL / XAMPP  
- Laravel  

### Installation
1. Clone or copy the project folder to your local environment.  
2. Create and configure your `.env` file.  
3. Generate an application key.  
4. Run migrations and seeder.  
5. Start the local development server.

---

## Usage

### Login Page
![Login Box](admin.PNG)  
Default credentials:  
- **Username:** admin  
- **Password:** adminpass  

Accounts can only be made directly in the database.  
This system is for demonstration purposes only.

### Dashboard
On successful login, the homepage will appear.  
![Home](home.PNG)

### Example of Item Creation

#### Creating a new category
![Step 1](newcat.PNG)  
![Step 2](newcat2.PNG)  
![Step 3](newcat3.PNG)

#### Adding new item
![Step 1](newitem.PNG)  
![Step 2](newitem2.PNG)

#### Automatic logging
![Log Example](log%20update.PNG)

---

## Contributors
Developer: Jan Robert Buccat  

---

## License
This project is open-source and distributed under the **MIT License**.
