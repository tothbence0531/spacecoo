-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 02:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spacecoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `a_id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `answer_given` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `Users_email` varchar(255) DEFAULT NULL,
  `q_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`a_id`, `submission_id`, `answer_given`, `is_correct`, `Users_email`, `q_id`) VALUES
(55, 31, 'Haus', 1, 'teszttanar@gmail.com', 28),
(56, 31, 'Schule', 1, 'teszttanar@gmail.com', 29),
(57, 31, 'Fenster', 1, 'teszttanar@gmail.com', 30),
(58, 32, 'table', 1, 'teszttanar@gmail.com', 25),
(59, 32, 'chair', 1, 'teszttanar@gmail.com', 26),
(60, 32, 'thank you', 1, 'teszttanar@gmail.com', 27),
(61, 33, '', 0, 'teszttanar@gmail.com', 22),
(62, 33, 'Ideiglenes tárolás', 1, 'teszttanar@gmail.com', 23),
(63, 33, 'Monolitikus', 1, 'teszttanar@gmail.com', 24),
(64, 34, '8', 0, 'teszttanar@gmail.com', 1),
(65, 34, '1700', 0, 'teszttanar@gmail.com', 2),
(66, 34, 'V = R/I', 0, 'teszttanar@gmail.com', 3),
(67, 35, '', 0, 'teszttanar@gmail.com', 28),
(68, 35, 'Schule', 1, 'teszttanar@gmail.com', 29),
(69, 35, '', 0, 'teszttanar@gmail.com', 30),
(70, 36, 'Haus', 1, 'teszttanar@gmail.com', 28),
(71, 36, 'Schule', 1, 'teszttanar@gmail.com', 29),
(72, 36, '', 0, 'teszttanar@gmail.com', 30),
(73, 37, '1600', 0, 'teszttanar@gmail.com', 4),
(74, 37, 'Magyar király', 1, 'teszttanar@gmail.com', 5),
(75, 37, 'H3O', 0, 'teszttanar@gmail.com', 6),
(76, 38, '', 0, 'teszttanar@gmail.com', 22),
(77, 38, 'Ideiglenes tárolás', 1, 'teszttanar@gmail.com', 23),
(78, 38, '', 0, 'teszttanar@gmail.com', 24),
(79, 39, 'Bór', 0, 'tesztdiak1@gmail.com', 10),
(80, 39, 'Szív', 0, 'tesztdiak1@gmail.com', 11),
(81, 39, 'NaCl', 1, 'tesztdiak1@gmail.com', 12),
(82, 40, '', 0, 'tesztdiak1@gmail.com', 25),
(83, 40, 'chair', 1, 'tesztdiak1@gmail.com', 26),
(84, 40, '', 0, 'tesztdiak1@gmail.com', 27),
(85, 41, '4', 1, 'tesztdiak1@gmail.com', 1),
(86, 41, '15', 1, 'tesztdiak1@gmail.com', 2),
(87, 41, '5', 1, 'tesztdiak1@gmail.com', 3),
(88, 42, '1700', 0, 'tesztdiak1@gmail.com', 4),
(89, 42, '10 m/s²', 0, 'tesztdiak1@gmail.com', 5),
(90, 42, 'H3O', 0, 'tesztdiak1@gmail.com', 6),
(91, 43, 'HyperText Markup Language', 1, 'tesztdiak1@gmail.com', 22),
(92, 43, '', 0, 'tesztdiak1@gmail.com', 23),
(93, 43, 'Monolitikus', 1, 'tesztdiak1@gmail.com', 24),
(94, 44, '5', 0, 'tesztdiak2@gmail.com', 1),
(95, 44, '1456', 0, 'tesztdiak2@gmail.com', 2),
(96, 44, 'V = R/I', 0, 'tesztdiak2@gmail.com', 3),
(97, 45, '', 0, 'tesztdiak2@gmail.com', 25),
(98, 45, 'chair', 1, 'tesztdiak2@gmail.com', 26),
(99, 45, 'thank you', 1, 'tesztdiak2@gmail.com', 27),
(100, 46, '', 0, 'tesztdiak2@gmail.com', 22),
(101, 46, 'Ideiglenes tárolás', 1, 'tesztdiak2@gmail.com', 23),
(102, 46, 'Monolitikus', 1, 'tesztdiak2@gmail.com', 24),
(103, 47, '1301', 0, 'tesztdiak2@gmail.com', 4),
(104, 47, 'Magyar király', 1, 'tesztdiak2@gmail.com', 5),
(105, 47, '1873', 1, 'tesztdiak2@gmail.com', 6),
(106, 48, '10 m/s²', 0, 'tesztdiak2@gmail.com', 7),
(107, 48, '299,792 km/s', 1, 'tesztdiak2@gmail.com', 8),
(108, 48, 'V = I * R', 1, 'tesztdiak2@gmail.com', 9);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `q_body` text NOT NULL,
  `correct_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `q_body`, `correct_answer`) VALUES
(1, 'Mennyi 2+2?', '4'),
(2, 'Mennyi 5*3?', '15'),
(3, 'Mennyi 10/2?', '5'),
(4, 'Mikor volt a mohácsi csata?', '1526'),
(5, 'Ki volt Szent István?', 'Magyar király'),
(6, 'Melyik évben egyesült Buda és Pest?', '1873'),
(7, 'Mi a gravitációs gyorsulás értéke a Földön?', '9.81 m/s²'),
(8, 'Mi a fény sebessége vákuumban?', '299,792 km/s'),
(9, 'Mi az Ohm törvénye?', 'V = I * R'),
(10, 'Mi a víz képlete?', 'H2O'),
(11, 'Melyik elemnek van a periódusos rendszerben 1-es rendszáma?', 'Hidrogén'),
(12, 'Mi a só képlete?', 'NaCl'),
(13, 'Miből áll a DNS?', 'Nukleotidok'),
(14, 'Melyik szerv felelős a vér szűréséért?', 'Vese'),
(15, 'Mi a fotoszintézis fő terméke?', 'Glükóz'),
(16, 'Ki írta a Toldi-t?', 'Arany János'),
(17, 'Ki a Himnusz szerzője?', 'Kölcsey Ferenc'),
(18, 'Mi Petőfi Sándor legismertebb verse?', 'Nemzeti dal'),
(19, 'Melyik a legnagyobb kontinens?', 'Ázsia'),
(20, 'Melyik óceán a legnagyobb?', 'Csendes-óceán'),
(21, 'Mi Magyarország legmagasabb hegye?', 'Kékes'),
(22, 'Mi a HTML rövidítése?', 'HyperText Markup Language'),
(23, 'Mi a RAM funkciója?', 'Ideiglenes tárolás'),
(24, 'Mi a Linux kerneltípus?', 'Monolitikus'),
(25, 'Mi az angol szó az \"asztal\"-ra?', 'table'),
(26, 'Mi az angol szó a \"szék\"-re?', 'chair'),
(27, 'Hogyan mondod angolul: \"köszönöm\"?', 'thank you'),
(28, 'Mi a német szó a \"ház\"-ra?', 'Haus'),
(29, 'Mi a német szó az \"iskola\"-ra?', 'Schule'),
(30, 'Mi a német szó az \"ablak\"-ra?', 'Fenster');

-- --------------------------------------------------------

--
-- Table structure for table `question_wrong_answers`
--

CREATE TABLE `question_wrong_answers` (
  `q_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `question_wrong_answers`
--

INSERT INTO `question_wrong_answers` (`q_id`, `w_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 3),
(2, 5),
(2, 6),
(3, 1),
(3, 2),
(3, 9),
(3, 12),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(6, 6),
(6, 8),
(6, 15),
(6, 16),
(7, 9),
(7, 10),
(7, 11),
(7, 12),
(8, 9),
(8, 10),
(8, 15),
(8, 25),
(9, 11),
(9, 12),
(9, 16),
(9, 23),
(10, 13),
(10, 14),
(10, 15),
(10, 16),
(11, 14),
(11, 16),
(11, 17),
(11, 18),
(12, 15),
(12, 16),
(12, 19),
(12, 20),
(13, 17),
(13, 18),
(13, 19),
(13, 20),
(14, 21),
(14, 22),
(14, 23),
(14, 24),
(15, 20),
(15, 23),
(15, 25),
(15, 26),
(16, 25),
(16, 26),
(16, 27),
(16, 28),
(17, 27),
(17, 28),
(17, 29),
(17, 30),
(18, 26),
(18, 27),
(18, 29),
(18, 30);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'tanar'),
(2, 'diak');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `tid` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `min_score` int(11) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`tid`, `t_name`, `date`, `min_score`, `owner`) VALUES
(1, 'Matematika Teszt 1', '2024-11-28', 2, 'teszttanar@gmail.com'),
(2, 'Történelem Teszt 1', '2024-11-28', 2, 'teszttanar@gmail.com'),
(3, 'Fizika Teszt 1', '2024-11-28', 2, 'teszttanar@gmail.com'),
(4, 'Kémia Teszt 1', '2024-11-28', 2, 'balazs.istvan@example.com'),
(5, 'Biológia Teszt 1', '2024-11-28', 2, 'kovacs.anna@example.com'),
(6, 'Irodalom Teszt 1', '2024-11-28', 2, 'szabo.marton@example.com'),
(7, 'Földrajz Teszt 1', '2024-11-28', 2, 'toth.zsuzsanna@example.com'),
(8, 'Informatika Teszt 1', '2024-11-28', 2, 'nagy.peter@example.com'),
(9, 'Angol Teszt 1', '2024-11-28', 2, 'kiss.ildiko@example.com'),
(10, 'Német Teszt 1', '2024-11-28', 2, 'molnar.gabor@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE `test_questions` (
  `tid` int(11) NOT NULL,
  `q_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`tid`, `q_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(4, 12),
(5, 13),
(5, 14),
(5, 15),
(6, 16),
(6, 17),
(6, 18),
(7, 19),
(7, 20),
(7, 21),
(8, 22),
(8, 23),
(8, 24),
(9, 25),
(9, 26),
(9, 27),
(10, 28),
(10, 29),
(10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `test_submission`
--

CREATE TABLE `test_submission` (
  `sub_id` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `tid` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `test_submission`
--

INSERT INTO `test_submission` (`sub_id`, `owner`, `tid`, `score`, `date`) VALUES
(31, 'teszttanar@gmail.com', 10, 3, '2024-11-28 21:42:50'),
(32, 'teszttanar@gmail.com', 9, 3, '2024-11-28 21:42:55'),
(33, 'teszttanar@gmail.com', 8, 2, '2024-11-28 21:43:00'),
(34, 'teszttanar@gmail.com', 1, 0, '2024-11-28 21:43:06'),
(35, 'teszttanar@gmail.com', 10, 1, '2024-11-28 21:45:02'),
(36, 'teszttanar@gmail.com', 10, 2, '2024-11-28 21:45:04'),
(37, 'teszttanar@gmail.com', 2, 1, '2024-11-28 21:45:27'),
(38, 'teszttanar@gmail.com', 8, 1, '2024-11-28 21:45:30'),
(39, 'tesztdiak1@gmail.com', 4, 1, '2024-11-28 21:46:21'),
(40, 'tesztdiak1@gmail.com', 9, 1, '2024-11-28 21:46:24'),
(41, 'tesztdiak1@gmail.com', 1, 3, '2024-11-28 21:46:36'),
(42, 'tesztdiak1@gmail.com', 2, 0, '2024-11-28 21:46:45'),
(43, 'tesztdiak1@gmail.com', 8, 2, '2024-11-28 21:46:50'),
(44, 'tesztdiak2@gmail.com', 1, 0, '2024-11-28 21:48:16'),
(45, 'tesztdiak2@gmail.com', 9, 2, '2024-11-28 21:48:19'),
(46, 'tesztdiak2@gmail.com', 8, 2, '2024-11-28 21:48:21'),
(47, 'tesztdiak2@gmail.com', 2, 2, '2024-11-28 21:48:28'),
(48, 'tesztdiak2@gmail.com', 3, 2, '2024-11-28 21:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_logged_in` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `password`, `role_id`, `is_logged_in`) VALUES
('balazs.istvan@example.com', 'Balázs István', '$2y$10$xy6eIjC7zKcG8GZ6xF.J0eQnJxHGX2JYJh8/u7.bVLOpR.UxK1QZ6', 2, 1),
('farkas.katalin@example.com', 'Farkas Katalin', '$2y$10$S9mS/fHZFVO.tOKDFxD.QOo9P9sZpAcKrW8EuZURaV93cDiW2LQnm', 2, 1),
('horvath.gergo@example.com', 'Horváth Gergő', '$2y$10$wHd.T48/2Z7Y4LZhVRB6GOnFS7XsBCeqFOxsjI4XUM6w4LjA4rpeK', 2, 1),
('kiss.ildiko@example.com', 'Kiss Ildikó', '$2y$10$lfU6B7QZP8bzOgsmhStz6OouJ34sDXheD/OE07Pji.TY9syJDf.nq', 2, 1),
('kovacs.anna@example.com', 'Kovács Anna', '$2y$10$fzJ2nEFV6.SLcbUXuJl/.OPLBHFk9Pqx1bwBc.b4yhv7hjrcnLO76', 2, 1),
('molnar.gabor@example.com', 'Molnár Gábor', '$2y$10$4sC36UEIQM21KM3t8Ns5geZiw6g5sEy.98XY09LwOtZ2sFTz2pR5C', 1, 1),
('nagy.peter@example.com', 'Nagy Péter', '$2y$10$QwF0sHhnboXmrLoZ2pBuOugOaJ1OuGqAPv38Vym6kU69DEQjkN7eG', 1, 1),
('szabo.marton@example.com', 'Szabó Márton', '$2y$10$47cEV9wrMNDrAzzPTB1BeO3AKj1wswMyB8KzpCPE4FxgXkQQkUsJK', 2, 1),
('tesztdiak1@gmail.com', 'Teszt Diák', '$2y$10$0ztCX3JslfxPfcVmrVOwIextR5ghZTeYLeYb1vL2qP8uDi4myPStK', 2, 1),
('tesztdiak2@gmail.com', 'Teszt Diák', '$2y$10$eoNV4ebzun7MGnBvZJctteek8W/RgBX4CwpAzRhEQOA6O2W4zzjPi', 2, 0),
('teszttanar@gmail.com', 'Teszt Tanár', '$2y$10$mShA66ao5Fyx0faf.Gc4h.ah4Y9hJoNY5xLDZ7/ST2TvUZihNMTUu', 1, 0),
('toth.zsuzsanna@example.com', 'Tóth Zsuzsanna', '$2y$10$V8J6jKDZJv3zMUVpU8uHCuXwGb8PQVq5K8czYa.Lr20ztXsOhO4E.', 2, 1),
('vegh.nora@example.com', 'Végh Nóra', '$2y$10$3pG5LK6nz0VAbCLbJRE/K.TP5k2DN6jFEV4hrFq7pb2KpYmMIzZOi', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wrong_answers`
--

CREATE TABLE `wrong_answers` (
  `w_id` int(11) NOT NULL,
  `wrong_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `wrong_answers`
--

INSERT INTO `wrong_answers` (`w_id`, `wrong_answer`) VALUES
(1, '3'),
(2, '5'),
(3, '6'),
(4, '8'),
(5, '1456'),
(6, '1700'),
(7, '1301'),
(8, '1600'),
(9, '10 m/s²'),
(10, '8.5 m/s²'),
(11, '7 m/s²'),
(12, 'V = R/I'),
(13, 'CO2'),
(14, 'O2'),
(15, 'H3O'),
(16, 'Bór'),
(17, 'Fehérjék'),
(18, 'Szív'),
(19, 'O2'),
(20, 'Európa'),
(21, 'Atlanti-óceán'),
(22, 'Mecsek'),
(23, 'HyperText Machine Language'),
(24, 'Fizikai tárhely'),
(25, 'Mikrokernel'),
(26, 'desk'),
(27, 'couch'),
(28, 'door'),
(29, 'Hausaufgabe'),
(30, 'Lehrer'),
(31, 'Balkon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `answers_ibfk_1` (`Users_email`),
  ADD KEY `answers_ibfk_2` (`q_id`),
  ADD KEY `answers_ibfk_3` (`submission_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `question_wrong_answers`
--
ALTER TABLE `question_wrong_answers`
  ADD PRIMARY KEY (`q_id`,`w_id`),
  ADD KEY `question_wrong_answers_ibfk_2` (`w_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `tests_ibfk_1` (`owner`);

--
-- Indexes for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD PRIMARY KEY (`tid`,`q_id`),
  ADD KEY `test_questions_ibfk_2` (`q_id`);

--
-- Indexes for table `test_submission`
--
ALTER TABLE `test_submission`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `owner` (`owner`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD KEY `users_ibfk_1` (`role_id`);

--
-- Indexes for table `wrong_answers`
--
ALTER TABLE `wrong_answers`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `test_submission`
--
ALTER TABLE `test_submission`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `wrong_answers`
--
ALTER TABLE `wrong_answers`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`Users_email`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_3` FOREIGN KEY (`submission_id`) REFERENCES `test_submission` (`sub_id`) ON DELETE CASCADE;

--
-- Constraints for table `question_wrong_answers`
--
ALTER TABLE `question_wrong_answers`
  ADD CONSTRAINT `question_wrong_answers_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_wrong_answers_ibfk_2` FOREIGN KEY (`w_id`) REFERENCES `wrong_answers` (`w_id`);

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD CONSTRAINT `test_questions_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tests` (`tid`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_questions_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`) ON DELETE CASCADE;

--
-- Constraints for table `test_submission`
--
ALTER TABLE `test_submission`
  ADD CONSTRAINT `test_submission_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_submission_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `tests` (`tid`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
