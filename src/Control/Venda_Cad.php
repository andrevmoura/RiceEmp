<?php
    include_once("C_Venda.php");
    
    
    $idSaca = $_GET["id"];
    $controller = new C_Venda();
    $controller->cadastraVenda($idSaca);
    

?>
