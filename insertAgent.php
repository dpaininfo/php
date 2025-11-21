<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel agent</title>
</head>
<body>
<?php
if (!isset($_POST['submit']))
{
?>
    <form action="insertAgent.php" method="post">
        Nom: <input type="text" name="nom" required><br>
        Prénom: <input type="text" name="prenom" required><br>
        Ville: <input type="text" name="ville" required><br>
        <input type="submit" value="Ajouter l'agent" name="submit">
    </form>
<?php
}
else 
{
    require_once('connexion.php');
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ville = $_POST['ville'];

    $stmt = $connexion->prepare("INSERT INTO utilisateur (nom, prenom, adresse) VALUES (:nom, :prenom, :ville)");
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "<h3>Agent ajouté avec succès!</h3>";
    } else {
        echo "<h3>Erreur lors de l'ajout de l'agent.</h3>";
    }
}
?>
</html>