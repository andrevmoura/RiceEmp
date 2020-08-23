<?php

header('Content-Type: text/html; charset=utf-8');

include_once("../Persistence/Conexao.php");
include_once("../Model/Produtor.php");
include_once("../Persistence/ProdutorDAO.php");
    
final class C_Produtor {    
    
    public function cadastrar($nome, $usuario, $senha, $confirmaSenha) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        
        $produtor = new Produtor(0, $nome, $usuario, $senha);
        $produtorDao = new ProdutorDAO();
        $retorno = $produtorDao->cadastrar($produtor, $link, $confirmaSenha);
        $msg = NULL;
        $textoBTN = NULL;
        switch($retorno) {
                case 0:
                    -$msg = "Cadastro feito com sucesso!";
                    $textoBTN = "Confirmar";
                    $caminho = "../View/LoginProdutor.html";
                    break;
                case -1:
                    $msg = "Ocorreu um erro no cadastro! Pode ser que o nome de usuario ja esteja sendo usado.";
                    $textoBTN = "Retornar";
                    $caminho = "../View/CadastroProdutor.html";
                    break;
                case -2:
                    $msg = "Senha e confirmação de senha são diferentes";
                    $textoBTN = "Retornar";
                    $caminho = "../View/CadastroProdutor.html";
                    break;
        }
        $conexao->fechar();
        echo "<h4></h4>".$msg."<br>
              <a href='".$caminho."'><button>".$textoBTN."</button></a>";

    }
    
    public function consultaProdutorPorId($id) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        $produtorDao = new ProdutorDAO();
        $retorno = $produtorDao->consultaProdutorPorId($id, $link);
        if(!($retorno instanceOf mysqli_result) and $retorno < 0) {
            echo 'ERRO NA BUSCA!<br>
                   <a href="../View/LoginProdutor.html"><button type="button">Voltar</button></a>';
            $conexao->fechar();
            return;
        }
        $rs = $retorno->fetch_all();
        
        $produtor = NULL;
        foreach($rs as $linha) {
            $produtor = new Produtor($linha[0], $linha[1], $linha[2], $linha[3],
                                    $linha[4], $linha[5], $linha[6]);                                        
        }
        $conexao->fechar();
        
        return $produtor;
    
    }
    
    public function atualizarAoVender($produtor) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        $produtorDao = new ProdutorDAO();
        $produtorDao->atualizarAoVender($produtor, $link);
        $conexao->fechar();
    }
    
    
    public function atualizarAoComprar($produtor) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        $produtorDao = new ProdutorDAO();
        $produtorDao->atualizarAoComprar($produtor, $link);
        $conexao->fechar();
    }
    
    
    public function atualizarAoRecusar($produtor) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        $produtorDao = new ProdutorDAO();
        $produtorDao->atualizarAoRecusar($produtor, $link);
        $conexao->fechar();
    }
    
    public function atualizarAoConfirmarVenda($produtor) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        $produtorDao = new ProdutorDAO();
        $produtorDao->atualizarAoConfirmarVenda($produtor, $link);
        $conexao->fechar();
    }
    
    
    
    public function logar($usuario, $senha) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        $produtorDao = new ProdutorDAO();
            
        $retorno = $produtorDao->logar($usuario, $senha, $link);
        if($retorno < 0) {
            echo 'Usuario ou senha incorretos!<br>
                   <a href="../View/LoginProdutor.html"><button type="button">Voltar</button></a>';
            $conexao->fechar();
            return;
        }
        $rs = $retorno->fetch_all();

        foreach($rs as $linha) {
            $id = $linha[0];
            $nome = $linha[1];
            $user = $linha[2];
            $pass = $linha[3];
            
        }
        session_start();
        $_SESSION["user"] = $id;
        $produtor = new Produtor($id, $nome, $user, $pass, $pass);

        $SQL = "String = ".$produtor->getId().",
                        ".$produtor->getNome()."',
                        '".$produtor->getUsuario()."',
                        '".$produtor->getSenha()."');";
        
        $conexao->fechar();
        header("Location: ../View/TelaInicialProdutor.php");
    }

}



?>
