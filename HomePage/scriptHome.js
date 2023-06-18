$(document).ready(function() {
  var slideIndex = $(".slider-image").length - 1; 

  var slides = $(".slider-image");
  var totalSlides = slides.length;

  function showSlide() {
    slides.hide();
    $(slides[slideIndex]).fadeIn();

  }

  function nextSlide() {
    slideIndex--;
    if (slideIndex < 0) {
      slideIndex = totalSlides - 1;
    }
    showSlide();
    $(".arrow-left").fadeIn();
  }

  function previousSlide() {
    slideIndex++;
    if (slideIndex >= totalSlides) {
      slideIndex = 0;
    }
    showSlide();
    $(".arrow-right").fadeIn();
  }


  $(".arrow-left").click(function() {
    previousSlide();
  });

  $(".arrow-right").click(function() {
    nextSlide();
  });

  var header = document.querySelector('header');
  var isScrolling = false;
  var lastScrollY = 0;
  
  function handleScroll() {
    if (!isScrolling) {
      window.requestAnimationFrame(function() {
        var currentScrollY = window.scrollY;
  
        if (currentScrollY > lastScrollY) {
          header.classList.add('header-hidden');
        } else {
          header.classList.remove('header-hidden');
        }
  
        lastScrollY = currentScrollY;
        isScrolling = false;
      });
  
      isScrolling = true;
    }
  }
  
  window.addEventListener('scroll', handleScroll);
  
  
  showSlide();

  setInterval(nextSlide, 3000); 
});
