<?php
header('Content-Type: text/html; charset=utf-8');

class SacaDeArroz{
    private $id;
    private $idProdutor;
    private $tipo;
    private $quantidade;
    private $dataArmazenamento;

    public function SacaDeArroz($id, $idProdutor, $tipo, $quantidade, $valorPorSaca, $dataArmazenamento) {
        $this->id = $id;
        $this->idProdutor = $idProdutor;
        $this->tipo = $tipo;
        $this->quantidade = $quantidade;
        $this->valorPorSaca = $valorPorSaca;
        $this->dataArmazenamento = $dataArmazenamento;
    }

    public function getId(){
        return $this->id;
    }
    public function getIdProdutor(){
        return $this->idProdutor;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function getDataArmazenamento(){
        return $this->dataArmazenamento;
    }
    public function getValorPorSaca() {
        return $this->valorPorSaca;
    }
    
}

?>
