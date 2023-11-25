-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2023 lúc 04:21 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(5) NOT NULL,
  `idtaikhoan` int(5) NOT NULL,
  `idsanpham` int(5) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `ngaybinhluan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `idtaikhoan`, `idsanpham`, `noidung`, `ngaybinhluan`) VALUES
(4, 1, 27, 'Đẹp quá shop ơi <3', '2023-11-25'),
(5, 1, 4, 'giảm giá không shop?', '2023-11-25'),
(6, 1, 4, 'haha', '2023-11-25'),
(7, 1, 27, 'ao thật đấy', '2023-11-25'),
(8, 5, 27, 'I am Back', '2023-11-25'),
(9, 5, 26, 'I am back', '2023-11-25'),
(10, 5, 25, 'I am back', '2023-11-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `iddonhang` int(5) NOT NULL,
  `idsanpham` int(5) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(5) NOT NULL,
  `tendm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendm`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(4, 'Oppo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `idtaikhoan` int(5) NOT NULL,
  `hovatennhan` varchar(255) NOT NULL,
  `ngaydathang` datetime NOT NULL,
  `diachinhan` varchar(255) NOT NULL,
  `sodienthoainhan` varchar(20) NOT NULL,
  `phuongthuctt` tinyint(1) NOT NULL COMMENT '0. thanh toán khi nhận hàng 1. Chuyển khoản',
  `trangthai` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0. chưa duyệt 1.Đã duyệt ',
  `giaohang` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0. Đơn hàng mới 1.Đang giao 2. Đã giao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(5) NOT NULL,
  `idtaikhoan` int(5) NOT NULL,
  `idsanpham` int(5) NOT NULL,
  `soluong` int(5) NOT NULL,
  `thanhtien` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `idtaikhoan`, `idsanpham`, `soluong`, `thanhtien`) VALUES
(88, 5, 26, 1, 32792000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(5) NOT NULL,
  `iddm` int(5) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `giasp` int(20) NOT NULL DEFAULT 0,
  `giakm` int(20) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `soluong` int(5) NOT NULL DEFAULT 0,
  `trangthai` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0. còn hàng 1. hết hàng',
  `khuyenmai` int(10) NOT NULL DEFAULT 0,
  `mota` text DEFAULT NULL,
  `luotxem` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `iddm`, `tensp`, `giasp`, `giakm`, `image`, `soluong`, `trangthai`, `khuyenmai`, `mota`, `luotxem`) VALUES
(1, 1, 'iPhone 14 Pro 128GB | Chính hãng VN/A', 24590000, 17213000, '1.webp', 10, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nMàn hình Dynamic Island - Sự biến mất của màn hình tai thỏ thay thế bằng thiết kế viên thuốc, OLED 6,7 inch, hỗ trợ always-on display\r\nCấu hình iPhone 14 Pro Max mạnh mẽ, hiệu năng cực khủng từ chipset A16 Bionic\r\nLàm chủ công nghệ nhiếp ảnh - Camera sau 48MP, cảm biến TOF sống động\r\nPin liền lithium-ion kết hợp cùng công nghệ sạc nhanh cải tiến', 1309),
(3, 2, 'Samsung Galaxy Z Flip5 256GB', 21990000, 15393000, '10.webp', 10, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nThần thái nổi bật, cân mọi phong cách- Lấy cảm hứng từ thiên nhiên với màu sắc thời thượng, xu hướng\r\nThiết kế thu hút ánh nhìn - Gập không kẽ hỡ, dẫn đầu công nghệ bản lề Flex\r\nTuyệt tác selfie thoả sức sáng tạo - Camera sau hỗ trợ AI xử lí cực sắc nét ngay cả trên màn hình ngoài\r\nBền bỉ bất chấp mọi tình huống - Đạt chuẩn kháng bụi và nước IP68 cùng chất liệu nhôm Armor Aluminum giúp hạn chế cong và xước', 801),
(4, 2, 'Samsung Galaxy S23 Ultra 256GB', 23990000, 16793000, '4.webp', 10, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nThoả sức chụp ảnh, quay video chuyên nghiệp - Camera đến 200MP, chế độ chụp đêm cải tiến, bộ xử lí ảnh thông minh\r\nChiến game bùng nổ - chip Snapdragon 8 Gen 2 8 nhân tăng tốc độ xử lí, màn hình 120Hz, pin 5.000mAh\r\nNâng cao hiệu suất làm việc với Siêu bút S Pen tích hợp, dễ dàng đánh dấu sự kiện từ hình ảnh hoặc video\r\nThiết kế bền bỉ, thân thiện - Màu sắc lấy cảm hứng từ thiên nhiên, chất liệu kính và lớp phim phủ PET tái chế', 953),
(9, 1, 'iPhone 13 128GB | Chính hãng VN/A', 16190000, 11333000, '3.webp', 10, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nHiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao\r\nKhông gian hiển thị sống động - Màn hình 6.1\" Super Retina XDR độ sáng cao, sắc nét\r\nTrải nghiệm điện ảnh đỉnh cao - Camera kép 12MP, hỗ trợ ổn định hình ảnh quang học\r\nTối ưu điện năng - Sạc nhanh 20 W, đầy 50% pin trong khoảng 30 phút', 1150),
(11, 1, 'iPhone 14 128GB | Chính hãng VN/A', 18590000, 13013000, '9.webp', 10, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nTuyệt đỉnh thiết kế, tỉ mỉ từng đường nét - Nâng cấp toàn diện với kiểu dáng mới, nhiều lựa chọn màu sắc trẻ trung\r\nNâng tầm trải ngiệm giải trí đỉnh cao - Màn hình 6,1\"\" cùng tấm nền OLED có công nghệ Super Retina XDR cao cấp\r\nChụp ảnh chuyên nghiệp hơn - Cụm 2 camera 12 MP đi kèm nhiều chế độ và chức năng chụp hiện đại\r\nHiệu năng hàng đầu thế giới - Apple A15 Bionic 6 nhân xử lí nhanh, ổn định', 1201),
(12, 1, 'iPhone 11 128GB | Chính hãng VN/A', 12190000, 8533000, '7.webp', 10, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nMàu sắc phù hợp cá tính - 6 màu sắc bắt mắt để lựa chọn\r\nHiệu năng mượt mà, ổn định - Chip A13, RAM 4GB\r\nBắt trọn khung hình - Camera kép hỗ trợ góc rộng, chế độ Night Mode\r\nYên tâm sử dụng - Kháng nước, kháng bụi IP68, kính cường lực Gorilla Glass', 1000),
(13, 4, 'OPPO Find N3 Flip 12GB 256GB', 22990000, 16093000, '11.webp', 10, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế gập linh hoạt, đường cong 3D, đường cắt kim cương - biểu tượng của sự phong cách giúp bạn luôn toả sáng\r\nĐiện thoại gập sở hữu 3 camera sắc nét - Chụp hình đơn giản hơn với Chế độ Flexform\r\nMàn hình phụ vạn năng - dễ dàng thao tác các tác vụ ngay trên màn hình phụ và tuỳ biến theo sở thích\r\nMàn hình sống động đáng kinh ngạc - Kích thước 6.8i nches, hỗ trợ 120Hz, HDR10+', 1100),
(14, 2, 'Samsung Galaxy M34 5G 8GB 128GB', 7490000, 5243000, '12.webp', 10, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nNâng cao hiệu suất của bạn với bộ xử lý cực nhanh Exynos 1280 - 5nm.\r\nCông nghệ Voice Focus - Cuộc gọi video và âm thanh của bạn luôn được rõ ràng hơn.\r\nPin cực khỏe 6000mAh cho bạn thoải mái sử dụng cả ngày dài.\r\nThiết kế sang trọng, sở hữu những gam màu thời thượng khơi dậy những ngày mới của bạn.', 0),
(15, 4, 'OPPO Find N3 16GB 512GB', 44990000, 31493000, '13.webp', 10, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nBậc thầy thiết kế, siêu mỏng nhe - Mỏng chỉ 239g, nhẹ chỉ 5.8mm với nếp gấp tàng hình\r\nRực rõ mọi màn hình hiển thị - Kích thước lên đến 7.8mm, độ phân giải 2K+ cùng tần số quét 120Hz mượt mà\r\nBậc thầy nhiếp ảnh - 3 camera hàng đầu đến 64MP kết hợp cùng đa dạng chế độ chụp hoàn hảo\r\nNâng cao hiệu suất sử dụng - Chip MediaTek Dimensity 9200 5G mạnh mẽ cùng hàng loạt tính năng đa nhiệm thông tinh', 0),
(16, 3, 'Xiaomi Redmi Note 12 8GB 128GB', 4990000, 3493000, '14.webp', 5, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nTrải nghiệm hình ảnh mượt mà và liền mạch nhờ tốc độ làm mới cao 120Hz.\r\nHiệu năng vượt trội và được tăng cường với chip xử lý Snapdragon® 685 6nm mạnh mẽ.\r\nNăng lượng cho cả ngày dài nhờ vào viên pin lên đến 5000mAh đi kèm sạc nhanh 33W\r\nBắt trọn mọi khoảnh khắc của bạn với bộ 3 camera 50MP.', 0),
(17, 3, 'Xiaomi Redmi 13C 6GB 128GB', 3290000, 2632000, '15.webp', 10, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nChipset Helio G85 cho hiệu năng ổn định - Hoạt động mượt mà cho các tác vụ cơ bản hàng ngày.\r\nHệ thống camera kép mạnh mẽ - Cải thiện độ chi tiết và độ sắc nét cho từng bức ảnh.\r\nDung lượng pin khổng lồ lên đến 5000 mAh - Giúp bạn thoải mái trải nghiệm nhiều giờ sử dụng liên tục.\r\nMàn hình lớn kích thước 6.71 inch - Mang lại trải nghiệm xem ấn tượng.', 0),
(18, 4, 'OPPO Reno10 5G 8GB 256GB', 10990000, 9891000, '2.webp', 2, 0, 10, 'ĐẶC ĐIỂM NỔI BẬT\r\nChuyên gia chân dung thế hệ thứ 10 - Camera chân dung 32MP siêu nét, chụp xa từ 2X-5X không lo biến dạng khung hình\r\nThiết kế nổi bật, dẫn đầu xu hướng - Cạnh viền cong 3D, các phiên bản màu sắc phù hợp đa cá tính, thu hút mọi ánh nhìn\r\nĐa nhiệm mạnh mẽ hơn ai hết - RAM mở rộng đến 16GB, ROM 256GB mang đến trải nghiệm đa tác vụ thoải mái\r\nPin bất tận, sạc siêu tốc - pin 5000mAh và sạc nhanh 67W cùng chế độ tiết kiệm pin siêu tiện ích', 1),
(19, 1, 'iPhone 15 128GB | Chính hãng VN/A', 22990000, 19541500, '16.webp', 2, 0, 15, 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế thời thượng và bền bỉ - Mặt lưng kính được pha màu xu hướng cùng khung viền nhôm bền bỉ\r\nDynamic Island hiển thị linh động mọi thông báo ngay lập tức giúp bạn nắm bắt mọi thông tin\r\nChụp ảnh đẹp nức lòng - Camera chính 48MP, Độ phân giải lên đến 4x và Tele 2x chụp chân dung hoàn hảo\r\nPin dùng cả ngày không lắng lo - Thời gian xem video lên đến 20 giờ và sạc nhanh qua cổng USB-C tiện lợi\r\nCải tiến hiệu năng vượt bậc - A16 Bionic mạnh mẽ giúp bạn cân mọi tác vụ dù có yêu cầu đồ hoạ cao', 0),
(20, 3, 'Xiaomi 13T Pro 5G (12GB - 512GB)', 16990000, 13592000, '17.webp', 10, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nNhiếp ảnh chuyên ngiệp, nắm giữ tuyệt tác trong tầm tay - Cụm camera đến, ống kính Leica với 2 phong cách ảnh\r\nHiệu năng bất chấp mọi tác vụ - Bộ vi xử lý Dimensity 9200+ Ultra mạnh mẽ cùng RAM 12GB cho đa nhiệm mượt mà\r\nNăng lượng bất tận cả ngày - Pin 5000mAh cùng sạc nhanh 120W, sạc đầy chỉ trong 19 phút\r\nMàn hình sáng rực rỡ, cuộn lướt thật mượt mà - Màn hình 144hz cùng công nghệ AMOLED CrystalRes', 0),
(21, 3, 'Xiaomi Redmi 12C 4GB 64GB', 3590000, 3051500, '18.webp', 10, 0, 15, 'ĐẶC ĐIỂM NỔI BẬT\r\nỔn định hiệu năng - Chip MediaTek Helio G85 mạnh mẽ xử lí tốt các tác vụ thường ngày\r\nSử dụng đa nhiệm nhiều ứng dụng, thao tác cùng lúc tốt hơn - Hỗ trợ bộ nhớ mở rộng\r\nGiải trí thả ga - Màn hình 6.71\" HD+ cho khung hình rõ nét\r\nẢnh sắc nét với chế độ chụp đêm - Camera kép AI 50MP', 0),
(22, 3, 'Xiaomi POCO X5 5G 8GB 256GB', 7490000, 5992000, '19.webp', 5, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nKhông gian gaming đúng chuẩn - Màn hình lớn 6.67\" AMOLED DotDisplay và 120Hz cho khung hình sắc nét và chuyển động mượt mà\r\nChiến game dài lâu, không lo thiếu pin - Viên pin dung lượng 5000mAh cho thời gian xem video liên tục đến 21 giờ\r\nHiệu năng chiến binh mạnh mẽ - Snapdragon® 695 cùng tốc độ 5G giúp bạn thoải mái chiến game và bắt kịp mọi trận đấu\r\nThiết kế chuẩn gaming - Phong cách độc đáo với 3 phiên bản màu sắc thời thượng phù hợp với bất kể cá tính nào', 0),
(23, 4, 'OPPO Reno8 T 4G 256GB', 8490000, 7216500, '20.webp', 10, 0, 15, 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế thời thượng - Tràn viền, mỏng nhẹ đặc biệt phù hợp với các bạn trẻ, yêu khám phá xu hướng mới\r\nGiải trí ấn tượng - Màn hình 16 triệu màu, tần số quét 90Hz ấn tượng\r\nChụp ảnh chân dung chuyên nghiệp - Camera 100MP sắc nét đi kèm thuật toán AI\r\nPin dùng cả ngày - Viên pin lớn 5000 mAh, sạc siêu nhanh đến 67 W', 0),
(24, 4, 'OPPO A77s', 6290000, 5032000, '21.webp', 10, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nNâng tầm trải nghiệm thị giác - Tấm nền IPS LCD với kích thước 6.56 inch, tần số quét 90Hz\r\nNăng lượng tiếp sức cho cả ngày dài - 5000 mAh, sạc siêu nhanh SuperVOOC 33 W\r\nLong lanh từ trong ra ngoài với thiết kế OPPO Glow, mặt lưng hoàn thiện từ thủy tinh hữu cơ\r\nTrải nghiệm ổn định mọi tác vụ - Chip Snapdragon 680 8, RAM 8 GB và khả năng mở rộng RAM', 1),
(25, 4, 'OPPO Reno7 4G (8GB - 128GB)', 7990000, 6392000, '22.webp', 10, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nMàn hình chất lượng, thoả sức khám phá và giải trí - 6.43 inches, AMOLED, Full HD+\r\nCamera chất lượng với cảm biến thế hệ mới - Cụm 3 camera 64 MP, đa dạng chế độ chụp\r\nChiến game ổn định nhờ con chip mạnh mẽ - Snapdragon™ 680, RAM 8GB\r\nKhông lo gián đoạn với viên pin lớn 4500 mAh, sạc nhanh SUPERVOOCTM 33W', 4),
(26, 2, 'Samsung Galaxy Z Fold5 12GB 256GB', 40990000, 32792000, '23.webp', 15, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế tinh tế với nếp gấp vô hình - Cải tiến nếp gấp thẩm mĩ hơn và gập không kẽ hở\r\nBền bỉ bất chấp mọi tình huống - Đạt chuẩn kháng bụi và nước IP68 cùng chất liệu nhôm Armor Aluminum giúp hạn chế cong và xước\r\nMở ra không gian giải trí cực đại với màn hình trong 7.6\"\" cùng bản lề Flex dẫn đầu công nghệ\r\nThoải mái sáng tạo mọi lúc - Bút Spen tiện dụng giúp bạn phác hoạ và ghi chép không cần đến sổ tay\r\nHiệu năng cân mọi tác vụ - Snapdragon® 8 Gen 2 for Galaxy xử lí mượt mà, đa nhiệm mượt mà', 7),
(27, 2, 'Samsung Galaxy S23 8GB 128GB', 22990000, 18392000, '24.webp', 8, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nHiệu năng vượt trội với con chip hàng đầu Qualcomm - Phục vụ tốt nhu cầu đa nhiệm ngày của người dùng.\r\nTrang bị bộ 3 ống kính với camera chính 50MP - Đem lại khả năng quay video và chụp ra những bức ảnh tốt, hài hòa, sống động hơn.\r\nNâng cấp trải nghiệm với màn hình Dynamic AMOLED 2X - Phù hợp dùng để xem phim hay chơi các tựa game có nội dung hình ảnh đồ họa cao.\r\nSở hữu lối thiết kế sang trọng, đẳng cấp cùng các bảng màu sắc thời thượng, trẻ trung.', 59);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(5) NOT NULL,
  `hovaten` varchar(50) DEFAULT NULL,
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sodienthoai` varchar(20) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `role` tinyint(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `hovaten`, `tendangnhap`, `matkhau`, `email`, `sodienthoai`, `diachi`, `role`) VALUES
(1, 'Nguyễn Đình Cường', 'cuongsix2004', 'cuongsix2004', 'cuongndph38237@fpt.edu.vn', '0964426518', 'Phú Nghĩa, Chương Mỹ, Hà Nội', 1),
(2, 'Nguyễn Thiện Giáp', 'thiengiap2004', 'thiengiap2004', 'giapntph38266@fpt.edu.vn', '0357864779', 'Hà Nội', 1),
(3, 'Nguyễn Hồng Phúc', 'nguyenhongphuc', 'nguyenhongphuc', 'phucnh34678@fpt.edu.vn', '0389119333', 'Phú Thọ', 1),
(4, 'Nguyễn Viết Sơn', 'sonchuche', 'sonchuche123', 'nguyenvietson@gmail.com', '0123456789', 'Hà Nội', 0),
(5, 'Tống Hoàng Bách', 'tonghoangbach123', 'Tonghoangbach123', 'tonghoangbach@gmail.com', '0123456789', 'Bắc Giang', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bl_sp` (`idsanpham`),
  ADD KEY `fk_bl_tk` (`idtaikhoan`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ct_dh` (`iddonhang`),
  ADD KEY `fk_ct_sp` (`idsanpham`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dh_tk` (`idtaikhoan`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_sp` (`idsanpham`),
  ADD KEY `fk_cart_tk` (`idtaikhoan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sp_dm` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_bl_sp` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_bl_tk` FOREIGN KEY (`idtaikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_ct_dh` FOREIGN KEY (`iddonhang`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `fk_ct_sp` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_dh_tk` FOREIGN KEY (`idtaikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_cart_sp` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_cart_tk` FOREIGN KEY (`idtaikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_dm` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
