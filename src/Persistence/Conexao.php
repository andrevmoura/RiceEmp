<?php
header('Content-Type: text/html; charset=utf-8');

class Conexao {
    private $servidor;
    private $usuario;
    private $senha;
    private $bd;
    private $link;
    
    
    public function __construct($servidor = 'localhost', $usuario = 'root', $senha = '', $bd = 'riceemp') {
        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->bd = $bd;
        $this->link = mysqli_connect($this->servidor,
                        $this->usuario,$this->senha,$this->bd);
    
        if(!$this->link) {
            die("conexao falhou");
        }
        
    }
    public function getLink(){
        return $this->link;
    }
    
    public function fechar(){
        mysqli_close($this->link);
    }
}

?>
