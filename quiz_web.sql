-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 28. bře 2020, 22:58
-- Verze serveru: 10.4.11-MariaDB
-- Verze PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `quiz_web`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(80) COLLATE utf8_czech_ci NOT NULL,
  `option1` char(50) COLLATE utf8_czech_ci NOT NULL,
  `option2` char(50) COLLATE utf8_czech_ci NOT NULL,
  `option3` char(50) COLLATE utf8_czech_ci NOT NULL,
  `correctOptionIndex` int(10) UNSIGNED NOT NULL,
  `test` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `questions`
--

INSERT INTO `questions` (`id`, `title`, `option1`, `option2`, `option3`, `correctOptionIndex`, `test`) VALUES
(1, 'Který tým drží nejvíce titulů CL?', 'Liverpool', 'Real Madrid', 'AC Milan', 2, 1),
(2, 'Za který tým hraje Cristiano Ronaldo?', 'Real Madrid', 'Manchester United', 'Juventus Turín', 3, 1),
(3, 'Který hráč nastřílel za svoji profesionální kariéru nejvíce gólů?', 'Josef Bican', 'Romário', 'Pelé', 1, 1),
(4, 'Který hráč drží první místo za nejdražší přestup?', 'Kylian Mbappé', 'João Félix', 'Neymar', 3, 1),
(5, 'Ktyerý národní tým vyhrál fotbalové mistrovství světa roku 2018?', 'Anglie', 'Chorvatsko', 'Francie', 3, 1),
(6, 'Jak se jmenuje nejvyšší anglická fotbalová liga?', 'Premier League', 'Championship', 'FA Cup', 1, 1),
(7, 'Where did rap superstar Eminem grow up?', 'Detroit', 'Seattle', 'New York', 1, 2),
(8, 'Whose song No Role Modelz was released in September 2014?', 'Drake', 'J. Cole', '2 Chainz', 2, 2),
(9, 'Which Post Malone hit, first released via SoundCloud, resulted in a contract wit', 'White Iverson', 'I Fall Apart', 'Congratulations', 1, 2),
(10, 'Don\'t is the 2015 breakout hit single by which R&B artist?', 'Logic', 'Lil Peep', 'Bryson Tiller', 3, 2),
(11, 'The Drake & Future hit song Jumpman is named after the logo inspired by which fo', 'LeBron James', 'Michael Jordan', 'Kobe Bryant', 2, 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `result` int(10) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `test` int(10) UNSIGNED NOT NULL,
  `completedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `results`
--

INSERT INTO `results` (`id`, `result`, `user`, `test`, `completedAt`) VALUES
(1, 20, 1, 1, '2020-03-28 20:58:54'),
(2, 100, 1, 1, '2020-03-28 21:17:39'),
(3, 100, 43, 1, '2020-03-28 21:38:16'),
(4, 83, 43, 1, '2020-03-28 21:40:22'),
(5, 100, 1, 1, '2020-03-28 21:40:50'),
(6, 50, 47, 1, '2020-03-28 21:45:03'),
(7, 100, 47, 2, '2020-03-28 21:56:14');

-- --------------------------------------------------------

--
-- Struktura tabulky `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(50) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `tests`
--

INSERT INTO `tests` (`id`, `title`) VALUES
(1, 'fotbal'),
(2, 'rap');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` char(35) COLLATE utf8_czech_ci NOT NULL,
  `lastName` char(35) COLLATE utf8_czech_ci NOT NULL,
  `username` char(50) COLLATE utf8_czech_ci NOT NULL,
  `password` char(255) COLLATE utf8_czech_ci NOT NULL,
  `email` char(70) COLLATE utf8_czech_ci NOT NULL,
  `note` char(255) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `password`, `email`, `note`) VALUES
(1, 'test', 'user', 'username', '$2y$10$zntuT1TSwQTN.NizUcfM7uxPpqRVkwcOm1sSMTT9eTKmOXQ.17Bo.', 'test.user@address.com', ''),
(35, 'Josef', 'Katic', 'Kadic22', '$2y$10$LfSRDRUrUuCyBtsOBweOOOkiHg44v8yiR5Rb.JOnUGejTqfKFZGbq', 'josef.katic@gmail.com', 'Mam rad houby'),
(43, 'tvoje', 'mama', 'tvojemama', '$2y$10$hKD53Nloa2c2MyUaTyjll.jSvCvraCSN7qOfCQjnRh3VKFCvhng0m', 'tvoje@mama.cz', 'ahojda'),
(45, 'kacer', 'donald', 'donald', '$2y$10$wv9Iudr0eTBeFVe4xaFGgu3.196ss2y6.ikOG6xU1DZpYqbc3M3/G', 'kacer.donald@gmail.com', 'Kacer Donald'),
(47, 'Ahojda', 'Jak', 'se', '$2y$10$37yaodHL0wq8vt3SpEvTVeeCVaQYdYs4TGrCCH1GsBW8tHY8h414C', 'mam@sespatne.eu', '');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TestQuestion` (`test`);

--
-- Klíče pro tabulku `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserResult` (`user`),
  ADD KEY `FK_TestResult` (`test`);

--
-- Klíče pro tabulku `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pro tabulku `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK_TestQuestion` FOREIGN KEY (`test`) REFERENCES `tests` (`id`);

--
-- Omezení pro tabulku `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `FK_TestResult` FOREIGN KEY (`test`) REFERENCES `tests` (`id`),
  ADD CONSTRAINT `FK_UserResult` FOREIGN KEY (`user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
