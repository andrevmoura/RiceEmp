<?php
    header('Content-Type: text/html; charset=utf-8');
    include_once("../Control/C_Produtor.php");
    session_start();
    $idProdutor = $_SESSION["user"];
    $controller = new C_Produtor();
    $produtor = $controller->consultaProdutorPorId($idProdutor);
?>

<html>
    <head>
        <title>RiceEmp</title>
        <link rel = 'stylesheet' href = 'CSS/style.css'>
    </head>

    <body>
    <div class='telainicial'>
        <h1>Minhas Vendas</h1>
        <div align="left" class="divQuantidades">
            <label>Olá </label>
            <label><?php echo $produtor->getNome(); ?></label>
            <label>, aqui estão dados sobre suas sacas:</label>
            <br><br>
            <label>Quantidade de sacas à venda: </label>
            <label><?php echo $produtor->getQuantidadeAVenda(); ?></label>
            <br>
            <label>Quantidade de sacas aguardando aprovação: </label>
            <label><?php echo $produtor->getQuantidadeAguardandoAprovacao(); ?></label>
            <br>
            <label>Quantidade de sacas vendidas: </label>
            <label><?php echo $produtor->getQuantidadeVendida(); ?></label>
            <br>
            <br>
            <br>
            
        </div>
        <a href="TelaInicialProdutor.php"><button name = "submit" type = "submit" class='btninicial'>Minhas Sacas</button></a>
    
    </body>
</html>

