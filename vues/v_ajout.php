<html>
<br>
<form name="ajouter" action="index.php?uc=insertion" method="POST">
  <table border="0" align="center" cellspacing="5" cellpadding="5">

    <tr align="center">
      <td>Nom</td>
      <td><input type="text" name="nom" value=""></td>
    </tr>
    <tr align="center">
      <td>Prenom</td>
      <td><input type="text" name="prenom" value=""></td>
    </tr>
    <tr align="center">
      <td>Mot de passe</td>
      <td><input type="text" name="mdp" value="<?php echo $unEleve['mdp'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Mail</td>
      <td><input type="text" name="adresse_mail" value=""></td>
    </tr>
    <tr align="center">
      <td>Adresse</td>
      <td><input type="text" name="adresse_postale" value=""></td>
    </tr>
    <tr align="center">
      <td>Niveau Etude</td>
      <td><input type="text" name="niveau_etude" value=""></td>
    </tr>
    <tr align="center">
      <td>Date de naissance</td>
      <td><input type="text" name="date_naissance" value=""></td>
    </tr>
    <tr align="center">
      <td>PHOTO</td>
      <td><input type="file" name="photo" /></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="Ajouter"></td>
    </tr>
  </table>
</form>
</html>