<?php
include 'config.php';   //import de la db
include 'index.php';   //import de la db
?>
<thead>
    <h1>LEADERBOADS</h1>
            <table>
                <tr>
                    <th>Name : </th>
                    <th>K/D : </th>
                    <th>SCORE : </th>
                </tr>
            </table>
</thead>

        <?php
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
            $reponse = $bdd->query('SELECT * FROM rankme ORDER BY score DESC LIMIT 0, 100');

            // on affiche chaque entree une a la suite
            while ($donnees = $reponse->fetch())
            {
        ?>

        <?php
            $kill = $donnees['kills'];      //en cree des vars pour les données
            $death = $donnees['deaths'];
            $score = $donnees['score'];
            $name = $donnees['name'];
            if($death>1 && $kill>1){    // on evite la divison par 0 
            $kd = $kill/$death;
        }
        ?>

        <table>
                    <td><?php echo $name;?></td>
                    <td><?php echo $nombre_format_francais = number_format($kd, 2, ',', ' ');?></td> 
                    <td><?php echo $score;?></td>
        </table>  
<?php
}

$reponse->closeCursor(); // termine le traitement de la demande
?>