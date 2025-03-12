<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'inc/nav.inc.php'; ?>

    <div class="container border mt-5 p-3">
        <!-- 
        Dans cette page faire un catalogue produit :
        --------------------------------------------
        - Une barre latérale qui affiche les catégories (unique)
        - un bloc principal qui affiche des blocs produits (titre, catégorie, prix, image) + un bouton "voir détails" ou "fiche produit" ou autre ...
        - Lors du clic sur une catégorie de la barre latérale : filtrer les produits pour n'afficher que ceux de cette catégorie
        - Faire la page détails produit avec toutes les informations du produit (on récupère l'id dans l'url et on appelle la route correspondante à show pour récupérer le produit lié à cet id)
        - Mettre un form avec choix de quantité et ajouter au panier

        -->
        <div class="row">
            <div class="col-md-3">
                <h4 class="pb-3 border-bottom my-5 fs-2">Catégories</h4>
                <ul class="list-group" id="categoryList"></ul>
            </div>
            <div class="col-md-9">
                <h1 class="pb-3 border-bottom my-5 fs-2">Boutique</h1>
                <div class="row" id="productList"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/menu.js"></script>
    <script src="js/shop.js"></script>
</body>

</html>