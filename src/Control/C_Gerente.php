<?php
header('Content-Type: text/html; charset=utf-8');
    
include_once("../Persistence/Conexao.php");
include_once("../Model/Gerente.php");
include_once("../Persistence/GerenteDAO.php");
    
class C_Gerente {
    
    public function cadastrar($nome, $usuario, $senha, $confirmaSenha) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        
        $gerente = new Gerente(0, $nome, $usuario, $senha);
        $gerenteDao = new GerenteDAO();
        
        
        $retorno = $gerenteDao->cadastrar($gerente, $link, $confirmaSenha);
        $msg = NULL;
        $textoBTN = NULL;
        switch($retorno) {
                case 0:
                    -$msg = "Cadastro feito com sucesso!";
                    $textoBTN = "Confirmar";
                    $caminho = "../View/LoginGerente.html";
                    break;
                case -1:
                    $msg = "Ocorreu um erro no cadastro! Pode ser que o nome de usuario ja esteja sendo usado.";
                    $textoBTN = "Retornar";
                    $caminho = "../View/CadastroGerente.html";
                    break;
                case -2:
                    $msg = "Senha e confirmação de senha são diferentes";
                    $textoBTN = "Retornar";
                    $caminho = "../View/CadastroGerente.html";
                    break;
        }
        $conexao->fechar();
        echo "<h4></h4>".$msg."<br>
              <a href='".$caminho."'><button>".$textoBTN."</button></a>";

    }
   
    public function logar($usuario, $senha) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        
        $gerenteDao = new GerenteDAO();
            
        try {
            $retorno = $gerenteDao->logar($usuario, $senha, $link);
        
			if($retorno < 0) {
				echo 'Usuario ou senha incorretos!<br>
						<a href="../View/LoginGerente.html"><button type="button">Voltar</button></a>';
				$conexao->fechar();
				return;
			}
        
            $rs = $retorno->fetch_all();

            foreach($rs as $linha) {
                $idCliente = $linha[0];
                $nome = $linha[1];
                $user = $linha[2];
                $pass = $linha[3];
                
            }

            $cliente = new Gerente($idCliente, $nome, $user, $pass, $pass);

            $SQL = "String = ".$cliente->getId().",
                            ".$cliente->getNome()."',
                            '".$cliente->getUsuario()."',
                            '".$cliente->getSenha()."');";
            
            $conexao->fechar();
            header("Location: ../View/TelaInicialGerente.php"); //Página inicial após login
        } catch (Exception $e){
            $conexao->fechar();
            echo $e->getMessage();
        }
    }

}



?>
