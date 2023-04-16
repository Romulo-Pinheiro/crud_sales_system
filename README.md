# CRUD - Sales System
![Status](https://img.shields.io/badge/Status-Complete-green?style=for-the-badge)
![GitHub top language](https://img.shields.io/github/languages/top/Romulo-Pinheiro/crud_sales_system?style=for-the-badge)

<p align="center">
  <a href="#-project">Project</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-features">Features</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-technologies">Technologies</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-how-to-use">How to Use</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#database-relationship-view">Database Relationship View</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#%EF%B8%8F-project-vision">Project vision</a>
</p>

## 💻 Project
This project was built to support the study of how to develop web applications using HTML, CSS and PHP. The main concepts applied are CRUD, responsive web design, relational database and access control.  
<br>

## 🔨 Features     

### 1. Register Product
![Register Product](https://user-images.githubusercontent.com/107450031/232258180-1058d325-1e03-4f0b-b801-204c8bb6f856.gif)
<br>

### 2. Register Sales
![Register Sales](https://user-images.githubusercontent.com/107450031/232258312-fdc1b58a-4b45-4af7-8613-8c2a46d3ab95.gif)
<br>

### 3. Stock Control
![Stock Control](https://user-images.githubusercontent.com/107450031/232258390-14f2d60b-c851-4f33-a015-d4bf7c077ba1.gif)
Salesmen can get an overview of the stock and administrators are also able to delete products.  
<br>

### 4. Sales Control  
![Sales Control](https://user-images.githubusercontent.com/107450031/232258420-68f1eb7a-3adb-4498-b37e-9f85674fe403.gif)
Administrators have access to charts showing current month and year sales. They are also able to view the most sold products of the current month and year.  
Salesmen have access to the same charts but they can only view their own sales data.  
<br>

## 🚀 Technologies
- HTML5
- CSS
- Bootstrap
- PHP
- SQL
- Ajax
- Javascript  
<br>

## ❓ How to use
In order to use this application, you will need a local web server having interpreters for PHP scripts and database connection such as XAMPP. After downloading this repository, the tables structure can be found in the folder **database_crud_sales_system** so that they are imported to the database.  
<br>

## Database Relationship View  
![Entity Relationship Diagram - CRUD Database](https://user-images.githubusercontent.com/107450031/232258601-9b4e3b16-4026-4cd2-9735-7fb4430e0302.png)

* 'Usuarios': Users informations. This table stores **id**, **name**, **email**, **password** and **role** (Administrator or Salesman) of users.
* 'Vendas': Sales informations. The foreign keys are **product id**, that represents the id of the product that was sold, and **salesman id**, that represents the user who sold the product. The other informations stored by this table are **id**, **sale date**, **sold amount**, **product name** and **value**.
* 'Produtos': Products informations. The foreign key is **salesman id**, that represents the user who registered the product. The other informations stored by this table are **product id**, **product name**, **registration date**, **supplier**, **cost**, **sales value**, **quantity in stock**.  
<br>

## 👁️ Project Vision
![Signup Page](https://user-images.githubusercontent.com/107450031/232258678-f5a94549-037a-420b-9f87-12cb40b3b2db.gif)
Signup Page  
<br>

![Login as Administrator](https://user-images.githubusercontent.com/107450031/232258761-c371a15d-ac67-4b5e-b74e-0f1a92fa30b6.gif)
Login as Administrator  
<br>

![Login as Salesman](https://user-images.githubusercontent.com/107450031/232258793-a5fbe254-cedc-4776-8616-00219fffce6a.gif)
Login as Salesman

<p align="center">Made by Romulo Pinheiro and Yasmim Barros</p>
