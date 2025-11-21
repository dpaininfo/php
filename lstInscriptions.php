<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscriptions</title>
</head>
<body>
    <?php 
    if (!isset($_POST['submit']))
    {
    echo '<form action="lstInscriptions.php" method="post">',
        'Code Agent :',
        '<input type="text" name="codeAgent" required>',
        '<input type="submit" value="Rechercher" name="submit">',
    '</form>';
    }
    else 
    {
        require_once('connexion.php');
        $codeAgent = $_POST['codeAgent'];
        $stmt = $connexion->prepare("select a.intitule from action a inner join session s on (a.code=s.codeaction) inner join inscription i on (s.numero=i.numerosession) where i.codeagent=:codeAgent;");
        $stmt->bindParam(':codeAgent', $codeAgent, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        echo "<h3>Inscriptions pour l'agent $codeAgent :</h3>";
        while($enregistrement = $stmt->fetch())
        {
            echo $enregistrement->intitule, '<br>';
        }
    }
    ?>
</body>
</html>