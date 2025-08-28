# 🍽️ Clashy Kitchen Web Application

Clashy Kitchen is a popular **restaurant in Kandy** that needed an **online website and admin panel** to manage operations efficiently. I created a **responsive web application** that allows customers to **browse menu items, register accounts, and place orders in real-time**. The **admin panel** enables restaurant staff to **manage menu items, customers, users, and track orders** easily, providing a smooth online experience for both customers and administrators.

The system is built with **PHP, MySQL, HTML, CSS, and JavaScript**, ensuring a smooth and responsive web experience.  

![image alt](https://github.com/pasindudiloshan/clashykitchen-website/blob/6f8d36bc13765e9574d95e03a2e1b1436eee2d1d/README%20cover%20image.png)
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
[📑 View System Report](https://drive.google.com/file/d/1tr-7ce4pZgkkM3mp5xYO09ikB7zIkxQs/view?usp=sharing)

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
CLASHYKITCHEN-WEBSITE/
├── app/
│   ├── aboutus.php
│   ├── additem.php
│   ├── addpopitem.php
│   ├── adduser.php
│   ├── admin_item_update.php
│   ├── admin_popitem_update.php
│   ├── adminindex.php
│   ├── adminnavbar.php
│   ├── cart.php
│   ├── cartclear.php
│   ├── checkout.php
│   ├── database.php
│   ├── footer.php
│   ├── index.php
│   ├── menu.php
│   ├── myorder.php
│   ├── navbar.php
│   ├── reviews.php
│   ├── signin.php
│   ├── signout.php
│   ├── signup.php
│   ├── updateuser.php
│   ├── vieworder.php
│   ├── viewuser.php
│
├── assets/
│   ├── add_food_image/
│   ├── css/
│   ├── fontsicon/
│   ├── image/
│   ├── js/
│
├── .gitattributes
└── README.md
