-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2018 às 05:00
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anamnese`
--

CREATE TABLE `anamnese` (
  `id_anamnese` int(11) NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `fuma` varchar(3) NOT NULL,
  `bebe` varchar(3) NOT NULL,
  `hstrabalho` varchar(5) NOT NULL,
  `faz_exercicio` varchar(3) NOT NULL,
  `exercicio_qual` varchar(30) DEFAULT NULL,
  `horas_sono` varchar(5) NOT NULL,
  `problema_familia` varchar(3) NOT NULL,
  `familia_qual` varchar(30) DEFAULT NULL,
  `doenca` varchar(3) NOT NULL,
  `doenca_qual` varchar(30) DEFAULT NULL,
  `cirurgia` varchar(3) NOT NULL,
  `cirurgia_qual` varchar(30) DEFAULT NULL,
  `medicamento` varchar(3) NOT NULL,
  `medi_qual` varchar(30) DEFAULT NULL,
  `medi_quant` varchar(30) DEFAULT NULL,
  `estresse` varchar(20) NOT NULL,
  `dor` varchar(3) NOT NULL,
  `dor_qual` varchar(30) DEFAULT NULL,
  `dor_local` varchar(30) DEFAULT NULL,
  `alergia` varchar(3) NOT NULL,
  `alergia_qual` varchar(30) DEFAULT NULL,
  `restri_exerc` varchar(3) NOT NULL,
  `restric_qual` varchar(30) DEFAULT NULL,
  `objetivo` varchar(100) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Extraindo dados da tabela `anamnese`
--

INSERT INTO `anamnese` (`id_anamnese`, `peso`, `altura`, `fuma`, `bebe`, `hstrabalho`, `faz_exercicio`, `exercicio_qual`, `horas_sono`, `problema_familia`, `familia_qual`, `doenca`, `doenca_qual`, `cirurgia`, `cirurgia_qual`, `medicamento`, `medi_qual`, `medi_quant`, `estresse`, `dor`, `dor_qual`, `dor_local`, `alergia`, `alergia_qual`, `restri_exerc`, `restric_qual`, `objetivo`, `id_cliente`) VALUES
(1, 4550, 170, 'nã', 'nã', '8h', 'sim', 'zumba', '4hrs', 'sim', 'avós', 'nã', '', 'nã', '', 'sim', 'dor muscular', '3', 'elevado', 'nã', '', '', 'sim', 'renite', 'nã', '', ' ,  , TerapÃªutico,  ,  ,  ,  ', 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(5) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(14) NOT NULL,
  `data_nas` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `data_cadastro` date NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `rg`, `data_nas`, `sexo`, `endereco`, `email`, `telefone`, `data_cadastro`, `senha`) VALUES
(19, 'Miguel Leonardo João Peixoto', '191.535.069-79', '16.121.683-3', '1991-03-05', 'M', 'Quadra 12 MR 5, 505 - Setor Oeste', 'miguelleonardojoaopeixoto@hotmail.com', '44-99819-1942', '2018-11-18', '123'),
(20, 'Pedro Henrique Ian Tomás Araújo', '687.932.166-61', '13.762.926-6', '1985-01-01', 'M', 'Alameda Liberal, 704 - Cristo Redentor', 'pedrohenriqueiantomasaraujo@outlook.com.br', '35-98330-9187', '2018-11-18', '123'),
(21, 'Francisco Iago Igor Campos', '086.751.735-20', '17.221.300-9', '1978-06-20', 'M', 'Rua Heitor Castelo Branco, 42 - Frei Serafim', 'franciscoiagoigorcampos_@gmail.com', '58-98774-7414', '2018-11-18', '123'),
(22, 'Breno Raul Bernardo Dias', '543.754.446-49', '37.056.808-4', '1984-03-07', 'M', 'Avenida Antônio Francisco de Paula Souza, 481 - Paranapiacaba', 'brenoraulbernardodias_@gmai.com', '35-48744-8878', '2018-11-18', '123'),
(23, 'Emanuelly Amanda Ferreira', '399.568.329-01', '50.981.706-3', '1992-03-02', 'F', 'Rua Tereza Liberato Ricardo, 395 - Planta Vera Cruz', 'emanuellyamandaferreira@hotmail.com', '35-98923-0784', '2018-11-18', '123'),
(24, 'Patrícia Elaine Farias', '906.817.075-93', '21.696.420-9', '1999-07-07', 'F', 'Rua Pedro Honorato Amorim, 350 - Centro', 'patriciaelainefarias_@outlook.com.br', '36-99881-5316', '2018-11-18', '123'),
(25, 'Antônia Analu Campos', '829.791.291-43', '19.906.036-8', '2000-01-05', 'F', 'Rua do Jasmim, 742 - Colonial', 'antoniaanalucampos..antoniaanalucampos@gmail.br', '35-99929-1429', '2018-11-18', '123'),
(26, 'Eloá Melissa Laís Gomes', '410.037.604-90', '28.125.072-8', '2001-01-01', 'F', 'Rua São Crispim, 024 - Porto Das Antas', 'eloamelissalaisgomes@gmail.com', '35-99256-2027', '2018-11-18', '123'),
(28, 'Fernanda Beatriz Campos', '291.865.390-00', '32.847.796-5', '1980-09-08', 'F', 'Avenida Uruguai, 505 - Santa Rosa', 'fernandabeatrizcamposs@outlook.com.br', '35-98642-4689', '2018-11-18', '123'),
(29, 'Stefany Catarina Alícia Jesus', '234.428.009-00', '11.560.636-1', '2002-12-07', 'F', 'Vila Carminda Pessoa, 158 - Henrique Jorge', 'stefanycatarinaaliciajesus.s@gmail.com', '35-99457-9235', '2018-11-18', '123'),
(30, 'Vicente Roberto Porto', '508.837.351-13', '16.690.350-4', '1997-12-12', 'M', 'Rua Antônio Pinheiro Galvão, 251 - Buritis', 'vicenterobertoporto-78@gmail.br', '98-54795-3332', '2018-11-18', '123'),
(34, 'Jennie', '123.456.789-85', '97.854.621-4', '1995-02-10', 'F', 'Jardim Azul, 485 - Centro', 'jenniexxx@gmail.com', '48-41841-8484', '2018-11-18', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha`
--

CREATE TABLE `ficha` (
  `id_ficha` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `exercicio` varchar(50) NOT NULL,
  `serie` int(5) DEFAULT NULL,
  `repeticao` int(5) DEFAULT NULL,
  `carga` float DEFAULT NULL,
  `id_professor` int(11) NOT NULL,
  `bloco` int(11) NOT NULL
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `usuario`, `exercicio`, `serie`, `repeticao`, `carga`, `id_professor`, `bloco`) VALUES
(12, 25, 'zumba', 4, 7, 20, 8, 1),
(13, 25, 'musculação', 8, 2, 15, 8, 2),
(14, 25, 'zumba', 1, 2, 12, 8, 3),
(16, 34, 'musculação', 8, 2, 12, 8, 2),
(17, 34, 'zumba', 2, 9, 10, 8, 3),
(18, 34, 'musculação', 4, 7, 20, 8, 1),
(19, 34, 'zumba', 1, 2, 12, 8, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `privilegio` int(1) NOT NULL
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `cpf`, `senha`, `privilegio`) VALUES
(6, '620.706.379-13', '123', 3),
(7, '803.910.057-74', '123', 2),
(8, '908.025.384-79', '123', 2),
(9, '760.803.365-70', '123', 2),
(10, '545.402.113-07', '123', 2),
(11, '191.535.069-79', '123', 1),
(12, '687.932.166-61', '123', 1),
(13, '086.751.735-20', '123', 1),
(14, '543.754.446-49', '123', 1),
(15, '399.568.329-01', '123', 1),
(16, '906.817.075-93', '123', 1),
(17, '829.791.291-43', '123', 1),
(18, '410.037.604-90', '123', 1),
(19, '46.898.137-8', '123', 1),
(20, '291.865.390-00', '123', 1),
(21, '234.428.009-00', '123', 1),
(27, '123.456.789-85', '123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidade`
--

CREATE TABLE `mensalidade` (
  `id_mensalidade` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` float NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Extraindo dados da tabela `mensalidade`
--

INSERT INTO `mensalidade` (`id_mensalidade`, `data`, `valor`, `id_cliente`) VALUES
(1, '2018-11-18', 10, 19),
(2, '2018-11-18', 75.9, 20),
(4, '2018-11-18', 65.9, 21),
(5, '2018-11-18', 85.9, 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(14) NOT NULL,
  `data_nasc` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `cpf`, `rg`, `data_nasc`, `sexo`, `endereco`, `cargo`, `email`, `telefone`, `senha`) VALUES
(7, 'Isabelle Maya Cavalcanti', '803.910.057-74', '45.928.832-5', '1995-10-02', 'F', 'Estrada Dias Martins, 338 - Jardim de Alah', 'Professora de Zumba', 'isabellemayacavalcanti@gmail.com', '68-98223-5419', ''),
(8, 'Louise Betina Alves', '908.025.384-79', '10.692.360-2', '1987-04-05', 'F', 'Quadra 1112 Sul Alameda 7, 545 - Plano Diretor Sul', 'Professora de Aeróbica', 'louisebetinaalves-91@hotmail.com', '89-91291-5058', ''),
(9, 'Edson Henrique Carlos Eduardo Almada', '760.803.365-70', '35.464.009-4', '1984-10-02', 'M', 'Rua Beatriz Rocha, 301 - Carlos Germano Naumann', 'Professor de Musculação', 'edsonhenriquecarlos@hotmail.com', '35-99130-2950', ''),
(10, 'Anderson Bento Teixeira', '545.402.113-07', '39.008.304-5', '1992-10-01', 'M', 'Rua Matias Vieira da Silva,  903 - Santa Esmeralda', 'Professor de Zumba', 'aandersonbentoteixeira@outlook.com.br', '35-99357-9965', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anamnese`
--
ALTER TABLE `anamnese`
  ADD PRIMARY KEY (`id_anamnese`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Indexes for table `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `id_professor` (`id_professor`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Indexes for table `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD PRIMARY KEY (`id_mensalidade`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anamnese`
--
ALTER TABLE `anamnese`
  MODIFY `id_anamnese` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mensalidade`
--
ALTER TABLE `mensalidade`
  MODIFY `id_mensalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `anamnese`
--
ALTER TABLE `anamnese`
  ADD CONSTRAINT `anamnese_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ficha_ibfk_2` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD CONSTRAINT `mensalidade_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
