<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class ConsultaIdTest extends TestCase {
    public function testConsultaProdutorPorId() {
        $this->assertTrue(
            ProdutorDAO::senhaIgualConfirmaSenha('123', '123')
        );
    }   
  
}

?>
