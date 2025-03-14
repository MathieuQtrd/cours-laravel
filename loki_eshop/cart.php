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
    <script src="js/cart.js"></script>
</body>

</html>