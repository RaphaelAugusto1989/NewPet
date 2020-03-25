-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for newpet
CREATE DATABASE IF NOT EXISTS `newpet` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `newpet`;

-- Dumping structure for table newpet.np_agendamento
CREATE TABLE IF NOT EXISTS `np_agendamento` (
  `id_agendamento` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) DEFAULT 0,
  `fk_id_cliente` int(11) DEFAULT 0,
  `fk_di_pet` int(11) DEFAULT 0,
  `data_agendamento` date NOT NULL,
  `hora_agendamento` time NOT NULL DEFAULT '00:00:00',
  `tipo_agendamento` varchar(200) DEFAULT NULL,
  `valor_agendamento` decimal(10,0) DEFAULT NULL,
  `create_agendamento` datetime NOT NULL,
  `alter_agendamento` datetime NOT NULL,
  PRIMARY KEY (`id_agendamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table newpet.np_cliente
CREATE TABLE IF NOT EXISTS `np_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `nome_cliente` varchar(500) DEFAULT NULL,
  `cpf_cliente` varchar(14) DEFAULT NULL,
  `nascimento_cliente` date NOT NULL,
  `email_cliente` varchar(200) DEFAULT NULL,
  `fixo_cliente` varchar(14) DEFAULT NULL,
  `celular1_cliente` varchar(15) DEFAULT NULL,
  `celular2_cliente` varchar(15) DEFAULT NULL,
  `contato_principal` varchar(1) NOT NULL,
  `cep_cliente` varchar(10) DEFAULT NULL,
  `rua_cliente` varchar(200) DEFAULT NULL,
  `num_cliente` varchar(9) DEFAULT NULL,
  `bairro_cliente` varchar(200) DEFAULT NULL,
  `cidade__cliente` varchar(200) DEFAULT NULL,
  `estado_cliente` varchar(2) DEFAULT NULL,
  `complemento_cliente` varchar(500) DEFAULT NULL,
  `create_cliente` datetime NOT NULL,
  `alter_cliente` datetime NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table newpet.np_fornecedor
CREATE TABLE IF NOT EXISTS `np_fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) DEFAULT NULL,
  `nome_fornecedor` varchar(500) DEFAULT NULL,
  `cpf_fornecedor` varchar(14) DEFAULT NULL,
  `cnpj_fornecedor` varchar(18) DEFAULT NULL,
  `email_fornecedor` varchar(200) DEFAULT NULL,
  `fixo_fornecedor` varchar(14) DEFAULT NULL,
  `celular_fornecedor` varchar(15) DEFAULT NULL,
  `responsavel_fornecedor` varchar(500) DEFAULT NULL,
  `cep_fornecedor` varchar(10) DEFAULT NULL,
  `rua_fornecedor` varchar(200) DEFAULT NULL,
  `num_fornecedor` varchar(9) DEFAULT NULL,
  `bairro_fornecedor` varchar(200) DEFAULT NULL,
  `cidade_fornecedor` varchar(200) DEFAULT NULL,
  `estado_fornecedor` varchar(2) DEFAULT NULL,
  `complemento_fornecedor` text DEFAULT NULL,
  `create_fornecedor` datetime NOT NULL,
  `alter_fornecedor` datetime NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table newpet.np_pagar
CREATE TABLE IF NOT EXISTS `np_pagar` (
  `id_apagar` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) DEFAULT 0,
  `nome_pagar` varchar(300) DEFAULT NULL,
  `tipo_pagar` varchar(50) DEFAULT NULL,
  `qtd_pagar` varchar(9) DEFAULT NULL,
  `valor_pagar` decimal(10,0) DEFAULT NULL,
  `total_pagar` decimal(10,0) DEFAULT NULL,
  `confirmado_pagar` varchar(1) DEFAULT NULL,
  `create_pagar` datetime NOT NULL,
  `alter_pagar` datetime NOT NULL,
  PRIMARY KEY (`id_apagar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table newpet.np_pedido
CREATE TABLE IF NOT EXISTS `np_pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) DEFAULT 0,
  `fk_id_fornecedor` int(11) DEFAULT 0,
  `nome_produto_pedido` varchar(500) DEFAULT '0',
  `tipo_produto_pedido` varchar(500) DEFAULT '0',
  `qtd_produto_pedido` decimal(10,0) DEFAULT NULL,
  `valor_produto_pedido` decimal(10,0) DEFAULT NULL,
  `total_pedido` decimal(10,0) DEFAULT NULL,
  `data_pedido` date DEFAULT NULL,
  `create_pedido` datetime DEFAULT NULL,
  `alter_pedido` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table newpet.np_pet
CREATE TABLE IF NOT EXISTS `np_pet` (
  `id_pet` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_cliente` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL,
  `nome_pet` varchar(200) DEFAULT NULL,
  `tipo_pet` varchar(100) DEFAULT NULL,
  `raca_pet` varchar(100) DEFAULT NULL,
  `nascimento_pet` date DEFAULT NULL,
  `obs_pet` text DEFAULT NULL,
  `create_pet` datetime NOT NULL,
  `alter_pet` datetime NOT NULL,
  PRIMARY KEY (`id_pet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table newpet.np_plano
CREATE TABLE IF NOT EXISTS `np_plano` (
  `id_plano` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) DEFAULT 0,
  `nome_plano` varchar(500) DEFAULT NULL,
  `valor_plano` decimal(10,0) DEFAULT NULL,
  `qtd_plano` varchar(2) DEFAULT NULL,
  `descicao_plano` text DEFAULT NULL,
  `create_plano` datetime NOT NULL,
  `alter_plano` datetime NOT NULL,
  PRIMARY KEY (`id_plano`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table newpet.np_produto
CREATE TABLE IF NOT EXISTS `np_produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) DEFAULT NULL,
  `codigo_produto` varchar(10) DEFAULT NULL,
  `nome_produto` varchar(300) DEFAULT NULL,
  `tipo_produto` varchar(300) DEFAULT NULL,
  `cod_barra_produto` varchar(300) DEFAULT NULL,
  `especificacao_produto` text DEFAULT NULL,
  `qtd_produto` decimal(10,0) DEFAULT NULL,
  `valor_produto` decimal(10,0) DEFAULT NULL,
  `create_produto` datetime DEFAULT NULL,
  `alter_produto` datetime DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table newpet.np_receber
CREATE TABLE IF NOT EXISTS `np_receber` (
  `id_receber` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL DEFAULT 0,
  `nome_receber` varchar(300) DEFAULT '0',
  `tipo_receber` varchar(50) DEFAULT '0',
  `qtd_receber` varchar(9) DEFAULT '0',
  `valor_receber` decimal(10,0) DEFAULT NULL,
  `total_receber` decimal(10,0) DEFAULT NULL,
  `confirmado_receber` varchar(1) DEFAULT NULL,
  `create_receber` datetime NOT NULL,
  `alter_receber` datetime NOT NULL,
  PRIMARY KEY (`id_receber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table newpet.np_usuario
CREATE TABLE IF NOT EXISTS `np_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_cnpj_usuario` varchar(18) NOT NULL,
  `nome_empresa_usuario` varchar(500) DEFAULT NULL,
  `responsavel_empresa_usuario` varchar(500) DEFAULT NULL,
  `nascimento_usuario` date NOT NULL,
  `email_usuario` varchar(200) DEFAULT NULL,
  `fixo_usuario` varchar(14) DEFAULT NULL,
  `celular_usuario` varchar(15) DEFAULT NULL,
  `cep_usuario` varchar(10) DEFAULT NULL,
  `rua_usuario` varchar(200) DEFAULT NULL,
  `num_usuario` varchar(9) DEFAULT NULL,
  `bairro_usuario` varchar(200) DEFAULT NULL,
  `cidade_usuario` varchar(200) DEFAULT NULL,
  `estado_usuario` varchar(2) DEFAULT NULL,
  `complemento_usuario` varchar(500) DEFAULT NULL,
  `login_usuario` varchar(50) DEFAULT NULL,
  `senha_usuario` varchar(100) DEFAULT NULL,
  `tipo_usuario` int(2) DEFAULT NULL,
  `status_usuario` int(2) DEFAULT NULL,
  `img_usuario` varchar(500) DEFAULT NULL,
  `create_usuario` datetime NOT NULL,
  `alter_usuario` datetime NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table newpet.np_venda
CREATE TABLE IF NOT EXISTS `np_venda` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) DEFAULT 0,
  `tipo_pag_venda` varchar(50) DEFAULT NULL,
  `total_venda` decimal(10,0) DEFAULT NULL,
  `troco_venda` decimal(10,0) DEFAULT NULL,
  `data_venda` date NOT NULL,
  `create_venda` datetime NOT NULL,
  PRIMARY KEY (`id_venda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table newpet.np_venda_item
CREATE TABLE IF NOT EXISTS `np_venda_item` (
  `id_venda_item` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) DEFAULT 0,
  `fk_id_venda` int(11) DEFAULT 0,
  `valor_venda_item` decimal(10,0) DEFAULT NULL,
  `qtd_venda_item` varchar(9) DEFAULT NULL,
  `create_venda_item` datetime DEFAULT NULL,
  PRIMARY KEY (`id_venda_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
