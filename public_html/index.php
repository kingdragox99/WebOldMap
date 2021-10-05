<?php
include 'config.php';   //import de la db
include 'header.php';   //import de header
?>

<h1>HOME</h1>

<thead>
	   	<table>
            	<tr>
            		<th>NAME : </th>
                    <th>SERVER : </th>
                    <th>CONNECT</th>
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
            $reponse = $bdd->query('SELECT * FROM servers ORDER BY id DESC LIMIT 0, 100');

            // on affiche chaque entree une a la suite
            while ($donnees = $reponse->fetch())
            {
		?>

		<?php
			
			$iptconnect = "steam://connect/".$donnees['serverIP']. ":" .$donnees['serverPort']; //on creer le connect ici
		?>

    <table>
    	<td><?php echo $donnees['serverName'];?></td> 						   

        <td><?php echo $donnees['serverIP'].":".$donnees['serverPort'];?></td> 

        <td><?php echo "<form action='".$iptconnect."'>";?>					   			
        <button class="btn"></button>
        </form></td>
	</table>
<?php
}

$reponse->closeCursor(); // termine le traitement de la demande
?>