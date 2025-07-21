document.addEventListener('DOMContentLoaded', function() {
    // Mettre en surbrillance le lien actif
    var links = document.querySelectorAll('nav a');
    var url = window.location.href;
    links.forEach(function(link) {
        if (url.includes(link.getAttribute('href'))) {
            link.classList.add('active');
        }
    });
});