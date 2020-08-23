<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once("Persistence/Conexao.php");
include_once("Persistence/ClienteDAO.php");
include_once("Model/Cliente.php");
include_once("Control/C_Cliente.php");

final class ConsultaClienteTest extends TestCase {
    public function testConsultaClienteInexistente() {
        $resultadoEsperado = 'Usuario ou senha incorretos!<br><a href="../View/LoginCliente.html"><button type="button">Voltar</button></a>';
        $this->assertEquals($resultadoEsperado, C_Cliente::logar("produtor", "produtor"));
    }
}

?>
