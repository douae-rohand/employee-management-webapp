document.addEventListener('DOMContentLoaded', function() {
    var firstInput = document.querySelector('.add-card form input:not([type="hidden"]):not([type="file"])');
    if (firstInput) {
        firstInput.focus();
    }
}); 