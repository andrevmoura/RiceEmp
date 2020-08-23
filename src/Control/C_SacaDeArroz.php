<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Persistence/Conexao.php");
include_once("../Model/SacaDeArroz.php");
include_once("../Persistence/SacaDeArrozDAO.php");


class C_SacaDeArroz {

    public function cadastraSaca($idProdutor, $tipo, $quantidade, $data, $valorPorSaca) {
        $conexao = new Conexao();
        
        $link = $conexao->getLink();
        
        $saca = new SacaDeArroz(0, $idProdutor, $tipo, $quantidade, $valorPorSaca,$data);

        
        $sacaDao = new SacaDeArrozDAO();
        $sacaDao->cadastrar($saca, $link);
        
        $conexao->fechar();
        
        header("Location: ../View/TelaInicialProdutor.php");
    }
    
    
    public function consultaSaca($tipo) {
        $conexao = new Conexao();
        
        $link = $conexao->getLink();
        
        session_start();
        $idProdutor = $_SESSION["user"];
        $sacaDeArrozDao = new SacaDeArrozDAO();
        $retorno = $sacaDeArrozDao->buscarSacas($idProdutor, $tipo, $link);
        $conexao->fechar();
        return $retorno->fetch_all();
    }
    
    public function consultaSacaPorId($idSaca) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        $sacaDAO = new SacaDeArrozDAO();
        $retorno = $sacaDAO->buscarSaca($idSaca, $link);
        $saca = NULL;
        $rs = $retorno->fetch_all();
        foreach($rs as $r) {
            $saca = new SacaDeArroz($r[0], $r[5], $r[1], $r[3], $r[4], $r[2]);
        }
        $conexao->fechar();
        return $saca;
    }
    
    public function editaSaca($id, $idProdutor, $tipo, $quantidade, $valorPorSaca, $data) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        
        $saca = new SacaDeArroz($id, $idProdutor, $tipo, $quantidade, $valorPorSaca, $data);

        
        $sacaDao = new SacaDeArrozDAO();
        echo $sacaDao->editar($saca, $link);
        
        $conexao->fechar();
        
        header("Location: ../View/TelaInicialProdutor.php");
    }
    
    public function removeSaca($id) {
        $conexao = new Conexao();
        $link = $conexao->getLink();
        
        $sacaDAO = new SacaDeArrozDAO();
        $sacaDAO->excluir($id, $link);
        $conexao->fechar();
        header("Location: ../View/TelaInicialProdutor.php");
    }
    
}
?>
