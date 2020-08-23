<?php
    include_once("C_Venda.php");
    session_start();
    
    $idCliente = $_SESSION["user"];
    $idSaca = $_GET["id"];
    
    $controller = new C_Venda();
    $controller->editaVenda($idSaca, NULL, 0, NULL);
    
    header("Location: ../View/TelaInicialGerente.php");

?>
