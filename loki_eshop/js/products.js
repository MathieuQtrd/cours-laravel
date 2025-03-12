document.addEventListener('DOMContentLoaded', function () {

    const token = localStorage.getItem('token');

    fetch('http://localhost:8000/api/products', {
        headers: { 'Authorization': 'Bearer ' + token },
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);

        // Affichez dans la page admin/products.php la liste des produits dans un tableau 
        // En fin de tableau il faudra un bouton pour déclencher la suppression de l'article
            // dans notre ProductController : la methode destroy devra recevoir l'id du produit à supprimer pour déclencher la suppression.
        // On  affiche quelques données du produits pas forcément tout. 




    });


});