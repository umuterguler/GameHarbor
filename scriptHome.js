const actionGamesSlider = document.querySelectorAll('.image_Slider');
const actionGamesArrLeft = document.querySelector('.left_Arrow');
const actionGamesArrRight = document.querySelector('.right_Arrow');
const actionGamesHeading = document.querySelector('.caption h1');
const actionGamesDescription = document.querySelector('.caption p');

const actionGamesImages = ["lacivert.jpg", "sehir.jpg", "mavi.jpg"];
const actionGamesHeadings = ["Vampire Game", "Hyper-Casual Game", "Surviving Game"];
const actionGamesDescriptions = [
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
    for (let i = 0; i < actionGamesSlider.length; i++) {
        actionGamesSlider[i].style.backgroundImage = `url(imgs/${actionGamesImages[id]})`;
        actionGamesSlider[i].classList.add('image-fade');
        setTimeout(() => {
            actionGamesSlider[i].classList.remove('image-fade');
        }, 550);
    }
  actionGamesHeading.innerText = actionGamesHeadings[id];
  actionGamesDescription.innerText = actionGamesDescriptions[id];
}

function startSlider() {
  intervalId = setInterval(() => {
    id++;
    if (id > actionGamesImages.length - 1) {
      id = 0;
    }
    slide(id);
  }, 5000); //miliseconds
}

function stopSlider() {
  clearInterval(intervalId);
}

actionGamesArrRight.addEventListener('click', () => {
  id++;
  if (id > actionGamesImages.length - 1) {
    id = 0;
  }
  slide(id);
  stopSlider();
});

actionGamesArrLeft.addEventListener('click', () => {
  id--;
  if (id < 0) {
    id = actionGamesImages.length - 1;
  }
  slide(id);
  stopSlider();
});

startSlider();