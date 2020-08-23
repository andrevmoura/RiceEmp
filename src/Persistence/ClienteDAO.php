<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Cliente.php");

class ClienteDAO{

    public function cadastrar($cliente, $link, $confirmaSenha) {
        if(strcmp($cliente->getSenha(), $confirmaSenha) != 0) {
            return -2;
        }
        
        $SQL = "INSERT INTO cliente VALUES ('0','".$cliente->getNome()."',
                                            '".$cliente->getUsuario()."',
                                            '".$cliente->getSenha()."');";
                                            
        if (!mysqli_query($link, $SQL)) {
            return -1;
        }
        
        return 0;
        
    }
    
    function logar($usuario, $senha, $link) {
        $SQL = "SELECT * FROM cliente WHERE usuario ='".$usuario."' and senha = '".$senha."';";

        $retorno = mysqli_query($link, $SQL);   
        
        if (mysqli_num_rows($retorno) > 0) {
            return $retorno;
        } else {
            return -1;
        }
        
    }
    
}

?>
