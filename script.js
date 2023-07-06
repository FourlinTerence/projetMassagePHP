//NAVBAR 
const nav = document.querySelector("nav");
window.addEventListener("scroll", () => {    
    if (window.scrollY > 120) {
        nav.style.background = "#2d2c2b";
     } else {
            nav.style.background = "#2d2c2b00";
        }
    });

//TEXTE CACHEE PARTIE 2

const box1 = document.querySelector(".box1");
const box2 = document.querySelector(".box2");
const box3 = document.querySelector(".box3");

const h61 = document.querySelector("#box1");
const h62 = document.querySelector("#box2");
const h63 = document.querySelector("#box3");

const text1 = document.querySelector("#text1");
const text2 = document.querySelector("#text2");
const text3 = document.querySelector("#text3");


box1.addEventListener("mouseover", () => {
    box1.style.filter = "brightness(100%)";
    h61.style.transform = "translateY(10px)";
    text1.style.transform = "translateY(0px)";
    h61.style.transitionDelay = "0s";
    text1.style.transitionDelay = "0.6s";
    text1.style.color = "#ffffff";
});

box2.addEventListener("mouseover", () => {
    box2.style.filter = "brightness(100%)";
    h62.style.transform = "translateY(10px)";
    text2.style.transform = "translateY(0px)";
    h62.style.transitionDelay = "0s";
    text2.style.transitionDelay = "0.6s";
    text2.style.color = "#ffffff";
});

box3.addEventListener("mouseover", () => {
    box3.style.filter = "brightness(100%)";
    h63.style.transform = "translateY(10px)";
    text3.style.transform = "translateY(0px)";
    h63.style.transitionDelay = "0s";
    text3.style.transitionDelay = "0.6s";
    text3.style.color = "#ffffff";
});

box1.addEventListener("mouseout", () => {
    box1.style.filter = "brightness(70%)";
    h61.style.transform = "translateY(280px)";
    text1.style.transform = "translateY(40px)";
    h61.style.transitionDelay = "1s";
    text1.style.transitionDelay = "0s";
    text1.style.color = "#ffffff00";
});

box2.addEventListener("mouseout", () => {
    box2.style.filter = "brightness(70%)";
    h62.style.transform = "translateY(280px)";
    text2.style.transform = "translateY(40px)";
    h62.style.transitionDelay = "1s";
    text2.style.transitionDelay = "0s";
    text2.style.color = "#ffffff00";
});

box3.addEventListener("mouseout", () => {
    box3.style.filter = "brightness(70%)";
    h63.style.transform = "translateY(280px)";
    text3.style.transform = "translateY(40px)";
    h63.style.transitionDelay = "1s";
    text3.style.transitionDelay = "0s";
    text3.style.color = "#ffffff00";
});

