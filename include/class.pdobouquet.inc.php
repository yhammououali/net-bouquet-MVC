<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoBouquet qui contiendra l'unique instance de la classe
 
 * @package default
 * @author PG
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoBouquet{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=netbouquet';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
	private static $monPdo;                
	private static $monPdoBouquet=null;     
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
        {
            PdoBouquet::$monPdo = new PDO(PdoBouquet::$serveur.';'.PdoBouquet::$bdd, PdoBouquet::$user, PdoBouquet::$mdp); 
            PdoBouquet::$monPdo->query("SET CHARACTER SET utf8");
	}
        
	public function _destruct()
        {
            PdoBouquet::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe 
 * Appel : $instancePdoBouquet = PdoBouquet::getPdoBouquet();
 * @return l'unique objet de la classe PdoBouquet
 */
    public static function getPdoBouquet(){
	if(PdoBouquet::$monPdoBouquet==null){
		PdoBouquet::$monPdoBouquet= new PdoBouquet();
	}
	return PdoBouquet::$monPdoBouquet;  
    }
   
//================PARTIE PUBLIQUE ==============================================
/** 
 * Retourne tous les id et libellé de la table Categorie
 * @return un tableau associatif
 */   
    public function getLesCategories()
    {
	$res = PdoBouquet::$monPdo->query("SELECT * FROM categorie"); //La requête
        $lesLignes = array(); //Déclare un tableau vide
        $lesLignes = $res->fetchAll(); //Rempli le tableau à l'aide de la méthode fetchAll
        return $lesLignes;
    }      
    
/** 
 * Retourne tous les produits de la table Produit
 * @return un tableau associatif
 */   
    public function getTousLesProduits()
    {
	$res = PdoBouquet::$monPdo->query("SELECT * FROM produit"); //La requête
        $lesLignes = array(); //Déclare un tableau vide
        $lesLignes = $res->fetchAll(); //Rempli le tableau à l'aide de la méthode fetchAll
        return $lesLignes;
    }
    
/** 
 * Retourne les produits de l'id catégorie passé en paramètre
 * @return un tableau associatif
 */   
    public function getLesProduitsCategorie($idCategorie)
    {
	$res = PdoBouquet::$monPdo->query("SELECT * FROM produit WHERE idCategorie='$idCategorie'"); //La requête
        $lesLignes = array(); //Déclare un tableau vide
        $lesLignes = $res->fetchAll(); //Rempli le tableau à l'aide de la méthode fetchAll
        return $lesLignes;
    }
    
    /**
     * 
     */
    
    public function supprimerProduit($id)
    {
        $req = ("DELETE FROM produit WHERE id='$id'");
        $nbLigne = PdoBouquet::$monPdo->exec($req);
        return $nbLigne;
    }
    
/**
 * @param type $nom
 * @param type $description
 * @param type $image
 * @param type $prix
 * @param type $categorie
 * @return type
 */
    
    public function ajouterProduit($nom, $description, $image, $prix, $categorie)
    {
        $req = "INSERT INTO produit VALUES (' ', '$nom', '$image', '$description', '$prix', '$categorie')";
        $nbLigne = PdoBouquet::$monPdo->exec($req);
        return $nbLigne;
    }
    
    public function modifierProduit($id, $nom, $description, $image, $prix, $categorie)
    {
        $req = ("UPDATE produit SET nom = '$nom', image = '$image', description = '$description', prix = '$prix', idCategorie = '$categorie' WHERE id = $id");
        $nbLigne = PdoBouquet::$monPdo->exec($req);
        return $nbLigne;
    }
    
    public function getUnProduit($id)
    {
        $res = PdoBouquet::$monPdo->query("SELECT * FROM produit WHERE id='$id'"); //La requête
        $leProduit = array(); //Déclare un tableau vide
        $leProduit = $res->fetch(); //Rempli le tableau à l'aide de la méthode fetchAll
        return $leProduit;
    }
    
  //================CONNEXION ==============================================

 /**
 * Retourne le nom et le statut d'un utilisateur
 * @param $login 
 * @param $mdp
 * @return le nom et le statut sous la forme d'un tableau associatif
*/
	public function getInfosUtilisateur($login, $mdp)
        {
            $req = "SELECT utilisateur.nom as nom, utilisateur.statut as statut FROM utilisateur WHERE login='$login' and mdp='$mdp'";
            $res = PdoBouquet::$monPdo->query($req);
            $ligne = $res->fetch();
            return $ligne;
	} 

}
?>
