<?php
include("vues/admin/v_sommaire.admin.html");
//Pour récupérer l'action qui vient des liens, ou s'il n'existe pas on à tous les produits.
if(!isset($_REQUEST['action']))
{
    $_REQUEST['action'] = 'voirTousProduits';
}
$action=$_REQUEST['action'];
switch($action)
{
    case 'voirTousProduits':
    {
        $lesCategories=$pdo->getLesCategories();
        include("vues/admin/v_listeCategories.admin.php");
        
        if(isset($_POST["idCategorie"]))
        {
            $idCategorie=$_POST["idCategorie"];
            if ($idCategorie=="Tous")
                $lesProduits=$pdo->getLesProduitsCategorie($idCategorie);
            else
                $lesProduits=$pdo->getLesProduitsCategorie($idCategorie);
        }
    else
        $lesProduits=$pdo->getTousLesProduits();
        include("vues/admin/v_listeProduits.admin.php");
    break;
    }
    
    case 'supprimerProduit': //Affiche le formulaire de suppression
    {
        include("vues/admin/v_formSuppressionProduit.admin.php");
        break;
    }
    case 'confirmerSupprimerProduit': //Effectue la suppression dans la BDD
    {
       $id=$_GET["id"];
       $supprimer=$pdo->supprimerProduit($id);
       if ($supprimer == 0)
       {
           ajouterErreur("Échec de la suppression du produit " . $id . " !");
           include("vues/v_erreurs.php");
       }
       else
       {
           echo ("<div class='message'>"."*** SUPPRESION DU PRODUIT $id EFFECTUEE ***"."</div>");
       }
       $lesCategories=$pdo->getLesCategories();
       include("vues/admin/v_listeCategories.admin.php");
       $lesProduits=$pdo->getTousLesProduits();
       include("vues/admin/v_listeProduits.admin.php");
       break;
    }
    
    case 'ajouterProduit':
    {
        $lesCategories=$pdo->getLesCategories();
        include("vues/admin/v_formAjoutProduit.admin.php");
        break;
    }
    
    case 'confirmerAjouterProduit':
    {
        $nom = $_POST["nom"];
        $description = $_POST["description"];
        $image = $_FILES["image"]["name"];
        $extension = $_FILES["image"]["type"];
        $prix = $_POST["prix"];
        $categorie = $_POST["idCategorie"];
        
        valideInfosProduit($nom, $image, $description, $prix, $extension);
         
       $nbErreur = nbErreurs();
       
       if($nbErreur == 0)
       {
           $ajouter=$pdo->ajouterProduit($nom, $description, $image, $prix, $categorie);
           if ($ajouter == 0)
            {
                ajouterErreur("Échec de l'ajout du produit " . $nom . " !");
                include("vues/v_erreurs.php");
            }
            else
            {
                echo ("<div class='message'>"."*** AJOUT DU PRODUIT $nom EFFECTUEE ***"."</div>");
                $lesCategories=$pdo->getLesCategories();
                include("vues/admin/v_listeCategories.admin.php");
                $lesProduits=$pdo->getTousLesProduits();
                include("vues/admin/v_listeProduits.admin.php");
            }
       }
        else 
        {
            include("vues/v_erreurs.php");
            $lesCategories=$pdo->getLesCategories();
            include("vues/admin/v_formAjoutProduit.admin.php");
        }
       break;
    }
    
    case 'modifierProduit':
    {
        $id=$_GET["id"];
        $leProduit = $pdo->getUnProduit($id);
        $lesCategories = $pdo->getLescategories();
        include("vues/admin/v_formModifProduit.admin.php");
        break;
    }
    
    case 'confirmerModifierProduit':
    {
        $nom = $_POST["nom"];
        $description = $_POST["description"];
        $image = $_FILES["image"]["name"];
        $extension = $_FILES["image"]["type"];
        $prix = $_POST["prix"];
        $categorie = $_POST["idCategorie"];
        
        valideInfosProduit($nom, $image, $description, $prix, $extension);
         
       $nbErreur = nbErreurs();
       
       if($nbErreur == 0)
       {
           $id=$_GET["id"];
           $ajouter=$pdo->modifierProduit($id, $nom, $description, $image, $prix, $categorie);
           if ($ajouter == 0)
            {
                $id=$_GET["id"];
                ajouterErreur("ÉCHEC DE LA MODIFICATION DU PRODUIT $nom !");
                include("vues/v_erreurs.php");
                $lesCategories=$pdo->getLesCategories();
                $leProduit["nom"] = $nom;
                $leProduit["description"] = $description;
                $leProduit["prix"] = $prix;
                $leProduit["image"] = $image;
                //$leProduit = $pdo->getUnProduit($id);
                include("vues/admin/v_formModifProduit.admin.php");
            }
            else
            {
                echo ("<div class='message'>"."*** MODIFICATION DU PRODUIT $nom EFFECTUEE ***"."</div>");
                $lesCategories=$pdo->getLesCategories();
                include("vues/admin/v_listeCategories.admin.php");
                $lesProduits=$pdo->getTousLesProduits();
                include("vues/admin/v_listeProduits.admin.php");
            }
       }
        else 
        {
            $id=$_GET["id"];
            include("vues/v_erreurs.php");
            $lesCategories=$pdo->getLesCategories();
            $leProduit["nom"] = $nom;
            $leProduit["description"] = $description;
            $leProduit["prix"] = $prix;
            $leProduit["image"] = $image;
            //$leProduit = $pdo->getUnProduit($id);
            include("vues/admin/v_formModifProduit.admin.php");
        }
       break;
    }
}
?>
