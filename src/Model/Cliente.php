<?php
header('Content-Type: text/html; charset=utf-8');

class Cliente{
    private $id;
    private $nome;
    private $usuario;
    private $senha;


    
    public function Cliente($id, $nome, $usuario, $senha) {

        $this->id = $id;
        $this->nome = $nome;
        $this->usuario = $usuario;
        $this->senha = $senha;  
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
    
}

?>
