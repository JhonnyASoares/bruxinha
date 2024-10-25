-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 25/10/2024 às 12:09
-- Versão do servidor: 8.0.30
-- Versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bruxinha`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `fichas`
--

CREATE TABLE `fichas` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` tinyint(1) DEFAULT NULL,
  `etinia` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origem` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `antecedentes` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classe` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arcana` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `implemento` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vida` int DEFAULT NULL,
  `equilibrio` int DEFAULT NULL,
  `vital` int DEFAULT NULL,
  `cognicao` int DEFAULT NULL,
  `compreensao` int DEFAULT NULL,
  `perscicacia` int DEFAULT NULL,
  `charme` int DEFAULT NULL,
  `vitalidade` int DEFAULT NULL,
  `carga` int DEFAULT NULL,
  `resistencia` int DEFAULT NULL,
  `intuicao` int DEFAULT NULL,
  `logica` int DEFAULT NULL,
  `ampli_cog` int DEFAULT NULL,
  `conhecimento` int DEFAULT NULL,
  `diplomacia` int DEFAULT NULL,
  `ampli_comp` int DEFAULT NULL,
  `mobilidade` int DEFAULT NULL,
  `agilidade` int DEFAULT NULL,
  `ampli_persp` int DEFAULT NULL,
  `carisma` int DEFAULT NULL,
  `coercao` int DEFAULT NULL,
  `criatividade` int DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `fichas`
--

INSERT INTO `fichas` (`id`, `name`, `genero`, `etinia`, `origem`, `antecedentes`, `classe`, `arcana`, `implemento`, `vida`, `equilibrio`, `vital`, `cognicao`, `compreensao`, `perscicacia`, `charme`, `vitalidade`, `carga`, `resistencia`, `intuicao`, `logica`, `ampli_cog`, `conhecimento`, `diplomacia`, `ampli_comp`, `mobilidade`, `agilidade`, `ampli_persp`, `carisma`, `coercao`, `criatividade`, `user_id`) VALUES
(1, 'Soldado galatico', 1, 'Nigga nunca', 'Gostoso', 'Criminais', 'Foda', 'Superior', 'Monetario 2', 500, 200, 1, 2, 3, 4, 5, 3, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 1),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fichas_itens`
--

CREATE TABLE `fichas_itens` (
  `id` int NOT NULL,
  `item_slot` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtd` int DEFAULT NULL,
  `peso` int DEFAULT NULL,
  `ficha_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `fichas_itens`
--

INSERT INTO `fichas_itens` (`id`, `item_slot`, `name`, `qtd`, `peso`, `ficha_id`) VALUES
(1, 1, 'item 1', 2, 23, 1),
(2, 2, 'item 2', 33, 3, 1),
(3, 3, '', 0, 0, 1),
(4, 4, '', 0, 0, 1),
(5, 5, '', 0, 0, 1),
(6, 6, '', 0, 0, 1),
(7, 7, '', 0, 0, 1),
(8, 8, '', 0, 0, 1),
(9, 9, '', 0, 0, 1),
(10, 10, '', 0, 0, 1),
(11, 11, '', 0, 0, 1),
(12, 12, '', 0, 0, 1),
(13, 13, '', 0, 0, 1),
(14, 14, '', 0, 0, 1),
(15, 15, '', 0, 0, 1),
(16, 16, '', 0, 0, 1),
(17, 17, '', 0, 0, 1),
(18, 18, '', 0, 0, 1),
(19, 1, NULL, NULL, NULL, 2),
(20, 2, NULL, NULL, NULL, 2),
(21, 3, NULL, NULL, NULL, 2),
(22, 4, NULL, NULL, NULL, 2),
(23, 5, NULL, NULL, NULL, 2),
(24, 6, NULL, NULL, NULL, 2),
(25, 7, NULL, NULL, NULL, 2),
(26, 8, NULL, NULL, NULL, 2),
(27, 9, NULL, NULL, NULL, 2),
(28, 10, NULL, NULL, NULL, 2),
(29, 11, NULL, NULL, NULL, 2),
(30, 12, NULL, NULL, NULL, 2),
(31, 13, NULL, NULL, NULL, 2),
(32, 14, NULL, NULL, NULL, 2),
(33, 15, NULL, NULL, NULL, 2),
(34, 16, NULL, NULL, NULL, 2),
(35, 17, NULL, NULL, NULL, 2),
(36, 18, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fichas_perks_link`
--

CREATE TABLE `fichas_perks_link` (
  `id` int NOT NULL,
  `perk_slot` int NOT NULL,
  `perk_id` int DEFAULT NULL,
  `ficha_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `fichas_perks_link`
--

INSERT INTO `fichas_perks_link` (`id`, `perk_slot`, `perk_id`, `ficha_id`) VALUES
(1, 1, 3, 1),
(2, 2, 4, 1),
(3, 3, 1, 1),
(4, 4, 7, 1),
(5, 5, 5, 1),
(6, 6, 2, 1),
(7, 7, NULL, 1),
(8, 8, NULL, 1),
(9, 9, NULL, 1),
(10, 10, NULL, 1),
(11, 11, NULL, 1),
(12, 12, NULL, 1),
(13, 13, NULL, 1),
(14, 14, NULL, 1),
(15, 15, NULL, 1),
(16, 1, NULL, 2),
(17, 2, NULL, 2),
(18, 3, NULL, 2),
(19, 4, NULL, 2),
(20, 5, NULL, 2),
(21, 6, NULL, 2),
(22, 7, NULL, 2),
(23, 8, NULL, 2),
(24, 9, NULL, 2),
(25, 10, NULL, 2),
(26, 11, NULL, 2),
(27, 12, NULL, 2),
(28, 13, NULL, 2),
(29, 14, NULL, 2),
(30, 15, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `magics`
--

CREATE TABLE `magics` (
  `id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `magic_slot` int NOT NULL,
  `ficha_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `magics`
--

INSERT INTO `magics` (`id`, `description`, `magic_slot`, `ficha_id`) VALUES
(1, 'Magdolaon', 1, 1),
(2, 'Magia 2', 2, 1),
(3, 'Magia 3', 3, 1),
(4, 'Magia 5 ', 4, 1),
(5, 'Magia 5', 5, 1),
(6, NULL, 1, 2),
(7, NULL, 2, 2),
(8, NULL, 3, 2),
(9, NULL, 4, 2),
(10, NULL, 5, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perks`
--

CREATE TABLE `perks` (
  `id` int NOT NULL,
  `code_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `perks`
--

INSERT INTO `perks` (`id`, `code_name`, `name`, `description`) VALUES
(1, 'pecorino', 'Pecorino', 'Você se acostumou a comer todo tipo de carne e plantas, alimentos venenos ou podres não afetam seu sistema imunologico, você também consegue mastigar alimentos mais complicados seus dentes são muito mais resistentes que dentes comuns.'),
(2, 'ensinamento_na_pobreza', 'Ensinamento na pobreza', 'Seu ensinamento na pobreza te ensinou muito sobre trabalhos simples e braçais, qualquer tipo de tarefa simples e mundana se torna mais facil para você, +2 em teste que encaixem na descrição.'),
(3, 'cacador', 'Caçador', 'Você consegue identificar rastro e procurar por animais em um ecosistema, qualquer teste relacionado a caçar uma criatura você recebe um bônus de +2, isso inclui combate e interpretação.'),
(4, 'ensinamento_tribal', 'Ensinamento tribal', 'Você e acostumado a viver em tribos, você entende sobre a maiorias das plantas e sobre a vegetação, ganha +2 relacionado a teste em ambientes selvagens.'),
(5, 'lidar_com_publico', 'Lidar com publico', 'Você esta acostumado a lidar com todo tipo de gente nas mais diversas situações, você ganha +2 em teste de coerção para pessoas que não identifiquem como um alvo hostil ou prejudicial.'),
(6, 'ensinamento_na_mizeria', 'Ensinamento na mizeria', 'Você teve que lider com uma miseria extrema, doenças, fome, sede entre outros problemas, isso deixou seu corpo mais resistente a adversidades você ganha um aumento na vida e equilibrio arcano.'),
(7, 'berco_de_ouro', 'Berço de ouro', 'Você nasceu em uma vida abastada dinheiro pra você quase nunca foi um problema, por conta disso você começã com 10 vezes a quantia inicial para um jogador.'),
(8, 'politico', 'Politico', 'Você e acostumado com a buracria excessiva e diplomacia irregular dos poderosos, ganha +2 em teste de diplomacia relacionados a politica.'),
(9, 'arquiteto', 'Arquiteto', 'Ganhe +2 em teste relacionados a construções e localizações.'),
(10, 'confortavel', 'Confortável', 'Você esta acostumado com uma vida confortavel, você nunca teve grandes problemas, você ganha +2 pontos em um atributo secundario a sua escolha.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `username`) VALUES
(1, 'Soldado'),
(2, 'TESTE');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `fichas_itens`
--
ALTER TABLE `fichas_itens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ficha_id` (`ficha_id`);

--
-- Índices de tabela `fichas_perks_link`
--
ALTER TABLE `fichas_perks_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perk_id` (`perk_id`),
  ADD KEY `ficha_id` (`ficha_id`);

--
-- Índices de tabela `magics`
--
ALTER TABLE `magics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ficha_id` (`ficha_id`);

--
-- Índices de tabela `perks`
--
ALTER TABLE `perks`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fichas_itens`
--
ALTER TABLE `fichas_itens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `fichas_perks_link`
--
ALTER TABLE `fichas_perks_link`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `magics`
--
ALTER TABLE `magics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `perks`
--
ALTER TABLE `perks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `fichas_itens`
--
ALTER TABLE `fichas_itens`
  ADD CONSTRAINT `fichas_itens_ibfk_1` FOREIGN KEY (`ficha_id`) REFERENCES `fichas` (`id`);

--
-- Restrições para tabelas `fichas_perks_link`
--
ALTER TABLE `fichas_perks_link`
  ADD CONSTRAINT `fichas_perks_link_ibfk_1` FOREIGN KEY (`perk_id`) REFERENCES `perks` (`id`),
  ADD CONSTRAINT `fichas_perks_link_ibfk_2` FOREIGN KEY (`ficha_id`) REFERENCES `fichas` (`id`);

--
-- Restrições para tabelas `magics`
--
ALTER TABLE `magics`
  ADD CONSTRAINT `magics_ibfk_1` FOREIGN KEY (`ficha_id`) REFERENCES `fichas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
