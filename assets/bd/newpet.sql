-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Mar-2020 às 17:26
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `newpet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_agendamento`
--

CREATE TABLE `np_agendamento` (
  `id_agendamento` int(11) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT 0,
  `fk_id_cliente` int(11) DEFAULT 0,
  `fk_di_pet` int(11) DEFAULT 0,
  `data_agendamento` date NOT NULL,
  `hora_agendamento` time NOT NULL DEFAULT '00:00:00',
  `tipo_agendamento` varchar(200) DEFAULT NULL,
  `valor_agendamento` decimal(10,0) DEFAULT NULL,
  `create_agendamento` datetime NOT NULL,
  `alter_agendamento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_cliente`
--

CREATE TABLE `np_cliente` (
  `id_cliente` int(11) NOT NULL,
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
  `alter_cliente` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_fornecedor`
--

CREATE TABLE `np_fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
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
  `alter_fornecedor` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_pagar`
--

CREATE TABLE `np_pagar` (
  `id_apagar` int(11) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT 0,
  `nome_pagar` varchar(300) DEFAULT NULL,
  `tipo_pagar` varchar(50) DEFAULT NULL,
  `qtd_pagar` varchar(9) DEFAULT NULL,
  `valor_pagar` decimal(10,0) DEFAULT NULL,
  `total_pagar` decimal(10,0) DEFAULT NULL,
  `confirmado_pagar` varchar(1) DEFAULT NULL,
  `create_pagar` datetime NOT NULL,
  `alter_pagar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_pedido`
--

CREATE TABLE `np_pedido` (
  `id_pedido` int(11) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT 0,
  `fk_id_fornecedor` int(11) DEFAULT 0,
  `nome_produto_pedido` varchar(500) DEFAULT '0',
  `tipo_produto_pedido` varchar(500) DEFAULT '0',
  `qtd_produto_pedido` decimal(10,0) DEFAULT NULL,
  `valor_produto_pedido` decimal(10,0) DEFAULT NULL,
  `total_pedido` decimal(10,0) DEFAULT NULL,
  `data_pedido` date DEFAULT NULL,
  `create_pedido` datetime DEFAULT NULL,
  `alter_pedido` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_pet`
--

CREATE TABLE `np_pet` (
  `id_pet` int(11) NOT NULL,
  `fk_id_cliente` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL,
  `nome_pet` varchar(200) DEFAULT NULL,
  `tipo_pet` varchar(100) DEFAULT NULL,
  `raca_pet` varchar(100) DEFAULT NULL,
  `nascimento_pet` date DEFAULT NULL,
  `obs_pet` text DEFAULT NULL,
  `create_pet` datetime NOT NULL,
  `alter_pet` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_plano`
--

CREATE TABLE `np_plano` (
  `id_plano` int(11) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT 0,
  `nome_plano` varchar(500) DEFAULT NULL,
  `valor_plano` decimal(10,0) DEFAULT NULL,
  `qtd_plano` varchar(2) DEFAULT NULL,
  `descicao_plano` text DEFAULT NULL,
  `create_plano` datetime NOT NULL,
  `alter_plano` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_produto`
--

CREATE TABLE `np_produto` (
  `id_produto` int(11) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL,
  `codigo_produto` varchar(10) DEFAULT NULL,
  `nome_produto` varchar(300) DEFAULT NULL,
  `tipo_produto` varchar(300) DEFAULT NULL,
  `cod_barra_produto` varchar(300) DEFAULT NULL,
  `especificacao_produto` text DEFAULT NULL,
  `qtd_produto` decimal(10,0) DEFAULT NULL,
  `valor_produto` decimal(10,0) DEFAULT NULL,
  `create_produto` datetime DEFAULT NULL,
  `alter_produto` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_receber`
--

CREATE TABLE `np_receber` (
  `id_receber` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL DEFAULT 0,
  `nome_receber` varchar(300) DEFAULT '0',
  `tipo_receber` varchar(50) DEFAULT '0',
  `qtd_receber` varchar(9) DEFAULT '0',
  `valor_receber` decimal(10,0) DEFAULT NULL,
  `total_receber` decimal(10,0) DEFAULT NULL,
  `confirmado_receber` varchar(1) DEFAULT NULL,
  `create_receber` datetime NOT NULL,
  `alter_receber` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_usuario`
--

CREATE TABLE `np_usuario` (
  `id_usuario` int(11) NOT NULL,
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
  `tipo_usuario` varchar(1) DEFAULT NULL,
  `status_usuario` varchar(1) DEFAULT NULL,
  `img_usuario` varchar(500) DEFAULT NULL,
  `create_usuario` datetime NOT NULL,
  `alter_usuario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_venda`
--

CREATE TABLE `np_venda` (
  `id_venda` int(11) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT 0,
  `tipo_pag_venda` varchar(50) DEFAULT NULL,
  `total_venda` decimal(10,0) DEFAULT NULL,
  `troco_venda` decimal(10,0) DEFAULT NULL,
  `data_venda` date NOT NULL,
  `create_venda` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `np_venda_item`
--

CREATE TABLE `np_venda_item` (
  `id_venda_item` int(11) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT 0,
  `fk_id_venda` int(11) DEFAULT 0,
  `valor_venda_item` decimal(10,0) DEFAULT NULL,
  `qtd_venda_item` varchar(9) DEFAULT NULL,
  `create_venda_item` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `np_agendamento`
--
ALTER TABLE `np_agendamento`
  ADD PRIMARY KEY (`id_agendamento`);

--
-- Índices para tabela `np_cliente`
--
ALTER TABLE `np_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `np_fornecedor`
--
ALTER TABLE `np_fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `np_pagar`
--
ALTER TABLE `np_pagar`
  ADD PRIMARY KEY (`id_apagar`);

--
-- Índices para tabela `np_pedido`
--
ALTER TABLE `np_pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `np_pet`
--
ALTER TABLE `np_pet`
  ADD PRIMARY KEY (`id_pet`);

--
-- Índices para tabela `np_plano`
--
ALTER TABLE `np_plano`
  ADD PRIMARY KEY (`id_plano`);

--
-- Índices para tabela `np_produto`
--
ALTER TABLE `np_produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `np_receber`
--
ALTER TABLE `np_receber`
  ADD PRIMARY KEY (`id_receber`);

--
-- Índices para tabela `np_usuario`
--
ALTER TABLE `np_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `np_venda`
--
ALTER TABLE `np_venda`
  ADD PRIMARY KEY (`id_venda`);

--
-- Índices para tabela `np_venda_item`
--
ALTER TABLE `np_venda_item`
  ADD PRIMARY KEY (`id_venda_item`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `np_agendamento`
--
ALTER TABLE `np_agendamento`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `np_cliente`
--
ALTER TABLE `np_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `np_fornecedor`
--
ALTER TABLE `np_fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `np_pagar`
--
ALTER TABLE `np_pagar`
  MODIFY `id_apagar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `np_pedido`
--
ALTER TABLE `np_pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `np_pet`
--
ALTER TABLE `np_pet`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `np_plano`
--
ALTER TABLE `np_plano`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `np_produto`
--
ALTER TABLE `np_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `np_receber`
--
ALTER TABLE `np_receber`
  MODIFY `id_receber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `np_usuario`
--
ALTER TABLE `np_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `np_venda`
--
ALTER TABLE `np_venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `np_venda_item`
--
ALTER TABLE `np_venda_item`
  MODIFY `id_venda_item` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
