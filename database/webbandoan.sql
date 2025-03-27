-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 25, 2025 lúc 10:57 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbandoan2`
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
  `tongtien` decimal(10,2) GENERATED ALWAYS AS (`soluong` * `giabanle`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`mactdh`, `madh`, `masp`, `soluong`, `giabanle`) VALUES
(1, 1, 3, 1, 50),
(2, 2, 2, 3, 20);

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

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madh`, `makh`, `ngaytao`, `tongtien`, `trangthai`) VALUES
(1, 2, '2025-03-21', 50, 'chưa xác nhận');

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
  `makh` int(11) NOT NULL,
  `tenkh` varchar(100) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sodienthoai` varchar(20) NOT NULL,
  `Email` varchar(255) DEFAULT NULL
  'Status' TINYINT(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `matkhau`, `diachi`, `sodienthoai`, `Email`) VALUES
(1, 'nhan', 'nhan1234', 'quan tan phu', '0775177636', 'nhan@gmail.com'),
(2, 'dai', 'dai1234', 'quan binh tan', '0775177636', 'dai@gmail.com'),
(11, 'hoang', 'hoang1234', 'quan binh thanh', '113', 'hoang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `maloai` varchar(255) NOT NULL,
  `tenloai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`maloai`, `tenloai`) VALUES
('L001', 'Món chay'),
('L002', 'Món mặn'),
('L003', 'Món lẩu'),
('L004', 'Món ăn vặt'),
('L005', 'Món tráng miệng'),
('L006', 'Nước uống'),
('L007', 'Hải sản');

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
  `Type` enum('món chay','món mặn','món lẩu','món ăn vặt','món tráng miệng','nước uống','hải sản') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `Name`, `Image`, `Price`, `Describtion`, `Type`) VALUES
(1, 'Phở bò', 'assets\\img\\products\\phobo.jpg', 50, 'Hương vị tinh túy của Việt Nam, với nước dùng đậm đà từ xương bò hầm kỹ, kết hợp cùng bánh phở mềm, thịt bò tái chín vừa tới và các loại rau thơm tạo nên một món ăn sáng hoàn hảo.', 'món mặn'),
(2, 'Bánh mì', 'assets\\img\\products\\banhmi.webp', 20, 'Một trong những món ăn đường phố ngon nhất thế giới, với vỏ bánh giòn rụm, nhân đầy đặn từ pate, thịt nguội, trứng, kèm theo rau thơm và nước sốt đậm đà.', 'món mặn'),
(3, 'Bún chả Hà Nội', 'assets\\img\\products\\buncha.jpg', 50, 'Thịt nướng thơm lừng, được ăn kèm với bún tươi, rau sống và nước mắm chua ngọt, tạo nên sự cân bằng hoàn hảo giữa vị ngọt, chua, mặn, cay.', 'món mặn'),
(4, 'Bánh xèo Miền Tây', 'assets\\img\\products\\banhxeo.jpg', 30, ' Lớp vỏ giòn rụm, nhân đầy đặn từ tôm, thịt và giá đỗ, ăn kèm rau sống và chấm nước mắm chua ngọt, tạo nên hương vị khó quên.', 'món mặn'),
(5, 'Gỏi cuốn', 'assets\\img\\products\\goicuon.jpg', 30, 'Món ăn thanh mát, với tôm, thịt, bún và rau cuốn trong bánh tráng, chấm kèm nước chấm bơ đậu phộng béo bùi.', 'món mặn'),
(6, 'Cao lầu', 'assets\\img\\products\\caolau.jpg', 40, 'Đặc sản Hội An với sợi mì dai, thịt xá xíu đậm đà, rau sống tươi ngon và nước dùng đặc biệt.', 'món mặn'),
(7, 'Bún bò Huế', 'assets\\img\\products\\bunbohue.jpg', 50, ' Nước dùng cay nồng, đậm đà với sả, thịt bò, chả cua, ăn kèm rau thơm và bún to.', 'món mặn'),
(8, 'Hủ tiếu', 'assets\\img\\products\\hutieu.jpg', 30, 'Món ăn miền Nam với nước dùng ngọt thanh từ xương, sợi hủ tiếu dai mềm, ăn kèm tôm, thịt và rau sống.', 'món mặn'),
(9, 'Chả cá Lã Vọng', 'assets\\img\\products\\chaca.jpg', 40, ' Cá lăng nướng nghệ, ăn kèm bún, rau thì là và mắm tôm, tạo nên hương vị độc đáo.', 'món mặn'),
(10, 'Mì Quảng', 'assets\\img\\products\\miquang.jpg', 40, 'Món mì đặc trưng của Quảng Nam với sợi mì vàng, thịt tôm, trứng cút, nước dùng ít nhưng đậm vị.', 'món mặn'),
(11, 'Cơm tấm', 'assets\\img\\products\\comtam.jpeg', 50, ' Món ăn bình dân nhưng đầy đủ dinh dưỡng với sườn nướng, bì, chả trứng, ăn kèm nước mắm pha.', 'món mặn'),
(12, 'Bánh bột lọc Huế', 'assets\\img\\products\\banhbotloc.webp', 30, 'Lớp bột dẻo dai, nhân tôm thịt đậm đà, chấm nước mắm cay tạo nên món ăn vặt hấp dẫn.', 'món mặn'),
(13, 'Bánh cuốn', 'assets\\img\\products\\banhcuonv2.jpg', 30, 'Lớp bánh mỏng dai, nhân thịt băm và mộc nhĩ thơm ngon, ăn kèm nước mắm tỏi ớt và chả lụa, tạo nên bữa sáng tinh tế.', 'món mặn'),
(14, 'Bánh ít', 'assets\\img\\products\\banhit.webp', 10, 'Nhỏ nhắn nhưng đầy hương vị, vỏ bánh dẻo kết hợp nhân đậu xanh hoặc nhân dừa bùi béo.', 'món tráng miệng'),
(15, 'Gà nướng cơm lam', 'assets\\img\\products\\ganuongcomlam.jpg', 120, 'Gà nướng vàng giòn, ăn kèm cơm lam dẻo thơm của vùng Tây Nguyên.', 'món mặn'),
(16, 'Bún cá Nha Trang', 'assets\\img\\products\\buncanhatrang.jpg', 60, 'Nước dùng thanh ngọt từ cá biển, kết hợp với bún tươi và rau sống.', 'món mặn'),
(17, 'Bánh tráng cuốn thịt heo', 'assets\\img\\products\\banhtrangcuonthitheo.jpg', 75, 'Thịt heo mềm thơm, ăn kèm rau sống và chấm mắm nêm đậm đà.', 'món mặn'),
(18, 'Bún sứa Nha Trang', 'assets\\img\\products\\bunsuanhatrang.jpg', 70, 'Sứa giòn sần sật, nước dùng ngọt thanh tạo nên hương vị đặc trưng.', 'món mặn'),
(19, 'Bánh ép Huế', 'assets\\img\\products\\banh-ephue.jpg', 20, 'Bánh ép giòn rụm, nhân pate, trứng và thịt đầy đặn.', 'món mặn'),
(20, 'Cháo lươn Nghệ An', 'assets\\img\\products\\chaoluonnghean.jpg', 55, 'Cháo lươn thơm ngon, cay nồng đặc trưng của xứ Nghệ.', 'món mặn'),
(21, 'Mực nhồi thịt nướng', 'assets\\img\\products\\mucnhoithitnuong.jpg', 90, 'Mực tươi nhồi thịt, nướng thơm lừng, chấm muối ớt xanh.', 'món mặn'),
(22, 'Cá bống kho tộ', 'assets\\img\\products\\cabongkhoto.jpg', 65, 'Cá bống kho với nước màu dừa, thịt cá mềm ngọt.', 'món mặn'),
(23, 'Hến xào xúc bánh tráng', 'assets\\img\\products\\henxaoxucbanhtrang.jpg', 50, 'Hến xào đậm vị, ăn kèm bánh tráng nướng giòn.', 'món mặn'),
(24, 'Bánh đập hến xào', 'assets\\img\\products\\banhdaphenxao.jpg', 45, 'Bánh đập giòn tan kết hợp với hến xào thơm ngon.', 'món mặn'),
(25, 'Cá lóc nướng trui', 'assets\\img\\products\\calocnuongtrui.jpg', 110, 'Cá lóc nướng nguyên con, ăn kèm rau sống và bún.', 'món mặn'),
(26, 'Lẩu mắm miền Tây', 'assets\\img\\products\\laumam.jpg', 180, 'Lẩu mắm đậm đà, ăn kèm rau đồng quê và bún tươi.', 'hải sản'),
(27, 'Bánh tét lá cẩm', 'assets\\img\\products\\banhtetlacam.jpg', 50, 'Bánh tét dẻo thơm, nhân đậu xanh và thịt ba rọi.', 'món tráng miệng'),
(28, 'Gỏi gà măng cụt', 'assets\\img\\products\\goigamangcut.jpg', 90, 'Gà ta xé phay, trộn cùng măng cụt giòn ngọt.', 'món mặn'),
(29, 'Bánh xèo Nam Bộ', 'assets\\img\\products\\banhxeonambo.jpg', 70, 'Bánh xèo vàng giòn, nhân đầy tôm, thịt và giá.', 'món mặn'),
(30, 'Gỏi củ hủ dừa', 'assets\\img\\products\\goicuhudua.jpg', 65, 'Củ hủ dừa giòn ngọt, trộn cùng tôm thịt và rau thơm.', 'món mặn'),
(31, 'Bò lá lốt', 'assets\\img\\products\\bolalot.jpg', 75, 'Thịt bò băm nhuyễn cuốn lá lốt, nướng thơm lừng.', 'món mặn'),
(32, 'Bún nước lèo Sóc Trăng', 'assets\\img\\products\\bunnuocleo.jpg', 70, 'Bún nước lèo Sóc Trăng đặc trưng với mắm cá linh và cá lóc.', 'món mặn'),
(33, 'Cháo cá lóc rau đắng', 'assets\\img\\products\\chaocalocraudang.jpg', 60, 'Cháo cá lóc nóng hổi ăn cùng rau đắng.', ''),
(34, 'Cơm nị cà púa', 'assets\\img\\products\\comnica-pua.jpg', 85, 'Món cơm kiểu Chăm, hương vị đậm đà của gia vị.', 'hải sản'),
(35, 'Chuột đồng nướng lu', 'assets\\img\\products\\chuotdongnuong.jpg', 95, 'Chuột đồng nướng giòn, chấm muối tiêu chanh.', 'món mặn'),
(36, 'Bánh tằm bì', 'assets\\img\\products\\banhtambi.jpg', 45, 'Bánh tằm bì dẻo thơm, ăn kèm nước cốt dừa béo ngậy.', 'món tráng miệng'),
(37, 'Hủ tiếu Mỹ Tho', 'assets\\img\\products\\hutieumytho.jpg', 60, 'Hủ tiếu dai ngon, nước dùng trong thanh.', 'món mặn'),
(38, 'Bánh canh Trảng Bàng', 'assets\\img\\products\\banhcanhtrangbang.jpg', 65, 'Sợi bánh canh dai, nước dùng ngọt thanh, ăn kèm thịt heo.', 'món mặn'),
(39, 'Vịt quay Lạng Sơn', 'assets\\img\\products\\vitquaylangson.jpg', 150, 'Vịt quay da giòn, ướp gia vị đặc trưng của vùng Lạng Sơn.', 'món mặn'),
(40, 'Nem nướng Nha Trang', 'assets\\img\\products\\nemnuongnhatrang.jpg', 80, 'Nem nướng thơm lừng, ăn kèm rau sống và nước chấm đặc biệt.', 'món mặn'),
(41, 'Xôi xéo Hà Nội', 'assets\\img\\products\\xoixeohanoi.jpg', 30, 'Xôi nếp dẻo, kết hợp đậu xanh nghiền và hành phi giòn.', 'món tráng miệng'),
(42, 'Bánh gai Hải Dương', 'assets\\img\\products\\banhgaiaidduong.jpg', 25, 'Bánh gai dẻo thơm, nhân đậu xanh béo ngậy.', 'món tráng miệng'),
(43, 'Bánh tro', 'assets\\img\\products\\banhtro.jpg', 20, 'Bánh tro mềm, ăn kèm mật mía ngọt thanh.', 'món tráng miệng'),
(44, 'Chả mực Hạ Long', 'assets\\img\\products\\chamuchalong.jpg', 120, 'Chả mực giòn dai, chấm kèm tương ớt cay nồng.', 'món mặn'),
(45, 'Bánh dày giò', 'assets\\img\\products\\banhdaygio.jpg', 35, 'Bánh dày dẻo dai, ăn kèm giò lụa mềm mịn.', 'món mặn'),
(46, 'Ốc hương nướng bơ tỏi', 'assets\\img\\products\\ochuongnuong.jpg', 110, 'Ốc hương nướng thơm lừng với bơ tỏi béo ngậy.', 'món mặn'),
(47, 'Lẩu cua đồng', 'assets\\img\\products\\laucuadong.jpg', 180, 'Lẩu cua đồng thơm ngon, nước dùng đậm đà từ gạch cua.', 'món mặn'),
(48, 'Bún riêu cua', 'assets\\img\\products\\bunrieucua.jpg', 65, 'Bún riêu cua nước dùng chua ngọt, ăn kèm rau sống.', 'hải sản'),
(49, 'Bánh bông lan trứng muối', 'assets\\img\\products\\banhbonglantrungmuoi.jpg', 55, 'Bánh mềm mịn, trứng muối mằn mặn, phô mai béo ngậy.', 'món tráng miệng'),
(50, 'Bánh da lợn', 'assets\\img\\products\\banhdalon.jpg', 30, 'Bánh da lợn nhiều lớp, dẻo thơm từ lá dứa và đậu xanh.', 'món tráng miệng'),
(51, 'Bò kho', 'assets\\img\\products\\bokho.jpg', 90, 'Bò kho đậm đà, ăn kèm bánh mì hoặc bún.', 'món mặn'),
(52, 'Xôi gấc', 'assets\\img\\products\\xoigac.jpg', 35, 'Xôi gấc có màu đỏ cam rực rỡ, dẻo thơm.', 'món tráng miệng'),
(53, 'Gà hấp lá chanh', 'assets\\img\\products\\gahaplachanh.jpg', 120, 'Gà hấp thơm lừng lá chanh, thịt mềm ngọt.', 'món mặn'),
(54, 'Canh chua cá lóc', 'assets\\img\\products\\canhchuacaloc.jpg', 75, 'Canh chua thanh mát, cá lóc ngọt thịt, ăn kèm cơm.', ''),
(55, 'Tôm rang me', 'assets\\img\\products\\tomrangme.jpg', 85, 'Tôm rang me chua ngọt, ăn kèm cơm trắng hoặc bánh mì.', 'hải sản'),
(56, 'Bánh khọt', 'assets\\img\\products\\banhkhot.jpg', 50, 'Bánh khọt giòn rụm, nhân tôm tươi, chấm nước mắm ngon.', 'món mặn'),
(57, 'Súp cua', 'assets\\img\\products\\supcua.jpg', 70, 'Súp cua thơm ngon, bổ dưỡng với trứng bắc thảo.', 'món mặn'),
(58, 'Nem chua Thanh Hóa', 'assets\\img\\products\\nemchua.jpg', 60, 'Nem chua lên men tự nhiên, chua nhẹ, cay nhẹ.', 'món mặn'),
(59, 'Bánh giò', 'assets\\img\\products\\banhgio.jpg', 40, 'Bánh giò mềm, nhân thịt băm đậm vị, ăn nóng ngon hơn.', 'món mặn'),
(60, 'Cút lộn xào me', 'assets\\img\\products\\cutlonxaome.jpg', 55, 'Trứng cút lộn xào với me chua ngọt, ăn kèm rau răm.', 'món mặn');

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
  ADD PRIMARY KEY (`makh`),
  ADD UNIQUE KEY `Email` (`Email`);

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
  MODIFY `mactdh` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madh` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `magiohang` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `manv` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
