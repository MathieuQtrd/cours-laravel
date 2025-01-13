<?php 
//---------------------------------------------------
//---------------------------------------------------
// EXERCICE 
//---------------------------------------------------
//---------------------------------------------------
// faire un site CV
    // nouvelle installation laravel
    // - On se positionne dans le dossier parent souhaité
    // laravel new mon_site_cv
        // - On suit les étapes d'installation
        // - On se positionne dans son dossier 
        // cd mon_site_cv
        // - On lance le serveur
        // php artisan serve
// - On laisse  le powershell qui fait tourner le serveur et on en ouvre un autre
// - On crée un layout dans un  dossier ressources/layouts/app.blade.php
// - On prépare les vues
    // index.blade.php (Qui suis je, mon parcours, mes informations de contact)
    // competences.blade.php (Listing des compétences web)
    // projets.blade.php (Listing de réalisations)
    // contact.blade.php (formulaire)
// - On crée les routes : 
    // - soit directement dans routes/web.php 
    // - soit via un controller (ou plusieurs) :
        // php artisan make:controller IndexController (ou un autre nom)
    
// - On met en place les liens d'accès aux pages
// - Intégration d'un peu de contenu pour chaque page
// Création du formulaire de contact :
    // method="POST"
    // Nom (input type text | name="name")
    // Email (input type email | name="email")
    // Message (textarea | name="message")
    // + bouton de validation


