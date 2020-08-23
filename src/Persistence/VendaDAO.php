<?php
header('Content-Type: text/html; charset=utf-8');

include_once("../Model/Venda.php");

class VendaDAO {

    function cadastrarVenda($venda, $link) {
        $SQL = "INSERT INTO venda VALUES ('".$venda->getIdSaca()."',
                                            NULL,
                                            '".$venda->getValorPorSaca()."',
                                            0, 
                                            NULL);";

        if (!mysqli_query($link, $SQL)) {
            return "Erro! Pode ser que a saca ja está a venda";
        }

        return "Saca colocada a venda!";
        
    }
    
    
    function buscarVendas($tipo, $link) {
        $SQL = NULL;
        if($tipo == NULL) {
            $SQL = "SELECT * FROM venda v
                    JOIN sacadearroz s
                    ON v.idSaca = s.id
                    WHERE aguardandoAprovacao = '0';
                    ";
        } else {
            $SQL = "SELECT * FROM venda v
                    JOIN sacadearroz s
                    ON v.idSaca = s.id
                    WHERE s.tipo ='".$tipo."'
                          AND aguardandoAprovacao = '0';
                    ";
        }
        
        $retorno = mysqli_query($link, $SQL);
        return $retorno;

    }
    
    function editarAguardandoAprovacao($idSaca, $idCliente, $aguardandoAprovacao, $dataCompra, $link) {
        if($idCliente != NULL) {
            $idCliente = "'".$idCliente."'";
            $dataCompra = "'".$dataCompra."'";
        } else {
            $idCliente = 'NULL';
            $dataCompra = 'NULL';
        }
        $SQL = "UPDATE venda SET idCliente = ".$idCliente.",
                                 aguardandoAprovacao = '".$aguardandoAprovacao."',
                                 dataCompra = ".$dataCompra."
                                 WHERE idSaca = '".$idSaca."';";
        
        if (!mysqli_query($link, $SQL)) {
            return "Saca nao editada";
        }
        return "Saca editada!";
    }
    
    function buscarComprasPendentes($link) {
    
        $SQL = "SELECT v.idSaca, c.nome as cNome, p.nome as pNome, s.valorPorSaca, s.quantidade, v.dataCompra
                FROM venda v
                JOIN sacadearroz s
                ON v.idSaca = s.id
                JOIN cliente c
                ON v.idCliente = c.id
                JOIN produtor p
                ON s.idProdutor = p.id
                WHERE aguardandoAprovacao = '1';
                ";
                
        $retorno = mysqli_query($link, $SQL);
        return $retorno;

    }
    
    function excluirVenda($id, $link) {
        $SQL = "DELETE FROM venda WHERE idSaca ='".$id."';";

        if(!mysqli_query($link, $SQL)){
            return "Erro na exclusão de vendas";
        }
        return "Venda deletado com sucesso!";
        
    }
    
}

?>
