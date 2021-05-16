-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 12:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `qid` int(11) NOT NULL,
  `question` varchar(250) COLLATE utf8_bin NOT NULL,
  `opt-a` varchar(50) COLLATE utf8_bin NOT NULL,
  `opt-b` varchar(50) COLLATE utf8_bin NOT NULL,
  `opt-c` varchar(50) COLLATE utf8_bin NOT NULL,
  `opt-d` varchar(50) COLLATE utf8_bin NOT NULL,
  `ans` varchar(50) COLLATE utf8_bin NOT NULL,
  `marks` int(4) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`qid`, `question`, `opt-a`, `opt-b`, `opt-c`, `opt-d`, `ans`, `marks`, `topic_id`) VALUES
(1, 'What is the full form of DOM?', 'Document Object Model', 'Document Orientation Model', 'Declarative Object Method', 'Documentation Object Method', 'Document Object Model', 1, 1),
(2, 'A piece of icon or image on a web page associated with another webpage is called', 'url', 'hyperlink', 'plugin', 'none of the above', 'hyperlink', 1, 1),
(3, 'What is a web browser?', 'a program that can display a web page', 'a program used to view html documents', 'it enables user to access the resources of net', 'all of the mentioned', 'all of the mentioned', 1, 1),
(4, 'URL stands for\r\n', 'unique reference label', 'uniform reference label', 'uniform resource locator', 'unique resource locator', 'uniform resource locator', 1, 1),
(5, 'Which one of the following is not used to generate dynamic web pages?', 'PHP', 'ASP.NET', 'JSP', 'none of the mentioned', 'none of the mentioned', 1, 1),
(6, 'Advantages of linked list representation of binary trees over arrays?', 'dynamic size', 'ease of insertion/deletion', 'ease in randomly accessing a node', 'both dynamic size and ease in insertion/deletion', 'both dynamic size and ease in insertion/deletion', 1, 2),
(7, 'Which of the following traversing algorithm is not used to traverse in a tree?', 'Post order', 'Pre order', 'In order', 'Randomized', 'Randomized', 1, 2),
(8, 'Level order traversal of a tree is formed with the help of', 'breadth first search', 'depth first search', 'dijkstra’s algorithm', 'prims algorithm', 'breadth first search', 1, 2),
(9, 'Which of the following statements for a simple graph is correct?', 'Every path is a trail', 'Every trail is a path', 'Every trail is a path and every path is a trail\r\n', 'Path and trail have no relation', 'Every path is a trail', 1, 2),
(10, 'If several elements are competing for the same bucket in the hash table, what is it called?', 'Diffusion', 'Replication', 'Collision', 'Duplication', 'Collision', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `rid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `total_marks` int(3) NOT NULL,
  `max_marks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`rid`, `user_id`, `topic_id`, `total_marks`, `max_marks`) VALUES
(1, 1, 1, 5, 5),
(2, 1, 2, 5, 5),
(3, 2, 1, 5, 5),
(4, 1, 2, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `tid` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `title_short` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`tid`, `title`, `title_short`) VALUES
(1, 'Internet and Web Programming', 'iwp'),
(2, 'Data Structures and Algorithms', 'dsa'),
(3, 'Computer Architecture and Organisation', 'cao'),
(4, 'Software Engineering', 'se');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `mail` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `mail`, `password`) VALUES
(1, 'xyz', 'xyz@mail.com', 'xyz'),
(2, 'user1', 'user1@mail.com', 'user123'),
(3, 'user', 'u@mail.com', 'user123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `topics1` (`topic_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `users3` (`user_id`),
  ADD KEY `topics2` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `topics1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `topics2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users3` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
