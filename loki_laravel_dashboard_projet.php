<?php 

// Modélisation
//-------------
// Table projects
//---------------
// id           PK AI
// title        VARCHAR 255
// description  TEXT
// owner_id     FK => users
// status       enum
// client_id    FK => users
// created_at
// updated_at

// Table tasks
//------------
// id           PK AI
// title        VARCHAR 255
// description  TEXT
// project_id   FK => projects
// assigned_to  FK => users
// status       enum
// created_at
// updated_at

// Table project_user
//-------------------
// id           PK AI
// project_id   FK => projects
// user_id      FK => users
// created_at
// updated_at


// Fichiers :
//-----------
// App\Http\Controllers\
    // - ProjectController.php
    // - TaskController.php

// resources/views/admin
    // - projects/
        // - create.blade.php
        // - index.blade.php
        // - show.blade.php
// resources/views/client
    // - projects/
        // - index.blade.php
        // - show.blade.php
// resources/views/developpeur
    // - projects/
        // - index.blade.php
        // - show.blade.php
    // - tasks/
        // - index.blade.php
        // - create.blade.php
        // - show.blade.php

// Faire la partie admin :
    // l'admin peut créer des projets
    // sur la page index on liste les projets de l'admin connecté et aussi dans un autre tableaux les projets créés par d'autres admin, les dev affectés, le client, le statut
    // sur la page détails "show" l'admin peut rajouter ou retirer un ou des devs
// Faire la partie developpeur :
    // le developpeur peut voir ses projets
    // sur la page index on liste les projets du developpeur connecté uniquement
    // sur la page détails "show" le developpeur peut voir ses taches liées au projet
    // le developpeur peut voir ses taches
    // le developpeur peut créer des nouvelles taches liées à un projet
    // Su rla page show d'une tache, le developpeur doit pouvoir valider le statut d'une tache
// Faire la partie client :
    // le client peut voir ses projets
    // sur la page index on liste les projets du client connecté uniquement
    // sur la page détails "show" le client peut voir ses taches en cours
