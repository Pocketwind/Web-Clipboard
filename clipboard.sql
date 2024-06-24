-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 23-12-23 22:41
-- 서버 버전: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP 버전: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `clipboard`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `clipboard`
--

CREATE TABLE `clipboard` (
  `board_id` int(11) NOT NULL,
  `data` text DEFAULT NULL,
  `written_time` datetime DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `clipboard`
--

INSERT INTO `clipboard` (`board_id`, `data`, `written_time`, `uid`) VALUES
(38, 'asdfgf', '2023-12-01 14:21:25', 'e850c4a0aec99c69ae0435bdcca3295f3dcd2b8ce644d2e3ee'),
(53, 'casdcadsacsdcasd', '2023-12-01 14:43:27', '8d82dd98a01daddee9e0b585e042bfba3541940e58bf9732e1'),
(63, 'zcxzcx', '2023-12-01 20:36:10', 'cf36810e593c4c8fd7539244b58a6a475abccdc5611d600f78'),
(64, 'zcxzcxcxzzcxzcx', '2023-12-01 20:36:12', 'cf36810e593c4c8fd7539244b58a6a475abccdc5611d600f78'),
(65, 'saasassasa', '2023-12-01 20:36:14', 'cf36810e593c4c8fd7539244b58a6a475abccdc5611d600f78'),
(66, '', '2023-12-01 20:58:38', '789b4ee19d910b80306e8beaa026f28499360ab53b9fce1ee2'),
(67, '', '2023-12-01 20:58:42', '789b4ee19d910b80306e8beaa026f28499360ab53b9fce1ee2'),
(68, '', '2023-12-01 20:58:43', '789b4ee19d910b80306e8beaa026f28499360ab53b9fce1ee2'),
(69, 'https://www.youtube.com/watch?v=SSVBvSlKn2A', '2023-12-01 20:59:30', 'c69ce28d72bf60f9e7aac10a0298a51c4222583a2d23441d18'),
(80, 'bdbisihsihdhidhi', '2023-12-04 13:10:22', 'df07977816795b60c40b593a9e41282ca9fcc6faeb767e6c2f'),
(81, 'jbsnosbo', '2023-12-04 13:10:32', 'df07977816795b60c40b593a9e41282ca9fcc6faeb767e6c2f'),
(89, '테스트1', '2023-12-10 16:59:42', '4d97b409e920d37fa1cb21c4549a050853602350e8ffecbfab'),
(90, '테스트2', '2023-12-10 16:59:45', '4d97b409e920d37fa1cb21c4549a050853602350e8ffecbfab'),
(91, '다른 아이디에서 공유한 내용1', '2023-12-10 17:02:10', '8995942911c79b295509b5be539e4c56e3111dd1217854b50d');

-- --------------------------------------------------------

--
-- 테이블 구조 `share`
--

CREATE TABLE `share` (
  `share_id` int(11) NOT NULL,
  `shared_time` datetime DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `board_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `share`
--

INSERT INTO `share` (`share_id`, `shared_time`, `uid`, `board_id`) VALUES
(17, '2023-12-10 17:02:24', '4d97b409e920d37fa1cb21c4549a050853602350e8ffecbfab', 91);

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `uid` varchar(50) NOT NULL,
  `id` text NOT NULL,
  `pw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `users`
--

INSERT INTO `users` (`uid`, `id`, `pw`) VALUES
('24d2aba25fc33afcf831887593d4cad95dc0a28ef2c7de9340', 'ㅁ', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb'),
('4d97b409e920d37fa1cb21c4549a050853602350e8ffecbfab', 'asdf', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
('789b4ee19d910b80306e8beaa026f28499360ab53b9fce1ee2', 'Tsjun', '9e69e7e29351ad837503c44a5971edebc9b7e6d8601c89c284b1b59bf37afa80'),
('8995942911c79b295509b5be539e4c56e3111dd1217854b50d', 'cmshzl', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
('8d82dd98a01daddee9e0b585e042bfba3541940e58bf9732e1', 'asd', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
('c69ce28d72bf60f9e7aac10a0298a51c4222583a2d23441d18', 'dddd', '5bf8aa57fc5a6bc547decf1cc6db63f10deb55a3c6c5df497d631fb3d95e1abf'),
('cd372fb85148700fa88095e3492d3f9f5beb43e555e5ff26d9', '', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
('cf36810e593c4c8fd7539244b58a6a475abccdc5611d600f78', 'zxcv', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
('d937731e573c17211032ee3d8dcfb32df4592d010fab61699e', 'qaz', '4654d793972c3b6a1d48fb0ab58d9cb0de46c3d33d605f9222c283dfaa12d420'),
('df07977816795b60c40b593a9e41282ca9fcc6faeb767e6c2f', 'fagsf', '2632a2120c12d7f16d38726f45e9620430e528fb1b303dc1a70dc964685d7b2c'),
('e467af41935aeec361a5e45455836551506e1513b010ae0552', 'qwer', '252b16892cd6dada689babda6dbd85944ce023f4e9340878ff8d4cb68f404143'),
('e850c4a0aec99c69ae0435bdcca3295f3dcd2b8ce644d2e3ee', 'asdasd', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
('ede60e84320f616922dddb9e970641f629a10e6f8e57b15060', '으아악', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `clipboard`
--
ALTER TABLE `clipboard`
  ADD PRIMARY KEY (`board_id`),
  ADD KEY `uid` (`uid`);

--
-- 테이블의 인덱스 `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`share_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `fk2` (`board_id`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `clipboard`
--
ALTER TABLE `clipboard`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- 테이블의 AUTO_INCREMENT `share`
--
ALTER TABLE `share`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `clipboard`
--
ALTER TABLE `clipboard`
  ADD CONSTRAINT `clipboard_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 테이블의 제약사항 `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`board_id`) REFERENCES `clipboard` (`board_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `share_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
