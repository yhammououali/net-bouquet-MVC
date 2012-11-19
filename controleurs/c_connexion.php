<?php
$action=$_REQUEST['action'];
switch($action)
{
    case 'valideConnexion':
    {
        $login=$_REQUEST['login'];
        $mdp=$_REQUEST['mdp'];
        $utilisateur=$pdo->getInfosUtilisateur($login,$mdp);

        if(!is_array($utilisateur))
        {
            ajouterErreur("Login ou mot de passe incorrect");
            include("vues/v_formConnexion.html");
            include("vues/v_sommaireIndex.html");
            include("vues/v_erreurs.php");     
        }
        else
        {
            $nom=$utilisateur['nom'];
            $statut=$utilisateur['statut'];
            connecter($login,$nom,$statut);
            if($statut=='admin')
                include("vues/admin/v_sommaire.admin.html"); 
        }
        break;
    }
    case 'deconnexion':
    {
            deconnecter();
    }
    default:
    {
        include("vues/v_formConnexion.html");
        include("vues/v_sommaireIndex.html");
        break;
    }
}
?>
