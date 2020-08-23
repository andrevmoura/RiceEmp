<?php
    include_once("C_Venda.php");
    
    $id = $_GET["id"];
    
    $controller = new C_Venda();
    $controller->removeVenda($id);
?>
