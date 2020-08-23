<?php
    include_once("C_Gerente.php");
    
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $confirmaSenha = $_POST["confirmaSenha"];
    
    $controller = new C_Gerente();
    $controller->cadastrar($nome, $usuario, $senha, $confirmaSenha);
    
    
    //header("Location: ../View/LoginGerente.html");
    
?>
