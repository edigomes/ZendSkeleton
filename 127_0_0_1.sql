-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Ago-2015 às 05:31
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Database: `cronos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `CAD_cliente`
--

CREATE TABLE IF NOT EXISTS `CAD_cliente` (
  `PK_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `FK_usuario` int(11) DEFAULT NULL,
  `xNome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `xFant` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `CNPJ_CPF` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `xLgr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fone` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nro` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `xBairro` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `cMun` int(11) NOT NULL,
  `UF` int(11) NOT NULL,
  `CEP` int(11) NOT NULL,
  `IE` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dhAniversario` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `CAD_cliente`
--

INSERT INTO `CAD_cliente` (`PK_cliente`, `FK_usuario`, `xNome`, `xFant`, `CNPJ_CPF`, `xLgr`, `fone`, `nro`, `xBairro`, `cMun`, `UF`, `CEP`, `IE`, `dhAniversario`) VALUES
(5, 0, 'EDIMÁRIO GOMES DOS SANTOS', 'EDIMÁRIO', '10987654328', 'RUA FICTÍCIA NÚMERO QUALQUER', '123123123123', '1212', 'RWERWER', 0, 11, 2147483647, '123123123', '2015-01-01 00:00:00'),
(6, 0, 'ADSO MELO DE MENEZES', 'ADSO', '10987654321', 'RUA FICTÍCIA NÚMERO QUALQUER', '123123123123', '1212', 'RWERWER', 0, 12, 0, '123123123', '2015-10-10 00:00:00'),
(7, 0, 'HENRIQUE BARRETO LIMA', 'HENRIQUE', '10987654321', 'RUA FICTÍCIA NÚMERO QUALQUER', '123123123', 'ASDASD', 'ASDASDASD', 0, 21, 2147483647, '123123123', '2015-06-21 22:59:48'),
(8, 0, 'ANTONY MÁRIO GOMES DOS SANTOS', 'ANTONY', '10987654321', 'RUA FICTÍCIA NÚMERO QUALQUER', '123123123', 'ASDASD', 'ASDASDASD', 0, 21, 2147483647, '123123123', '2015-06-21 22:59:54'),
(11, NULL, 'CLIENTE TESTE LTDA', 'UAHEUAHUAHEUHA', '1231231312', 'AUHEUAEHAUEHAUE', '123123123', '123123', '123123', 0, 12, 123123123, '123123123', NULL),
(12, NULL, 'OUTRO CLIENTE TESTE QUE NÃO É O PRIMEIR', 'CLIENTE TESTE', '12312312123', 'RUA QUE NÃO É A MINHA', '51110250', '18', 'PINA', 0, 12, 2147483647, '828282828', NULL),
(13, NULL, 'OUTRO CLIENTE TESTE QUE NÃO É O PRIMEIR', 'CLIENTE TESTE', '12312312123', 'RUA QUE NÃO É A MINHA', '51110250', '18', 'PINA', 0, 12, 2147483647, '828282828', NULL),
(14, NULL, 'ASDASDASDASDSADASDASD', 'ASDASDASDASDASASDASDA', '123123123123', 'ASDASDASDASDASD', '23423423423', '18', 'PINA', 0, 26, 2147483647, '323423423', '2015-06-21 22:47:46'),
(15, NULL, 'ASDASDASDASDSADASDASD', 'ASDASDASDASDASASDASDA', '123123123123', 'ASDASDASDASDASD', '23423423423', '18', 'PINA', 0, 26, 2147483647, '323423423', '2015-06-21 22:47:54'),
(16, NULL, 'ASDASDASDASDSADASDASD', 'ASDASDASDASDASASDASDA', '123123123123', 'ASDASDASDASDASD', '23423423423', '18', 'PINA', 0, 26, 2147483647, '323423423', '2015-01-01 10:20:10'),
(17, NULL, 'AOISDJOIASDJ', 'AISDJOAISDJAS', '128312983128397', 'OISDJOASIDJOI', '23423423423', '81', 'PCAIOSJ', 0, 12, 23424234, '288382939', '2015-01-01 00:00:00'),
(18, NULL, 'ASDASDASDASD', 'ASDASDASD', '123123123123', 'ASDASASASD', '123123123123', '121231', 'ASDSAASD', 0, 12, 12312312, '123123121', NULL),
(19, NULL, 'ASDASDASASDSD', 'ASDASDSD', '12312312323', 'ASDASDASD', '123123123123', '123123123123123', 'DASASDSDSD', 0, 26, 2147483647, '123123121', NULL),
(20, NULL, 'ASDASDASASD', 'ASDASD', '1231211232', 'ASDASDASD', '123123', '123123', '123123', 123123, 22, 123123, '123123', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `CAD_contato_cliente`
--

CREATE TABLE IF NOT EXISTS `CAD_contato_cliente` (
  `PK_contato` int(11) NOT NULL AUTO_INCREMENT,
  `FK_cliente` int(11) NOT NULL,
  `xNome` varchar(60) NOT NULL,
  `fone` varchar(20) NOT NULL,
  PRIMARY KEY (`PK_contato`),
  KEY `FK_cliente` (`FK_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `CAD_contato_cliente`
--

INSERT INTO `CAD_contato_cliente` (`PK_contato`, `FK_cliente`, `xNome`, `fone`) VALUES
(1, 5, 'CONTATO1', '888888888'),
(2, 5, 'CONTATO2', '999999999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `CAD_contato_fornecedor`
--

CREATE TABLE IF NOT EXISTS `CAD_contato_fornecedor` (
  `PK_contato` int(11) NOT NULL AUTO_INCREMENT,
  `FK_fornecedor` int(11) NOT NULL,
  `xNome` varchar(60) NOT NULL,
  `fone` varchar(20) NOT NULL,
  PRIMARY KEY (`PK_contato`),
  KEY `FK_cliente` (`FK_fornecedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `CAD_contato_fornecedor`
--

INSERT INTO `CAD_contato_fornecedor` (`PK_contato`, `FK_fornecedor`, `xNome`, `fone`) VALUES
(1, 1, 'aeaeae e', '8185785395'),
(2, 1, 'antonys', '8188658550'),
(3, 2, 'EU', '999999999'),
(4, 1, 'teste', '12341234'),
(5, 2, 'teste2', '2123123'),
(6, 1, 'teste', '88526222'),
(7, 3, 'contato', '123123123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `CAD_empresa`
--

CREATE TABLE IF NOT EXISTS `CAD_empresa` (
  `PK_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `FK_usuario` int(11) DEFAULT NULL,
  `xNome` varchar(255) NOT NULL,
  `xFant` varchar(60) NOT NULL,
  `CNPJ_CPF` varchar(255) NOT NULL,
  `xLgr` varchar(255) NOT NULL,
  `fone` varchar(60) NOT NULL,
  `nro` varchar(60) NOT NULL,
  `xBairro` varchar(60) NOT NULL,
  `cMun` int(11) NOT NULL,
  `UF` int(2) NOT NULL,
  `CEP` int(11) NOT NULL,
  `IE` varchar(9) DEFAULT NULL,
  `CRT` int(1) NOT NULL,
  PRIMARY KEY (`PK_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `CAD_fornecedor`
--

CREATE TABLE IF NOT EXISTS `CAD_fornecedor` (
  `PK_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `FK_usuario` int(11) DEFAULT NULL,
  `xNome` varchar(255) NOT NULL,
  `xFant` varchar(60) NOT NULL,
  `CNPJ_CPF` varchar(255) NOT NULL,
  `xLgr` varchar(255) NOT NULL,
  `fone` varchar(60) NOT NULL,
  `nro` varchar(60) NOT NULL,
  `xBairro` varchar(60) NOT NULL,
  `cMun` int(11) NOT NULL,
  `UF` int(2) NOT NULL,
  `CEP` int(11) NOT NULL,
  `IE` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`PK_fornecedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `CAD_fornecedor`
--

INSERT INTO `CAD_fornecedor` (`PK_fornecedor`, `FK_usuario`, `xNome`, `xFant`, `CNPJ_CPF`, `xLgr`, `fone`, `nro`, `xBairro`, `cMun`, `UF`, `CEP`, `IE`) VALUES
(1, 1, 'MEU FORNECEDOR TESTE LTDA', 'MEU FORNECEDOR', '88277233774', 'ADASD', '123123', '123123', 'ASASD', 11123, 26, 12313123, '123123123'),
(2, NULL, 'FORNECEDOR DE MATERIAIS', 'ASDASDASD', '11552555322', 'ASDASAD', '12313123', '123123', 'ASDASASD', 0, 12, 12312312, '12313123'),
(3, NULL, 'ACONNOS TECNOLOGIA EIRELLI', 'ASDASD', '12312123123', 'ASDASDASD', '12312312312', '23434', 'ASDASD', 0, 22, 232342343, '231231123'),
(4, NULL, 'VOLS DESIGN E CRIAÇÃO LTDA', 'VOLS', '12312312322', 'ASDSDASDASD', '123123123', '123123', '123123', 0, 12, 123123123, '12312313'),
(5, NULL, 'ASDASD', 'ASDASD', '123123123', 'ASDASDASD', 'ASDASD', 'ASdASD', 'ASdASD', 0, 0, 0, 'ASDASD');

-- --------------------------------------------------------

--
-- Estrutura da tabela `COM_venda`
--

CREATE TABLE IF NOT EXISTS `COM_venda` (
  `PK_venda` int(11) NOT NULL AUTO_INCREMENT,
  `FK_cliente` int(11) DEFAULT NULL,
  `dhAbertura` datetime DEFAULT NULL,
  `dhFechamento` timestamp NULL DEFAULT NULL,
  `dhCancelamento` timestamp NULL DEFAULT NULL,
  `dhUltAlteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PK_venda`),
  KEY `IDX_2AA85EAFC99F277A` (`FK_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `COM_venda`
--

INSERT INTO `COM_venda` (`PK_venda`, `FK_cliente`, `dhAbertura`, `dhFechamento`, `dhCancelamento`, `dhUltAlteracao`) VALUES
(1, 5, '2015-08-10 23:02:16', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `COM_venda_item`
--

CREATE TABLE IF NOT EXISTS `COM_venda_item` (
  `PK_venda_item` int(11) NOT NULL AUTO_INCREMENT,
  `FK_item` int(11) DEFAULT NULL,
  `FK_venda` int(11) DEFAULT NULL,
  `qTrib` float(15,3) NOT NULL,
  `vUnTrib` decimal(15,4) NOT NULL,
  `vDesc` decimal(15,4) DEFAULT NULL,
  PRIMARY KEY (`PK_venda_item`),
  KEY `COM_venda_item_fk1` (`FK_item`),
  KEY `COM_venda_item_fk2` (`FK_venda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `COM_venda_item`
--

INSERT INTO `COM_venda_item` (`PK_venda_item`, `FK_item`, `FK_venda`, `qTrib`, `vUnTrib`, `vDesc`) VALUES
(1, 3, 1, 2.100, '15.5000', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `EST_entrada`
--

CREATE TABLE IF NOT EXISTS `EST_entrada` (
  `PK_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `FK_fornecedor` int(11) DEFAULT NULL,
  `nDoc` varchar(50) DEFAULT NULL,
  `dhAbertura` datetime NOT NULL,
  `dhFinalizacao` timestamp NULL DEFAULT NULL,
  `dhCancelamento` timestamp NULL DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PK_entrada`),
  KEY `FK_fornecedor` (`FK_fornecedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Extraindo dados da tabela `EST_entrada`
--

INSERT INTO `EST_entrada` (`PK_entrada`, `FK_fornecedor`, `nDoc`, `dhAbertura`, `dhFinalizacao`, `dhCancelamento`, `obs`) VALUES
(103, 3, NULL, '2015-08-10 03:53:15', '2015-08-10 02:16:52', '2015-08-10 02:16:52', NULL),
(104, 4, NULL, '2015-08-10 04:18:02', '2015-08-10 07:19:07', '2015-08-10 07:21:24', NULL),
(105, 2, NULL, '2015-08-10 04:34:05', '2015-08-10 07:45:57', '2015-08-10 07:46:47', NULL),
(106, 4, NULL, '2015-08-10 04:54:14', '2015-08-10 07:58:40', NULL, NULL),
(107, 1, NULL, '2015-08-10 06:25:59', '2015-08-10 04:26:49', '2015-08-10 04:26:49', NULL),
(108, 4, NULL, '2015-08-10 07:12:50', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `EST_entrada_item`
--

CREATE TABLE IF NOT EXISTS `EST_entrada_item` (
  `PK_entrada_item` int(11) NOT NULL AUTO_INCREMENT,
  `FK_entrada` int(11) DEFAULT NULL,
  `FK_item` int(11) DEFAULT NULL,
  `qTrib` float(15,3) NOT NULL,
  `vUnTrib` float(15,4) NOT NULL,
  PRIMARY KEY (`PK_entrada_item`),
  KEY `FK_produto` (`FK_item`),
  KEY `FK_producao` (`FK_entrada`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `EST_entrada_item`
--

INSERT INTO `EST_entrada_item` (`PK_entrada_item`, `FK_entrada`, `FK_item`, `qTrib`, `vUnTrib`) VALUES
(1, 103, 3, 100.000, 1.0000),
(2, 104, 3, 25.000, 2.0000),
(3, 105, 1, 1.544, 2.5000),
(4, 106, 1, 1500.000, 2.5000),
(5, 106, 3, 50.000, 14.9000),
(6, 108, 3, 1.350, 14.5000),
(7, 108, 1, 2.000, 15.9000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `EST_fabricante`
--

CREATE TABLE IF NOT EXISTS `EST_fabricante` (
  `PK_fabricante` int(11) NOT NULL AUTO_INCREMENT,
  `xFabricante` varchar(60) NOT NULL,
  PRIMARY KEY (`PK_fabricante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `EST_grupo`
--

CREATE TABLE IF NOT EXISTS `EST_grupo` (
  `PK_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `xGrupo` varchar(60) NOT NULL,
  PRIMARY KEY (`PK_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `EST_item`
--

CREATE TABLE IF NOT EXISTS `EST_item` (
  `PK_item` int(11) NOT NULL AUTO_INCREMENT,
  `FK_grupo` int(11) DEFAULT NULL,
  `FK_unidade` int(11) DEFAULT NULL,
  `FK_fabricante` int(11) DEFAULT NULL,
  `dhCadastro` datetime NOT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `xProd` varchar(120) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `NCM` varchar(255) NOT NULL,
  `cEAN` bigint(20) DEFAULT NULL,
  `origem` int(3) NOT NULL,
  `quantidade` float(15,3) NOT NULL,
  `bloqueado` tinyint(1) DEFAULT NULL,
  `natureza` varchar(3) NOT NULL,
  `CST` varchar(2) NOT NULL,
  `custo` float(15,4) NOT NULL,
  `pIPI` float(15,2) DEFAULT NULL,
  `pST` float(15,2) DEFAULT NULL,
  `pDifAliquota` float(15,2) DEFAULT NULL,
  `vFrete` double DEFAULT NULL,
  `pDescMaximo` float(15,2) DEFAULT NULL,
  `vUnTrib` float(15,4) NOT NULL,
  `CSFPISCOFINS` varchar(2) NOT NULL,
  `pCOFINS` double DEFAULT NULL,
  `pPIS` double DEFAULT NULL,
  PRIMARY KEY (`PK_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `EST_item`
--

INSERT INTO `EST_item` (`PK_item`, `FK_grupo`, `FK_unidade`, `FK_fabricante`, `dhCadastro`, `codigo`, `xProd`, `marca`, `NCM`, `cEAN`, `origem`, `quantidade`, `bloqueado`, `natureza`, `CST`, `custo`, `pIPI`, `pST`, `pDifAliquota`, `vFrete`, `pDescMaximo`, `vUnTrib`, `CSFPISCOFINS`, `pCOFINS`, `pPIS`) VALUES
(1, 1, 1, 1, '2015-06-28 00:26:24', '1234', 'CARNE DE SOL', 'AXLUS', '02102000', NULL, 0, 1500.000, NULL, '0', '00', 2.5000, 0.00, 0.00, 0.00, 0, 15.00, 2.9800, '06', 0, 0),
(2, 0, 0, 0, '2015-06-28 03:10:59', '5673', 'OUTRO PRODUTO TESTE SISTEMA', 'ASDASDA', '00123123', 7892888288833, 0, 0.000, NULL, '0', '10', 4.5000, 0.00, 123123.00, 0.00, 0, 1.00, 7.9900, '03', 3, 5),
(3, NULL, NULL, NULL, '2015-07-15 10:17:21', '7744', 'MOUSE USB LOGITECH', 'TESTE', '02102000', 9999999999999, 1, 50.000, NULL, '0', '00', 1.9900, 0.00, 0.00, 0.00, 0, 0.00, 1.9900, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `EST_unidade`
--

CREATE TABLE IF NOT EXISTS `EST_unidade` (
  `PK_unidade` int(11) NOT NULL AUTO_INCREMENT,
  `xUnidade` varchar(60) NOT NULL,
  PRIMARY KEY (`PK_unidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `content`
--

INSERT INTO `content` (`id`, `content`) VALUES
(1, 'EDIMÁRIO GOMES'),
(2, 'ANTONY MÁRIO'),
(3, 'ADSO MELO'),
(4, 'HENRIQUE BARRETO'),
(5, 'teste');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `COM_venda`
--
ALTER TABLE `COM_venda`
  ADD CONSTRAINT `FK_2AA85EAFC99F277A` FOREIGN KEY (`FK_cliente`) REFERENCES `cad_cliente` (`PK_cliente`);

--
-- Limitadores para a tabela `COM_venda_item`
--
ALTER TABLE `COM_venda_item`
  ADD CONSTRAINT `FK_239BE523320384BB` FOREIGN KEY (`FK_venda`) REFERENCES `com_venda` (`PK_venda`),
  ADD CONSTRAINT `FK_239BE5235B34C78A` FOREIGN KEY (`FK_item`) REFERENCES `est_item` (`PK_item`);

--
-- Limitadores para a tabela `EST_entrada`
--
ALTER TABLE `EST_entrada`
  ADD CONSTRAINT `est_entrada_ibfk_1` FOREIGN KEY (`FK_fornecedor`) REFERENCES `cad_fornecedor` (`PK_fornecedor`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `EST_entrada_item`
--
ALTER TABLE `EST_entrada_item`
  ADD CONSTRAINT `est_entrada_item_ibfk_1` FOREIGN KEY (`FK_entrada`) REFERENCES `est_entrada` (`PK_entrada`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `est_entrada_item_ibfk_2` FOREIGN KEY (`FK_item`) REFERENCES `est_item` (`PK_item`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
