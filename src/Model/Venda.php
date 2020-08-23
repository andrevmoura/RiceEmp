<?php
header('Content-Type: text/html; charset=utf-8');

class Venda{
    private $idSaca;
    private $idCliente;
    private $valorPorSaca;
    private $aguardandoAprovacao;
    private $dataCompra;

    public function Venda($idSaca, $idCliente, $valorPorSaca, $aguardandoAprovacao = 0, $dataCompra) {
        $this->idSaca = $idSaca;
        $this->idCliente = $idCliente;
        $this->valorPorSaca = $valorPorSaca;
        $this->aguardandoAprovacao = $aguardandoAprovacao;
        $this->dataCompra = $dataCompra;
    }

    public function getIdSaca(){
        return $this->idSaca;
    }
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function getValorPorSaca(){
        return $this->valorPorSaca;
    }
    public function getAguardandoAprovacao(){
        return $this->aguardandoAprovacao;
    }
    public function getDataCompra() {
        return $this->dataCompra;
    }
}

?>
