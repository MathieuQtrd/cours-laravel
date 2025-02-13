<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Confirmation de demande e contact</title>
</head>
<body>
    <h2>Bonjour {{ $details['name'] }}</h2>
    <p>Nous avons bien reçu votre demande de contact et nous reviendrons vers vous au plus vite.</p>
    <p>Récapitulatif de votre message : </p>
    <p><strong>Message : </strong>{{ $details['message'] }}</p>

    <p>Merci de nous avoir contacté</p>
    <h2>Laravel Dashboard</h2>
</body>
</html>
