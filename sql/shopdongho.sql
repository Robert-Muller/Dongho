-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 13, 2023 lúc 09:47 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopdongho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'Cả nam và nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL DEFAULT '''cod'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `firstname`, `lastname`, `phone_number`, `email`, `address`, `note`, `payment_method`) VALUES
(2, 'Nguyenaa', 'Kien', '0946', 'abc@gmail.com', 'Bac Ninh', 'note', 'bacs'),
(3, 'assc', 'asscasca', '123345', 'avc@gmail.com', 'ascc', NULL, 'cod'),
(150, 'Nguyen', 'Kien', '0946', 'abc@gmail.com', 'Ha Noi', 'note', 'bacs'),
(151, 'Nguyen', 'Kien', '0946', 'abc@gmail.com', 'Ha Noi', 'note', 'bacs'),
(152, 'Nguyen', 'Kien', '0946', 'abc@gmail.com', 'Ha Noi', 'note', 'bacs'),
(153, 'Nguyen', 'Vu', '0946', 'aaaa@aa.com', 'Ha Noi', 'qư', 'cod'),
(154, 'Nguyen', 'Vu', '0946', 'aaaa@aa.com', 'Ha Noi', 'qư', 'cod'),
(155, 'Nguyen', 'Vu', '0946', 'hangtt@gmail.com', 'Ha Noi', '', 'cod'),
(157, 'Nguyen', 'Vu Quy', '3248', 'sang.hv@deha-soft.com', 'Ha Noi', NULL, 'bacs'),
(160, 'Nguyễn Trung', 'Kien', '0916600509', 'kienjok6@gmail.com', 'Ha Noi', 'note', 'bacs'),
(161, 'Nguyễn Trung', 'Kiên', '0357580629', 'kienjok6@gmail.com', 'Ha Noi', '', 'bacs'),
(162, 'Nguyễn Trung', 'Kiên', '0357580629', 'kienjok6@gmail.com', 'Ha Noi', '', 'bacs'),
(163, 'Nguyễn Trung', 'Kiên', '0357580629', 'kien12345@gmail.com', 'Ha Noi', 'note', 'bacs'),
(164, 'Nguyễn Trung', 'Kiên', '0357580629', 'demo123@gmail.com', 'Ha Noi', 'note', 'bacs');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `num` int(11) NOT NULL,
  `price-order` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `num`, `price-order`) VALUES
(1, 150, 1, 1, 45, 229800),
(2, 2, 3, NULL, 45, 229800),
(4, 3, 2, NULL, 2, 12223),
(154, 2, 5, NULL, 45, 10000),
(155, 152, 2, NULL, 1, 46124),
(156, 152, 5, NULL, 5, 24750),
(157, 153, 5, NULL, 3, 14850),
(158, 154, 5, NULL, 3, 14850),
(159, 161, 1, 61, 3, 62046),
(160, 163, 1, 62, 2, 41364),
(161, 163, 2, 62, 1, 46124),
(162, 164, 1, 63, 3, 62046),
(163, 164, 32, 63, 1, 38709);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product-name` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `Sale_price` float NOT NULL,
  `image` varchar(500) NOT NULL,
  `id_category` int(11) NOT NULL,
  `Number_sold_out` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product-name`, `price`, `Sale_price`, `image`, `id_category`, `Number_sold_out`) VALUES
(1, 'CERTINA', 22980, 20682, 'uploads/product-01.jpg', 1, 55),
(2, 'Longines Master', 54264, 46124, 'uploads/product-02.jpg', 1, 4),
(3, 'Urban', 21640, 18394, 'uploads/product-03.jpg', 1, 45),
(4, 'Petite', 3900, 3510, 'uploads/product-04.jpg', 2, 2),
(5, 'Sterling', 5500, 4950, 'uploads/product-05.jpg', 3, 56),
(6, 'Elegant Collection', 64296, 54651, 'uploads/product-06.jpg', 2, 0),
(7, 'PETITE CORAL', 3660, 3477, 'uploads/product-07.jpg', 2, 0),
(8, 'CASIO A168WG-9WDF', 1678, 1510, 'uploads/product-08.jpg', 3, 0),
(9, 'TISSOT HERITAGE', 11930, 10140, 'uploads/product-09.jpg', 2, 0),
(10, 'BAYSWATER', 4100, 3690, 'uploads/product-10.jpg', 3, 0),
(11, 'EVERGOLD', 4300, 3870, 'uploads/product-11.jpg', 3, 0),
(12, 'Classic Petite', 4300, 3870, 'uploads/product-12.jpg', 3, 0),
(13, 'MELROSE', 5500, 4950, 'uploads/product-13.jpg', 3, 0),
(14, 'ICONIC LINK MELROSE', 5500, 4950, 'uploads/product-14.jpg', 3, 0),
(15, 'BLACK CORNWALL', 4100, 3690, 'uploads/product-15.jpg', 3, 0),
(16, 'BLACK BRISTOL', 4600, 4140, 'uploads/product-16.jpg', 3, 0),
(17, 'BLACK YORK', 4500, 4050, 'uploads/product-17.jpg', 3, 0),
(18, 'BLACK READING', 4500, 4050, 'uploads/product-18.jpg', 3, 0),
(19, 'ROSELYN', 4100, 3690, 'uploads/product-19.jpg', 3, 0),
(20, 'MIDO OCEAN', 22790, 19371, 'uploads/product-20.jpg', 1, 0),
(21, 'SPIRIT L3', 64296, 54651, 'uploads/product-21.jpg', 1, 0),
(22, 'SPIRIT L4', 57228, 48643, 'uploads/product-22.jpg', 1, 0),
(23, 'COLLECTION L2', 58596, 49806, 'uploads/product-23.jpg', 1, 0),
(24, 'Titoni Slenderline', 12100, 10285, 'uploads/product-24.jpg', 1, 0),
(25, 'TITONI MASTER', 61388, 52179, 'uploads/product-25.jpg', 1, 0),
(26, 'TITONI AIRMASTER', 29252, 24864, 'uploads/product-26.jpg', 1, 0),
(27, 'FIELD MECHANICAL', 13200, 11220, 'uploads/product-27.jpg', 1, 0),
(28, 'INTRA-MATIC', 52580, 44693, 'uploads/product-28.jpg', 1, 0),
(29, 'KHAKI NAVY', 26620, 22627, 'uploads/product-29.jpg', 1, 0),
(30, 'NAVY FROGMAN', 26620, 22627, 'uploads/product-30.jpg', 1, 0),
(31, 'HAMILTON AMERICAN', 56540, 48059, 'uploads/product-31.jpg', 1, 0),
(32, 'VENTURA ELVIS80', 45540, 38709, 'uploads/product-32.jpg', 1, 1),
(33, 'TISSOT CARSON', 22660, 19261, 'uploads/product-33.jpg', 2, 0),
(34, 'QUADRO PRESSED', 3900, 3705, 'uploads/product-34.jpg', 2, 0),
(35, 'UNITONE', 5000, 4750, 'uploads/product-35.jpg', 2, 0),
(36, 'DOLCEVITA', 35796, 30426, 'uploads/product-36.jpg', 2, 0),
(37, 'SUFFOLK', 3900, 3705, 'uploads/product-37.jpg', 2, 0),
(38, 'EMERALD', 4800, 4320, 'uploads/product-38.jpg', 2, 0),
(39, 'CARMINE RED', 88464, 75194, 'uploads/product-39.jpg', 2, 0),
(40, 'TISSOT EVERYTIME', 7610, 6468, 'uploads/product-40.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(28) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `password`, `phone`, `email`) VALUES
(1, 'Nguyễn', 'Kiên', 'kien123', '0911', 'kienjok6@gmail.com'),
(59, 'Nguyen Van', 'Vu', 'vusot2k2', '0357', 'vusot2002@gmail.com'),
(60, 'Nguyen', 'Vu', 'vusot', '0946', 'vuaka2k4@gmail.com'),
(61, 'Nguyễn Trung', 'Kiên', '123456', '0357580629', 'nguyenthilieuat@gmail.com'),
(62, 'Nguyễn Trung', 'Kiên', 'kien123', '0357580629', 'kien12345@gmail.com'),
(63, 'Nguyễn Trung', 'Kiên', '123456', '0357580629', 'demo123@gmail.com'),
(64, 'Nguyen', 'Kien', '0315', '0946258', 'demo4@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `useradmin`
--

CREATE TABLE `useradmin` (
  `AdminId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `useradmin`
--

INSERT INTO `useradmin` (`AdminId`, `username`, `password`) VALUES
(1, 'adminkien', 'kien123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`AdminId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
