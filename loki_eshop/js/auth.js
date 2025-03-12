document.addEventListener("DOMContentLoaded", function() {

    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if(registerForm) {
        registerForm.addEventListener('submit', function (e) {
            e.preventDefault();

            fetch('http://localhost:8000/api/register', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value,
                })
            })
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                window.location.href= "login.php";
            })
            .catch(error => console.error('Erreur: ', error));
        });
    }

    if(loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();

            fetch('http://localhost:8000/api/login', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value,
                })
            })
            .then(response => response.json())
            .then(data => {
                localStorage.setItem('token', data.token); // on stock le token
                window.location.href= "index.php";
                // console.log(data);
            })
            .catch(error => console.error('Erreur: ', error));
        });
    }


});