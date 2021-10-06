<?php
include 'config.php';   //import de la db
include 'header.php';   //import de header
?>

<script src="asset/copy.js"></script>

<h1>HOME</h1>

<thead>
    <table>
        <tr>
            <th>NAME : </th>
            <th>SERVER : </th>
            <th>CONNECT</th>
            <th>COPY</th>
        </tr>
    </table>
</thead>

<?php
try {
    $host = $config['DB_HOST'];
    $dbname = $config['DB_DATABASE'];
    // On se connecte à MySQL
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $config['DB_USERNAME'], $config['DB_PASSWORD']);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage()); //verif
}

// on recupere le contenu de la table rankme
$reponse = $bdd->query('SELECT * FROM servers ORDER BY id LIMIT 0, 100');

// on affiche chaque entree une a la suite
while ($donnees = $reponse->fetch()) {
?>

    <?php $iptconnect = "steam://connect/" . $donnees['serverIP'] . ":" . $donnees['serverPort']; //on creer le connect ici ?>
    <?php $iptcopy = $donnees['serverIP'] . ":" . $donnees['serverPort']; //on creer le copy ici ?>

    <table>
        <!-- Nom des serveurs afficher ici -->
        <td><?php echo $donnees['serverName']; ?></td>
        
        <!-- Pas ouf mais et marche pas sur plusieur ip que sur la premier affichée --> 
        <td><?php echo "<textarea id='textArea' readonly='true'>".$iptcopy."</textarea>"; ?></td>

        <!-- Bouton connect marche bien :) -->

        <td><?php echo "<form action='" . $iptconnect . "'>"; ?>
            <button class="btn"></button>
            </form>
        </td>
        <td>
            <!-- Bouton du copy -->
            <button class="btnc" onclick="copyToClipBoard()"></button>
        </td>
    </table>
<?php
}

$reponse->closeCursor(); // termine le traitement de la demande
?>

</body>

</html>