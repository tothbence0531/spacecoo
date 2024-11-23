-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2024 at 07:04 PM
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
  `answer_given` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `Users_email` varchar(255) DEFAULT NULL,
  `q_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

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
(16, 'HIHIIHE?', 'nem'),
(17, 'Krézi', 'I was krézi wanz'),
(18, 'Nem', 'Igen'),
(19, 'megin?', 'mit ma?');

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
(16, 37),
(17, 38),
(18, 39),
(18, 40),
(18, 41),
(18, 42),
(19, 43),
(19, 44),
(19, 45);

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
(30, 'Fasz', '2024-11-19', 12, 'szivacs1203@gmail.com'),
(31, 'Cigany', '2024-11-19', 32, 'szivacs1203@gmail.com'),
(32, 'Néger', '2024-11-19', 54, 'szivacs1203@gmail.com'),
(33, 'Néger', '2024-11-19', 54, 'szivacs1203@gmail.com'),
(34, 'Valami uj', '2024-11-21', 50, 'szivacs1203@gmail.com');

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
(33, 17),
(34, 18),
(34, 19);

-- --------------------------------------------------------

--
-- Table structure for table `test_submission`
--

CREATE TABLE `test_submission` (
  `email` varchar(255) NOT NULL,
  `tid` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

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
('h378616@stud.u-szeged.hu', 'Zoltai Zétény Csongor', '$2y$10$ylo2rMBvF8tsSexYxXQbU.McKHbFRmfNYtvAuCPt4gOmbkq/m1ohC', 1, 1),
('szivacs1203@gmail.com', 'Tóth Bence', '$2y$10$o9UjG04mL1Li57vhpyZENOBX5sSCmsAVkNobpxet4Jr2myIanuW7y', 1, 1),
('tesztelek@email.hu', 'Teszt Elek', '$2y$10$rrG7qY6hngMotd0hqpokU.ZSAjy1qOreshB8g4Oyf9HW9q5yb7Iz6', 2, 0),
('tothb0531@gmail.com', 'asd asd', '$2y$10$OHUeHH9FcewCTyhi7Okb5ujiTFwgyiLQr9YjMkO0OXOZ0aOsQZ38K', 2, 0);

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
(7, 'Szerintem nem'),
(8, 'Biztos nem'),
(9, 'Talán'),
(10, 'Meow'),
(11, 'nem'),
(12, 'megse'),
(13, 'lehet'),
(14, 'igen'),
(15, 'jo kerdes'),
(16, 'idk'),
(17, 'qdwqwddqwqdw'),
(18, 'Nem tudom de el tudom kepzelni'),
(19, 'Nem tudom de el tudom kepzelni'),
(20, 'Nem tudom de el tudom kepzelni'),
(21, 'Nem tudom de el tudom kepzelni'),
(22, 'wergwerg'),
(23, 'wergwer'),
(24, 'gwergwergwegwe'),
(25, 'wegrregwgerw'),
(26, 'qdwqwddqwqd'),
(27, 'dqwdqwqwddqw'),
(28, 'dqwdqwdqwqdwdqwdqwdqwdqwdqwdqwq'),
(29, 'dwqwddqw'),
(30, 'dqdqw'),
(31, 'qdwdqwdqwqwd'),
(32, 'Hamis'),
(33, '1gerwajlnk ger aljkn grel'),
(34, '1njlouhi gawerijlnu bg4w3hiu l21'),
(35, 'ijlnu jnil rweg hijlngerwi'),
(36, '2'),
(37, 'igen'),
(38, 'noi'),
(39, 'Nem'),
(40, 'Nem'),
(41, 'Nem'),
(42, 'Nem'),
(43, 'wfqfqwfwq'),
(44, 'wrfqwfqfqw'),
(45, 'fqwqfw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `answers_ibfk_1` (`Users_email`),
  ADD KEY `answers_ibfk_2` (`q_id`);

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
  ADD PRIMARY KEY (`email`,`tid`),
  ADD KEY `test_submission_ibfk_2` (`tid`);

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
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `wrong_answers`
--
ALTER TABLE `wrong_answers`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`Users_email`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `test_submission_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE,
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
