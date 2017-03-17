<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            include("vues/v_entete.php") ;
            require_once("util/class.PDO.Ionis.inc.php");

            if(!isset($_REQUEST['uc']))
                 $uc = 'accueil';
            else
                    $uc = $_REQUEST['uc'];
            //Utile lors de l'utilisation de la base de données
            $pdo = PdoIonis::getPdoIonis();	 	 

            switch($uc)
            {
                    case 'accueil':
                    {
                        include("vues/v_bandeau.php");
                        include("vues/v_accueil.php");
                        break;            
                    }

                    case 'voirEleves' :
                        include("vues/v_bandeau.php");
                        include("vues/v_afficheEleves.php");  
                        break;

                    case 'administrer' :
                        include("vues/v_bandeau.php") ;
                        if(!isset($_SESSION['login'])&& (!isset($_SESSION['passwd'])))
                        {        
                            include("vues/v_connexion.php");  
                        }
                        else
                        {
                            include("vues/v_voirEleves.php");  
                        }
                        break;

                    case  'deconnexion':
                        include("vues/v_bandeau.php") ;
                        session_unset();
                        echo 'Déconnexion réussie';
                        break;

                    case 'modifier':
                        include("vues/v_bandeauAdmin.php") ;
                        $id=$_GET['cleP'];
                        $unEleve=$pdo->afficheEleve($id); 
                        include 'vues/v_modif.php';
                        break;

                    case 'modification':
                        include("vues/v_bandeauAdmin.php") ;
                        $id=$_REQUEST['id'];
                        $nom=$_POST['nom'];
                        $prenom=$_POST['prenom'];
                        $mdp=$_POST['mdp'];
                        $adresse_mail=$_POST['adresse_mail'];
                        $adresse_postale=$_POST['adresse_postale'];
                        $niveau_etude=$_POST['niveau_etude'];
                        $date_naissance=$_POST['date_naissance'];
                        $photo=$_POST['photo'];

                        $res=$pdo->modifEleve($id, $nom, $prenom, $adresse_mail, $adresse_postale, $niveau_etude, $date_naissance, $photo,$mdp);
                        if($res)
                        {
                            echo 'Modification pris en compte'; 
                            //var_dump($res);
                            include("vues/v_voirEleves.php");  
                        }
                        else
                        {
                            echo 'Erreur ';
                        }
                        break;

                    case 'suppression':
                        include("vues/v_bandeauAdmin.php") ;
                        $id=$_REQUEST['cleP'];
                        $res=$pdo->suppEleve($id);
                        if($res)
                        {
                            echo 'Suppression effectué';
                            include("vues/v_voirEleves.php");  
                        }
                        else 
                        {
                            echo 'Erreur';
                        }
                        break;

                    case 'ajouter':
                        include("vues/v_bandeauAdmin.php") ;
                        include 'vues/v_ajout.php';
                        break;

                    case 'insertion':
                        include("vues/v_bandeauAdmin.php") ;
                        if(!isset($_REQUEST['ajouter']))
                        {
                            $id=$_REQUEST['id'];
                            $nom=$_POST['nom'];
                            $prenom=$_POST['prenom'];
                            $adresse_mail=$_POST['adresse_mail'];
                            $adresse_postale=$_POST['adresse_postale'];
                            $niveau_etude=$_POST['niveau_etude'];
                            $date_naissance=$_POST['date_naissance'];
                            $photo=$_POST['photo'];
                            $mdp=$_POST['mdp'];
                            $res=$pdo->ajoutEleve($id,$nom,$prenom, $adresse_mail, $adresse_postale , $niveau_etude , $date_naissance, $photo,$mdp);
                            include("vues/v_voirEleves.php");                        
                        }
                        break;

                    case 'connexion' :
                        include("vues/v_bandeauAdmin.php") ;
                        $login=$_POST['login'];
                        $passwd=$_POST['passwd'];

                        $res=$pdo->log($login,$passwd);
                        if ($res == 0)
                        {
                              include("vues/v_erreur.php");                   
                        }
                        else
                        {
                            $_SESSION['login']=$login;
                            $_SESSION['passwd']=$passwd;
                              include("vues/v_voirEleves.php");                         
                        }                      
                        break;
                        
                    case 'login_espace':
                        include("vues/v_bandeau.php") ;
                        if(!isset($_SESSION['login'])&& (!isset($_SESSION['passwd'])))
                        {        
                            include("vues/v_connexionEspace.php");  
                        }
                        else
                        {
                            include("vues/v_voirEspace.php");  
                        }
                        break;
                        break;
                    
                    case 'connexion_espace':
                        include("vues/v_bandeau.php") ;
                        $login=$_POST['login'];
                        $mdp=$_POST['passwd'];

                        $res=$pdo->loginEspace($login,$mdp);
                        if ($res == 0)
                        {
                              include("vues/v_erreur.php");                   
                        }
                        else
                        {
                            $_SESSION['login']=$login;
                            $_SESSION['passwd']=$mdp;
                            include("vues/v_voirEspace.php"); 
                        }                      
                        break;
                                
            }
            include("vues/v_pied.php");
            ?>
    </body>
</html>
