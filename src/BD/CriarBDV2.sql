SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riceEmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `usuario`, `senha`) VALUES
(19, 'c', 'c', 'c'),
(20, 'cliente', 'cliente', 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `gerente`
--

CREATE TABLE `gerente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gerente`
--

INSERT INTO `gerente` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'c', 'c', 'c'),
(2, 'g', 'g', 'g'),
(3, 'gerente', 'gerente', 'gerente');

-- --------------------------------------------------------

--
-- Table structure for table `produtor`
--

CREATE TABLE `produtor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `quantidadeVendidas` int(11) NOT NULL,
  `quantidadeAVenda` int(11) NOT NULL,
  `quantidadeAguardandoAprovacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produtor`
--

INSERT INTO `produtor` (`id`, `nome`, `usuario`, `senha`, `quantidadeVendidas`, `quantidadeAVenda`, `quantidadeAguardandoAprovacao`) VALUES
(1, 'p', 'p', 'p', 0, 0, 0),
(2, 'p1', 'p1', 'p1', 0, 0, 0),
(3, 'p2', 'p2', '12', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sacadearroz`
--

CREATE TABLE `sacadearroz` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `dataArmazenamento` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorPorSaca` float NOT NULL,
  `idProdutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sacadearroz`
--

INSERT INTO `sacadearroz` (`id`, `tipo`, `dataArmazenamento`, `quantidade`, `valorPorSaca`, `idProdutor`) VALUES
(1, 'Integral', '2019-09-09', 900, 12, 1),
(2, 'Branco', '2020-03-05', 11, 10, 1),
(3, 'Nao sei', '2020-03-08', 1221, 32, 2);


-- --------------------------------------------------------

--
-- Table structure for table `venda`
--

CREATE TABLE `venda` (
  `idSaca` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `valorPorSaca` float NOT NULL,
  `aguardandoAprovacao` tinyint(1) NOT NULL,
  `dataCompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venda`
--

INSERT INTO `venda` (`idSaca`, `idCliente`, `valorPorSaca`, `aguardandoAprovacao`, `dataCompra`) VALUES
(1, NULL, 45, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `produtor`
--
ALTER TABLE `produtor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `sacadearroz`
--
ALTER TABLE `sacadearroz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProdutor` (`idProdutor`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idSaca`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idCliente_2` (`idCliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `gerente`
--
ALTER TABLE `gerente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produtor`
--
ALTER TABLE `produtor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `sacadearroz`
--
ALTER TABLE `sacadearroz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `idSaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sacadearroz`
--
ALTER TABLE `sacadearroz`
  ADD CONSTRAINT `idProdutor` FOREIGN KEY (`idProdutor`) REFERENCES `produtor` (`id`);

--
-- Constraints for table `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `Venda_ibfk_1` FOREIGN KEY (`idSaca`) REFERENCES `sacadearroz` (`id`),
  ADD CONSTRAINT `Venda_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
