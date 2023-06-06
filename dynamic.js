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
