-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 14, 2025 lúc 04:44 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbandoan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `mactdh` int(255) NOT NULL,
  `madh` int(255) NOT NULL,
  `masp` int(255) NOT NULL,
  `soluong` int(255) NOT NULL,
  `giabanle` int(255) NOT NULL,
  `tongtien` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madh` int(255) NOT NULL,
  `makh` int(255) NOT NULL,
  `ngaytao` date NOT NULL,
  `tongtien` int(255) NOT NULL,
  `trangthai` enum('chưa xác nhận','đã xác nhận','đã giao','thành công','hủy đơn') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `magiohang` int(255) NOT NULL,
  `makh` int(255) NOT NULL,
  `masp` int(255) NOT NULL,
  `tongtientungmon` int(255) NOT NULL,
  `tongtien` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(255) NOT NULL,
  `tenkh` varchar(100) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sodienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `maloai` int(255) NOT NULL,
  `tenloai` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muahang`
--

CREATE TABLE `muahang` (
  `masp` int(255) NOT NULL,
  `mactdh` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` int(255) NOT NULL,
  `tennv` varchar(100) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `Describtion` varchar(255) NOT NULL,
  `Amount` int(255) NOT NULL,
  `Type` enum('món chay','món mặn','món lẩu','món ăn vặt','món tráng miệng','nước uống','hải sản') NOT NULL,
  `maloai` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `Name`, `Image`, `Price`, `Describtion`, `Amount`, `Type`, `maloai`) VALUES
(1, 'Phở bò', 'assets\\img\\products\\phobo.jpg', 50, 'Hương vị tinh túy của Việt Nam, với nước dùng đậm đà từ xương bò hầm kỹ, kết hợp cùng bánh phở mềm, thịt bò tái chín vừa tới và các loại rau thơm tạo nên một món ăn sáng hoàn hảo.', 100, 'món mặn', 0),
(2, 'Bánh mì', 'assets\\img\\products\\banhmi.webp', 20, 'Một trong những món ăn đường phố ngon nhất thế giới, với vỏ bánh giòn rụm, nhân đầy đặn từ pate, thịt nguội, trứng, kèm theo rau thơm và nước sốt đậm đà.', 100, 'món mặn', 0),
(3, 'Bún chả Hà Nội', 'assets\\img\\products\\buncha.jpg', 50, 'Thịt nướng thơm lừng, được ăn kèm với bún tươi, rau sống và nước mắm chua ngọt, tạo nên sự cân bằng hoàn hảo giữa vị ngọt, chua, mặn, cay.', 100, 'món mặn', 0),
(4, 'Bánh xèo Miền Tây', 'assets\\img\\products\\banhxeo.jpg', 30, ' Lớp vỏ giòn rụm, nhân đầy đặn từ tôm, thịt và giá đỗ, ăn kèm rau sống và chấm nước mắm chua ngọt, tạo nên hương vị khó quên.', 100, 'món mặn', 0),
(5, 'Gỏi cuốn', 'assets\\img\\products\\goicuon.jpg', 30, 'Món ăn thanh mát, với tôm, thịt, bún và rau cuốn trong bánh tráng, chấm kèm nước chấm bơ đậu phộng béo bùi.', 100, 'món mặn', 0),
(6, 'Cao lầu', 'assets\\img\\products\\caolau.jpg', 40, 'Đặc sản Hội An với sợi mì dai, thịt xá xíu đậm đà, rau sống tươi ngon và nước dùng đặc biệt.', 100, 'món mặn', 0),
(7, 'Bún bò Huế', 'assets\\img\\products\\bunbohue.jpg', 50, ' Nước dùng cay nồng, đậm đà với sả, thịt bò, chả cua, ăn kèm rau thơm và bún to.', 100, 'món mặn', 0),
(8, 'Hủ tiếu', 'assets\\img\\products\\hutieu.jpg', 30, 'Món ăn miền Nam với nước dùng ngọt thanh từ xương, sợi hủ tiếu dai mềm, ăn kèm tôm, thịt và rau sống.', 100, 'món mặn', 0),
(9, 'Chả cá Lã Vọng', 'assets\\img\\products\\chaca.jpg', 40, ' Cá lăng nướng nghệ, ăn kèm bún, rau thì là và mắm tôm, tạo nên hương vị độc đáo.', 100, 'món mặn', 0),
(10, 'Mì Quảng', 'assets\\img\\products\\miquang.jpg', 40, 'Món mì đặc trưng của Quảng Nam với sợi mì vàng, thịt tôm, trứng cút, nước dùng ít nhưng đậm vị.', 100, 'món mặn', 0),
(11, 'Cơm tấm', 'assets\\img\\products\\comtam.jpeg', 50, ' Món ăn bình dân nhưng đầy đủ dinh dưỡng với sườn nướng, bì, chả trứng, ăn kèm nước mắm pha.', 100, 'món mặn', 0),
(12, 'Bánh bột lọc Huế', 'assets\\img\\products\\banhbotloc.webp', 30, 'Lớp bột dẻo dai, nhân tôm thịt đậm đà, chấm nước mắm cay tạo nên món ăn vặt hấp dẫn.', 100, 'món mặn', 0),
(13, 'Bánh cuốn', 'assets\\img\\products\\banhcuonv2.jpg', 30, 'Lớp bánh mỏng dai, nhân thịt băm và mộc nhĩ thơm ngon, ăn kèm nước mắm tỏi ớt và chả lụa, tạo nên bữa sáng tinh tế.', 100, 'món mặn', 0),
(14, 'Bánh ít', 'assets\\img\\products\\banhit.webp', 10, 'Nhỏ nhắn nhưng đầy hương vị, vỏ bánh dẻo kết hợp nhân đậu xanh hoặc nhân dừa bùi béo.', 100, 'món tráng miệng', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`mactdh`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`magiohang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `mactdh` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madh` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `magiohang` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `maloai` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `manv` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
