document.addEventListener('DOMContentLoaded', function () {
    const menu = document.getElementById('menu');
    const token = localStorage.getItem('token');

    menu.innerHTML = `
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Boutique</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="cart.php">Panier</a></li>
        `;

    if(!token) {
        menu.innerHTML += `
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Connexion</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="register.php">Inscription</a></li>
        `;
    } else {
        menu.innerHTML += `
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="profile.php">Profil</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#" onclick="logout()">Déconnexion</a></li>
        `;

        fetch('http://localhost:8000/api/user', {
            headers: { 'Authorization': 'Bearer ' + token }
        })
        .then(response => response.json())
        .then(user => {
            console.log(user);
            if(user.roles.includes('admin')) {
                menu.innerHTML += `
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="admin/backoffice.php">Backoffice</a></li>                    
                `;
            }
        }) 
    }

});

function logout() {
    localStorage.removeItem('token');
    window.location.href = 'index.php';
}