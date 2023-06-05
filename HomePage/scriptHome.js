$(document).ready(function() {
  var slideIndex = $(".slider-image").length - 1; 

  var slides = $(".slider-image");
  var totalSlides = slides.length;

  function showSlide() {
    slides.hide();
    $(slides[slideIndex]).fadeIn();

    // slides.click(function() {
    //   var clickedIndex = $(this).index();
    //   goToSlide(clickedIndex);
    // });
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

  // function goToSlide(index) {
  //   slideIndex = index;
  //   window.location.href = "/GamePages/gamePage.php/" + ($(".slider-image").length - 1 - slideIndex);
  // }

  $(".arrow-left").click(function() {
    previousSlide();
  });

  $(".arrow-right").click(function() {
    nextSlide();
  });
  

  showSlide();

  setInterval(nextSlide, 3000); 
});
