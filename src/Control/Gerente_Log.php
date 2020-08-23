<?php
    include_once("C_Gerente.php");
    
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    
    $controller = new C_Gerente();
    $controller->logar($usuario, $senha);
?>
