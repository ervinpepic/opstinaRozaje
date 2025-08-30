document.addEventListener('DOMContentLoaded', function() {
    var logoLink = document.querySelector('.login #login h1 a');
    if (logoLink && typeof rozajeLoginData !== 'undefined') {
        logoLink.setAttribute('title', rozajeLoginData.logoTitle);
    }
});