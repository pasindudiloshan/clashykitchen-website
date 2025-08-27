# 🍽️ Clashy Kitchen Web Application

Clashy Kitchen is a popular **restaurant in Kandy** that needed an **online website and admin panel** to manage operations efficiently. I created a **responsive web application** that allows customers to **browse menu items, register accounts, and place orders in real-time**. The **admin panel** enables restaurant staff to **manage menu items, customers, users, and track orders** easily, providing a smooth online experience for both customers and administrators.

The system is built with **PHP, MySQL, HTML, CSS, and JavaScript**, ensuring a smooth and responsive web experience.  

---

## 🚀 Features

- 👤 **User Authentication** – Signup, Signin, and Signout functionality  
- 🛒 **Cart & Orders** – Add items to cart, view summary, and place orders  
- 📱 **Responsive Homepage** – Navigation bar and footer included  
- 💾 **Database Integration** – MySQL backend to store users, items, and orders  
- 🛠️ **Admin Panel** – Management modules for:  
  - System Administration  
  - Customer Management (CRUD)  
  - Item Management (CRUD)  
  - Order Management (CRUD)  
  - User Management (CRUD)

---

## 📄 Project Report

The full **System Report** describing the design, database, and implementation can be accessed here:  
[📑 View System Report](https://docs.google.com/document/d/1FRPoZSXxv0QVIIY3TO98PKzVT5XMOInB/edit?usp=sharing&ouid=108374880673706677958&rtpof=true&sd=true)

---

## 🛠️ Technologies Used

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL
- **Test:** PHPUnit
- **Server:** XAMPP (Apache + MySQL)
---

## 💻 Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/ClashyKitchen.git
   
2. **Move project to XAMPP htdocs folder**
   ```bash
   C:\xampp\htdocs\ClashyKitchen
   
3. **Import the database**
     [📑 Downlaod Clashykitchen MySQL Database ](https://drive.google.com/file/d/11OtB7k4CZ7_HDqk7kcisJfXHr3I8ZmOG/view?usp=sharing)

4. **Open phpMyAdmin**

5. **Create a database named clashykitchen**

6. **Import the provided .sql file**

7. **Run the project**

8. **Start Apache and MySQL in XAMPP**

9. **Open in browser**
   ```bash
   http://localhost/ClashyKitchen/app/index.php
   
---
## 📁 Folder Structure

```text
ClashyKitchen/            
├── app/            
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
