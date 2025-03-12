document.addEventListener('DOMContentLoaded', function () {

    const productId = new URLSearchParams(window.location.search).get('id');
    console.log(productId);
    const productInfos = document.getElementById('productInfos');
    const productImage = document.getElementById('productImage');

    fetch('http://localhost:8000/api/products/' + productId)
    .then(response => response.json())
    .then(data => {
        console.log(data);
    });

});