<?php
class PdoIonis
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=projetweb';   		
      	private static $user='root' ;    		
      	private static $mdp='root' ;	
		private static $monPdo;
		private static $monPdoIonis = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoIonis::$monPdo = new PDO(PdoIonis::$serveur.';'.PdoIonis::$bdd, PdoIonis::$user, PdoIonis::$mdp); 
			PdoIonis::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoIonis::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoIonis = PdoIonis::getPdoIonis();
 * @return l'unique objet de la classe PdoIonis
 */
	public  static function getPdoIonis()
	{
		if(PdoIonis::$monPdoIonis == null)
		{
			PdoIonis::$monPdoIonis=new PdoIonis();
		}
		return PdoIonis::$monPdoIonis;  
	}
        
	public function getLesEleves()
	{
		$req = "select * from eleve";
                $res=  PdoIonis::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getLesElevesDuTableau($lesid)
	{
		$nbEleves = count($lesid);
		$lesEleves=array();
		if($nbEleves != 0)
		{
			foreach($lesid as $id)
			{
				$req = "select * from eleve where id = '$id'";
				$res=  PdoIonis::$monPdo->query($req);
				$unEleve = $res->fetch();
				$lesEleves[] = $unEleve;
			}
		}
		return $lesEleves;
	}
        
       
        public function ajoutEleve($id,$nom, $prenom, $adresse_mail, $adresse_postale , $niveau_etude , $date_naissance, $photo, $mdp)
        {
              $sql = "INSERT  INTO eleve (nom, prenom, adresse_mail, adresse_postale, niveau_etude, date_naissance, photo,mdp)
                        VALUES ('$nom', '$prenom', '$adresse_mail', '$adresse_postale', '$niveau_etude','$date_naissance','$photo','$mdp')";

              $res = PdoIonis::$monPdo->query($sql);

              //affichage des résultats, pour savoir si l'insertion a marchée:
              if($res)
              {
                  echo'<html><body><br>';
                  echo("L'insertion a été correctement effectuée") ;
                  echo'<br></body></html>';
              }
              else
              {
                echo("L'insertion a  échoué") ;
              }
              return $res;
        }
        public function modifEleve($id, $nom, $prenom, $adresse_mail, $adresse_postale , $niveau_etude , $date_naissance, $photo,$mdp)
        {
            $req = "UPDATE eleve SET 
                    nom = '$nom',
                    prenom = '$prenom',
                    adresse_mail = '$adresse_mail',
                    adresse_postale = '$adresse_postale',
                    niveau_etude = '$niveau_etude',
                    date_naissance = '$date_naissance',
                    photo = '$photo',
                    mdp ='$mdp'
                    WHERE id = '$id'" ;
            $res=PdoIonis::$monPdo->query($req);
            return $res;
            echo $res;
        }
        public function afficheEleve($id)
        {
            $req = "select * from eleve where id = '$id'";
            $res=  PdoIonis::$monPdo->query($req);
            $unEleve = $res->fetch();
            return $unEleve;          
        }
        
        public function suppEleve($id)
        {
            $req = "delete from eleve where id ='$id'";
            $res=  PdoIonis::$monPdo->query($req);
            return $res;            
        }

        public function log($login,$passwd)
        {
            $req = "select count(*) as nb from CONNECT where LOGIN = '$login' and MDP = '$passwd'";
            $res =  PdoIonis::$monPdo->query($req);
            $ligne = $res->fetch();
            $nb=$ligne['nb'];
            return $nb;    
        }
        
        public function loginEspace($nom,$mdp)
        {
            $req = "select count(*) as nb from eleve where nom = '$nom' and mdp = '$mdp'";
            $res =  PdoIonis::$monPdo->query($req);
            $ligne = $res->fetch();
            $nb=$ligne['nb'];
            return $nb;    
        }
        
        	public function getUnEleve($login)
	{
		$req = "select * from eleve where nom ='$login";
                $res=  PdoIonis::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
}
?>
