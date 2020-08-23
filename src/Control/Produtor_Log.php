<?php
    include_once("C_Produtor.php");
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $controller = new C_Produtor();
    $controller->logar($usuario, $senha);
    
?>
