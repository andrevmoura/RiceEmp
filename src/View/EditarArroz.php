<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
    'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<head>
    <title>Editar saca</title>
    <meta charset = 'UTF-8'>
    <meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <link rel = 'stylesheet' href = 'CSS/style.css'>
</head>

<body>
    <div class='formulario'>  
    <form id = 'cadastro' action = '../Control/Editar_Arroz.php' method='post'>
        <h3>Estocar Arroz</h3>
        <?php
            header('Content-Type: text/html; charset=utf-8');
    
            include_once("../Persistence/Conexao.php");
            include_once("../Model/SacaDeArroz.php");
            include_once("../Persistence/SacaDeArrozDAO.php");
            
            $conexao = new Conexao();
            $link = $conexao->getLink();
            $sacaDAO = new SacaDeArrozDAO();
            
            $id = $_GET["id"];
            $retorno = $sacaDAO->buscarSaca($id, $link);
            
            $rs = $retorno->fetch_all();
            
            $tipo = NULL;
            $dt = NULL;
            $qtd = NULL;
            $valor = NULL;
            
            foreach($rs as $linha){
                $tipo = $linha[1];
                $dt = $linha[2];
                $qtd = $linha[3];
                $valor = $linha[4];
            } 
            
            
            echo
            "<fieldset>
                <label> Tipo do arroz: </label>
                <input name='tipo' value = '".$tipo."' type = 'text' maxlength = '40' required autofocus>
            </fieldset>
            
            <fieldset>
                <label> Quantidade de arroz: </label>
                <input name='quantidade' value='".$qtd."' type = 'text' required>
            </fieldset>
            
            <fieldset>
                <label> Data de armazenamento: </label>
                <input name='data' value='".$dt."' type = 'date' required>
            </fieldset>
            
            <fieldset>
                <label> Valor Por Saca: </label>
                <input name='valor' value='".$valor."' type = 'text' required>
            </fieldset>
            
            <fieldset>
                <button name = 'submit' type = 'submit' formaction='../Control/Editar_Arroz.php?id=".$id."'>Editar Arroz</button>
            </fieldset>";
        ?>
        
        </form>
    </div>
</body>

</html>
