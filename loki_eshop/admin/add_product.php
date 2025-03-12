<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Eshop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" id="menu">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="backoffice.php">Backoffice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="products.php">Gestion produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="add_product.php">Ajout produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Ajout Gestion utilisateur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Gestion Commande</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Statistiques</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container border mt-5 p-3">
        <!-- addProductFrom | enctype="multipart/form-data" 
        'title',
        'category',
        'image',
        'description',
        'stock',
        'price',
        'color',
        'size', 
        -->
         <div class="row">
            <div class="col-sm-6 mx-auto">
                <div id="messages"></div>
                <form action="" enctype="multipart/form-data" id="addProductFrom" class="border p-3 my-3">
                    <div class="mb-3">
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" value="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="category">Catégorie</label>
                        <input type="text" name="category" id="category" value="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" value="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" value="" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" id="stock" value="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="price">Prix</label>
                        <input type="text" name="price" id="price" value="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="color">Couleur</label>
                        <input type="text" name="color" id="color" value="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="size">Taille</label>
                        <input type="text" name="size" id="size" value="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark">Enregistrer</button>
                </form>
            </div>
         </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../js/add_product.js"></script>
</body>

</html>