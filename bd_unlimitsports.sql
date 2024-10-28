-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/10/2024 às 22:43
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `unlimit`
--
CREATE DATABASE IF NOT EXISTS `unlimit` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `unlimit`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `atletas`
--

CREATE TABLE `atletas` (
  `id_atleta` int(11) NOT NULL,
  `nome_atleta` varchar(255) DEFAULT NULL,
  `email_atleta` varchar(255) DEFAULT NULL,
  `cpf_atleta` varchar(255) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `fk_equipe_id_equipe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atletas`
--

INSERT INTO `atletas` (`id_atleta`, `nome_atleta`, `email_atleta`, `cpf_atleta`, `data_nascimento`, `sexo`, `fk_equipe_id_equipe`) VALUES
(1, 'Fulano', 'fulano@email.com', '123456', NULL, NULL, 3),
(2, 'Ciclano', 'ciclano@email.com', '4577657345', NULL, NULL, 3),
(3, 'Maria', 'maria@email.com', '458734857435', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'INICIANTE FEMININO'),
(2, 'INICIANTE MASCULINO'),
(3, 'INTERMEDIARIO FEMININO'),
(4, 'INTERMEDIARIO MASCULINO'),
(5, 'RX MISTO'),
(6, 'RX MASCULINO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `competicao`
--

CREATE TABLE `competicao` (
  `id_competicao` int(11) NOT NULL,
  `nome_competicao` varchar(255) DEFAULT NULL,
  `data_competicao` date DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `ativo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `competicao`
--

INSERT INTO `competicao` (`id_competicao`, `nome_competicao`, `data_competicao`, `data_inicio`, `data_fim`, `ativo`) VALUES
(1, 'UNLIMIT GAMES', '2024-12-14', '2024-10-28', '2024-11-28', b'1'),
(2, 'TESTE GAMES', '2024-10-31', NULL, NULL, b'0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `nome_equipe` varchar(255) DEFAULT NULL,
  `fk_competicao_id_competicao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `nome_equipe`, `fk_competicao_id_competicao`) VALUES
(3, 'HighLander', 1),
(4, 'TESTA DURA', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `formato_equipe`
--

CREATE TABLE `formato_equipe` (
  `id_formato` int(11) NOT NULL,
  `formato` varchar(255) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `formato_equipe`
--

INSERT INTO `formato_equipe` (`id_formato`, `formato`, `qtde`) VALUES
(6, 'TRIO MASCULINO', 3),
(7, 'TRIO FEMININO', 3),
(8, 'TRIO MISTO', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modalidade`
--

CREATE TABLE `modalidade` (
  `id_modalidade` int(11) NOT NULL,
  `fk_categorias_id_categoria` int(11) DEFAULT NULL,
  `fk_competicao_id_competicao` int(11) DEFAULT NULL,
  `fk_formato_equipe_id_formaato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modalidade`
--

INSERT INTO `modalidade` (`id_modalidade`, `fk_categorias_id_categoria`, `fk_competicao_id_competicao`, `fk_formato_equipe_id_formaato`) VALUES
(6, 4, 1, 7),
(7, 3, 1, 8);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atletas`
--
ALTER TABLE `atletas`
  ADD PRIMARY KEY (`id_atleta`),
  ADD KEY `FK_atletas_2` (`fk_equipe_id_equipe`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `competicao`
--
ALTER TABLE `competicao`
  ADD PRIMARY KEY (`id_competicao`);

--
-- Índices de tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`),
  ADD UNIQUE KEY `nome_equipe` (`nome_equipe`),
  ADD KEY `FK_equipe_2` (`fk_competicao_id_competicao`);

--
-- Índices de tabela `formato_equipe`
--
ALTER TABLE `formato_equipe`
  ADD PRIMARY KEY (`id_formato`);

--
-- Índices de tabela `modalidade`
--
ALTER TABLE `modalidade`
  ADD PRIMARY KEY (`id_modalidade`),
  ADD KEY `FK_modalidade_2` (`fk_categorias_id_categoria`),
  ADD KEY `FK_modalidade_3` (`fk_competicao_id_competicao`),
  ADD KEY `FK_modalidade_4` (`fk_formato_equipe_id_formaato`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atletas`
--
ALTER TABLE `atletas`
  MODIFY `id_atleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `competicao`
--
ALTER TABLE `competicao`
  MODIFY `id_competicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `formato_equipe`
--
ALTER TABLE `formato_equipe`
  MODIFY `id_formato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `modalidade`
--
ALTER TABLE `modalidade`
  MODIFY `id_modalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `atletas`
--
ALTER TABLE `atletas`
  ADD CONSTRAINT `FK_atletas_2` FOREIGN KEY (`fk_equipe_id_equipe`) REFERENCES `equipe` (`id_equipe`);

--
-- Restrições para tabelas `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `FK_equipe_2` FOREIGN KEY (`fk_competicao_id_competicao`) REFERENCES `competicao` (`id_competicao`);

--
-- Restrições para tabelas `modalidade`
--
ALTER TABLE `modalidade`
  ADD CONSTRAINT `FK_modalidade_2` FOREIGN KEY (`fk_categorias_id_categoria`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `FK_modalidade_3` FOREIGN KEY (`fk_competicao_id_competicao`) REFERENCES `competicao` (`id_competicao`),
  ADD CONSTRAINT `FK_modalidade_4` FOREIGN KEY (`fk_formato_equipe_id_formaato`) REFERENCES `formato_equipe` (`id_formato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
