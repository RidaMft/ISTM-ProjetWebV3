<html>
     
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<br>
<br>
<li><a href=index.php?uc=ajouter>Ajouter un élève</a></li>
<br>
<table width='85%' border='1px' height='90' align='center'>
  <tr>
    <td>Numero</td>
    <td>Nom</td>
    <td>Prénom</td>
    <td>Mail</td>
    <td>Adresse</td>
    <td>Niveau d'étude</td>
    <td>Date de Naissance</td>
    <td>Mot de passe </td>
    <td>Photo</td>
    <td>Modifier</td>
    <td>Supprimer</td>
  </tr>

 <?php
 $_POST['ListeV']=$pdo->getLesEleves();
 foreach($_POST['ListeV'] as $val => $unEleve)
 {
    echo"<tr>";
        echo "<td>$unEleve[0]</td>";
        echo "<td>$unEleve[1]</td>";
        echo "<td>$unEleve[2]</td>";
        echo "<td>$unEleve[3]</td>";
        echo "<td>$unEleve[4]</td>";
        echo "<td>$unEleve[5]</td>";
        echo "<td>$unEleve[6]</td>";
        echo "<td>$unEleve[8]</td>";
        echo "<td><img src=images/$unEleve[7] alt=$unEleve[7] title=images/$unEleve[7] width='200' height='150'/></td>";
        echo "<td> <a href=index.php?uc=modifier&cleP=$unEleve[0]>Modifier</a></td>";
        echo "<td> <a href=index.php?uc=suppression&cleP=$unEleve[0]>Supprimer</a></td>";
    echo "</tr>";  
}
?>
 


</table> 

</body>

</html>

