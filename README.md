🍽️ Clashy Kitchen Web Application

A simple online food ordering website built with PHP, MySQL, HTML, CSS, and JavaScript.
Users can browse delicious items, sign up/sign in, and place orders with ease! 😋

✨ Features

👤 User Authentication: Signup, Signin, Signout
🥘 Menu Display: Show items with images and descriptions
🛒 Cart Functionality: Add items, view summary, place orders
🌐 Responsive Homepage: Navigation bar and footer included
💾 Database Integration: MySQL backend for storing users, orders, and items

📁 Project Structure
mywebsite/                   
│                   
├── app/                   
│   ├── index.php                   
│   ├── index.php                   
│   ├── signup.php                   
│   ├── signin.php                   
│   ├── signout.php                   
│   └── database.php                   
│
├── assets/                                      
│   ├── css/                   
│   ├── js/                   
│   └── images/                   
│                   
├── README.md                              
└── .gitignore                   

⚙️ Installation

Install XAMPP or any PHP server 💻:
XAMPP Download

Clone this repository:

git clone <repository_url>


Move project to XAMPP htdocs folder 🗂️:

C:\xampp\htdocs\mywebsite


Import the database 🗄️:

Open phpMyAdmin (http://localhost/phpmyadmin)

Create a new database: clashykitchen

Import the provided SQL dump

Run the project 🚀:

Start Apache and MySQL in XAMPP

Open in browser: http://localhost/mywebsite/app/index.php

🛠️ Technologies Used

Backend: PHP, MySQL

Frontend: HTML, CSS, JavaScript, Bootstrap/Tailwind

Database: MySQL (tables: users, items, cart, order, popitems)
