document.addEventListener('DOMContentLoaded', function() {
    var userInput = document.querySelector('input[name="username"]');
    if (userInput) {
        userInput.focus();
    }
    var loginBtn = document.querySelector('.btn-login');
    if (loginBtn) {
        loginBtn.addEventListener('mousedown', function() {
            loginBtn.style.transform = 'scale(0.96)';
        });
        loginBtn.addEventListener('mouseup', function() {
            loginBtn.style.transform = 'scale(1)';
        });
        loginBtn.addEventListener('mouseleave', function() {
            loginBtn.style.transform = 'scale(1)';
        });
    }
});
