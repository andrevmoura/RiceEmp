<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Gerente.php");

class GerenteDAO{


    public function cadastrar($gerente, $link, $confirmaSenha) {
        if(strcmp($gerente->getSenha(), $confirmaSenha) != 0) {
            return -2;
        }
        
        $SQL = "INSERT INTO gerente VALUES ('0','".$gerente->getNome()."',
                                            '".$gerente->getUsuario()."',
                                            '".$gerente->getSenha()."');";
                                            
        if (!mysqli_query($link, $SQL)) {
            return -1;
        }
        
        return 0;
        
    }
    
    public function logar($usuario, $senha, $link) {
        $SQL = "SELECT * FROM gerente WHERE usuario ='".$usuario."' and senha = '".$senha."';";

        $retorno = mysqli_query($link, $SQL);

        if (mysqli_num_rows($retorno) > 0) {
            return $retorno;
        } else {
            return -1;
        }
        
    }
    
}

?>
