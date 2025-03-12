document.addEventListener('DOMContentLoaded', function () {
    const productsTable = document.getElementById('productsTable');
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
        data.forEach(product => {
            let tRow = productsTable.insertRow();
            let productImage = 'https://placehold.co/600x800?text=Image\nIndisponible';
            if(product.image_url) {
                productImage = product.image_url;
            }
            tRow.innerHTML = `
                <td>${product.title}</td>
                <td>${product.category}</td>
                <td>${product.price} €</td>
                <td>${product.stock}</td>
                <td><img src="${productImage}" class="img-thumbnail" width="50" ></td>
                <td><span class="btn btn-danger" onclick="deleteProduct(${product.id})">Supprimer <i class="bi bi-trash3"></i></span></td>
            `;
        });
    });
});

function deleteProduct(id) {
    const token = localStorage.getItem('token');
    fetch('http://localhost:8000/api/products/' + id, {
        method: 'DELETE',
        headers: { 'Authorization': 'Bearer ' + token },
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        window.location.reload();
    });
}