document.addEventListener('DOMContentLoaded', function () {

    const productId = new URLSearchParams(window.location.search).get('id');
    console.log(productId);
    const productInfos = document.getElementById('productInfos');
    const productImage = document.getElementById('productImage');

    fetch('http://localhost:8000/api/products/' + productId)
        .then(response => response.json())
        .then(data => {
            console.log(data);

            let stock = '';
            if(data.stock < 1) {
                stock = '<span class="text-danger">Rupture de stock</span>';
            } else if(data.stock < 10) {
                stock = '<span class="text-warning">Stock faible</span>';
            } else {
                stock = '<span class="text-success">En stock</span>';
            }

            productImage.innerHTML = `
                <img src="${data.image_url}" alt="" class="img-thumbnail">
            `;
            productInfos.innerHTML = `
                <h1 class="pb-3 border-bottom">${data.title}</h1>
                <p>Description : ${data.description}</p>
                <p>Catégorie : ${data.category}</p>
                <p>Prix : ${data.price} €</p>
                <p>Couleur : ${data.color}</p>
                <p>Taille : ${data.size}</p>
                <p>Stock : ${stock}</p>
                <hr>
            `;
            if(data.stock > 0) {
                productInfos.innerHTML += `
                    <div class="row">
                        <div class="col-sm-2"><label>Quantité</label></div>
                        <div class="col-sm-6"><input type="number" id="quantity" class="form-control" min="1" max="${data.stock}"></div>
                        <div class="col-sm-4"><button class="btn btn-success" id="addToCart">Ajouter au panier</button></div>
                    </div>
                `;

                document.getElementById('addToCart').addEventListener('click', function () {
                    let quantity = document.getElementById('quantity').value;
                    addToCart(data.id, quantity);
                });
            }

        });

});
function addToCart(productId, productQuantity) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let productIndex = cart.findIndex(item => item.id == productId);

    if(productIndex === -1) {
        cart.push({id: productId, quantity: parseInt(productQuantity)});
    } else {
        cart[productIndex].quantity += parseInt(productQuantity);
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    console.log(localStorage.getItem('cart'));
    alert('Produit ajouté à votre panier');
}