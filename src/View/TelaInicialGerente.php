<?php
    header('Content-Type: text/html; charset=utf-8');
    
    include_once("../Control/C_Venda.php");
    
    session_start();
    $idCliente = $_SESSION["user"];
    
    $controller = new C_Venda();
    $rs = $controller->consultaVenda(NULL, "g");
    
?>

<html>
    <head>
        <title>RiceEmp</title>
        <link rel = 'stylesheet' href = 'CSS/style.css'>
    </head>

    <body>
    <div class='telainicial'>
        <h1>Vendas Pendentes</h1>
        <form>
    
            <table border = '2' class='tabela'>
                <tr>
                    <th class='cabecalhoinicial'>Comprador</th>
                    <th class='cabecalhoinicial'>Data de Compra</th>
                    <th class='cabecalhoinicial'>Produtor</th>
                    <th class='cabecalhoinicial'>Valor Total</th>
                </tr>
                <?php
                    foreach($rs as $linha){
                        $indice = $linha[0];
                        $data = explode("-", $linha[5], 3);
                        echo "<tr>";
                        echo "<td>".$linha[1]."</td>";
                        echo "<td>".$data[2]."/".$data[1]."/".$data[0]."</td>";
                        echo "<td>".$linha[2]."</td>";
                        echo "<td>".($linha[3]*$linha[4])."</td>";
                        echo "<td class='botaotabela'><a href='../Control/Remover_Venda.php?id=".$indice."' title='Confirmar'><button class='btneditar' name='c".$indice."' type='button'>C</button></a></td>";
                        echo "<td class='botaotabela'><a href='../Control/Recusar_Venda.php?id=".$indice."' title='Recusar'><button class='btneditar' name='r".$indice."' type='button'>R</button></a></td>";
                        echo "</tr>";
                    }   
                ?>
            </table>
        </form>
        <br><br>
        <div>
            <a href="../Control/Logout.php"><button name = "submit" type = "submit" class='btninicial'>Sair</button></a>
        </div>
    </div>
    
    </body>
</html>

