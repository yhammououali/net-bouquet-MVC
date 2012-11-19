<!-- enctype="multipart/form-data obligatoire pour file -->
<h2>AJOUTER UN PRODUIT</h2>
    <form name="modif" enctype="multipart/form-data" method="POST" action="index.php?uc=gererProduit&action=confirmerAjouterProduit">
    <table border="0" width="90%" class="cadre_formulaire" cellspacing="0" cellpadding="6">
        <tr>
            <td colspan="2"><b><h3>Remplir tous les champs</h3></b></td>
	</tr>
        <tr>
            <td class="titre_form" width="27%" height="23">Nom :</td>
            <td width="75%" height="23"><input type="text" name="nom" size="50" maxlength="40"></td>
        </tr>
        <tr>
            <td class="titre_form" width="27%" height="23">Description :</td>
            <td width="75%" height="23"><textarea rows="2" cols="40" name="description"></textarea></td>
        </tr>
        <tr>
            <td class="titre_form" width="27%" height="23">Image :</td>
            <td width="75%" height="23"><input type="file" name="image" size="30" maxlength="30"></td>
        </tr>		
        <tr>
            <td class="titre_form" width="27%" height="23">Prix :</td>
            <td width="75%" height="23"><input type="text" name="prix" size="6" maxlength="6"></td>
        </tr>
        <tr>
            <td class="titre_form" width="27%" height="23">Categorie actuelle :</td>
            <td width="75%" height="23">
                <?php include("vues/v_selectCategorie.php"); ?>
                <br /><br />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <input type='submit' class="box" value='Valider'>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type='reset' class="box" value='Rétablir'>
            </td>
        </tr>
    </form>
    </table>

