/* INDEX PAGE */
'use strict';

/*addEvent on element*/
const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}


/*navbar toggle*/
const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const navbarToggler = document.querySelector("[data-nav-toggler]");

const toggleNav = function () {
  navbar.classList.toggle("active");
  navbarToggler.classList.toggle("active");
}

addEventOnElem(navbarToggler, "click", toggleNav);

const closeNav = function () {
  navbar.classList.remove("active");
  navbarToggler.classList.remove("active");
}

addEventOnElem(navbarLinks, "click", closeNav);



/*header active*/
const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 100) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});


const formOpenBtn = document.querySelector("#form-open"),
            home = document.querySelector(".home"),
            formContainer = document.querySelector(".form_container"),
            formCloseBtn = document.querySelector(".form_close"),
            signupBtn = document.querySelector("#signup"),
            loginBtn = document.querySelector("#login"),
            pwShowHide = document.querySelectorAll(".pw_hide");

        formOpenBtn.addEventListener("click", () => home.classList.add("show"));
        formCloseBtn.addEventListener("click", () => home.classList.remove("show"));

        pwShowHide.forEach((icon) => {
            icon.addEventListener("click", () => {
                let getPwInput = icon.parentElement.querySelector("input");
                if (getPwInput.type === "password") {
                    getPwInput.type = "text";
                    icon.classList.replace("uil-eye-slash", "uil-eye");
                } else {
                    getPwInput.type = "password";
                    icon.classList.replace("uil-eye", "uil-eye-slash");
                }
            });
        });

        signupBtn.addEventListener("click", (e) => {
            e.preventDefault();
            formContainer.classList.add("active");
        });
        loginBtn.addEventListener("click", (e) => {
            e.preventDefault();
            formContainer.classList.remove("active");
        });