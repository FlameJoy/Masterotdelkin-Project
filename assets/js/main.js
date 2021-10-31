"use strict"

let headerSliderIndex = 0;
showSlides();

function showSlides(n) {
  let i,
  slides = document.getElementsByClassName("header-slide-container"),
  lines = document.getElementsByClassName("header-slide__line");

  for(i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for(i = 0; i < lines.length; i++) {
    lines[i].className = lines[i].className.replace(" header-slide__line_active", "");
  }

  headerSliderIndex++;

  if(headerSliderIndex > slides.length) {
    headerSliderIndex = 1;
  }

  slides[headerSliderIndex - 1].style.display = "block";
  lines[headerSliderIndex - 1].className += " header-slide__line_active"
  setTimeout(showSlides, 4000);
}

function openCalc(evt, objectName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("calc-tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("calc-tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(objectName).style.display = "block";
  evt.currentTarget.className += " active";
} 

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

window.addEventListener("DOMContentLoaded", handleWindowLoad);

function handleWindowLoad() {
    let video = document.getElementById("video");
    let btn = document.getElementById("play");
    let poster = document.getElementsByClassName("presentation-wrap");
    let control = document.getElementsByClassName("video-control");

    btn.addEventListener("click", playVideo);
    video.addEventListener("click", pauseVideo);

    function playVideo() {
        video.play();
        poster[0].style.visibility = "hidden";
        control[0].style.transition = "all 0s ease";
    }
    function pauseVideo() {
        video.pause();
        poster[0].style.visibility = "visible";
    }
}

// Get the modal
let recall = document.getElementById('id01'),
    redecorating = document.getElementById('id02'),
    overhaul = document.getElementById('id03'),
    designer = document.getElementById('id04');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == recall) {
    recall.style.display = "none";
  } else if (event.target == redecorating) {
    redecorating.style.display = "none";
  } else if (event.target == overhaul) {
    overhaul.style.display = "none";
  } else if (event.target == designer) {
    designer.style.display = "none";
  }
}

function townhouseChangeImg(num) {
  if(num == 1) {
    document.getElementById('townhouse').style.background = 'url(assets/images/dest/main_002.jpg) no-repeat center';
  } if(num == 2) {
    document.getElementById('townhouse').style.background = 'url(assets/images/dest/main_003.jpg) no-repeat center';
  } if(num == 3) {
    document.getElementById('townhouse').style.background = 'url(assets/images/dest/main_004.jpg) no-repeat center';
  } if(num == 4) {
    document.getElementById('townhouse').style.background = 'url(assets/images/dest/main_005.jpg) no-repeat center';
  }
  
}
function townhouseRechangeImg() {
  document.getElementById('townhouse').style.background = 'url(assets/images/dest/main_001.jpg) no-repeat center';
}
