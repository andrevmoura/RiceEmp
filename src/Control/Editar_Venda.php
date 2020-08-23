<?php
    include_once("C_Venda.php");
    session_start();
    
    $idCliente = $_SESSION["user"];
    $idSaca = $_GET["id"];
    
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d');
    
    $controller = new C_Venda();
    $controller->editaVenda($idSaca, $idCliente, 1, $date);
    


?>
