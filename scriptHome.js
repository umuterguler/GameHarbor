const slider = document.querySelectorAll('.image_Slider');
const arrLeft = document.querySelector('.left_Arrow');
const arrRight = document.querySelector('.right_Arrow');
const heading = document.querySelector('.caption h1');
const description = document.querySelector('.caption p');

const images = ["lacivert.jpg", "sehir.jpg", "mavi.jpg"];
const headings = ["Vampire Game", "Hyper-Casual Game", "Surviving Game"];
const descriptions = [
  "Vampires are myths... Aren't they?",
  "This game will make you crazy!",
  "A survival game with weapons."
];

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

let id = 0;
let intervalId;

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
  }, 5000); //miliseconds
}

function stopSlider() {
  clearInterval(intervalId);
}

arrRight.addEventListener('click', () => {
  id++;
  if (id > images.length - 1) {
    id = 0;
  }
  slide(id);
  stopSlider();
});

arrLeft.addEventListener('click', () => {
  id--;
  if (id < 0) {
    id = images.length - 1;
  }
  slide(id);
  stopSlider();
});

startSlider();