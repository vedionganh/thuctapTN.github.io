-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 12, 2022 lúc 01:40 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tintuc_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

DROP TABLE IF EXISTS `binh_luan`;
CREATE TABLE IF NOT EXISTS `binh_luan` (
  `id_binhluan` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thoigian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noidungbinhluan` text COLLATE utf8_unicode_ci NOT NULL,
  `id_tin` int(11) NOT NULL,
  PRIMARY KEY (`id_binhluan`),
  KEY `id_tin` (`id_tin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id_binhluan`, `email`, `thoigian`, `noidungbinhluan`, `id_tin`) VALUES
(2, 'admin@gmail.com', '2022-05-08 13:37:54', 'Hay tuyệt vời 5*', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_tin`
--

DROP TABLE IF EXISTS `loai_tin`;
CREATE TABLE IF NOT EXISTS `loai_tin` (
  `id_loaitin` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ten_loaitin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `id_nhomtin` int(11) NOT NULL,
  PRIMARY KEY (`id_loaitin`),
  KEY `id_nhomtin` (`id_nhomtin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_tin`
--

INSERT INTO `loai_tin` (`id_loaitin`, `ten_loaitin`, `trangthai`, `id_nhomtin`) VALUES
('a2', 'Tin Hot', 1, 1),
('a3', 'Covid', 1, 1),
('a4', 'Hot Covid', 1, 3),
('a5', 'Hot Hot', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom_tin`
--

DROP TABLE IF EXISTS `nhom_tin`;
CREATE TABLE IF NOT EXISTS `nhom_tin` (
  `id_nhomtin` int(11) NOT NULL AUTO_INCREMENT,
  `ten_nhomtin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_nhomtin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhom_tin`
--

INSERT INTO `nhom_tin` (`id_nhomtin`, `ten_nhomtin`, `trangthai`) VALUES
(1, 'Thịnh hành', 1),
(2, 'Xem nhiều', 1),
(3, 'Tìm kiếm nhiều nhất trong ngày', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin`
--

DROP TABLE IF EXISTS `tin`;
CREATE TABLE IF NOT EXISTS `tin` (
  `id_tin` int(11) NOT NULL AUTO_INCREMENT,
  `tieude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `ngaydangtin` date NOT NULL,
  `tacgia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `solanxem` int(11) DEFAULT NULL,
  `tinhot` tinyint(1) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `id_loaitin` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tin`),
  KEY `id_loaitin` (`id_loaitin`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tin`
--

INSERT INTO `tin` (`id_tin`, `tieude`, `mota`, `noidung`, `ngaydangtin`, `tacgia`, `solanxem`, `tinhot`, `trangthai`, `id_loaitin`) VALUES
(15, 'Tin Covid', 'Covid ngày 07/05', 'Tính từ 16h ngày 06/5 đến 16h ngày 07/5, trên Hệ thống Quốc gia quản lý ca bệnh COVID-19 ghi nhận 3.345 ca nhiễm mới, trong đó 0 ca nhập cảnh và 3.345 ca ghi nhận trong nước (giảm 474 ca so với ngày trước đó) tại 55 tỉnh, thành phố (có 2.263 ca trong cộng đồng).', '2022-05-08', 'Khá', 0, 1, 1, 'a2'),
(16, 'Tin Covid ngày mới', '', 'Tính từ 20h ngày 07/5 đến 16h ngày 07/5, trên Hệ thống Quốc gia quản lý ca bệnh COVID-19 ghi nhận 3.345 ca nhiễm mới, trong đó 0 ca nhập cảnh và 3.345 ca ghi nhận trong nước (giảm 474 ca so với ngày trước đó) tại 55 tỉnh, thành phố (có 2.263 ca trong cộng đồng).', '2022-05-08', 'Thế', 0, 1, 1, 'a3'),
(17, 'Tin Covid 20h', 'Covid ngày 09/05', 'Tính từ 20h ngày 09/5 đến 16h ngày 07/5, trên Hệ thống Quốc gia quản lý ca bệnh COVID-19 ghi nhận 3.345 ca nhiễm mới, trong đó 0 ca nhập cảnh và 3.345 ca ghi nhận trong nước (giảm 474 ca so với ngày trước đó) tại 55 tỉnh, thành phố (có 2.263 ca trong cộng đồng).', '2022-05-08', 'Bảnh', 0, 1, 1, 'a4'),
(18, 'Tin Covid 10/05', 'Ngày 10/05', 'Tính từ 08h ngày 10/5 đến 16h ngày 07/5, trên Hệ thống Quốc gia quản lý ca bệnh COVID-19 ghi nhận 3.345 ca nhiễm mới, trong đó 0 ca nhập cảnh và 3.345 ca ghi nhận trong nước (giảm 474 ca so với ngày trước đó) tại 55 tỉnh, thành phố (có 2.263 ca trong cộng đồng).', '2022-05-08', 'Ji-Huyn', 0, 1, 1, 'a5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`) VALUES
(1, 'tinh', '202cb962ac59075b964b07152d234b70', 'Xuân Tịnh');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`id_tin`) REFERENCES `tin` (`id_tin`);

--
-- Các ràng buộc cho bảng `loai_tin`
--
ALTER TABLE `loai_tin`
  ADD CONSTRAINT `loai_tin_ibfk_1` FOREIGN KEY (`id_nhomtin`) REFERENCES `nhom_tin` (`id_nhomtin`);

--
-- Các ràng buộc cho bảng `tin`
--
ALTER TABLE `tin`
  ADD CONSTRAINT `tin_ibfk_1` FOREIGN KEY (`id_loaitin`) REFERENCES `loai_tin` (`id_loaitin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
