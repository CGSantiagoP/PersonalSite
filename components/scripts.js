// document.addEventListener("DOMContentLoaded", function () {
//     const hamburger = document.querySelector(".hamburger");
//     const navLinks = document.querySelector(".nav-links");

//     hamburger.addEventListener("click", function () {
//         navLinks.classList.toggle("active");
//     });
// });


// For floating menu
// document.addEventListener("DOMContentLoaded", function () {
//     const hamburger = document.querySelector(".hamburger");
//     const navLinks = document.querySelector(".nav-links");

//     hamburger.addEventListener("click", function () {
//         navLinks.classList.toggle("active"); // Toggle visibility

//         // Optional: Add an animation effect
//         if (navLinks.classList.contains("active")) {
//             navLinks.style.display = "flex";
//             setTimeout(() => (navLinks.style.opacity = "1"), 10);
//         } else {
//             navLinks.style.opacity = "0";
//             setTimeout(() => (navLinks.style.display = "none"), 300);
//         }
//     });
// });



document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    hamburger.addEventListener('click', function () {
        navLinks.classList.toggle('active');
        hamburger.classList.toggle('hidden'); // Hide hamburger when menu is open
    });
});