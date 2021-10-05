<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <link rel="stylesheet" href="main.css" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
        <title>OLD MAP LEADERBORD</title>
    </head>
    <body>
        <div class="container">
            <img src="img/CSSIMG.png" alt="imgcss" width="100%" height="100%">
            <div class="center"><img src="img/logopetit.png" alt=""width="300px" height="100px"></div>
        </div>

        <h2>LEADERBOADS</h2>

        <?php
        include 'config.php';   //import de la db
            try
            {
            $host=$config['DB_HOST'];
            $dbname=$config['DB_DATABASE'];
            // On se connecte à MySQL
            $bdd = new PDO("mysql:host=$host;dbname=$dbname",$config['DB_USERNAME'],$config['DB_PASSWORD']);
            }

            catch(Exception $e)

            {
            die('Erreur : '.$e->getMessage()); //verif
            }

            // on recupere le contenu de la table rankme
            $reponse = $bdd->query('SELECT * FROM rankme ORDER BY score DESC LIMIT 0, 20');

            // on affiche chaque entree une a la suite
            while ($donnees = $reponse->fetch())
            {
        ?>

        <?php
            $kill = $donnees['kills'];      //en cree des vars pour les données
            $death = $donnees['deaths'];
            $score = $donnees['score'];
            $name = $donnees['name'];
            $kd = $kill/$death;
        ?>
            <table>
                <tr>
                    <td>Name : </td>
                    <td>K/D : </td>
                    <td>SCORE : </td>
                </tr>
                <tr>
                    <th><?php echo $name;?></th> 
                    <th><?php echo $nombre_format_francais = number_format($kd, 2, ',', ' ');?></th> 
                    <th><?php echo $score;?></th>
                </tr>            
            </table>  
<?php
}

$reponse->closeCursor(); // termine le traitement de la demande
?>
<body> 
</html>