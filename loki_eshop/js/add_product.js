document.addEventListener('DOMContentLoaded', function () {
    const addProductForm = document.getElementById('addProductFrom');

    addProductForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const token = localStorage.getItem('token');

        /*
        'title',
        'category',
        'image',
        'description',
        'stock',
        'price',
        'color',
        'size', 
        */
        let formData = new FormData();
        formData.append('title', document.getElementById('title').value);
        formData.append('category', document.getElementById('category').value);
        formData.append('description', document.getElementById('description').value);
        formData.append('stock', document.getElementById('stock').value);
        formData.append('price', document.getElementById('price').value);
        formData.append('color', document.getElementById('color').value);
        formData.append('size', document.getElementById('size').value);

        const imageInput = document.getElementById('image').files[0];
        if(imageInput) {
            formData.append('image', imageInput);
        }
        console.log(formData);
        fetch('http://localhost:8000/api/products', {
            method: 'POST',
            headers: { 'Authorization': 'Bearer ' + token },
            body: formData,
        }) ; 

    })
});