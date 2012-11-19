<?php
require_once("include/fct.inc.php");
require_once ("include/class.pdobouquet.inc.php");
session_start();
include("vues/v_entete.html");
$pdo = PdoBouquet::getpdobouquet();

if(!isset($_REQUEST['uc']))
{
    $_REQUEST['uc'] = 'consulter';
}	 
$uc = $_REQUEST['uc'];
	switch($uc){
		case 'connexion':
                {
                    include("controleurs/c_connexion.php");
                    break;
		}
		case 'consulter' :
                {
                    include("vues/v_formConnexion.html");
                    include("vues/v_sommaireIndex.html");
                    include("controleurs/c_consulter.php");
                    break;
		}
		case 'gererProduit' :
                {
                    include("controleurs/c_gererProduits.php");
                    break; 
                }
}
include("vues/v_pied.html") ;
?>