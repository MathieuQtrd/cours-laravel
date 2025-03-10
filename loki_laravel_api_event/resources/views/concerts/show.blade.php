<x-front-layout title="détails d'un concert">
    <h1 class="txet-xl font-bold text-center mb-6">Concert :  <span id="concert-title"></span></h1>
    <hr>
    <br>
    <img src="" alt="" id="concert-image" width="100%" class="block">
    <br>
    <hr>
    <br>
    <p id="concert-location"></p>
    <br>
    <p id="concert-date"></p>
    <br>
    <p id="concert-description"></p>
    <br>
    <p id="concert-price"></p>
    <br>
    <p id="concert-capacity"></p>

    

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let concertId = {{ $id }};
            fetch(`/api/concerts/${concertId}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById('concert-title').innerHTML = data.data.title;
                    document.getElementById('concert-image').src = '/storage/' + data.data.image;
                    document.getElementById('concert-image').alt = data.data.title;
                    document.getElementById('concert-description').innerHTML = data.data.description;
                    document.getElementById('concert-date').innerHTML = data.data.date;
                    document.getElementById('concert-price').innerHTML = 'Prix : ' + data.data.price + ' €';
                    document.getElementById('concert-capacity').innerHTML = 'Capacité : ' + data.data.capacity;
                    document.getElementById('concert-location').innerHTML = 'Location : ' + data.data.title; 
                })
                .catch(error => {
                    console.error('Erreur', error);
                });
        });
    </script>

</x-front-layout>