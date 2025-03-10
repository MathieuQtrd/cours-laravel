<x-front-layout title="Liste des concerts">
    <h1 class="txet-xl font-bold text-center mb-6">Liste des concerts</h1>

    <ul id="concerts-list">
        <li>Chargement ...</li>
    </ul>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('/api/concerts')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    let concertsList = document.getElementById('concerts-list');
                    concertsList.innerHTML = '';

                    data.data.forEach(concert => {
                        let li = document.createElement('li');
                        li.innerHTML = `<strong>Titre :</strong> <a href="/concerts/${concert.id}">${concert.title}</a>
                                        <br>
                                        <br>
                                        <img src="/storage/${concert.image}" alt="${concert.title}" width="100%">
                                        <br>
                                        <br>
                                        <strong>Location :</strong> ${concert.location}
                                        <strong>Date :</strong> ${concert.date}
                                        <strong>Prix :</strong> ${concert.price} €
                                        <br>
                                        <hr>
                                        <br>
                                        `;
                        concertsList.appendChild(li);
                    });
                })
                .catch(error => {
                    console.error('Erreur', error);
                });
        });
    </script>

</x-front-layout>