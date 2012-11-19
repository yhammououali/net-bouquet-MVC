<?php
echo "<table class='tableau'>";
echo "<tr>";
    echo "<th>ID du produit</th>";
    echo "<th>Nom du produit</th>";
    echo "<th>Description du produit</th>";
    echo "<th>Prix du produit</th>";
    echo "<th>Image du produit</th>";
    echo "<th>Categorie du produit</th>";
echo "</tr>";

foreach($lesProduits as $unProduit)
    {
    $id=$unProduit["id"];
    $nom=$unProduit["nom"];
    $description=$unProduit["description"];
    $prix=$unProduit["prix"];
    $image=$unProduit["image"];
    $categorie=$unProduit["idCategorie"];
    echo "<tr>";
        echo "<td class='td'> $id </td>";
        echo "<td class='td'> $nom </td>";
        echo "<td class='td'> $description </td>";
        echo "<td class='td'>" . $prix . " €" . "</td>";
        echo "<td class='td'>" . "<img src=images/" . $image . " width='106' height='105'> " . "</td>";
        echo "<td class='td'> $categorie </td>";
    echo "</tr>";
    }
echo "</table>";
?>
