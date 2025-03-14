document.addEventListener('DOMContentLoaded', function () {
    const cartContent = document.getElementById('cart-content');
    const totalPrice = document.getElementById('total-price');
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    let total = 0;

    if(cart.length == 0) {
        cartContent.innerHTML = '<div class="alert alert-danger">Votre panier est vide</div>';
        totalPrice.innerHTML = 'Total 0 €';
    } else {
        cart.forEach(item => {
            fetch('http://localhost:8000/api/products/' + item.id)
            .then(response => response.json())
            .then(product => {
                let unitPrice = product.price;
                let quantityPrice = product.price * item.quantity;

                total += quantityPrice;

                let cartItem = `
                    <div class="row border my-3 p-3">
                        <div class="col-sm-2 fw-bold">${product.title}</div>
                        <div class="col-sm-3">Prix unitaire : ${product.price} €</div>
                        <div class="col-sm-3">Quantité : ${item.quantity}</div>
                        <div class="col-sm-3">Prix : ${quantityPrice} €</div>
                        <div class="col-sm-1"><span class="btn btn-danger" onclick="removeItem(${item.id})">Retirer</span></div>
                    </div>
                `;
                cartContent.innerHTML += cartItem;
                totalPrice.innerHTML = 'Total ' + total + ' €';
            });
        });
    }

    document.getElementById('clear-cart').addEventListener('click', function () {
        localStorage.removeItem('cart');
        window.location.reload();
    });


});

function removeItem(id) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let productIndex = cart.findIndex(item => item.id == id);

    if(productIndex !== -1) {
        cart.splice(productIndex, 1);
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    window.location.reload();
}

