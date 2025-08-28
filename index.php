<?php
include 'database.php';

if(isset($_POST['add_to_cart'])){

    if($_SESSION['email'] == null )
    {

        // Redirect to homepage
        header("Location: signin.php");
        exit();
    }
    else{

        $product_name = $_POST['product_name'];
        $product_info = $_POST['product_info'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;
    
        $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE name = '$product_name'");
        
        if(mysqli_num_rows($select_cart) > 0){

            echo "
            <p style='color:#b30000;  font-size:22px;   font-weight:bold; padding: 0.3rem; '>
               <i class='fa-solid fa-circle-exclamation fa-xl'></i>
                Product already added to cart!
                </p>";


        }else{
            $insert_product = mysqli_query($connection,"INSERT INTO `cart` (name, price, image, quantity)
            VALUES('$product_name', '$product_price', '$product_image', '$product_quantity' )");

            echo "
            <p style='color:green;  font-size:22px;   font-weight:bold; padding: 0.3rem; '>
                <i class='fa-regular fa-circle-check fa-xl'></i>
                Product added to cart successfully!
                </p>";

        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Clashy Kitchen</title>

    <link rel="shortcut icon" type="image" href="./image/favicon.png">

    <link rel="stylesheet" href="css/style.css">

    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Rubik:wght@400;500;600;700&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- fonts links -->
    <!-- icons links -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="fontsicon/css/all.css.css">
    <!-- icons links -->


</head>
<body>
    <div class="all-content">
    
    <?php
    include 'navbar.php';
     ?>

      <!-- Image slide show -->

        <div id="slideshow">
        <div class="slider">
         <div class="slide active">
            <img src="image/banner 1.jpg" alt="">
            <div class="info">
            <a href="menu.php"><button type="button">Order Now</button></a>
            </div>
         </div>
         <div class="slide">
            <img src="image/banner 2.jpeg" alt="">
            <div class="info">
            <a href="menu.php"><button type="button">Order Now</button></a>
            </div>
         </div>
         <div class="slide">
            <img src="image/banner 3.jpeg" alt="">
            <div class="info">
            <a href="menu.php"><button type="button">Order Now</button></a>
            </div>
         </div>
         <div class="slide">
            <img src="image/banner 4.jpeg" alt="">
            <div class="info">
            <a href="menu.php"><button type="button">Order Now</button></a>
            </div>
         </div>
         <div class="slide">
            <img src="image/banner 5.jpeg" alt="">
            <div class="info">
            <a href="menu.php"><button type="button">Order Now</button></a>
            </div>
         </div>
         <div class="navigation">
            <i class="fas fa-chevron-left prev-btn"></i>
            <i class="fas fa-chevron-right next-btn"></i>
         </div>
         <div class="navigation-visibility">
           <div class="slide-icon active"></div>
           <div class="slide-icon "></div>
           <div class="slide-icon "></div>
           <div class="slide-icon "></div>
           <div class="slide-icon "></div> 
            </div>
          </div>
        </div> 

      <!-- Image slide show end-->   

      <!-- Category cards -->

    <section class="section section-divider white promo">
         <div class="panel-container">

            <div class="col-12 intro-text">
                <h1>Explore Our <span class="span">Menu</span></h1>
             <p>Welcome to <b>Clashy Kitchen!</b> Explore our diverse menu featuring Traditional Favorites, Chopstick Charm, savory pizza,
                 indulgent pasta, refreshing beverages, and quick bites with our Short Eats. Discover a range of culinary delights
                 crafted with fresh, quality ingredients. Join us on a flavorful journey!</p>
            </div>

            <ul class="promo-list has-scrollbar">

                <li class="promo-item">
                    <div class="promo-card">
                        <div class="card-icon">
                            <i id="iconfont" class="fa-solid fa-utensils fa-2xl" style="color: #fa5300;"></i>
                        </div>  
                        <h3 class="h3 card-title">Traditional Favorites</h3>
                        <p class="card-text">
                          Rice & Curry, Fried Rice, Kottu, Biriyan, Hoppers, etc...
                        </p>

                        <img src="image/traditional menu.png" width="200" height="200" loading="lazy" alt="Maxican Pizza" class="w-100 card-banner">
                    </div>
                </li>

                <li class="promo-item">
                    <div class="promo-card">
                        <div class="card-icon">
                            <i class="fa-solid fa-burger fa-2xl" style="color: #fa5300;"></i>
                        </div>
                        <h3 class="h3 card-title">Noodasta</h3>
                        <p class="card-text">
                            Noodles & Pasta 
                        </p>

                        <img src="image/pasta menu.png" width="200" height="200" loading="lazy" alt="Soft Drink" class="w-100 card-banner">
                    </div>
                </li>

                <li class="promo-item">
                    <div class="promo-card">
                        <div class="card-icon">
                            <i class="fa-solid fa-bowl-rice fa-2xl" style="color: #fa5300;"></i>
                        </div>  
                        <h3 class="h3 card-title">Savory Cravings</h3>
                        <p class="card-text">
                            French Fries, Burger, Chili Chips, Drumsticks, etc...
                        </p>

                        <img src="image/burgur menu.png" width="200" height="200" loading="lazy" alt="French frise" class="w-100 card-banner">
                    </div>
                </li>

                <li class="promo-item">
                    <div class="promo-card">
                        <div class="card-icon">
                            <i class="fa-solid fa-pizza-slice fa-rotate-by fa-2xl" style="color: #fa5300; --fa-rotate-angle: 290deg;""></i>          
                        </div>  
                        <h3 class="h3 card-title">Chopstick Charm</h3>
                        <p class="card-text">
                            Chow Mein, Szechuan Noodles, Kung Poa Shrimp, etc...
                        </p>

                        <img src="image/chinese menu.png" width="200" height="200" loading="lazy" alt="French frise" class="w-100 card-banner">
                   </div>
                </li>

                <li class="promo-item">
                    <div class="promo-card">
                        <div class="card-icon">
                            <i class="fa-solid fa-bowl-rice fa-2xl" style="color: #fa5300;"></i>
                        </div>  
                        <h3 class="h3 card-title">Pizza Palooza</h3>
                        <p class="card-text">
                        Margherita , BBQ Chicken , Hawaiian Pizza etc...
                        </p>

                        <img src="image/pizza menu.png" width="200" height="200" loading="lazy" alt="French frise" class="w-100 card-banner">
                    </div>
                </li>

                <li class="promo-item">
                    <div class="promo-card">
                        <div class="card-icon">
                            <i class="fa-solid fa-pizza-slice fa-rotate-by fa-2xl" style="color: #fa5300; --fa-rotate-angle: 290deg;""></i>          
                        </div>  
                        <h3 class="h3 card-title">Short Eats</h3>
                        <p class="card-text">
                           Samosas, Vade, Rolls, Cutlets etc..  
                        </p>

                        <img src="image/shorteat menau.png" width="200" height="200" loading="lazy" alt="French frise" class="w-100 card-banner">
                   </div>
                </li>

                <li class="promo-item">
                    <div class="promo-card">
                        <div class="card-icon">
                            <i class="fa-solid fa-martini-glass-citrus fa-2xl" style="color: #fa5300"></i>   
                        </div>  
                        <h3 class="h3 card-title">Beverages</h3>
                        <p class="card-text">
                            Soft Drinks & Refreshments
                        </p>

                        <img src="image/beverage menu.png" width="180" height="180" loading="lazy" alt="French frise" class="w-100 card-banner">
                    </div>
               
                </li>
            </ul>
        </div>
    </section>
  
      <!-- Category cards ends-->

      <!-- about Us -->

        <section id="aboutus">
            <div class="heading">
            <h1>About <span class="span" >Us</span></h1>
            </div>
            <div class="about-container">
                <section class="about">
                    <div class="about-image">
                        <img src="image/about us.png">
                          </div>
                           <div class="about-content">
                           <h2>Welcome to Clashy Kitchen Restaurant</h2>
                           <p>At Clashy Kitchen, our passion lies in crafting exceptional dishes using fresh, quality ingredients and diverse flavors.
                             Whether you're here for a casual meal or a special occasion, we strive to create memorable dining experiences.
                              Join us and discover the essence of Clashy Kitchen through our delicious creations!</p>
                           <div class="btn">
                           <a href="aboutus.php"><button type="button">Learn More</button></a>
                           <a href="reviews.php"><button type="button" class="btn2">Reviews</button></a>   
                    </div> 
                  </div>
                </section>
            </div>
        </section>
        
      <!-- about Us End-->      

            <!-- trending menu -->
            
        <section class="section section-divider white promo">
    <div class="menu">
        <h1>Trending<span>Dishes</span></h1>


        <div class="menu-box">
            
            <?php 
            $select_products = mysqli_query($connection,"SELECT * FROM `popitems` LIMIT 8");
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>
            <div class="menu-card">
                
               <img src="image/popular ribbon.png" alt="Popular Ribbon" class="ribbon">

                <div class="menu-image">
                    <img src="<?php echo $fetch_product['image']; ?>">
                </div>
        

                <div class="small-card">
                    <i class="fa-solid fa-heart"></i>
                </div>

                <div class="small-card2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>

                <div class="menu-info">
                    <h2><?php echo $fetch_product['name']; ?></h2>
                    <p><?php echo $fetch_product['info']; ?></p>
                    <h3>Rs.<?php echo $fetch_product['price']; ?></h3>
                    <div class="menu-icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="hidden" name="product_info" value="<?php echo $fetch_product['info']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">

                        <input type="submit" class="menu-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>

      <!-- trending menu end-->
     
      <!-- cx reviews -->

      <section class="section section-divider white client">
        <div class="review-container" id="reviews">
           
           <h2 class="h2 section-title">
             Our Customers  <span class="span"> Reviews</span>
           </h2>

           <p class="section-text">
           <b>In Their Own Words: Customer Experiences at Clashy Kitchen!</b>
           </p>

           <ul class="client-list has-scrollbar">

            <li class="client-item">
                <div class="client-card">

                    <div class="profile-wrapper">
                        <figure class="avatar">
                            <img src="image/avatar-men.png" width="88px" height="88px" loading="lazy"  alt="Pasindu Diloshan">
                        </figure>
                         
                        <div>
                            <h3 class="h4 client-name">Pasindu Diloshan</h3>

                            <p class="client-title">pasindudiloshan@gmail.com</p>
                        </div>



                    </div>

                    <blockquote class="client-test">
                    "I had a fantastic dining experience at Clashy Kitchen. The staff was friendly and knowledgeable, 
                    helping us navigate the menu which features a range of delicious options including Pasta Primavera and
                     Sri Lankan mixed rice. Highly recommended!"
                    </blockquote>


                    <div class="rating-wrapper">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>

                </div>

            </li>

            <li class="client-item">
                <div class="client-card">

                    <div class="profile-wrapper">
                        <figure class="avatar">
                        <img src="image/avatar-men.png" width="88px" height="88px" loading="lazy"  alt="Pasindu Diloshan">
                        </figure>
                         
                        <div>
                            <h3 class="h4 client-name">Eren Fernando</h3>

                            <p class="client-title">eranmikasa@gmail.com</p>
                        </div>



                    </div>

                    <blockquote class="client-test">
                    "Clashy Kitchen is a hidden gem! The ambiance is welcoming and cozy, perfect for a casual meal with friends.
                     The attentive service and diverse menu selection, from Singapore noodles to Hawaiian pizza, ensure there's 
                     something for everyone."                    
                    </blockquote>


                    <div class="rating-wrapper">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>

                </div>

            </li>

            <li class="client-item">
                <div class="client-card">

                    <div class="profile-wrapper">
                        <figure class="avatar">
                            <img src="image/avater-women.png" width="88px" height="88px" loading="lazy"  alt="Naruto Uzumaki">
                        </figure>
                         
                        <div>
                            <h3 class="h4 client-name">Senuri Mihintha</h3>

                            <p class="client-title">senurimihintha@gmail.com</p>
                        </div>



                    </div>

                    <blockquote class="client-test">
                    "Visited Clashy Kitchen for the first time and was impressed by the quality of food and attention to detail.
                     The Hawaiian pizza was a standout, and the atmosphere was vibrant yet relaxed. Will definitely be back to try more dishes!"              
                          </blockquote>


                    <div class="rating-wrapper">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>

                </div>

            </li>

            <li class="client-item">
                <div class="client-card">

                    <div class="profile-wrapper">
                        <figure class="avatar">
                        <img src="image/avatar-men.png" width="88px" height="88px" loading="lazy"  alt="Pasindu Diloshan">
                        </figure>
                         
                        <div>
                            <h3 class="h4 client-name">Sanjeewa Bandara</h3>

                            <p class="client-title">sanjeewa.bandara@gmail.com</p>
                        </div>



                    </div>

                    <blockquote class="client-test">
                    "Clashy Kitchen exceeded my expectations! The menu is inventive with offerings like Mapo Tofu and Cheese Kottu. 
                    The ambiance is trendy yet comfortable, making it a perfect spot for both solo diners and groups. Can't wait to return!"
                    </blockquote>


                    <div class="rating-wrapper">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>

                </div>

            </li>

           </ul>

        </div>
      </section>

      <!-- cx reviews end-->
    
      <?php
    include 'footer.php';
     ?>

      
    </div>
      
  <script src="js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  

    
</body>
</html>