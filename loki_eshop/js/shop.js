document.addEventListener('DOMContentLoaded', function () {
    const productList = document.getElementById('productList');
    const categoryList = document.getElementById('categoryList');

    let allProducts = [];

    function fetchProduct() {
        fetch('http://localhost:8000/api/products/list', {
            headers: {'Content-Type': 'application/json'},
        })
        .then(response => response.json())
        .then(data => {
            allProducts = data;
            console.log(allProducts);
            displayProducts(allProducts);
            displayCategory(allProducts);
        });
    }

    function displayCategory(products) {
        categoryList.innerHTML = '';
        let categories = [...new Set(products.map(product => product.category.toLowerCase()).filter(category => category))];
        console.log(categories);
        let allCategoriesLink = document.createElement('li');
        allCategoriesLink.classList.add('list-group-item', 'category-item');
        allCategoriesLink.textContent = 'Voir tout';
        allCategoriesLink.addEventListener('click', function () {
            displayProducts (allProducts);
        });
        categoryList.appendChild(allCategoriesLink);
        
        categories.forEach(category => {
            let li = document.createElement('li');
            li.classList.add('list-group-item', 'category-item');
            li.textContent = category;
            li.addEventListener('click', function () {
                displayProducts (allProducts.filter(p => p.category.toLowerCase() === category ));
            });
            categoryList.appendChild(li);
        });
        
    }

    function displayProducts (products) {
        productList.innerHTML = '';
        products.forEach(product => {
            let card = document.createElement('div');
            card.classList.add('col-md-4', 'mb-4');

            card.innerHTML = `
                <div class="card">
                    <img src="${product.image_url}" alt="${product.titre}" class="card-img-top">
                    <div class="card-body">
                        <h5>${product.title}</h5>
                        <p>Catégorie : ${product.category}</p>
                        <p>Prix : ${product.price} €</p>
                        <a href="product-details.php?id=${product.id}" class="btn btn-dark w-100">Fiche produit</a>
                    </div>
                </div>
            `;
            productList.appendChild(card);
        });
    }


    fetchProduct();
});