-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 24, 2023 lúc 05:41 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btth01_cse485`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `ma_tgia` int(11) UNSIGNED NOT NULL,
  `ten_tgia` varchar(100) NOT NULL,
  `hinh_tgia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`ma_tgia`, `ten_tgia`, `hinh_tgia`) VALUES
(7, 'Miltie Doget', 'http://dummyimage.com/244x100.png/ff4444/ffffff'),
(12, 'Cleon Lamke', 'http://dummyimage.com/248x100.png/dddddd/000000'),
(19, 'Zondra Oglethorpe', 'http://dummyimage.com/182x100.png/cc0000/ffffff'),
(35, 'Fayth Emney', 'http://dummyimage.com/158x100.png/cc0000/ffffff'),
(40, 'Shalna Willison', 'http://dummyimage.com/144x100.png/dddddd/000000'),
(56, 'Vinny Shera', 'http://dummyimage.com/113x100.png/ff4444/ffffff'),
(82, 'Diannne Lowre', 'http://dummyimage.com/225x100.png/cc0000/ffffff'),
(88, 'Tessa Husbands', 'http://dummyimage.com/110x100.png/dddddd/000000'),
(95, 'Tildi Collinge', 'http://dummyimage.com/226x100.png/ff4444/ffffff'),
(97, 'Walton Mair', 'http://dummyimage.com/214x100.png/5fa2dd/ffffff');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`ma_tgia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
