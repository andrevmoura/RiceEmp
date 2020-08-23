<?php
header('Content-Type: text/html; charset=utf-8');
    
include_once("../Persistence/Conexao.php");
include_once("../Model/Cliente.php");
include_once("../Persistence/ClienteDAO.php");
    
class C_Cliente {
    
    public function cadastrar($nome, $usuario, $senha, $confirmaSenha) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        
        $cliente = new Cliente(0, $nome, $usuario, $senha);

        
        $clienteDao = new ClienteDAO();
        
        $retorno = $clienteDao->cadastrar($cliente, $link, $confirmaSenha);
        $msg = NULL;
        $textoBTN = NULL;
        switch($retorno) {
                case 0:
                    -$msg = "Cadastro feito com sucesso!";
                    $textoBTN = "Confirmar";
                    $caminho = "../View/LoginCliente.html";
                    break;
                case -1:
                    $msg = "Ocorreu um erro no cadastro! Pode ser que o nome de usuario ja esteja sendo usado.";
                    $textoBTN = "Retornar";
                    $caminho = "../View/CadastroCliente.html";
                    break;
                case -2:
                    $msg = "Senha e confirmação de senha são diferentes";
                    $textoBTN = "Retornar";
                    $caminho = "../View/CadastroCliente.html";
                    break;
        }
        $conexao->fechar();
        echo "<h4></h4>".$msg."<br>
              <a href='".$caminho."'><button>".$textoBTN."</button></a>";
    }
   
    public function logar($usuario, $senha) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        
        $clienteDao = new ClienteDAO();
            
        try {
            $retorno = $clienteDao->logar($usuario, $senha, $link);
        
            if($retorno < 0) {
                $texto = 'Usuario ou senha incorretos!<br><a href="../View/LoginCliente.html"><button type="button">Voltar</button></a>';
                $conexao->fechar();
                echo $texto;
                return $texto;
            }
        
        
            $rs = $retorno->fetch_all();
            foreach($rs as $linha) {
                $idCliente = $linha[0];
                $nome = $linha[1];
                $user = $linha[2];
                $pass = $linha[3];
            }

            $cliente = new Cliente($idCliente, $nome, $user, $pass, $pass);

            $SQL = "String = ".$cliente->getId().",
                            ".$cliente->getNome()."',
                            '".$cliente->getUsuario()."',
                            '".$cliente->getSenha()."');";
                            
            session_start();
            $_SESSION["user"] = $idCliente;
            $conexao->fechar();
            header("Location: ../View/TelaInicialCliente.php"); //Página inicial após login
        } catch (Exception $e){
            $conexao->fechar();
            echo $e->getMessage();
        }

    }

}



?>
