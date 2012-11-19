<?php
$id =$_GET['id'];
$nom=$_GET['nom'];
echo "<table class='test'>";
    echo "<tr>";
        echo "<td>" . "Êtes-vous sur de vouloir supprimer le produit " . $id . " : " . $nom . " ?" . "</td>";
        echo "<br />";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . "<form action='index.php?uc=gererProduit&action=confirmerSupprimerProduit&id=$id' method='POST'>";
        echo "<input class='box' type='submit' value='OUI'>";
        echo "</form>" . "</td>";
        echo "</tr>";
        echo "<br />";
        echo "<br />";
        echo "<tr>";
        echo "<td>" . "<form action='index.php?uc=gererProduit&action=voirTousProduits' method='POST'>";
        echo "<input class='box' type='submit' value='NON'>" . "</td>";
        echo "</form>";
    echo "</tr>";
echo "</table>";
?>