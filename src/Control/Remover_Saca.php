<?php
    include_once("C_SacaDeArroz.php");
    
    
    $id = $_GET["id"];
    
    $controller = new C_SacaDeArroz();
    $controller->removeSaca($id);
    
?>
