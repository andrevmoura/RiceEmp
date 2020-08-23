<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once("Persistence/Conexao.php");
include_once("Model/Produtor.php");
include_once("Persistence/ProdutorDAO.php");
include_once("Control/C_Produtor.php");
final class ConsultaIdTest extends TestCase {
    public function testConsultaProdutorPorId() {
        $this->assertInstanceOf(
            Produtor::class,
            C_Produtor::consultaProdutorPorId(1)
        );
    }   
  
}

?>
