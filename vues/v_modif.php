<html>
<br>
<form name="modification" action="index.php?uc=modification" method="POST">
  <table border="0" align="center" cellspacing="10" cellpadding="10">
    <tr align="center">
      <td>ID</td>
      <td><input type="text" name="id" value="<?php echo $unEleve['id'] ;?>" readonly="readonly"></td>
    </tr>
    <tr align="center">
      <td>Nom</td>
      <td><input type="text" name="nom" value="<?php echo $unEleve['nom'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Prenom</td>
      <td><input type="text" name="prenom" value="<?php echo $unEleve['prenom'] ;?>"></td>
    </tr>
        <tr align="center">
      <td>Mot de passe</td>
      <td><input type="text" name="mdp" value="<?php echo $unEleve['mdp'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Mail</td>
      <td><input type="text" name="adresse_mail" value="<?php echo $unEleve['adresse_mail'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Adresse</td>
      <td><input type="text" name="adresse_postale" value="<?php echo $unEleve['adresse_postale'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Niveau d'étude</td>
      <td><input type="text" name="niveau_etude" value="<?php echo $unEleve['niveau_etude'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Date de naissance</td>
      <td><input type="text" name="date_naissance" value="<?php echo $unEleve['date_naissance'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>PHOTO</td>
      <td><input type="file" name="photo" /></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="modifier"></td>
    </tr>
  </table>
</form>
</html>

