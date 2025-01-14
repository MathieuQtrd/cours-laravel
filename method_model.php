<?php 

// INSERT
//-------
Contact::create([
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'message' => 'Ceci est un message de contact.',
]);

// INSERT (plusieurs lignes potentiellement)
//------------------------------------------
Contact::insert([
    ['name' => 'Alice', 'email' => 'alice@example.com', 'message' => 'Message 1'],
    ['name' => 'Bob', 'email' => 'bob@example.com', 'message' => 'Message 2'],
]);
    // Contrairement à ::create(), ::insert() ne remplit pas automatiquement les colonnes created_at et updated_at

// CHERCHE UNE ENTREE, SI NON TROUVEE, ON LA CREE
//-----------------------------------------------
Contact::firstOrCreate(
    ['email' => 'john.doe@example.com'],
    ['name' => 'John Doe', 'message' => 'Message automatique.']
);

// UPDATE UNE ENTREE, SI NON TROUVEE, ON LA CREE
//----------------------------------------------
Contact::updateOrCreate(
    ['email' => 'john.doe@example.com'],
    ['name' => 'John Updated', 'message' => 'Message mis à jour.']
);

// SELECT *
//---------
$contacts = Contact::all();

// SELECT ... WHERE id = 
//----------------------
$contact = Contact::find(1);  // Récupère l'entrée avec l'ID 1

// SELECT PREMIERE ENTREE DE LA TABLE
//-----------------------------------
$contact = Contact::where('email', 'john.doe@example.com')->first();

// SELECT UNE COLONNE DE LA TABLE
//-------------------------------
$emails = Contact::pluck('email');  // Liste de tous les emails

// SELECT ... WHERE ...
//---------------------
$contacts = Contact::where('name', 'John Doe')->get();

// UPDATE 
//-------
Contact::where('email', 'john.doe@example.com')->update(['name' => 'John Updated']);

// DELETE 
//-------
Contact::where('email', 'john.doe@example.com')->delete();

// DELETE WHERE id=...
//--------------------
Contact::destroy(1);  // Supprime l'entrée avec l'ID 1
Contact::destroy([1, 2, 3]);  // Supprime plusieurs entrées

