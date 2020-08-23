<?php
    include_once("C_Produtor.php");
    
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $confirmaSenha = $_POST["confirmaSenha"];
    
    $controller = new C_Produtor();
    $controller->cadastrar($nome, $usuario, $senha, $confirmaSenha);
    
    //header("Location: ../View/LoginProdutor.html");
?>
