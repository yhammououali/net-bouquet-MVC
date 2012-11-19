<h2>Sélectionner une catégorie</h2>
<form action="index.php?uc=consulter&action=voirTousProduits" method="POST">
    <select name="idCategorie">
        <option value="Tous">Tous
            <?php
            foreach($lesCategories as $uneCategorie)
            {
                $id=$uneCategorie["id"];
                $libelle=$uneCategorie["libelle"];
                echo ("<option value=$id>$libelle");
            }
            ?>
    </select>
    <input class='box' type="submit" value="Ok">
</form>
<?php
    echo "<br />";
?>