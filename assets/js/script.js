document.addEventListener("DOMContentLoaded", function() {
    const slider = document.querySelector(".slider");
    const nextBtn = document.querySelector(".next-btn");
    const prevBtn = document.querySelector(".prev-btn");
    const slides = document.querySelectorAll(".slide");
    const slideIcons = document.querySelectorAll(".slide-icon");
    let numberOfSlides = slides.length;
    let slideNumber = 0;
    let playSlider;

    // Function to show slide based on index
    function showSlide(index) {
        slides.forEach((slide) => {
            slide.classList.remove("active");
        });
        slideIcons.forEach((slideIcon) => {
            slideIcon.classList.remove("active");
        });

        slides[index].classList.add("active");
        slideIcons[index].classList.add("active");
        slideNumber = index;
    }

    // Next button click event
    nextBtn.addEventListener("click", () => {
        slideNumber = (slideNumber + 1) % numberOfSlides;
        showSlide(slideNumber);
    });

    // Previous button click event
    prevBtn.addEventListener("click", () => {
        slideNumber = (slideNumber - 1 + numberOfSlides) % numberOfSlides;
        showSlide(slideNumber);
    });

    // Auto-play function
    function startAutoPlay() {
        playSlider = setInterval(() => {
            slideNumber = (slideNumber + 1) % numberOfSlides;
            showSlide(slideNumber);
        }, 2500); // Change slide every 3 seconds (adjust as needed)
    }

    // Start auto-play on page load
    startAutoPlay();

    // Pause auto-play on slider hover
    slider.addEventListener("mouseover", () => {
        clearInterval(playSlider);
    });

    // Resume auto-play on slider mouseout
    slider.addEventListener("mouseout", () => {
        startAutoPlay();
    });
});





