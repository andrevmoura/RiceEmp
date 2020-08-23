<?php
    include_once("C_SacaDeArroz.php");
    
    session_start();
    $idProdutor = $_SESSION["user"];
    $tipo = $_POST["tipo"];
    $quantidade = $_POST["quantidade"];
    $data = $_POST["data"];
    $id = $_GET["id"];
    $valorPorSaca = $_POST["valor"];
    
    
    $controller = new C_SacaDeArroz();
    $controller->editaSaca($id, $idProdutor, $tipo, $quantidade, $valorPorSaca, $data);
    
?>
