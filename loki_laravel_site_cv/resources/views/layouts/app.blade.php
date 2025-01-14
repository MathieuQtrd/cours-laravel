<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- On appelle la section title créée dans les vues -->
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-dark"  data-bs-theme="dark">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">Mon site CV</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Qui suis je</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/competences') }}">Mes compétences</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/projets') }}">Mes projets</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/contacts') }}">Liste Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/devis') }}">Devis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/liste_devis') }}">Liste Devis</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
    <main class="container border my-5 p-3">
        <!-- On appelle la section content créée dans les vues -->
        @yield('content')
    </main>

    <footer class="bg-dark text-white p-3 fixed-bottom">
        <div class="container">
            <p>&copy 2025 - Mon Site</p>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>