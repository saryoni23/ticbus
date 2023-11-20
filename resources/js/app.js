import "./bootstrap";
import "flowbite";
// import "./carousel";
// import "./app.bundle"

//lapis
const lapis=document.querySelector('#lapis');
lapis.addEventListener('click', function(){
    lapis.classList.toggle('lapis-active');
});

// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (
    localStorage.getItem("color-theme") === "dark" ||
    (!("color-theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
} else {
    document.documentElement.classList.remove("dark");
}

var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

// Change the icons inside the button based on previous settings
if (
    localStorage.getItem("color-theme") === "dark" ||
    (!("color-theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    themeToggleLightIcon.classList.remove("hidden");
} else {
    themeToggleDarkIcon.classList.remove("hidden");
}

var themeToggleBtn = document.getElementById("theme-toggle");

themeToggleBtn.addEventListener("click", function () {
    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle("hidden");
    themeToggleLightIcon.classList.toggle("hidden");

    // if set via local storage previously
    if (localStorage.getItem("color-theme")) {
        if (localStorage.getItem("color-theme") === "light") {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
        } else {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
        }

        // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains("dark")) {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
        } else {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
        }
    }
});
// Initialization for ES Users
import {
    Datatable,
    initTE,
  } from "tw-elements";
  
  initTE({ Datatable });

// JavaScript untuk menukar nilai "From" dan "To"
const fromSelect = document.getElementById("from");
const toSelect = document.getElementById("to");
const switchButton = document.getElementById("switchButton");
const resetButton = document.getElementById("resetButton");
const jumlahPenumpang = document.getElementById("jumlah_penumpang");
const harga = document.getElementById("harga");

switchButton.addEventListener("click", () => {
    const fromValue = fromSelect.value;
    const toValue = toSelect.value;

    fromSelect.value = toValue;
    toSelect.value = fromValue;
});

resetButton.addEventListener("click", () => {
    fromSelect.value = ""; // Reset "From"
    toSelect.value = ""; // Reset "To"
});

jumlahPenumpang.addEventListener("change", () => {
    const jumlahPenumpangValue = parseInt(jumlahPenumpang.value);
    const hargaPerPenumpang = 100000; // Harga per penumpang
    const totalHarga = jumlahPenumpangValue * hargaPerPenumpang;
    harga.textContent = `Harga: Rp${totalHarga}`;
});

if (
    localStorage.getItem("color-theme") === "dark" ||
    (!("color-theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
} else {
    document.documentElement.classList.remove("dark");
}

var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

// Change the icons inside the button based on previous settings
if (
    localStorage.getItem("color-theme") === "dark" ||
    (!("color-theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    themeToggleLightIcon.classList.remove("hidden");
} else {
    themeToggleDarkIcon.classList.remove("hidden");
}

var themeToggleBtn = document.getElementById("theme-toggle");

themeToggleBtn.addEventListener("click", function () {
    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle("hidden");
    themeToggleLightIcon.classList.toggle("hidden");

    // if set via local storage previously
    if (localStorage.getItem("color-theme")) {
        if (localStorage.getItem("color-theme") === "light") {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
        } else {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
        }

        // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains("dark")) {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
        } else {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
        }
    }
});

import { Carousel } from "flowbite";
const carousel = new Carousel(carouselElement, items, options);
// goes to the next (right) slide
carousel.next()

// goes to the previous (left) slide
carousel.prev()


// import { Datepicker, Input, initTE } from "tw-elements";
initTE({ Datepicker, Input });