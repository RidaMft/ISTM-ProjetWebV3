<html>
<body>
<?php
 
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'projetweb';
 
 
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());
 
 
$select = "SELECT * FROM eleve where nom ='$login' ";
$result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
 
 
// si on a récupéré un résultat on l'affiche.
if($total) {
    // début du tableau
    echo '<br>';
    echo '<br>';
    echo "<table width='85%' border='1px' height='90' align='center'>";
        // première ligne on affiche les titres prénom et surnom dans 2 colonnes
        echo '<tr>';
        echo '<td bgcolor="#669999"><b><u>Prénom</u></b></td>';
        echo '<td bgcolor="#669999"><b><u>Nom</u></b></td>';
                echo '<td bgcolor="#669999"><b><u>Adresse Postale</u></b></td>';
        echo '<td bgcolor="#669999"><b><u>Adresse Mail</u></b></td>';
                echo '<td bgcolor="#669999"><b><u>Niveau Etude</u></b></td>';
                echo '<td bgcolor="#669999"><b><u>Date de naissance</u></b></td>';
                echo '<td bgcolor="#669999"><b><u>Photo</u></b></td>';
                echo '<td bgcolor="#669999"><b><u>mdp</u></b></td>';
                echo '</tr>'."\n";
    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.    
    while($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td bgcolor="#CCCCCC">'.$row['prenom'].'</td>';
        echo '<td bgcolor="#CCCCCC">'.$row['nom'].'</td>';
        echo '<td bgcolor="#CCCCCC">'.$row['adresse_postale'].'</td>';
                echo '<td bgcolor="#CCCCCC">'.$row['adresse_mail'].'</td>';
                echo '<td bgcolor="#CCCCCC">'.$row['niveau_etude'].'</td>';
                echo '<td bgcolor="#CCCCCC">'.$row['date_naissance'].'</td>';
                echo '<td bgcolor="#CCCCCC">'.$row['photo'].'</td>';
                echo '<td bgcolor="#CCCCCC">'.$row['mdp'].'</td>';
 
                echo '</tr>'."\n";
    }
    echo '</table>'."\n";
    // fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
?>