<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'inc/nav.inc.php'; ?>

    <div class="container mt-5 p-3">
        <div class="row">
            <div class="col-md-12">
                <div id="cart-content"></div>
                <div id="cart">
                    <p id="total-price">Total 0 €</p>
                    <button id="clear-cart" class="btn btn-danger">Vider le panier</button>
                    <button id="pay-cart" class="btn btn-success">Payer le panier</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="js/menu.js"></script>
    <script src="https://js.stripe.com/v3"></script>
    <script src="js/cart.js"></script>
    <script>
        // POUR STRIPE 
        document.getElementById('pay-cart').addEventListener('click', function () {
            // la clé en dessous est la clé API public
            let stripe = Stripe('pk_test_51R1XSKQxqYcUTDpJBsi2Lxs7qQo7gGRGd4FLzFkewYnRxPqYpGdJ8kFlPAGkPSFOzlovhfonqXmGVz5oUnjrMf7X00aAZAQhaH');
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            if(cart.length === 0) {
                alert('Votre panier est vide');
                return;
            }

            fetch('http://localhost:8000/api/checkout-session', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    cart
                })
            })
            .then(response => response.json())
            .then(session => {
                if(session.error) {
                    alert('Erreur' + session.error);
                } else {
                    stripe.redirectToCheckout({
                        sessionId: session.id
                    });
                }
            })
            .catch(error => {
                console.error('Erreur : ', error );
            })

        });

        document.addEventListener('DOMContentLoaded', function () {
            let urlParams = new URLSearchParams(window.location.search);
            let paymentStatus = urlParams.get('payment');

            if(paymentStatus == 'success') {
                localStorage.removeItem('cart');
                alert('Merci pour votre commande, vous pourrez voir le suivi de votre commande dans votre page profil...');
                window.location.href = 'cart.php';
            } else if(paymentStatus == 'cancel') {
                alert('Paiement annulé.');
                window.location.href = 'cart.php';
            }
        })
    </script>
</body>

</html>