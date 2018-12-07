-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2018 at 04:17 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `idBook` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `publish` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pages` int(4) NOT NULL,
  `cost` int(5) NOT NULL,
  `idCategory` int(2) NOT NULL,
  `idLanguage` int(4) NOT NULL,
  `copies` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`idBook`, `title`, `author`, `publish`, `pages`, `cost`, `idCategory`, `idLanguage`, `copies`) VALUES
('006.3 ĐO-T 2010', 'Nhập môn trí tuệ nhân tạo ', 'Đỗ Trung Tuấn', 'NXB Đại học Quốc gia Hà Nội', 94, 20000, 1, 8, 12),
('345.597 GIA 2007', 'Giáo trình luật hình sự Việt Nam : phần các tội phạm ', 'Lê Cảm Chủ', 'NXB Quốc gia', 421, 300000, 7, 8, 6),
('369 VL-123', 'Vật lí', 'Einstein', 'NXB Thế Giới', 156, 500000, 1, 8, 25),
('370 PH-V 2000', 'Giáo dục học', 'Phạm Viết Vượng', 'NXB Đại học Quốc gia Hà Nội', 157, 54000, 4, 8, 25),
('495.6 TR-T 2002', 'Nhật ngữ thương mại thực dụng', 'Lê Nguyễn Hào Kiệt', 'NXB Trẻ', 117, 76000, 3, 4, 5),
('515 STE 1992)', 'Calculus and analytic geometry', 'Stein Sherman K', 'New York : McGraw-Hill', 257, 69000, 1, 1, 5),
('518 PH-A 2005', 'Giải tích số', 'Phạm Kỳ Anh', 'NXB Đại học Quốc gia', 125, 21000, 1, 8, 15),
('909 MOT 2001', 'Một số chuyên đề lịch sử thế giới', 'Vũ Dương Ninh', 'NXB Đại Học Quốc Gia', 254, 102000, 2, 8, 21),
('959.7041 VO-G 1964', 'Điện Biên Phủ ', 'Võ Nguyên Giáp', 'NXB Chính trị Quốc gia', 412, 230000, 2, 8, 4),
('HB139 .G74 2003', 'Econometric analysis ', 'Greene William H.', 'Prentice Hall', 187, 127000, 6, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE `borrowing` (
  `idBorrow` int(11) NOT NULL,
  `idStudent` int(8) NOT NULL,
  `idBook` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `borrowDate` date NOT NULL,
  `dueDate` date NOT NULL,
  `returnDate` date DEFAULT NULL,
  `punish` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`idBorrow`, `idStudent`, `idBook`, `borrowDate`, `dueDate`, `returnDate`, `punish`) VALUES
(1, 15003161, '515 STE 1992)', '2018-12-07', '2018-12-14', NULL, 0),
(2, 15003251, '369 VL-123', '2018-12-07', '2018-12-14', NULL, 0),
(3, 15000151, '369 VL-123', '2018-12-07', '2018-12-14', '2018-12-07', 7000),
(4, 15003251, '369 VL-123', '2018-12-07', '2018-12-14', NULL, 0),
(5, 15004263, 'HB139 .G74 2003', '2018-12-07', '2018-12-14', NULL, 0),
(6, 15004255, '345.597 GIA 2007', '2018-12-07', '2018-12-14', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCategory` int(2) NOT NULL,
  `nameCategory` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCategory`, `nameCategory`) VALUES
(1, 'Khoa học Tự nhiên'),
(2, 'Khoa học Xã hội nhân Văn'),
(3, 'Ngôn ngữ'),
(4, 'Giáo dục'),
(5, 'Công nghệ'),
(6, 'Kinh tế'),
(7, 'Luật');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `idDepartment` int(2) NOT NULL,
  `nameDepartment` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `idFaculty` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`idDepartment`, `nameDepartment`, `idFaculty`) VALUES
(1, 'Toán học', 1),
(2, 'Vật lý học', 2),
(3, 'Hóa học', 4),
(4, 'Sinh học', 5),
(5, 'Địa lý tự nhiên', 6),
(6, 'Khí tượng học', 3),
(7, 'Kỹ thuật Địa chất', 7),
(8, 'Công nghệ Môi trường', 8),
(9, 'Toán Cơ', 1),
(10, 'Máy tính và Khoa học Thông tin', 1),
(11, 'Hóa dược', 4),
(12, 'Công nghệ kỹ thuật hóa học', 4),
(13, 'Khoa học vật liệu', 2),
(14, 'Công nghệ hạt nhân', 2),
(15, 'Thủy Văn', 3),
(16, 'Hải dương học', 3),
(17, 'Quản lý đất đai', 6),
(18, 'Công nghệ sinh học', 5),
(19, 'Địa chất học', 7),
(20, 'Khoa học đất', 8),
(21, 'Khoa học môi trường', 8);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `idFaculty` int(2) NOT NULL,
  `nameFaculty` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`idFaculty`, `nameFaculty`) VALUES
(1, 'Toán - Cơ - Tin học'),
(2, 'Vật Lý'),
(3, 'Khí tượng Thủy văn và Hải dương học'),
(4, 'Hóa Học'),
(5, 'Sinh Học'),
(6, 'Địa Lý'),
(7, 'Địa Chất'),
(8, 'Môi Trường');

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `idLang` int(4) NOT NULL,
  `nameLang` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`idLang`, `nameLang`) VALUES
(1, 'Anh'),
(2, 'Hàn Quốc'),
(3, 'Trung Quốc'),
(4, 'Nhật Bản'),
(5, 'Đức'),
(6, 'Nga'),
(7, 'Pháp'),
(8, 'Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `idStaff` int(3) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`idStaff`, `username`, `password`, `phone`) VALUES
(1, 'anhbh', 'anhbh', '0835087136'),
(2, 'hieund', 'hieund', '0376904255'),
(3, 'huonghtm', 'huonghtm', '0386556662'),
(4, 'baond', 'baond', '0372451563');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `idStudent` int(8) NOT NULL,
  `avatar` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(1) NOT NULL,
  `birthday` date NOT NULL,
  `idDepartment` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`idStudent`, `avatar`, `fullname`, `gender`, `birthday`, `idDepartment`) VALUES
(15000151, 'male.png', 'Bùi Hương Giang', 1, '1997-10-04', 5),
(15000213, 'male.png', 'Vũ Tiến Đại', 1, '1997-01-01', 12),
(15000214, 'male.png', 'Nguyễn Đình Bảo', 1, '1997-12-28', 14),
(15003161, 'female.gif', 'Lê Hồng Hạnh', 0, '1997-10-26', 6),
(15003195, 'female.gif', 'Mai Hồng Anh', 1, '1997-11-30', 1),
(15003251, 'male.png', 'Bùi Hoàng Anh', 1, '1997-10-03', 10),
(15004255, 'female.gif', 'Pháº¡m Thá»‹ Thu HÃ ', 1, '1997-11-13', 5),
(15004263, 'male.png', 'Nguyễn Hữu Đoài', 1, '1997-01-15', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`idBook`),
  ADD KEY `book_ibfk_1` (`idCategory`),
  ADD KEY `book_ibfk_2` (`idLanguage`);

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`idBorrow`),
  ADD KEY `borrowing_ibfk_1` (`idStudent`),
  ADD KEY `borrowing_ibfk_2` (`idBook`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`idDepartment`),
  ADD KEY `department_ibfk_1` (`idFaculty`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`idFaculty`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`idLang`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`idStaff`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idStudent`),
  ADD KEY `student_ibfk_2` (`idDepartment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowing`
--
ALTER TABLE `borrowing`
  MODIFY `idBorrow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `idDepartment` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `idFaculty` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `idLang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `idStaff` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`idLanguage`) REFERENCES `lang` (`idLang`);

--
-- Constraints for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD CONSTRAINT `borrowing_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`idStudent`),
  ADD CONSTRAINT `borrowing_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`idFaculty`) REFERENCES `faculty` (`idFaculty`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`idDepartment`) REFERENCES `department` (`idDepartment`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
