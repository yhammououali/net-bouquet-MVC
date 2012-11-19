<select name="idCategorie">
<?php
foreach($lesCategories as $uneCategorie) 
    {
    $id = $uneCategorie["id"];
    $libelle= $uneCategorie["libelle"];
    echo ("<option value=$id>$libelle") ;	
    
    }
    ?>
 </select> 
