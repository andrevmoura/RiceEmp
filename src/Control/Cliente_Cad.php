<?php
    include_once("C_Cliente.php");
    
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $confirmaSenha = $_POST["confirmaSenha"];
    
    $controller = new C_Cliente();
    
    $controller->cadastrar($nome, $usuario, $senha, $confirmaSenha);
    
?>
