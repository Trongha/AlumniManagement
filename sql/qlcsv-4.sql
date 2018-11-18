-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 18, 2018 at 01:21 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlcsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangkhaosat`
--

CREATE TABLE `bangkhaosat` (
  `bangID` int(11) NOT NULL,
  `tenbang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bangkhaosat`
--

INSERT INTO `bangkhaosat` (`bangID`, `tenbang`) VALUES
(1, 'Khảo sát việc làm');

-- --------------------------------------------------------

--
-- Table structure for table `congtac`
--

CREATE TABLE `congtac` (
  `noilamviec` varchar(255) NOT NULL,
  `congviecdamnhiem` varchar(100) DEFAULT NULL,
  `mucluong` int(11) NOT NULL,
  `csv_id` int(11) NOT NULL,
  `congtacID` int(11) NOT NULL,
  `thoigian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `congtac`
--

INSERT INTO `congtac` (`noilamviec`, `congviecdamnhiem`, `mucluong`, `csv_id`, `congtacID`, `thoigian`) VALUES
('Hà Nội', 'Phân tích thiết kế hệ thống', 1000, 1, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `cuu_sv`
--

CREATE TABLE `cuu_sv` (
  `csv_id` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `huyenid` int(11) NOT NULL,
  `anh` varchar(50) DEFAULT NULL,
  `lopid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sdt` varchar(255) DEFAULT NULL,
  `ngaysinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuu_sv`
--

INSERT INTO `cuu_sv` (`csv_id`, `hoten`, `email`, `huyenid`, `anh`, `lopid`, `userid`, `sdt`, `ngaysinh`) VALUES
(1, 'Nguyễn Văn A', 'anhneond98@gmail.com', 1, NULL, 1, 1, NULL, '0000-00-00'),
(2, 'Phùng Công Minh', 'minhpc225@gmail.com', 3, NULL, 1, 3, '0931668073', '0000-00-00'),
(16020933, 'Nguyen Trong Ha', 'trongha@gmai.com', 3, NULL, 3, 2, NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `huyen`
--

CREATE TABLE `huyen` (
  `huyenid` int(11) NOT NULL,
  `tinhid` int(11) NOT NULL,
  `tenhuyen` varchar(50) NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `huyen`
--

INSERT INTO `huyen` (`huyenid`, `tinhid`, `tenhuyen`, `active`) VALUES
(1, 1, 'Giao Thủy', 1),
(2, 1, 'Xuân Trường', 1),
(3, 1, 'Hải Hậu', 1),
(4, 3, 'Hai Bà Trưng', NULL),
(5, 3, 'Thanh Xuân', NULL),
(7, 3, 'Đống Đa', 1),
(8, 2, 'Phủ Lí', NULL),
(9, 2, 'Bình Lục', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `khaosat`
--

CREATE TABLE `khaosat` (
  `khaosatID` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `bangID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `khoaID` int(11) NOT NULL,
  `kichhoat` tinyint(1) DEFAULT '0',
  `tenkhoa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`khoaID`, `kichhoat`, `tenkhoa`) VALUES
(1, 1, 'CNTT'),
(2, 0, 'ĐTVT-FET'),
(3, 0, 'VLKT');

-- --------------------------------------------------------

--
-- Table structure for table `kqkhaosat`
--

CREATE TABLE `kqkhaosat` (
  `ketquaID` int(11) NOT NULL,
  `luachon` set('co','khong','khonghan') DEFAULT NULL,
  `csv_id` int(11) NOT NULL,
  `khaosatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `lopID` int(11) NOT NULL,
  `tenlop` varchar(255) NOT NULL,
  `khoaID` int(11) NOT NULL,
  `ka` int(11) NOT NULL COMMENT 'k61, k60, k59',
  `kichhoat` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`lopID`, `tenlop`, `khoaID`, `ka`, `kichhoat`) VALUES
(1, 'K61_CD', 1, 61, 1),
(3, 'K62-Cb', 1, 62, 0),
(4, 'K61-CLC', 1, 61, 0),
(5, 'K61-CB', 1, 61, 0),
(6, 'K62-CLC', 1, 62, 0),
(7, 'K62-CLC', 3, 62, 0),
(8, 'K62-CLC', 2, 62, 0),
(9, 'K61-T', 2, 61, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `tieude` varchar(255) NOT NULL,
  `noidung` text NOT NULL,
  `thongbaoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thongbao`
--

INSERT INTO `thongbao` (`tieude`, `noidung`, `thongbaoID`) VALUES
('Kỷ niệm 15 năm tốt nghiệp lớp K44Đ niên khóa 1999-2003', 'Ngày 15/09, Lớp K44Đ, Khoa Điện tử -Viễn thông, niên khóa 1999-2003 đã tổ chức kỷ niệm 15 năm ngày tốt nghiệp.\r\n\r\n     Tham dự buỗi lễ về phía ĐHQGHN có PGS.TS Trương Vũ Bằng Giang- Phó trưởng Ban khoa học công nghệ, nguyên là Giáo viên chủ nhiệm lớp. Về phía Trường ĐHCN có TS. Nguyễn Ngọc An – Phó trưởng phòng Công tác sinh viên; PGS.TS. Trần Đức Tân – Phó Chủ nhiệm khoa Điện tử viễn thông, TS. Nguyễn Ngọc Linh – Bí thư Đoàn Trường cùng các thầy/cô đã trực tiếp giảng dạy, hướng dẫn sinh viên và đông đảo cựu sinh viên lớp K44Đ.', 1),
('Trường ĐHCN tham dự Hội diễn Văn nghệ Công đoàn ĐHQGHN 2018', 'Vào chiều ngày 15/11, đội văn nghệ Trường Đại học Công Nghệ đã tham gia trình diễn 3 tiết mục đặc sắc tại Hội diễn văn nghệ Công đoàn Đại học Quốc gia Hà Nội năm 2018. Các tiết mục của Trường ĐHCN với chủ đề “Đất nước” với tổ khúc hát múa bao gồm: Hào khí Việt Nam – Sáng tác: Hoàng Hà; Người Hà Nội – Sáng tác: Nguyễn Đình Thi; Ca ngợi tổ quốc – Sáng tác: Hồ Bắc. Các bài hát thuộc nhiều thể loại trữ tình cách mạng đã thể hiện niềm tự hào dân tộc, tình yêu quê hương, đất nước…', 2),
('Kỷ niệm 15 năm tốt nghiệp lớp K44Đ niên khóa 1999-2003', 'Ngày 15/09, Lớp K44Đ, Khoa Điện tử -Viễn thông, niên khóa 1999-2003 đã tổ chức kỷ niệm 15 năm ngày tốt nghiệp.\r\n\r\n     Tham dự buỗi lễ về phía ĐHQGHN có PGS.TS Trương Vũ Bằng Giang- Phó trưởng Ban khoa học công nghệ, nguyên là Giáo viên chủ nhiệm lớp. Về phía Trường ĐHCN có TS. Nguyễn Ngọc An – Phó trưởng phòng Công tác sinh viên; PGS.TS. Trần Đức Tân – Phó Chủ nhiệm khoa Điện tử viễn thông, TS. Nguyễn Ngọc Linh – Bí thư Đoàn Trường cùng các thầy/cô đã trực tiếp giảng dạy, hướng dẫn sinh viên và đông đảo cựu sinh viên lớp K44Đ.', 3),
('Trường ĐHCN tham dự Hội diễn Văn nghệ Công đoàn ĐHQGHN 2018', 'Vào chiều ngày 15/11, đội văn nghệ Trường Đại học Công Nghệ đã tham gia trình diễn 3 tiết mục đặc sắc tại Hội diễn văn nghệ Công đoàn Đại học Quốc gia Hà Nội năm 2018. Các tiết mục của Trường ĐHCN với chủ đề “Đất nước” với tổ khúc hát múa bao gồm: Hào khí Việt Nam – Sáng tác: Hoàng Hà; Người Hà Nội – Sáng tác: Nguyễn Đình Thi; Ca ngợi tổ quốc – Sáng tác: Hồ Bắc. Các bài hát thuộc nhiều thể loại trữ tình cách mạng đã thể hiện niềm tự hào dân tộc, tình yêu quê hương, đất nước…', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tinh`
--

CREATE TABLE `tinh` (
  `tinhid` int(11) NOT NULL,
  `tentinh` varchar(50) NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tinh`
--

INSERT INTO `tinh` (`tinhid`, `tentinh`, `active`) VALUES
(1, 'Nam Định', 1),
(2, 'Hà Nam', 1),
(3, 'Hà Nội', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isuser` tinyint(1) DEFAULT NULL,
  `isadmin` tinyint(1) DEFAULT NULL,
  `lastLoginTime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `isuser`, `isadmin`, `lastLoginTime`) VALUES
(1, 'username1', '123456', 1, NULL, NULL),
(2, 'admin1', '123456', NULL, 1, NULL),
(3, 'admin2', '123456', 1, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangkhaosat`
--
ALTER TABLE `bangkhaosat`
  ADD PRIMARY KEY (`bangID`);

--
-- Indexes for table `congtac`
--
ALTER TABLE `congtac`
  ADD PRIMARY KEY (`congtacID`),
  ADD KEY `csv_id` (`csv_id`);

--
-- Indexes for table `cuu_sv`
--
ALTER TABLE `cuu_sv`
  ADD PRIMARY KEY (`csv_id`),
  ADD KEY `huyenid` (`huyenid`),
  ADD KEY `lopid` (`lopid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `huyen`
--
ALTER TABLE `huyen`
  ADD PRIMARY KEY (`huyenid`),
  ADD KEY `tinhid` (`tinhid`);

--
-- Indexes for table `khaosat`
--
ALTER TABLE `khaosat`
  ADD PRIMARY KEY (`khaosatID`),
  ADD KEY `bangID` (`bangID`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`khoaID`);

--
-- Indexes for table `kqkhaosat`
--
ALTER TABLE `kqkhaosat`
  ADD PRIMARY KEY (`ketquaID`),
  ADD KEY `csv_id` (`csv_id`),
  ADD KEY `khaosatID` (`khaosatID`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`lopID`),
  ADD KEY `khoaID` (`khoaID`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`thongbaoID`);

--
-- Indexes for table `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`tinhid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bangkhaosat`
--
ALTER TABLE `bangkhaosat`
  MODIFY `bangID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `congtac`
--
ALTER TABLE `congtac`
  MODIFY `congtacID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `huyen`
--
ALTER TABLE `huyen`
  MODIFY `huyenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `khaosat`
--
ALTER TABLE `khaosat`
  MODIFY `khaosatID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `khoaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kqkhaosat`
--
ALTER TABLE `kqkhaosat`
  MODIFY `ketquaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `lopID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `thongbaoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tinh`
--
ALTER TABLE `tinh`
  MODIFY `tinhid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `congtac`
--
ALTER TABLE `congtac`
  ADD CONSTRAINT `congtac_ibfk_2` FOREIGN KEY (`csv_id`) REFERENCES `cuu_sv` (`csv_id`);

--
-- Constraints for table `cuu_sv`
--
ALTER TABLE `cuu_sv`
  ADD CONSTRAINT `cuu_sv_ibfk_1` FOREIGN KEY (`huyenid`) REFERENCES `huyen` (`huyenid`),
  ADD CONSTRAINT `cuu_sv_ibfk_2` FOREIGN KEY (`lopid`) REFERENCES `lop` (`lopID`),
  ADD CONSTRAINT `cuu_sv_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `user` (`userID`);

--
-- Constraints for table `huyen`
--
ALTER TABLE `huyen`
  ADD CONSTRAINT `huyen_ibfk_1` FOREIGN KEY (`tinhid`) REFERENCES `tinh` (`tinhid`);

--
-- Constraints for table `khaosat`
--
ALTER TABLE `khaosat`
  ADD CONSTRAINT `khaosat_ibfk_1` FOREIGN KEY (`bangID`) REFERENCES `bangkhaosat` (`bangID`);

--
-- Constraints for table `kqkhaosat`
--
ALTER TABLE `kqkhaosat`
  ADD CONSTRAINT `kqkhaosat_ibfk_2` FOREIGN KEY (`khaosatID`) REFERENCES `khaosat` (`khaosatID`),
  ADD CONSTRAINT `kqkhaosat_ibfk_3` FOREIGN KEY (`csv_id`) REFERENCES `cuu_sv` (`csv_id`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`khoaID`) REFERENCES `khoa` (`khoaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
