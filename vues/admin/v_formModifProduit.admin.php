<!-- enctype="multipart/form-data obligatoire pour file -->
<h2>MODIFIER LE PRODUIT N° <?php echo $_REQUEST["id"]; ?></h2>
    <form name="modif" enctype="multipart/form-data" method="post" action="index.php?uc=gererProduit&action=confirmerModifierProduit&id=<?php echo $id ?>" method="post">
    <table border="0" width="90%" class="cadre_formulaire" cellspacing="0" cellpadding="6">
        <tr>
            <td class="titre_form" colspan="2"><h3><b>Informations de la base de données</b></h3></td>
        </tr>
        <tr>
            <td class="titre_form" width="27%">Nom</td>
            <td width="75%"><input type="text" name="nom" size="50" maxlength='40' value="<?php echo $leProduit["nom"]; ?>"></td>
        </tr>
	<tr>
            <td class="titre_form">Description</td>
            <td><textarea rows="2" cols="40" name="description"><?php echo $leProduit["description"]; ?></textarea></td>
        </tr>
	<tr>
            <td class="titre_form">Nouvelle image&nbsp;&nbsp;&nbsp;</td>
            <td class="titre_form">
                <input type="file" name="image" size="30" maxlength='30'>&nbsp;&nbsp;&nbsp;
                Image actuelle : <?php echo $leProduit["image"]; ?>
            </td>
        </tr>		
	<tr>
            <td class="titre_form">Prix </td>
            <td><input type="text" name="prix" size="6" maxlength='6' value="<?php echo $leProduit["prix"]; ?>"></td>
        </tr>
        <tr>
            <td class="titre_form">Categorie</td>
            <td>	             
                <?php include("vues/v_selectCategorie.php"); ?>
            </td>
	</tr>
	<tr>
            <td colspan="2" align="center">
                <input class='box' type='submit' value='Valider'>&nbsp;&nbsp;&nbsp;&nbsp;
                <input class='box' type='reset' value='Rétablir'>
            </td>
	</tr>
    </form>  	
    </table>

