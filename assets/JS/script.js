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

// JS NAVIGATION

const hamburgerToggler = document.querySelector(".hamburger");
const navLinksContainer = document.querySelector(".nav-links-container");

const toggleNav = () => {
  hamburgerToggler.classList.toggle("open");

  const ariaToggle =
    hamburgerToggler.getAttribute("aria-expanded") === "true"
      ? "false"
      : "true";

  hamburgerToggler.setAttribute("aria-expanded", ariaToggle);

  navLinksContainer.classList.toggle("open");
};
hamburgerToggler.addEventListener("click", toggleNav);

new ResizeObserver((entries) => {
  console.log(entries);
  if (entries[0].contentRect.width <= 900) {
    navLinksContainer.style.transition = "transform 0.3s ease-out";
  } else {
    navLinksContainer.style.transition = "none";
  }
}).observe(document.body);
