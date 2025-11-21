<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des agents</title>
</head>
<body>
<?php
require_once('connexion.php');
$stmt = $connexion->prepare("SELECT nom, prenom, codePostal, ville FROM agent WHERE codePostal = '33000';");
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
// Parcours des enregistrements retournés par la requête : premier, deuxième…
while($enregistrement = $stmt->fetch())
{
  // Affichage des champs nom et prenom de la table 'utilisateur'
  echo '<h3>', $enregistrement->nom, ' ', $enregistrement->prenom,' ', $enregistrement->codePostal,' ', $enregistrement->ville,'</h3>';
}

?></body>
</html>