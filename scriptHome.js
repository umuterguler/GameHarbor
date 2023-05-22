const slider = document.querySelectorAll('.image_Slider');
const arrLeft = document.querySelector('.left_Arrow');
const arrRight = document.querySelector('.right_Arrow');
const heading = document.querySelector('.caption h1');
const description = document.querySelector('.caption p');

const images = ["lacivert.jpg", "sehir.jpg", "mavi.jpg"];
const headings = ["Laciverttir", "Sehirler", "Mavilik"];
const descriptions = [
  "The city that never sleeps",
  "The city of Lights",
  "Home to the tallest skyscraper"
];

let id = 0;
let intervalId;

/*
function slide(id) {
  slider.style.backgroundImage = `url(imgs/${images[id]})`;
  slider.classList.add('image-fade');
  setTimeout(() => {
    slider.classList.remove('image-fade');
  }, 550);
  heading.innerText = headings[id];
  description.innerText = descriptions[id];
}

function slide(id) {
    for (let i = 0; i < slider2.length; i++) {
        slider2[i].style.backgroundImage = `url(imgs/${images[id]})`;
        slider2[i].classList.add('image-fade');
        setTimeout(() => {
            slider2[i].classList.remove('image-fade');
        }, 550);
    }
  heading.innerText = headings[id];
  description.innerText = descriptions[id];
}
*/

function slide(id) {
    for (let i = 0; i < slider.length; i++) {
        slider[i].style.backgroundImage = `url(imgs/${images[id]})`;
        slider[i].classList.add('image-fade');
        setTimeout(() => {
            slider[i].classList.remove('image-fade');
        }, 550);
    }
  heading.innerText = headings[id];
  description.innerText = descriptions[id];
}

function startSlider() {
  intervalId = setInterval(() => {
    id++;
    if (id > images.length - 1) {
      id = 0;
    }
    slide(id);
  }, 5000); // Change the duration (in milliseconds) between each slide here
}

function stopSlider() {
  clearInterval(intervalId);
}

arrLeft.addEventListener('click', () => {
  id--;
  if (id < 0) {
    id = images.length - 1;
  }
  slide(id);
  stopSlider();
});

arrRight.addEventListener('click', () => {
  id++;
  if (id > images.length - 1) {
    id = 0;
  }
  slide(id);
  stopSlider();
});

// Start the automatic sliding
startSlider();
