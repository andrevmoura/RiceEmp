<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Produtor.php");

class ProdutorDAO{

    
    public function cadastrar($produtor, $link, $confirmaSenha) {
        if($this->senhaIgualConfirmaSenha($produtor->getSenha(), $confirmaSenha)) {
            return -2;
        }
        
        $SQL = "INSERT INTO produtor VALUES ('0','".$produtor->getNome()."',
                                            '".$produtor->getUsuario()."',
                                            '".$produtor->getSenha()."',
                                            '0', '0', '0');";
        if (!mysqli_query($link, $SQL)) {
            return -1;
        }
        
        return 0;
        
    }
    
    public function senhaIgualConfirmaSenha($senha, $confirmaSenha){
        if(strcmp($senha, $confirmaSenha) != 0) {
            return true;
        }
        return false;
    }
    
    public function excluir($produtor, $link) {
        $SQL = "DELETE FROM produtor WHERE usuario ='".$produtor->getUsuario()."';";
        
        if(!mysqli_query($link, $SQL)){
            return ("Erro na exclusão de Produtor");
        }
        return "Produtor deletado com sucesso!";
        
    }
    
    public function logar($usuario, $senha, $link) {
        $SQL = "SELECT * FROM produtor WHERE usuario ='".$usuario."' and senha = '".$senha."';";
        $retorno = mysqli_query($link, $SQL);

        if (mysqli_num_rows($retorno) > 0) {
            return $retorno;
        } else {
            return -1;
        }
        
    }
    
    public function consultaProdutorPorId($idProdutor, $link) {
        $SQL = "SELECT * FROM produtor WHERE id = '".$idProdutor."';";
        $retorno = mysqli_query($link, $SQL);
        if (mysqli_num_rows($retorno) > 0) {
            return $retorno;
        } else {
            return -1;
        }
    }
    
    public function atualizarAoVender($produtor, $link) {
        $qtdAVenda = $produtor->getQuantidadeAVenda() + 1;
        $id = $produtor->getId();
        $produtor->setQuantidadeAVenda($qtdAVenda);
        $SQL = "UPDATE produtor SET
                quantidadeAVenda = '".$qtdAVenda."'
                WHERE id = '".$id."';";
        if (!mysqli_query($link, $SQL)) {
            return $retorno;
        } else {
            return -1;
        }
        
    }
    
    public function atualizarAoComprar($produtor, $link) {
        $qtdAguardando = $produtor->getQuantidadeAguardandoAprovacao() + 1;
        $qtdAVenda = $produtor->getQuantidadeAVenda() - 1;
        $id = $produtor->getId();
        $produtor->setQuantidadeAVenda($qtdAVenda);
        $produtor->setQuantidadeAguardandoAprovacao($qtdAguardando);
        $SQL = "UPDATE produtor SET
                quantidadeAVenda = '".$qtdAVenda."',
                quantidadeAguardandoAprovacao = '".$qtdAguardando."'
                WHERE id = '".$id."';";
                
        if (!mysqli_query($link, $SQL)) {
            return $retorno;
        } else {
            return -1;
        }
        
    }
    
    public function atualizarAoRecusar($produtor, $link) {
        $qtdAguardando = $produtor->getQuantidadeAguardandoAprovacao() - 1;
        $qtdAVenda = $produtor->getQuantidadeAVenda() + 1;
        $id = $produtor->getId();
        $produtor->setQuantidadeAVenda($qtdAVenda);
        $produtor->setQuantidadeAguardandoAprovacao($qtdAguardando);
        $SQL = "UPDATE produtor SET
                quantidadeAVenda = '".$qtdAVenda."',
                quantidadeAguardandoAprovacao = '".$qtdAguardando."'
                WHERE id = '".$id."';";
                
        if (!mysqli_query($link, $SQL)) {
            return $retorno;
        } else {
            return -1;
        }
        
    }
    
    public function atualizarAoConfirmarVenda($produtor, $link) {
        $qtdAguardando = $produtor->getQuantidadeAguardandoAprovacao() - 1;
        $qtdVendida = $produtor->getQuantidadeVendida() + 1;
        $id = $produtor->getId();
        $produtor->setQuantidadeVendida($qtdVendida);
        $produtor->setQuantidadeAguardandoAprovacao($qtdAguardando);
        $SQL = "UPDATE produtor SET
                quantidadeVendidas = '".$qtdVendida."',
                quantidadeAguardandoAprovacao = '".$qtdAguardando."'
                WHERE id = '".$id."';";
                
        if (!mysqli_query($link, $SQL)) {
            return $retorno;
        } else {
            return -1;
        }
        
    }
    
    
    
}

?>
