// JS FORM

const signUpBtnLink = document.querySelector(".signUpBtn-link");
const signInBtnLink = document.querySelector(".signInBtn-link");
const sigInBtn = document.querySelector(".sigInBtn");
const sigUpBtn = document.querySelector(".sigUpBtn");
const signInAncre = document.querySelector(".signInAncre");
const signUpAncre = document.querySelector(".signUpAncre");
const wrapper = document.querySelector(".wrapper");

signUpBtnLink.addEventListener("click", () => {
  wrapper.classList.toggle("active");
});

signInBtnLink.addEventListener("click", () => {
  wrapper.classList.toggle("active");
});

sigInBtn.addEventListener("click", () => {
  wrapper.classList.toggle("active");
});

sigUpBtn.addEventListener("click", () => {
  wrapper.classList.toggle("active");
});

signInAncre.addEventListener("click", () => {
  wrapper.classList.toggle("active");
});

signUpAncre.addEventListener("click", () => {
  wrapper.classList.toggle("active");
});


