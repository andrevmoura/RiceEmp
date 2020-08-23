<?php
header('Content-Type: text/html; charset=utf-8');
class Produtor{
    private $id;
    private $nome;
    private $usuario;
    private $senha;
    private $quantidadeVendida;
    private $quantidadeAVenda;
    private $quantidadeAguardandoAprovacao;


    
    public function Produtor($id, $nome, $usuario, $senha, 
                            $quantidadeVendida = 0, $quantidadeAVenda = 0,
                            $quantidadeAguardandoAprovacao = 0) {

        $this->id = $id;
        $this->nome = $nome;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->quantidadeVendida = $quantidadeVendida;
        $this->quantidadeAVenda = $quantidadeAVenda;
        $this->quantidadeAguardandoAprovacao = $quantidadeAguardandoAprovacao;

    }

    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getQuantidadeVendida(){
        return $this->quantidadeVendida;
    }
    public function getQuantidadeAVenda(){
        return $this->quantidadeAVenda;
    }
    public function getQuantidadeAguardandoAprovacao(){
        return $this->quantidadeAguardandoAprovacao;
    }
    public function setQuantidadeVendida($quantidadeVendida){
        $this->quantidadeVendida = $quantidadeVendida;
    }
    public function setQuantidadeAVenda($quantidadeAVenda){
        $this->quantidadeAVenda = $quantidadeAVenda;
    }
    public function setQuantidadeAguardandoAprovacao($quantidadeAguardandoAprovacao){
        $this->quantidadeAguardandoAprovacao = $quantidadeAguardandoAprovacao;
    }
    
    
}

?>
