// script.js
document.addEventListener('DOMContentLoaded', function() {
    const introSection = document.querySelector('.intro');
    const mainImageSection = document.querySelector('#index-main-image img');


    introSection.addEventListener('mouseover', function() {
        introSection.style.backgroundColor = '#f0f0f0';
    });


    introSection.addEventListener('mouseout', function() {
        introSection.style.backgroundColor = '';
    });


    mainImageSection.addEventListener('click', function() {
        mainImageSection.style.border = '2px solid #000';
    });


});




