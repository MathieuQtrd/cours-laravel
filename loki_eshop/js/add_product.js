document.addEventListener('DOMContentLoaded', function () {
    const addProductForm = document.getElementById('addProductFrom');
    const errorMessages = document.getElementById('messages');

    addProductForm.addEventListener('submit', function (e) {
        e.preventDefault();
        errorMessages.innerHTML = '';
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
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if(data.errors) {                
                const ul = document.createElement('ul');
                ul.classList.add('alert', 'alert-danger', 'my-3', 'px-4');
                for(let field in data.errors) {
                    data.errors[field].forEach(message => {
                        const li = document.createElement('li');
                        li.textContent = message;
                        ul.appendChild(li);
                    });
                }
                errorMessages.appendChild(ul);
            } else {
                window.location.href = 'products.php';
            }
        }) ; 

    })
});