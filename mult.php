<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>mon 1er PHP</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <table border="1">
            <?php
            $nb=$_POST["nb"];

            for ($i=1 ; $i<=10 ; $i++){
                $res = $nb*$i;
                echo "<tr><td>$nb x $i =</td><td>$res</td></tr>";
            }
            ?>
        </table>
    </body>

</html>     