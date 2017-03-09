-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 06:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(220) NOT NULL,
  `pass` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`) VALUES
(1, 'admin', 'C068FB95B8E64B1D775313ED5902EFBE32D207E4DE7876F8CAF838FEC6F8D18A'),
(3, 'testadmin', '9f69fa131c4ca518d3cce296013d9a3c2b4aa63ca02583c8b6f1f7f354a1d874');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `num` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `validate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `num`, `email`, `validate`) VALUES
(8, 'lol', 'lol', 'md.julfikar.mahmud@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) NOT NULL,
  `who` varchar(200) NOT NULL,
  `receive` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `who`, `receive`, `message`, `date`, `flag`) VALUES
(1, 'md.julfikar.mahmud@gmail.com', 'admin', 'boom', '2017-03-07 16:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE `mcq` (
  `id` int(10) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `q_a` varchar(200) NOT NULL,
  `q_b` varchar(200) NOT NULL,
  `q_c` varchar(200) NOT NULL,
  `q_d` varchar(200) NOT NULL,
  `ans` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq`
--

INSERT INTO `mcq` (`id`, `question`, `q_a`, `q_b`, `q_c`, `q_d`, `ans`) VALUES
(5, 'this is question 1', 'choice 1', 'choice 2', 'choice 3', 'choice 4', 'choice 3'),
(10, 'this is question 2', 'choice 1', 'choice 2', 'choice 3', 'choice 4', 'this is ans'),
(21, 'this is testing', 'test 1', 'test 2', 'test 3', 'test 4', 'test 1');

-- --------------------------------------------------------

--
-- Table structure for table `mcq_answers`
--

CREATE TABLE `mcq_answers` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `validate` varchar(10) DEFAULT NULL,
  `correct` varchar(200) DEFAULT NULL,
  `marks` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_answers`
--

INSERT INTO `mcq_answers` (`id`, `email`, `question`, `answer`, `validate`, `correct`, `marks`) VALUES
(28, 'jxmxshakil@gmail.com', 'this is question 1', 'choice 1', '1', 'choice 3', '0'),
(29, 'jxmxshakil@gmail.com', 'this is question 2', 'choice 2', '1', 'this is ans', '0'),
(30, 'jxmxshakil@gmail.com', 'this is testing', 'test 3', '1', 'test 1', '0'),
(31, 'vishalssidhu@gmail.com', 'this is question 1', 'choice 3', '1', NULL, '2'),
(32, 'vishalssidhu@gmail.com', 'this is question 2', 'choice 2', '1', 'this is ans', '0'),
(33, 'vishalssidhu@gmail.com', 'this is testing', 'test 4', '1', 'test 1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `name`, `description`) VALUES
(1, 'policy', 'policy will be updated in testing mode'),
(2, 'pass', '20'),
(3, 'home', 'home content will be changed as well'),
(4, 'exam', 'alert box for editing'),
(5, 'retake', 'new edit'),
(6, 'marks', '10'),
(7, 'fullmarks', '100');

-- --------------------------------------------------------

--
-- Table structure for table `premium`
--

CREATE TABLE `premium` (
  `id` int(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `ic` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `status_p` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `premium`
--

INSERT INTO `premium` (`id`, `fullname`, `ic`, `mobile`, `email`, `pass`, `state`, `school`, `status_p`) VALUES
(6, 'Mohammad Julfikar Mahmud', 'BA0297796', '01135240570', 'md.julfikar.mahmud@gmail.com', '+WÎ¡¹uÉ”!.ÇŸ$', 'SELANGOR', 'University of Wollongong', 1),
(7, 'Mahbub Jaman Shovon', 'BA022901910', '01123200011', 'jxmxwwskl@gmail.com', '+WÎ¡¹uÉ”!.ÇŸ$', 'SELANGOR', 'University of Wollongong', 1),
(8, 'Ahmed', '880204146035', '+60123607988', 'ahmedfarisamir@gmail.com', 'ÄJG×ŒÆÂþ£+Ÿà(Ó\n', 'Kuala Lumpur', 'MIDPG', NULL),
(9, 'Mahbub Jaman Shovon', 'BA001293812', '01123200011', 'iiccss@gmail.com', '+WÎ¡¹uÉ”!.ÇŸ$', 'SELANGOR', 'University of Wollongong', 1),
(10, 'Vishal Test', '980331085229', '0134201120', 'vishalssidhu@gmail.com', '}?‰³³Éa\"*e¯øÅj.', 'Penang', 'KYUEM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `mcq` varchar(20) DEFAULT NULL,
  `theory` varchar(20) DEFAULT NULL,
  `validate` int(2) DEFAULT '0',
  `grade` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `email`, `date`, `mcq`, `theory`, `validate`, `grade`) VALUES
(17, 'jxmxwwskl@gmail.com', '2017-02-14', '0', NULL, 0, 'F'),
(19, 'vishalssidhu@gmail.com', '2017-02-14', '10', NULL, 0, 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `theoryanswer`
--

CREATE TABLE `theoryanswer` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `answer` varchar(2000) NOT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `marks` varchar(100) DEFAULT NULL,
  `validate` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theoryanswer`
--

INSERT INTO `theoryanswer` (`id`, `email`, `question`, `answer`, `comment`, `marks`, `validate`) VALUES
(12, 'jxmxshakil@gmail.com', 'this is a question', 'this is an answer demo', NULL, NULL, '0'),
(13, 'jxmxshakil@gmail.com', 'this is testing editing', 'hmmmmmm.....................', NULL, NULL, '0'),
(14, 'jxmxshakil@gmail.com', 'this is testing add question', 'another answer', NULL, NULL, '0'),
(15, 'vishalssidhu@gmail.com', 'this is a question', 'Question is gay. What is this even. Bad Question. ', NULL, NULL, '0'),
(16, 'vishalssidhu@gmail.com', 'this is testing editing', 'This test, easy. 100', NULL, NULL, '0'),
(17, 'vishalssidhu@gmail.com', 'this is testing add question', 'What even', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `theoryquestion`
--

CREATE TABLE `theoryquestion` (
  `id` int(10) NOT NULL,
  `question` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theoryquestion`
--

INSERT INTO `theoryquestion` (`id`, `question`) VALUES
(1, 'this is a question'),
(2, 'this is testing editing'),
(4, 'this is testing add question');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(10) NOT NULL,
  `link` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `des` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `link`, `title`, `des`) VALUES
(2, 'fks0fYobr-Y', 'another test', 'another des'),
(4, 'tLU-Sam6E6o', 'test', 'new test'),
(5, 'i7wveOu5hkQ', 'fav', 'this is test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq`
--
ALTER TABLE `mcq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_answers`
--
ALTER TABLE `mcq_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theoryanswer`
--
ALTER TABLE `theoryanswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theoryquestion`
--
ALTER TABLE `theoryquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mcq`
--
ALTER TABLE `mcq`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `mcq_answers`
--
ALTER TABLE `mcq_answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `premium`
--
ALTER TABLE `premium`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `theoryanswer`
--
ALTER TABLE `theoryanswer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `theoryquestion`
--
ALTER TABLE `theoryquestion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
