<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des actions</title>
</head>
<body>
    <form action="lstActions.php" method="post">
    Choisissez une activité :
    <select name="activite" required>
    <?php
    require_once('connexion.php');
    $stmt = $connexion->prepare("SELECT * FROM activite;");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    // Les résultats retournés par la requête seront traités en 'mode' objet
    $stmt->execute();
    // Parcours des enregistrements retournés par la requête : premier, deuxième…
    while($enregistrement = $stmt->fetch())
    {
        echo '<option value="', $enregistrement->numero,'">', $enregistrement->libelle,'</option>';
    }
    ?>
    </select>
    <input type="submit" value="Rechercher" name="submit">
    </form>
    <?php
    if (isset($_POST['submit']))
    {
        $activite = $_POST['activite'];
        $stmt = $connexion->prepare("SELECT action.code, action.intitule 
                                     FROM action INNER JOIN activite ON action.numeroActivite = activite.numero 
                                     WHERE activite.numero = :activite;"); 
        $stmt->bindParam(':activite', $activite, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        echo "<h3>Actions pour l'activité sélectionnée :</h3>";
        while($enregistrement = $stmt->fetch())
        {
            echo $enregistrement->code,' ', $enregistrement->intitule, '<br>';
        }
    }
    ?>
</body>
</html>