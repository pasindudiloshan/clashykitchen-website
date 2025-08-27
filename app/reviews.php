<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="css/reviews.css">
    <link rel="shortcut icon" type="image" href="./image/favicon.png">
    
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>

    <?php
    include 'navbar.php';
    ?>


<div class="container">
	
	<div class="contents-wraper">
		
		<section class="header"><h1>Testimonial</h1></section>

		<section class="testRow">
			
			<div class="testItem active">
				<img src="image/avatar-men.png">
				<h3>Pasindu Diloshan</h3>
				<h4>pasindudiloshan@gmail.com</h4>
                <div class="rating-wrapper">
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                    </div>
				<p>"I had a fantastic dining experience at Clashy Kitchen. The staff was friendly and knowledgeable, helping us navigate the menu which features a range of delicious options including Pasta Primavera and Sri Lankan mixed rice. Highly recommended!"</p>
			</div>

			<div class="testItem">
				<img src="image/avatar-men.png">
				<h3>Eren Fernando</h3>
				<h4>eranmikasa@gmail.com</h4>
                <div class="rating-wrapper">
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                    </div>
				<p>"Clashy Kitchen is a hidden gem! The ambiance is welcoming and cozy, perfect for a casual meal with friends. The attentive service and diverse menu selection, from Singapore noodles to Hawaiian pizza, ensure there's something for everyone."</p>
			</div>

			<div class="testItem">
				<img src="image/avater-women.png">
				<h3>Senuri Mihintha</h3>
				<h4>senurimihintha@gmail.com</h4>
                <div class="rating-wrapper">
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                    </div>
				<p>"Visited Clashy Kitchen for the first time and was impressed by the quality of food and attention to detail. The Hawaiian pizza was a standout, and the atmosphere was vibrant yet relaxed. Will definitely be back to try more dishes!"</p>
			</div>

			<div class="testItem">
				<img src="image/avater-women.png">
				<h3>Sanduni Shereen</h3>
				<h4>shereen88@gmail.com</h4>
                <div class="rating-wrapper">
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                    </div>
				<p>"Clashy Kitchen exceeded my expectations! The menu is inventive with offerings like Mapo Tofu and Cheese Kottu. The ambiance is trendy yet comfortable, making it a perfect spot for both solo diners and groups. Can't wait to return!"</p>
			</div>

			<div class="testItem">
				<img src="image/avatar-men.png">
				<h3>Sanjeewa Bandara</h3>
				<h4>sanjeewa.bandara@gmail.com</h4>
                <div class="rating-wrapper">
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i>
                            <i class="fa-regular fa-star"></i> 
                    </div>
				<p>Just had an amazing dinner at Clashy Kitchen! The attention to detail in every dish, especially the Hawaiian pizza, blew me away. The ambiance is so inviting, it feels like a home away from home. Already planning my next visit!"</p>
			</div>

		</section>

		<section class="indicators">
			<div class="dot active" attr='0' onclick="switchTest(this)"></div>
			<div class="dot" attr='1' onclick="switchTest(this)"></div>
			<div class="dot" attr='2' onclick="switchTest(this)"></div>
			<div class="dot" attr='3' onclick="switchTest(this)"></div>
			<div class="dot" attr='4' onclick="switchTest(this)"></div>
		</section>

	</div>
</div>
    
    <div class="feedback-widget">
        <a href=""><span>Feedback Please! <i class="fas fa-comment-dots"></i></span></a>
        <div class="form">
            <form>
                <div class="stars">
                    <input type="radio" name="rating" id="rating-5">
                    <label for="rating-5" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rating-4">
                    <label for="rating-4" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rating-3">
                    <label for="rating-3" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rating-2">
                    <label for="rating-2" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rating-1">
                    <label for="rating-1" class="fas fa-star"></label>
                </div>
                <div class="form-group">
                    <input name="name"  placeholder="Username"required >
                    <textarea name="message" id="" cols="30" rows="10" placeholder="send your feedback" required></textarea>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
        <div class="thanks">
            Thanks for your feedback! <i class="fas fa-thumbs-up"></i>
        </div>
    </div>

    <section class="main">
        <h1>All Reviews</h1>
        <div class="full-boxer">
            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="image/avatar-men.png">
                        </div>
                        <div class="Name">
                            <strong>Pasindu Diloshan</strong>
                            <span>pasindudiloshan@gmail.com</span>
                        </div>
                        <div class="rating-wrapper">
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                    </div>
                    </div>
                </div>
                <div class="comment">
                    <p>
                    "I had a fantastic dining experience at Clashy Kitchen. The staff was friendly and knowledgeable,
                     helping us navigate the menu which features a range of delicious options including Pasta Primavera and Sri Lankan mixed rice.
                     Highly recommended!"
                    </p>
                </div>
            </div>

            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="image/avatar-men.png">
                        </div>
                        <div class="Name">
                            <strong>Eren Fernando</strong>
                            <span>eranmikasa@gmail.com</span>
                        </div>
                        <div class="rating-wrapper">
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                    </div>
                    </div>
                </div>
                <div class="comment">
                    <p>
                    "Clashy Kitchen is a hidden gem! The ambiance is welcoming and cozy, perfect for a casual meal with friends.
                     The attentive service and diverse menu selection, from Singapore noodles to Hawaiian pizza, 
                     ensure there's something for everyone."
                    </p>
                </div>
            </div>

            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="image/avater-women.png">
                        </div>
                        <div class="Name">
                            <strong>Senuri Mihintha</strong>
                            <span>senurimihintha@gmail.com</span>
                        </div>
                        <div class="rating-wrapper">
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                    </div>
                    </div>
                </div>
                <div class="comment">
                    <p>
                    "Visited Clashy Kitchen for the first time and was impressed by the quality of food and attention to detail.
                     The Hawaiian pizza was a standout, and the atmosphere was vibrant yet relaxed.
                     Will definitely be back to try more dishes!"
                    </p>
                </div>
            </div>

            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="image/avater-women.png">
                        </div>
                        <div class="Name">
                            <strong>Sanduni Shereen</strong>
                            <span>shereen88@gmail.com</span>
                        </div>
                        <div class="rating-wrapper">
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                    </div>
                    </div>
                </div>
                <div class="comment">
                    <p>
                    "Clashy Kitchen exceeded my expectations! The menu is inventive with offerings like Mapo Tofu and Cheese Kottu.
                     The ambiance is trendy yet comfortable, making it a perfect spot for both solo diners and groups. Can't wait to return!"
                    </p>
                </div>
            </div>

            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="image/avatar-men.png">
                        </div>
                        <div class="Name">
                            <strong>Sanjeewa Bandara</strong>
                            <span>sanjeewa.bandara@gmail.com</span>
                        </div>
                        <div class="rating-wrapper">
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i>
                            <i class="fa-regular fa-star"></i> 
                    </div>
                    </div>
                </div>
                <div class="comment">
                    <p>
                    "Just had an amazing dinner at Clashy Kitchen! The attention to detail in every dish, 
                    especially the Hawaiian pizza, blew me away. The ambiance is so inviting, it feels like a home away from home.
                    Already planning my next visit!"
                    </p>
                </div>
            </div>

            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="image/avatar-men.png">
                        </div>
                        <div class="Name">
                            <strong>Yuji Itadori</strong>
                            <span>itadorigrade2@gmail.com</span>
                        </div>
                        <div class="rating-wrapper">
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fa-regular fa-star"></i>  
                            <i class="fa-regular fa-star"></i> 
                    </div>
                    </div>
                </div>
                <div class="comment">
                    <p>
                    "Clashy Kitchen has become my go-to place for delicious meals! 
                    The fusion of flavors in dishes like Mapo Tofu and Cheese Kottu is simply outstanding. 
                    The atmosphere strikes the perfect balance between trendy and cozy, ideal for any occasion."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(function() {
            $(".feedback-widget a").on("click", function(e) {
                $(".feedback-widget .form").show();
                $(".thanks").hide();
                $(".feedback-widget a").hide();
                e.preventDefault();
            });
            $(".form form").on("submit", function(e) {
                $(".feedback-widget .form").hide();
                $(".thanks").show();
                e.preventDefault();
            });
        });
    </script>

<script type="text/javascript">
	
	// Access the testimonials
	let testSlide = document.querySelectorAll('.testItem');
	// Access the indicators
	let dots = document.querySelectorAll('.dot');

	var counter = 0;

	// Add click event to the indicators
	function switchTest(currentTest){
		currentTest.classList.add('active');
		var testId = currentTest.getAttribute('attr');
		if(testId > counter){
			testSlide[counter].style.animation = 'next1 0.5s ease-in forwards';
			counter = testId;
			testSlide[counter].style.animation = 'next2 0.5s ease-in forwards';
		}
		else if(testId == counter){return;}
		else{
			testSlide[counter].style.animation = 'prev1 0.5s ease-in forwards';
			counter = testId;
			testSlide[counter].style.animation = 'prev2 0.5s ease-in forwards';
		}
		indicators();
	}

	// Add and remove active class from the indicators
	function indicators(){
		for(i = 0; i < dots.length; i++){
			dots[i].className = dots[i].className.replace(' active', '');
		}
		dots[counter].className += ' active';
	}

	// Code for auto sliding
	function slideNext(){
		testSlide[counter].style.animation = 'next1 0.5s ease-in forwards';
		if(counter >= testSlide.length - 1){
			counter = 0;
		}
		else{
			counter++;
		}
		testSlide[counter].style.animation = 'next2 0.5s ease-in forwards';
		indicators();
	}
	function autoSliding(){
		deleteInterval = setInterval(timer, 2000);
		function timer(){
			slideNext();
			indicators();
		}
	}
	autoSliding();

	// Stop auto sliding when mouse is over the indicators
	const container = document.querySelector('.indicators');
	container.addEventListener('mouseover', pause);
	function pause(){
		clearInterval(deleteInterval);
	}

	// Resume sliding when mouse is out of the indicators
	container.addEventListener('mouseout', autoSliding);

</script>

    <?php
    include 'footer.php';
     ?>

</body>
</html>