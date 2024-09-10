const menuToggle = document.querySelector(".menu-toggle");
const navUl = document.querySelector("ul");

// menuToggle.addEventListener("click", () => {
//   navUl.classList.toggle("show");
// });


// code for coursole
document.addEventListener('DOMContentLoaded', function () {
  let currentIndex = 0;
  const slides = document.querySelectorAll('#slider input[type=radio]');
  const totalSlides = slides.length;

  function showSlide(index) {
    slides[index].checked = true;
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    showSlide(currentIndex);
  }

  setInterval(nextSlide, 5000); // Change slide every 5 seconds (adjust as needed)
});
// end of coursole


// navbar script
document.addEventListener('DOMContentLoaded', function () {
  const hamburgerMenu = document.querySelector(".hamburger-menu");
  const menuContainer = document.querySelector(".menu-container");
  
  hamburgerMenu.addEventListener("click", () => {
      menuContainer.style.transition = "all 0.5s ease-in-out";
      menuContainer.style.display = (menuContainer.style.display === "none" || menuContainer.style.display === "") ? "flex" : "none";
      hamburgerMenu.classList.toggle("change");
  });
  
});




// end of navbar    

// scroll to section
function scrollToSection(sectionId) {
  const section = document.getElementById(sectionId);
  if (section) {
    section.scrollIntoView({ behavior: 'smooth' });
    menuContainer.style.display = (menuContainer.style.display === "none") ? "flex" : "block";
  }
}

window.addEventListener('load', () => {
  const hash = window.location.hash.substring(1);
  if (hash) {
    scrollToSection(hash);

    if (screen.width < 768) {
           menuContainer.style.display = (menuContainer.style.display === "none" || menuContainer.style.display === "") ? "block" : "none";
    }
    else{
      menuContainer.style.display = (menuContainer.style.display === "none" || menuContainer.style.display === "") ? "flex" : "none";
    }
}});









// slider

document.addEventListener('DOMContentLoaded', function() {
  var parent = document.querySelector('.splitview'),
      topPanel = parent.querySelector('.top'),
      handle = parent.querySelector('.handle'),
      skewHack = 0,
      delta = 0;

  // If the parent has .skewed class, set the skewHack var.
  if (parent.className.indexOf('skewed') != -1) {
      skewHack = 1000;
  }

  parent.addEventListener('mousemove', function(event) {
      // Get the delta between the mouse position and center point.
      delta = (event.clientX - window.innerWidth / 2) * 0.5;

      // Move the handle.
      handle.style.left = event.clientX + delta + 'px';

      // Adjust the top panel width.
      topPanel.style.width = event.clientX + skewHack + delta + 'px';
  });

  // for touch devices
  parent.addEventListener('touchmove', function(event) {
      // Get the delta between the mouse position and center point.
      delta = (event.touches[0].clientX - window.innerWidth / 2) * 0.5;

      // Move the handle.
      handle.style.left = event.touches[0].clientX + delta + 'px';

      // Adjust the top panel width.
      topPanel.style.width = event.touches[0].clientX + skewHack + delta + 'px';
  });
});



// code for coursoleconst slides = document.querySelector('.slides');
const images = document.querySelectorAll('.slides img');
const prevButton = document.querySelector('.prev_button');
const nextButton = document.querySelector('.next_button');
const paginationSpans = document.querySelectorAll('.pagination span');
const sliderTexts = document.querySelectorAll('.slider_texts div');

let currentIndex = 0;

// Function to hide all images and captions
function hideAll() {
    images.forEach((img) => {
        img.style.display = 'none';
    });

    sliderTexts.forEach((text) => {
        text.classList.remove('active');
    });
}

// Function to show a specific image and caption
function showItem(index) {
    hideAll();
    images[index].style.display = 'block';
    sliderTexts[index].classList.add('active');

    paginationSpans.forEach((span, i) => {
        span.classList.toggle('active', i === index);
    });
}

// Function to show the next image and caption
function showNextItem() {
    currentIndex = (currentIndex + 1) % images.length;
    showItem(currentIndex);
}

// Function to show the previous image and caption
function showPrevItem() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showItem(currentIndex);
}

// Initialize by showing the first image and caption
hideAll();
showItem(currentIndex);

// Event listeners for the previous and next buttons
prevButton.addEventListener('click', showPrevItem);
nextButton.addEventListener('click', showNextItem);

// Function to change image and caption every 5 seconds
setInterval(showNextItem, 3000);
