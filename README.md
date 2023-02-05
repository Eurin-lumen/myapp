# myapp
Online Course Website

This repository contains the source code for an online course website using the MVC architecture with PHP, HTML, CSS and MySQL.
Prerequisites

    PHP 7 or higher
    MySQL
    Apache web server
    Bootstrap 4

Installation

    1. Clone the repository to your local machine

    $ git clone https://github.com/username/repo-name.git
    
    2. Import the database schema to your MySQL database

    $ mysql -u [user] -p [database_name] < db/schema.sql

    3. Update the database configuration in `app/config/database.php` with your MySQL credentials.
    4. Deploy the code to your web server

    File Structure

    online-course-website/
        |-- app/
        |   |-- controllers/
        |   |   |-- courses.php
        |   |   |-- users.php
        |   |-- models/
        |   |   |-- course.php
        |   |   |-- user.php
        |   |-- views/
        |   |   |-- courses/
        |   |   |   |-- index.php
        |   |   |   |-- show.php
        |   |   |-- users/
        |   |   |   |-- index.php
        |   |   |   |-- show.php
        |   |-- config/
        |   |   |-- database.php
        |   |-- core/
        |   |   |-- App.php
        |   |   |-- Controller.php
        |   |-- public/
        |   |   |-- css/
        |   |   |   |-- main.css
        |   |   |-- js/
        |   |   |   |-- main.js
        |-- db/
        |   |-- schema.sql
        |-- .gitignore
        |-- README.md
