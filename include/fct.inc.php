<?php
/** 
 * Fonctions pour l'application NetBouquet
 * @package default
 * @author  PG
 * @version    1.0
 */

/**
 * Ajoute le libellé d'une erreur au tableau des erreurs 
 * @param $msg : le libellé de l'erreur 
 */
function ajouterErreur($msg)
{
    if (! isset($_REQUEST['erreurs']))
    {
        $_REQUEST['erreurs']=array();
    } 
    $_REQUEST['erreurs'][]=$msg;
}

/**
 * Retoune le nombre de lignes du tableau des erreurs 
 * @return le nombre d'erreurs
 */
function nbErreurs()
{
    if (!isset($_REQUEST['erreurs']))
    {
        return 0;
    }
    else
    {
        return count($_REQUEST['erreurs']);
    }
}

/**
 * Enregistre dans une variable session les infos d'un utilisateur
 * @param $login
 * @param $nom
 * @param $statut
 */
function connecter($login,$nom,$statut)
{
    $_SESSION['login']= $login; 
    $_SESSION['nom']= $nom;
    $_SESSION['statut']= $statut;
}

 /**
 * Teste si un quelconque utilisateur est connecté
 * @return vrai ou faux 
 */
function estConnecte()
{
    return isset($_SESSION['login']);
}

/**
 * Détruit la session active
 */
function deconnecter()
{
    session_destroy();
}

/**
 *Vérifie que l'extension passée en argument est bonne
 * @param  $extension
 * @return true si les extensions sont bonnes, false sinon 
 */
function estImageValide($extension)
{
    if ($extension == "image/jpg" || $extension== "image/png" || $extension == "image/gif" || $extension == "image/jpeg")
        return true;
    else 
        return false;
}

/**
 * Vérifie la validité des 4 arguments : le nom, l'image, la description, le prix 
 * des message d'erreurs sont ajoutés au tableau des erreurs
 * @param $nom 
 * @param $image 
 * @param $description
 * @param $prix
 * @param $extention
 */
function valideInfosProduit($nom, $image, $description, $prix, $extension)
{
	if($nom == "")
        {
            ajouterErreur("Le champ nom ne doit pas être vide ! <br/><br/>");
	}
        
        if($description == "")
        {
            ajouterErreur("Le champ description ne doit pas être vide ! <br/><br/>");
	} 
        
        if($image == "")
        {
            ajouterErreur("Le champ image ne peut pas être vide ! <br/><br/>");
	}
        
       	else
        {
            if (!estImageValide($extension)) 
                ajouterErreur("Le format de l'image n'est pas autorisé ! <br/><br/>");
        }     
            
	if($prix == "")
        {
            ajouterErreur("Le champ montant ne peut pas être vide !");
	}
        //	else  //pas traité pour l’instant
       //      	if(!estValideMontant($prix)) //à faire
       //         		ajouterErreur("Le prix est invalide");
}
?>