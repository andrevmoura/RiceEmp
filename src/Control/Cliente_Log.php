<?php
    include_once("C_Cliente.php");
    
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    
    $controller = new C_Cliente();
    $controller->logar($usuario, $senha);
?>
