-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2023 lúc 06:45 PM
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
  `ngaybinhluan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `idtaikhoan`, `idsanpham`, `noidung`, `ngaybinhluan`) VALUES
(1, 4, 1, 'Dùng ổn nha shop', '2023-10-03 21:50:24');

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
  `ngaydathang` datetime NOT NULL,
  `diachinhan` varchar(255) NOT NULL,
  `sodienthoainhan` varchar(20) NOT NULL,
  `phuongthuctt` tinyint(1) NOT NULL COMMENT '0. thanh toán khi nhận hàng 1. Chuyển khoản',
  `trangthai` tinyint(1) NOT NULL COMMENT '0. chưa duyệt 1.Đã duyệt '
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
(1, 1, 'iPhone 14 Pro 128GB | Chính hãng VN/A', 24590000, 17213000, '1.webp', 1, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nTrải nghiệm thị giác ấn tượng - Màn hình Dynamic Island, sắc nét với công nghệ Super Retina XDR, mượt mà 120 Hz\r\nTuyệt đỉnh thiết kế, tỉ mỉ từng đường nét - Nâng cấp toàn diện với kiểu dáng mới, nhiều lựa chọn màu sắc trẻ trung\r\nHiệu năng hàng đầu thế giới - Apple A16 Bionic xử lí nhanh, ổn định mọi tác vụ\r\nCamera chuẩn nhiếp ảnh chuyên nghiệp - Camera sau 48MP trang bị nhiều công nghệ chụp đa dạng\r\niPhone 14 Pro đem tới trải nghiệm thị giác siêu mượt mà khi sở hữu màn hình Dynamic Island sắc nét cùng công nghệ Super Retina XDR thế hệ mới. Hiệu năng của iPhone 14 Pro 128GB mạnh mẽ với vi xử lý Apple A16 Bionic, giúp ổn định mọi tác vụ. Cụm camera sau 48MP cùng nhiều công nghệ chụp ảnh hiện đại mang tới chất lượng quay chụp ấn tượng, chuẩn nhiếp ảnh chuyên nghiệp.', 1300),
(3, 2, 'Samsung Galaxy Z Flip5 256GB', 21990000, 15393000, '10.webp', 1, 0, 30, 'Samsung Galaxy Z Flip 5 có thiết kế màn hình rộng 6.7 inch và độ phân giải Full HD+ (1080 x 2640 Pixels), dung lượng RAM 8GB, bộ nhớ trong 256GB. Màn hình Dynamic AMOLED 2X của điện thoại này hiển thị rõ nét và sắc nét, mang đến trải nghiệm ấn tượng khi sử dụng.\r\n\r\nSamsung Galaxy Z Flip 5 – Thiết kế sang trọng, cấu hình mạnh mẽ\r\nSamsung Galaxy Z Flip 5 được đánh giá cao về thiết kế cho đến cấu hình sản phẩm, điện thoại sẽ ra mắt trong thời gian sắp tới nên là đề tài bàn luận của nhiều fan thương hiệu Samsung. Với những điểm mạnh riêng của điện thoại chắc chắn sẽ không làm người dùng thất vọng khi sử dụng.\r\n\r\nCamera 12MP chụp rõ nét\r\nSamsung Galaxy Z Flip 5 trang bị cụm camera sau 12MP, rõ nét, tạo nên hình ảnh chân thực và rõ ràng hơn. Trong điện thoại có nhiều bộ lọc màu khác nhau, người dùng không cần phải tải app khác nhau để chỉnh sửa hình như trước đây.\r\n\r\nSamsung Galaxy Z Flip 5 – Thiết kế sang trọng, cấu hình mạnh mẽ\r\n\r\nBên cạnh đó, camera trước lên đến 10MP, chụp hình chân dung chân thực, tự nhiên và đẹp lung linh, sau đó nhanh chóng đăng lên mạng xã hội khoe với hội bạn thân ngay. Khả năng quay video không bị nhòe, vỡ ảnh trong quá trình quay phim kết hợp với độ phân giải cao.\r\n\r\nTrang bị chipset Snapdragon, dung lượng RAM 8GB+256GB\r\n Samsung Galaxy Z Flip 5 có cấu hình mạnh mẽ với hệ điều hành Android mới nhất, quen thuộc với nhiều sản phẩm của thương hiệu này. Con chipset Snapdragon 8 gen 2 for Galaxy cho phép máy chạy mượt mà các ứng dụng nặng. \r\n\r\nSamsung Galaxy Z Flip 5 – Thiết kế sang trọng, cấu hình mạnh mẽ\r\n\r\nKhông chỉ dừng lại ở đó, dung lượng máy lên đến RAM 8GB và bộ nhớ trong 256GB, người dùng có thể tải game với dung lượng lớn về máy mà vẫn duy trì ổn định. Không lo sảy ra tình trạng giật lag như một số sản phẩm khác.\r\n\r\nViên pin khủng 3.700 mAh\r\nSamsung Galaxy Z Flip 5 được đánh giá cao về thông số năng lượng nhờ viên pin 3700mAh và còn hỗ trợ sạc nhanh 25W. Nhờ công suất pin này, người dùng có thể thoải mái xem phim, chơi game và giải trí suốt nhiều giờ mà không cần lo lắng về việc phải nạp pin liên tục. \r\n\r\nSamsung Galaxy Z Flip 5 – Thiết kế sang trọng, cấu hình mạnh mẽ\r\n\r\nThiết kế hiện đại, sang trọng\r\nSản phẩm được thiết kế với viền màn hình mỏng nhẹ và các góc cạnh mềm mại, tạo nên một tổng thể hoàn thiện, tăng cường vẻ đẹp thẩm mỹ cho phần giao diện. Điện thoại còn cung cấp thông báo và hiển thị thông tin khác mỗi khi có người nhắn tin hay gọi điện, tính năng này khá tiện ích cho người dùng.\r\n\r\nSamsung Galaxy Z Flip 5 – Thiết kế sang trọng, cấu hình mạnh mẽ\r\n\r\nMàn hình 6.7 inch 4 phiên bản màu sắc\r\nSamsung Galaxy Z Flip 5 có màn hình chính 6.7 inch kết hợp với màn hình phụ lên tới 3.4 inch, tạo nên điểm nhấn độc đáo của Samsung Z Flip 5, mang đến trải nghiệm mới mẻ khi gập máy lại. Màn hình điện thoại full HD+ (1080 x 2640 Pixels), đồ họa Dynamic AMOLED 2X rõ đến từng chi tiết khi xem phim, lướt điện thoại.\r\n\r\nMàn hình 6.7 inch 4 phiên bản màu sắc\r\n\r\nVới 4 phiên bản màu sắc trẻ trung và sang trọng, Galaxy Z Flip 5 giúp người dùng có thể dễ dàng lựa chọn sản phẩm phù hợp với nhu cầu cá nhân và thể hiện cá tính của mình. Nhiều màu sắc từ trẻ trung đến thanh lịch, hợp với mọi độ tuổi khác nhau.', 800),
(4, 2, 'Samsung Galaxy S23 Ultra 256GB', 23990000, 16793000, '4.webp', 1, 0, 30, 'Samsung S23 Ultra là dòng điện thoại cao cấp của Samsung, sở hữu camera độ phân giải 200MP ấn tượng, chip Snapdragon 8 Gen 2 mạnh mẽ, bộ nhớ RAM 8GB mang lại hiệu suất xử lý vượt trội cùng khung viền vuông vức sang trọng. Sản phẩm được ra mắt từ đầu năm 2023.\r\n\r\nThiết kế cao cấp, đường nét thời thượng, tinh tế\r\nTiếp nối thiết kế từ những chiếc Samsung Galaxy S22 Ultra, những chiếc Samsung S23 Ultra mang dáng vẻ thanh mảnh với những đường nét được gọt giũa chỉnh chu và cực kỳ tinh tế. Với màn hình tràn viền, tỷ lệ màn hình trên thân máy hơn 90% những chiếc điện thoại S23 Ultra hứa hẹn mang đến một thiết kế thời thượng thu hút mọi ánh nhìn.\r\n\r\nThiết kế Samsung Galaxy S23 Ultra\r\n\r\nVẫn là mặt lưng nguyên khối cùng cụm camera không viền được đặt ở góc trái trên cùng logo Samsung quen thuộc nằm góc dưới mặt lưng tạo cảm giác đơn giản nhưng không kém phần nổi bật cho thiết kế. Thanh lịch nhưng đặc biệt có sức hút, đơn giản mà toát lên sự cao cấp, những chiếc Samsung S23 Ultra chắc chắn là sự lựa chọn hoàn hảo khi bình chọn những thiết kế đỉnh cao trong năm 2023.\r\n\r\nThiết kế Samsung Galaxy S23 Ultra\r\n\r\nDiện mạo của những chiếc Samsung Galaxy S23 Ultra có khả năng thu hút bất tận với chuỗi màu sắc đa dạng mà không kém phần thanh lịch, dòng điện thoại này ngay lập tức tạo nên định nghĩa vẻ đẹp công nghệ mới cho người dùng ngay khi chạm mắt.\r\n\r\nThiết kế Samsung Galaxy S23 Ultra\r\n\r\nBên cạnh đó, Samsung còn sử dụng vật liệu tái chế thân thiện với môi trường trên S23 Ultra. Theo đó các lớp kính phủ đến màu sơn đều là những điểm nhấn độc đáo trên mẫu flagship này.\r\n\r\nChipset Snapdragon 8 Gen 2, khả năng đa nhiệm đỉnh cao\r\nĐể phục vụ tốt nhu cầu đa nhiệm ngày càng nhiều của người tiêu dùng, những chiếc điện thoại thuộc thế hệ Samsung S23 ngày càng sở hữu cho mình chipset khủng và khả năng xử lý mạnh mẽ. Những chiến binh Samsung S23 Ultra cũng không nằm ngoài xu hướng và để đảm bảo khả năng xử lý cho mình, Samsung Galaxy S23 Ultra sử dụng chipset Snapdragon 8 Gen 2 Mobile Platform for Galaxy. Chipset này hứa hẹn mang đến khả năng xử lý mạnh mẽ cân mọi thao tác đặc biệt có thể chạy nền cùng lúc nhiều ứng dụng mà không gây giật lag.\r\n\r\nHiệu năng Samsung Galaxy S23 Ultra\r\n\r\nRam 8GB đến 12GB được trang bị trên Samsung S23 Ultra hứa hẹn mang đến sự đột phá cho thiết bị này và giúp xử lý dễ dàng mọi thao tác dù là ứng dụng chuyên nghiệp đòi hỏi dung lượng Ram lớn.\r\n\r\nDung lượng bộ nhớ tiêu chuẩn của dòng máy này là 256GB hứa hẹn mang đến khả năng lưu trữ tuyệt vời giúp người dùng như được trang bị thêm thư viện mini có thể mang theo mọi lúc mọi nơi mà không lo lắng về khả năng tràn bộ nhớ.\r\n\r\nMáy ảnh 200MP đột phá công nghệ nhiếp ảnh\r\nSiêu smartphone có khả năng nhiếp ảnh đỉnh cao vẫn đang là xu hướng và dự kiến sẽ còn là xu hướng trong tương lai bởi vậy các dòng smartphone ra mắt trên thị trường ngày càng quan tâm đến khả năng nhiếp ảnh. Samsung là cái tên đầu ngành với sự quan tâm đặc biệt đến lĩnh vực này, những chiếc flagship của công ty công nghệ hàng đầu Hàn Quốc này càng ngày càng có khả năng nhiếp ảnh vượt trội.\r\n\r\nCamera Samsung Galaxy S23 Ultra\r\n\r\nSamsung Galaxy S23 Ultra dường như bứt phá mọi giới hạn nhiếp ảnh điện thoại khi trang bị cho mình ống kính chính có độ phân giải lên đến 200 MP. Khả năng chụp đêm vượt trội cùng những khung hình góc siêu rộng vẫn được phát triển ở chiếc điện thoại này giúp người dùng có được những bức ảnh cực nghệ và có tính đương đại.\r\nDàn camera phụ cực chất có thêm các tính năng cảm biến độ rộng, cảm biến chiều sâu giúp bức ảnh chân thực và mang tính thời đại hơn. Camera selfie 12MP mang đến khả năng tự chụp ấn tượng và giúp bạn có những bức ảnh đẹp siêu thực mà không cần trải qua bộ lọc hay ứng dụng chỉnh sửa ảnh.\r\n\r\nCamera Samsung Galaxy S23 Ultra\r\n\r\nĐặc biệt, chế độ Expert RAW trên S23 Ultra hỗ trợ chụp ảnh với chi tiết cao. Với Expert RAW người dùng có thể sử dụng để chụp chồng hình, chụp thiên văn (chụp bầu trời, chùm sao) với độ sắc nét cao. Tính năng chụp chồng hình với khả năng chụp 9 tấm hình liên tiếp và kết hợp lại mang lại kết quả là những bức hình đậm chất nghệ thuật.\r\n\r\nMàn hình 6.8 inch – độ cong giảm nâng cao trải nghiệm hình ảnh\r\nGalaxy S23 Ultra vẫn được trang bị một màn hình lớn với kích thước lên đến 6.8 inch. Tuy nhiên, thay vì làm cong như thế hệ S22 Ultra thì độ con màn hình trên S23 Ultra sẽ giảm bớt. Nhờ thiết kế này diện tích bề mặt phẳng trên màn hình sẽ gia tăng giúp mang lại những trải nghiệm hình ảnh tốt nhất cho người dùng.\r\n\r\nMàn hình Samsung Galaxy S23 Ultra\r\n\r\nMàn hình Samsung S23 Ultra với công nghệ Dynamic AMOLED 2X mang lại khả năng tái hiện lại các chi tiết một cách hoàn hảo kể cả khi người dùng điều chỉnh độ sáng ở mức cao hoặc thấp nhất. Màn hình với tần số quét 120Hz tối ưu trong các chuyển động cuộn mang lại trải nghiệm giải trí tuyệt vời.\r\n\r\nMàn hình Samsung Galaxy S23 Ultra\r\n\r\nPin 5000 mAh – cung cấp năng lượng bền bỉ\r\nĐiện thoại Samsung S23 Ultra sẽ được trang bị viên pin dung lượng lớn 5000 mAh. Mức dung lượng này tuy không có sự khác biệt so với người tiền nhiệm S22 Ultra nhưng với nhiều tùy biến về phần mềm cùng con chip mới giúp mang lại thời gian sử dụng bền bỉ.\r\n\r\nPin Samsung Galaxy S23 Ultra\r\n\r\nKhông chỉ với dung lượng lớn, điện thoại Samsung S23 Ultra còn được trang bị chế độ siêu tiết kiệm pin giúp kéo dài thời gian sử dụng, đặc biệt ở những trường hợp khẩn cấp.\r\n\r\nSamsung Galaxy S23 Ultra - chiếc điện thoại bền bỉ \r\nKhả năng kháng nước và chống va đập vẫn được trang bị trên S23 Series. Theo đó dòng điện thoại này và Spen đi cùng đều có khả năng kháng nước đạt chuẩn IP68. Combo giáp Armor Aluminum bao quanh khung viền máy kết hợp kính cường lực Corning® Gorilla® Glass Victus®+ hứa hẹn khiến Samsung Galaxy S23 Ultra trở thành 1 tanker với khả năng chống chịu cực bền bỉ.\r\n\r\nBên cạnh đó, SPen vẫn là công cụ phụ trợ không thể thiếu. Với độ nhạy bén và chính xác gần như tuyệt đối, SPen mang đến cho người dùng những quyền năng tối thượng để có thể tối ưu hóa mọi thao tác trên chiếc điện thoại này.\r\n\r\nSamsung Galaxy S23 Ultra - chiếc điện thoại bền bỉ  \r\n\r\nKhả năng điều khiển từ xa và đồng bộ hóa mọi dữ liệu đã tạo nên 1 hệ sinh thái Samsung cực đẳng cấp và xuyên suốt giúp bạn có thể làm việc, tiếp nhận thông tin từ mọi nơi chỉ cần có thiết bị điện tử samsung bên cạnh.', 950),
(9, 1, 'iPhone 13 128GB | Chính hãng VN/A', 16190000, 11333000, '3.webp', 1, 0, 30, 'Đánh giá iPhone 13 - Flagship được mong chờ năm 2021\r\nCuối năm 2020, bộ 4 iPhone 12 đã được ra mắt với nhiều cái tiến. Sau đó, mọi sự quan tâm lại đổ dồn vào sản phẩm tiếp theo – iPhone 13. Vậy iP 13 sẽ có những gì nổi bật, hãy tìm hiểu ngay sau đây nhé!\r\n\r\nThiết kế với nhiều đột phá\r\nVề kích thước, iPhone 13 sẽ có 4 phiên bản khác nhau và kích thước không đổi so với series iPhone 12 hiện tại. Nếu iPhone 12 có sự thay đổi trong thiết kế từ góc cạnh bo tròn (Thiết kế được duy trì từ thời iPhone 6 đến iPhone 11 Pro Max) sang thiết kế vuông vắn (đã từng có mặt trên iPhone 4 đến iPhone 5S, SE).\r\n\r\nThì trên điện thoại iPhone 13 vẫn được duy trì một thiết kế tương tự. Máy vẫn có phiên bản khung viền thép, một số phiên bản khung nhôm cùng mặt lưng kính. Tương tự năm ngoái, Apple cũng sẽ cho ra mắt 4 phiên bản là iPhone 13, 13 mini, 13 Pro và 13 Pro Max.\r\n\r\nThiết kế với nhiều đột phá\r\n\r\nPhần tai thỏ trên iPhone 13 cũng có thay đổi so với thế hệ trước, cụ thể tai thỏ này được làm nhỏ hơn so với 20%, trong khi đó độ dày của máy vẫn được giữ nguyên. Điểm khác biệt nhất về thiết kế trên thế hệ iPhone 2021 này đó là camera chéo.\r\n\r\nMàu sắc trên mẫu iPhone mới này cũng đa dạng hơn, trong đó nổi bật là iPhone 13 màu hồng. Các màu sắc còn lại đề đã từng được xuất hiện trên các phiên bản trước đó như trắng, đen, đỏ, xanh blue.\r\n\r\nNhiều màu sắc lựa chọn\r\n\r\nMàn hình màn hình Super Retina XDR độ sáng cao\r\nĐiện thoại iPhone 13 sẽ được sử dụng tấm nền OLED chất lượng cao và có kích thước 6.1 inch, lớn hơn iPhone 13 mini (5.4 inch). Với tấm nền này với công nghệ ProMotion giúp iPhone 13 tiết kiệm pin đến tối đa khi sử dụng. Người dùng cũng có thể dễ dàng điều chỉnh tốc độ làm tươi tùy theo ý thích.\r\n\r\nMàn hình tần số quét 120Hz, sự xuất hiện lại của TouchID\r\n\r\nVề khả năng hiển thị, mang đến chất lượng hiển thị vượt trội với màn hình OLED độ phân giải cao, độ sáng lớn. Nhờ đó người dùng có thể nhìn rõ trong nhiều điều kiện sáng khác nhau, kể cả ngoài trời.\r\n\r\nCụ thể, màn hình Super Retina XDR với độ sáng cao lên đên 800 nits, và tối đa có thể lên tới 1200 nits cùng dải màu rộng P3, tỉ lệ tương phản lớn. Phía bên ngoài màn hình được phủ lớp oleophobic giúp chống bám vân tay. Nhờ đó hạn chế được các tình trạng bám bụi bẩn và mồ hôi trong quá trình sử dụng.\r\n\r\nCamera kép 12MP, hỗ trợ ổn định hình ảnh quang học\r\niPhone 13 có một sự thay đổi lớn về camera so với trên iPhone 12 Series. Cụ thể, iPhone có thể được trang bị ống kính siêu rộng mới giúp máy hiển thị được nhiều chi tiết hơn ở các bức hình thiếu sáng. Trong khi đó ống kính góc rộng có thể thu được nhiều sáng hơn, lên đến 47% giúp chất lượng bức ảnh, video được cải thiện hơn.\r\n\r\nCụm camera được trang bị tính năng ổn định hình ảnh quang học cùng cảm biến mới, nhờ đó bức hình chụp mang lại khả năng ổn định.\r\n\r\nCamera tiềm vọng, hỗ trợ zoom 10x\r\n\r\nSố ống kính trên iPhone 13 vẫn được giữ nguyên so với iPhone 12, chỉ khác về vị trí từng ống kinh. Cả hai ống kính vẫn sở hữu độ phân giải 12MP. Trong đó camera góc rộng được trang bị khẩu độ ƒ / 1.6 trong khi góc siêu rộng là ƒ / 2.4 cùng góc quay 120 độ.\r\n\r\nVới iP13, người dùng có thể quay phim chuyên nghiệp với chế độ điện ảnh. Cụm camera này cũng hỗ trợ người dùng chụp cùng lúc nhiều bức ảnh khác nhau mà không cần nhấc ngón tay. Đặc biệt với chế độ chân dung hỗ trợ làm mờ hậu cảnh chuyên nghiệp giúp toàn bức ảnh tập trung vào chủ thể mà người dùng hướng tới.\r\n\r\nỞ chế độ chụp Smart HDR 4, máy có thể nhận diện được tối đa bốn người khác nhau trong một khung hình. Sau đó sẽ tiến hành tối ưu hóa ánh sáng, độ tương phản và tone mày cho từng người, mang lại một bức ảnh chất lượng tốt nhất. Nếu sử dụng bên đêm để chụp các bức ảnh thiếu sáng, lúc này chế độ Deep Fusion kích hoạt và phân tích chế độ phơi sáng ở từng pixel. \r\n\r\nChế độ điện ảnh chuyên nghiệp\r\n\r\nNhờ đó, ảnh chụp trên điện thoại hứa hẹn mang đến chất lượng như được chụp từ một máy ảnh chuyên nghiệp. Hình ảnh cho ra với chi tiết rõ, dải nhạy sáng cao, màu sắc chân thực. Khả năng chụp đêm trên 13 cũng được cải thiện với khả năng phơi sáng tốt hơn mang đến nhiêu chi tiết hơn.\r\n\r\nVề camera trước, điện thoại vẫn được trang bị camera đơn nằm trong notch tai thỏ với độ phân giải 12MP cùng khẩu độ ƒ / 2.2. Camera selfie này cũng được trang bị nhiều công nghệ chụp ảnh chuyên nghiệp như hiệu ứng bokeh, chế độ điện ảnh, Animoji và Memoji,... mang lại những bức hình selfie chất lượng.\r\n\r\nCamera trước 12MP\r\n\r\nKhả năng quay video được cải thiện\r\nVề khả năng quay video, iPhone 13 có thể hỗ trợ quay video 4K ở tốc độ ở ba tốc độ khung hình khác nhau. Máy cũng hỗ trợ tính năng ổn định hình ảnh quang học cùng khả năng zoom 3x. Nhờ đó, hứa hẹn mang để khả năng quay phim chuyên nghiệp.\r\n\r\nKhả năng quay video được cải thiện\r\n\r\niPhone 13 cũng hỗ trợ nhiều công cụ tùy chỉnh nâng cao với công nghệ Dolby Vision cùng khả năng quay Video HDR với độ phân giải 4K. Đặc biệt, người dùng có thể làm mọi việc trên chiếc điện thoại này từ quay phim, chỉnh sửa đến render video một cách mượt mà.\r\n\r\nTốc độ 5G tốt hơn với nhiều băng tần\r\nThế hệ iPhone mới được cải thiện chất lượng 5G với nhiều băng tần hơn. Nhờ đó việc xem trực tuyến hay tải xuống dữ liệu diễn ra nhanh hơn. Đặc biệt với chế độ dữ liệu thông minh, thiết bị sẽ tự động phát hiện và giảm tải tốc độ khi không cần thiết kể tiết kiệm năng lượng.\r\n\r\nChip set gia tăng tốc độ 5G\r\n\r\nHiệu năng vượt trội với chip Apple A15\r\niPhone 13 Series sẽ được trang bị con chip Apple A15 Bionic, chip set được sản xuất trên quy trình 5nm. Theo nhà sản xuất, con chip Apple A15 Bionic cho CPU nhanh hơn 50% và GPU nhanh hơn 30% so với đối thủ.\r\n\r\nHiệu năng vượt trội với chip Apple A15\r\n\r\nHiệu năng trên iPhone là một điều khỏi phải bàn cãi. Vẫn mang trọng mình một sức mạnh vượt trội nhờ con chip Apple A15 được tối ưu, hệ điều hành iOS tùy biến. iPhone 13 cũng có thể chiến tốt mọi tựa game mới nhất mới max cấu hình đồ họa, mang đến những trải nghiệm chơi game mượt mà.\r\n\r\nCông nghệ pin mới nâng cao thời gian sử dụng\r\nVới bộ vi xử lý mới được tối ưu, điện thoại iPhone 13 mang lại viên pin với thời gian sử dụng lâu dài hơn. Cũng như mọi năm, Apple không tiết lộ chính xác dung lượng pin cụ thể trên thiết bị của mình. Tuy hiên, theo hãng công bố thì thời lượng sử dụng pin trên iPhone 13 sẽ được gia tăng đáng kể lên khoảng 2,5 tiếng so với thế hệ trước đó.\r\n\r\nCông nghệ pin mới nâng cao thời gian sử dụng\r\n\r\nDung lượng bộ nhớ được mở rộng\r\niPhone 12 sở hữu bộ nhớ tiêu chuẩn 64GB và cao cấp nhất là 512GB. Nhưng sang iPhone 13 lại khác, iPhone 13 phiên bản cao cấp có thể sẽ loại bỏ phiên bản 64GB thay vào đó bản dung lượng bộ nhớ tiêu chuẩn là 128GB cùng tùy chọn dung lượng lớn nhất lên đến 512B.  \r\n\r\nDung lượng bộ nhớ được mở rộng\r\n\r\nVề dung lượng RAM, chưa có thông tin chi tiết. Tuy nhiên, dự đoạn sẽ được trang bị bộ nhớ RAM từ 4-6GB. Với dung lượng này, người dùng có thể thoải mái đa nhiệm trong sử dụng hàng ngày.\r\n\r\nCách tính năng khác: thẻ sim, wifi, siri\r\nNgoài những điểm trên, iPhone 13 cũng vẫn được trang bị 2 sim (1 sim vật lý và 1 esim), tiếp tục hỗ trợ 5G như trên iPhone 12. Các kết nối không dây khác như wifi, bluetooth cũng được trang bị những công nghệ mới. Hey Siri cũng là một tính năng yêu thích của người dùng iPhone.\r\n\r\nCách tính năng khác: thẻ sim, wifi, siri\r\n\r\nMáy vẫn được trang bị công nghệ mở khóa và bảo mật Face ID - nhận đạng khuôn mặt với tốc độ nhanh hơn. Bên cạnh đó là chuẩn kháng nước và bụi bẩn IP68 theo chuẩn IEC 60529.', 1150),
(11, 1, 'iPhone 14 128GB | Chính hãng VN/A', 18590000, 13013000, '9.webp', 1, 0, 30, 'iPhone 14 128GB sở hữu màn hình Retina XDR OLED kích thước 6.1 inch cùng độ sáng vượt trội lên đến 1200 nits. Máy cũng được trang bị camera kép 12 MP phía sau cùng cảm biến điểm ảnh lớn, đạt 1.9 micron giúp cải thiện khả năng chụp thiếu sáng. Mẫu iPhone 14 mới cũng mang trong mình con chip Apple A15 Bionic phiên bản 5 nhân mang lại hiệu suất vượt trội.\r\n\r\niPhone 14\r\n\r\nBên cạnh thiết kế và cấu hình, điện thoại iPhone 14 mới ra mắt này còn có gì? bao nhiêu màu sắc, phiên bản bộ nhớ trong cũng như giá bán ra sao, hãy tiếp tục tìm hiểu ngay sau đây.\r\n\r\nƯu đãi hấp dẫn khi mua hàng - trả góp iPhone 14 series tại CellphoneS\r\nKhi lựa chọn mua iPhone 14 Series tại CellphoneS, quý khách hàng không chỉ nhận được sản phẩm chất lượng, chính hãng VN/A mmaf bên cạnh đó còn được trải nghiệm nhiều chương trình giảm giá hấp dẫn, trừ thẳng vào giá sản phẩm. Chi tiết ưu đãi cho khách hàng khi mua điện thoại iPhone 14 series tại CellphoneS như sau:\r\n\r\nGiảm thêm đến 1% cho thành viên Smember (tuỳ sản phẩm).\r\n1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider).\r\nMở thẻ VPBank ưu đãi đến 800K.\r\nGiảm thêm 5% (tối đa 500K) khi thanh toán qua Kredivo.\r\nNhận voucher mua hàng 200K khi mở thẻ tín dụng VIB.\r\nGiảm đến 100K khi thanh toán qua Shopee Pay.\r\nThu cũ lên đời giá cực tốt, chỉ từ 17.190.000 đồng.\r\nTrả góp 0%, trả trước chỉ từ 7.676.000 đồng.\r\nLưu ý: Một số chương trình khuyến mãi có thể kết thúc trước hạn, quý khách vui lòng truy cập website hoặc liên hệ hotline 1800.2097 để được tư vấn.\r\n\r\nNgoài ra, mới đây Apple cũng đã trình làng dòng điện thoại iPhone 15 Series với nhiều nâng cấp mới so với thế hệ trước. Khách hàng có thể đặt trước các phiên bản trong đó có iPhone 15 128GB tại CellphoneS từ ngày 22/9 để được hưởng nhiều khuyến mãi hấp dẫn.\r\n\r\niPhone 14 màu vàng (Yellow) mới\r\niPhone 14 vàng là phiên bản màu sắc mới được Apple cập nhật vào tháng 3/2023. Điện thoại iPhone 14 vàng chanh này được hoàn thiệt mặt sau bằng kinh và cạnh viền nhôm màu vàng rực rõ. Các chi tiết khác sẽ giống những mẫu iPhone 14 phiên bản màu khác. Cụ thể, iPhone 14 vàng được trang bị màn hình OLED 6.1 inch siêu sắc nét. Hiệu năng vượt trội tới từ chipset đầu bảng - A15 Bionic. Hệ thống camera với nhiều cải tiến mới cùng dung lượng pin 3279mAh giúp nâng cao trải nghiệm của người dùng.\r\n\r\nMở hộp iPhone 14 màu vàng\r\nẤn tượng đầu tiên của người dùng khi mở hộp iPhone 14 phiên bản màu vàng có lẽ là sự chỉn chu, tinh tế trong cách đóng gói của Apple. Cácc lớp Seal, nhãn mác của hộp iPhone 14 màu vàng được kiểm tra kỹ và bảo đảm nguyên vẹn. Qua đó, ta có thể dễ dàng thấy được là Apple cực kỳ coi trọng khâu đóng gói sản phẩm. \r\n\r\nVề tổng quan, vỏ hộp của iPhone 14 có tông màu trắng chủ đạo. Phía trước hộp là hình ảnh lớn, được in khá rõ nét của sản phẩm. Ở phía mặt sau, Apple thông tin đầy đủ đến người dùng các thông số chi tiết của iPhone 14 vàng như: số máy, mã máy. \r\n\r\nNgay sau khi mở hộp, người dùng có thể thấy ngay được chiếc iPhone 14 vàng được đặt gọn gàng ở phía bên trong. Máy được đặt úp trong hộp, để lộ phần mặt lưng bóng bẩy cùng cụm camera đôi sang trọng.\r\n\r\nMở hộp iPhone 14 màu vàng\r\n\r\nĐi kèm theo đó vẫn là những phụ kiện không thể thiếu của iPhone 14 phiên bản màu vàng là: que chọc Sim, giấy hướng dẫn sử dụng, dây sạc Lightning và miếng dán hình quả Táo. Do chính sách bảo vệ môi trường nên trong phiên bản này, người dùng cũng sẽ không được trang bị hộp sạc bên trong hộp sản phẩm.\r\n\r\nMẫu iPhone 14 vàng chanh được hoàn thiện với mặt lưng kinh vàng và cạnh nhôm. Tổng thể sắc vàng trên iPhone 14 mới này khá rực rỡ. Khung nhôm trên iPhone cũng được trang bị sắc vàng, nhưng so với mặt lưng thì sắc vàng này có phần xỉn màu hơn đôi chút.\r\n\r\nSo với sắc vàng đã từng xuất hiện trên iPhone Xr thì Phone 14 vàng chanh sở hữu màu sắc rực rỡ hơn.\r\n\r\nTrên tay iPhone 14 vàng - Sang trọng, thời thượng trong từng chi tiết\r\nĐiện thoại iPhone 14 vàng được người tiêu dùng đánh giá là smartphone mạnh mẽ và đáng mua ở thời điểm hiện tại. Thiết bị hấp dẫn người dùng nhờ sở hữu hàng loạt những thông số kỹ thuật ấn tượng về cả thiết kế bên ngoài lẫn hiệu năng bên trong. Vậy cụ thể thì đột phá công nghệ này được Apple ưu ái trang bị cho những gì? Cùng mình tìm hiểu ngay về iPhone 14 vàng trong bài viết này nhé!\r\n\r\nThiết kế sang trọng, sắc vàng thời thượng, tinh tế\r\nNgoài sự khác biệt về sắc vàng thì phiên bản màu mới này của iPhone 14 sẽ không có sự thay đổi về thiết kế. Phần viền thân máy của iPhone 14 khá mỏng chỉ khoảng 7.8mm. Thiết kế tai thỏ trên iPhone 14 vàng cũng gọn hơn so với thế hệ iPhone 13.\r\n\r\nThiết kế iPhone 14 vàng\r\n\r\nCác thông số còn lại của iPhone 14 so với thế hệ tiền nhiệm là gần như không có gì thay đổi. Máy vẫn sở hữu kiểu dáng vô cùng sang trọng, thời thượng. Những đường con bo mềm mại ở góc cùng cạnh viền thân máy được thiết kế dạng phẳng, giúp người dùng có cảm giác cầm nắm nhẹ nhàng, thoải mái.\r\n\r\nMàn hình hiển thị sắc nét, chân thực trong từng khung hình hiển thị\r\nVề chất lượng hình ảnh, iPhone 14 vàng được người dùng đánh giá khá cao về khả năng hiển thị siêu mượt mà và cực kỳ sống động. Cụ thể, màn hình của iPhone 14 được hoàn thiện từ tấm nền Super Retina XDR 6.1 inch cùng với độ phân giải lên tới 2532 x 1170 pixels.\r\n\r\nĐồng thời, iPhone 14 còn sở hữu tốc độ làm mới 60Hz cùng các cảm biến màn hình hiện đại như: cảm biến tiệm cận, cảm biến ánh sáng xung quanh. Nhờ đó, mọi khung hình chuyển động được thể hiện trên iPhone 14 vàng đều vô cùng mượt mà, chân thực.\r\n\r\nMàn hình iPhone 14 vàng\r\n\r\nThông số màn hình này của thế hệ iPhone mới khá tương đồng với các màu sắc khác. Chất lượng hiển thị của nó cũng đã được kiểm nghiệm qua nhiều phiên bản khác nhau. Do đó, bạn hoàn toàn có thể an tâm về chất lượng hình ảnh khi trải nghiệm xem phim, chơi game trên iPhone 14 nhé!\r\n\r\nCấu hình mạnh mẽ, dung lượng bộ nhớ cao\r\nSo với những smartphone cùng phân khúc khác thì hiệu năng xử lý của iPhone 14 128GB không hề thua kém bất kỳ sản phẩm nào. Máy được tích hợp chipset A15 Bionic siêu mạnh mẽ. Do được cải thiện đáng kể về GPU nên hiệu suất xử lý của iPhone 14 đã tăng lên 18% so với thế hệ trước đó.\r\n\r\nVới thông số này, mọi tựa game đồ hoạ cao cấp nhất cũng đều có thể được trải nghiệm vô cùng mượt mà trên iPhone 14 bản vàng tiêu chuẩn. \r\n\r\nCấu hình iPhone 14 vàng\r\n\r\nChưa dừng lại ở đó, iPhone thế hệ thứ 14 cũng nổi trội với những thông số dung lượng cực kỳ ấn tượng. Smartphone mới này được trang bị bộ nhớ RAM lên tới 6GB. Với khả năng đa nhiệm hoàn hảo tới từ bộ nhớ RAM này, người dùng có thể cùng lúc trải nghiệm được nhiều tác vụ mà không gặp bất kỳ tình trạng giật, lag nào. \r\n\r\nNgoài ra, máy còn sở hữu 128GB bộ nhớ trong, đem tới cho người dùng không gian lưu trữ tuyệt vời. Bạn có thể thoải mái lưu trữ dữ liệu cá nhân, tải về nhiều ứng dụng lớn mà không phải lo về tình trạng thiếu hụt bộ nhớ.\r\n\r\nThời lượng pin lớn, công nghệ sạc nhanh hiện đại\r\nCung cấp năng lượng hoạt động cho iPhone 14 vàng 128GB là viên pin 3279mAh. Đối với một thiết bị iPhone thì đây là số liệu khá ấn tượng. Với thông số nổi trội về dung lượng pin này, bạn có thể trải nghiệm được smartphone mới này trong nhiều giờ liên tục.\r\n\r\nQuá trình nạp lại năng lượng cho iPhone thế hệ thứ 14 này cũng được tối ưu hơn rất nhiều nhờ sở hữu công suất sạc 20W. Thông qua cổng sạc Lightning, hiệu suất nạp pin 20W này có thể giúp người dùng tiết kiệm được kha khá thời gian. Quá trình nạp lại pin cho iPhone giờ đây không còn là nỗi lo đối với các iFan rồi nhé!\r\n\r\nPin iPhone 14 vàng\r\n\r\nNgoài ra, iPhone 14 còn được tích hợp tính năng sạc không dây thường và sạc không dây Magsafe, đem tới cho người dùng những trải nghiệm sạc Pin tốt nhất.\r\n\r\nCụm camera chất lượng cao, nhiều tính năng quay chụp hiện đại\r\nHệ thống quay chụp trên thế hệ iPhone thứ 14 này có khá nhiều nâng cấp đáng giá. Dù vẫn sở hữu 2 ống kính hệt như phiên bản trước nhưng bên trong đó đã được tuỳ chỉnh đặc biệt để mang tới cho người dùng những trải nghiệm quay chụp sống động nhất.\r\n\r\nCụ thể, hai camera 12MP của iPhone 14 được trang bị hàng loạt những công nghệ đỉnh cao như: quay phim 4K 60FPS, quay siêu chậm, chống rung quang học, chụp đêm. Nhờ đó, bạn có thể thỏa mãn được niềm đam mê quay chụp của mình dưới lăng kính hiện đại của iPhone 14 vàng.\r\n\r\nCamera iPhone 14 vàng\r\n\r\nCamera trước của iPhone 14 cũng có những điểm nhấn khá ấn tượng. Nhờ khả năng xóa phông, tự động lấy nét,… người dùng sẽ có được những tấm hình selfie đỉnh cao. Bắt kịp và lưu giữ mọi khoảnh khắc vui nhộn của người dùng.', 1200),
(12, 1, 'iPhone 11 128GB | Chính hãng VN/A', 12190000, 8533000, '7.webp', 1, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nMàu sắc phù hợp cá tính - 6 màu sắc bắt mắt để lựa chọn\r\nHiệu năng mượt mà, ổn định - Chip A13, RAM 4GB\r\nBắt trọn khung hình - Camera kép hỗ trợ góc rộng, chế độ Night Mode\r\nYên tâm sử dụng - Kháng nước, kháng bụi IP68, kính cường lực Gorilla Glass', 1000),
(13, 4, 'OPPO Find N3 Flip 12GB 256GB', 22990000, 16093000, '11.webp', 1, 0, 30, 'Đánh giá OPPO Find N3 Flip - Smartphone màn hình gập ấn tượng\r\nOPPO Find N3 Flip trở lại lần này với rất nhiều sự mong đợi và kỳ vọng từ người dùng. Và một điều chắc chắn là smartphone sẽ sở hữu những ưu điểm vượt trội và mang lại nhiều điều ấn tượng. Hãy cùng theo dõi để biết được thế hệ kế nhiệm - OPPO Find N3 Flip có gì mới và có điều gì đặc biệt nhé.\r\n\r\nCùng ra mắt trong N3 Series năm nay còn có OPPO Find N3 với những cải tiến nổi bật. Mời bạn tìm hiểu thêm về giá bán, ngày ra mắt và những thay đổi đáng giá trên OPPO Find N3 Fold năm nay tại CellphoneS.\r\n\r\nSự trang bị của chipset Dimensity 9200 mang lại cấu hình mạnh mẽ\r\nTheo tiết lộ mới nhất, chiếc điện thoại OPPO Find N3 Flip sẽ được sử dụng con chip Dimensity 9200. Một con chip có sự cải tiến hơn rất nhiều so với phiên bản trước đó, hỗ trợ cho điện thoại cân mọi tác vụ công việc nặng nhẹ một cách dễ dàng. Ngoài ra, chúng còn góp phần cải thiện về hiệu năng một cách mạnh mẽ hơn.\r\n\r\nOPPO Find N3 Flip sử dụng con chip Dimensity 9200 mạnh mẽ\r\n\r\nVề mức dung lượng RAM, để giúp cho thiết bị có sự đa nhiệm và mượt mà hơn, OPPO Find N3 Flip được hỗ trợ dung lượng 12GB. Cạnh đó, người dùng còn có nhiều sự lựa chọn hơn với bộ nhớ trong 256 GB Những con số hoàn chỉnh, đáp ứng tốt nhất cho nhu cầu lưu trữ và sử dụng của người dùng.\r\n\r\nCamera với chất lượng vượt xa kỳ vọng\r\nChất lượng về độ phân giải của camera dường như vượt trội hơn hẳn so với mong đợi của người dùng. Camera chính của Find N3 Flip được hãng OPPO trang bị độ phân giải 50MP, đáp ứng tốt nhu cầu chụp ảnh. Cạnh đó, smartphone cũng được trang bị thêm một chiếc camera góc siêu rộng với độ phân giải 48 MP và ống kính tele 32MP.\r\n\r\nCamera chính của Find N3 Flip có độ phân giải lớn 50MP\r\n\r\nCó thể nói rằng camera selfie của OPPO chưa bao giờ làm người dùng phải thất vọng. Nhất là khi N3 Flip được hỗ trợ máy ảnh mặt trước 32 MP cùng nhiều tính năng nâng cấp để mang đến hình ảnh sắc nét và chi tiết nhất.\r\n\r\nMàn hình chính AMOLED 6.8 inch cho những trải nghiệm thị giác tốt nhất\r\nMàn hình của OPPO N3 Flip được biết vẫn giữ nguyên so với bản tiền nhiệm. Bởi những thông số đó đã cho người dùng có được những trải nghiệm tốt nhất về mặt thị giác, kể cả là những thao tác tay vuốt chạm. Cụ thể, smartphone vẫn sẽ sở hữu màn hình chính 6.8 inch với độ phân giải cao cùng tấm nền AMOLED đỉnh cao. Màn hình chính còn trang bị tần số quét 120Hz, kết hợp với công nghệ COE và HDR10+ giúp hình ảnh hiển thị sắc nét, mượt mà, màu sắc chi tiết và sống động hơn.\r\n\r\nOPPO Find N3 Flip sở hữu màn hình chính AMOLED 6.8 inch\r\n\r\nVề mặt thiết kế, đương nhiên là OPPO vẫn sẽ giữ nguyên những nét đặc trưng của một chiếc điện thoại có thiết kế dạng gập vỏ sò. Nhưng, khả năng cao hãng sẽ tối ưu chiếc điện thoại mới nhất của mình để chúng trở nên linh hoạt và gọn nhẹ hơn. \r\n\r\nNhững nâng cấp mạnh mẽ về dung lượng pin và khả năng sạc nhanh\r\nDù không có sự thay đổi nhiều về các thông số trên màn hình nhưng OPPO N3 Flip sẽ có những sự đột phá hơn ở dung lượng pin. Theo đó, điện thoại sẽ có sự nâng cấp hơn so với thế hệ trước với viên pin năng lượng 4.300 mAh. Đây là một con số tương đối ấn tượng, nhất là đối với những chiếc smartphone có thể kế gập vỏ sò.\r\n\r\nOPPO Find N3 Flip có viên pin 4300mAh cùng sạc nhanh SUPERVOOC 44W\r\n\r\nVà hơn thế, điện thoại OPPO N3 Flip cũng đã được cải thiện mạnh mẽ ở khả năng sạc nhanh SUPERVOOC 44W. Sự trang bị mạnh mẽ này, giúp cho người dùng tiết kiệm được rất nhiều thời gian pin sạc và có trải nghiệm sử dụng được liền mạch hơn. Ngoài ra, với hệ thống anten 360 độ bố trí khắp thân máy, bạn sẽ không lo mất tín hiệu khi gọi điện thoại, chơi game hay lướt mạng xã hội.\r\n\r\nThiết kế gập linh hoạt, gọn nhẹ trên tay\r\nSản phẩm được thiết kế gập nhỏ gọn trong lòng bàn tay, dễ dàng bỏ túi di chuyển đến mọi nơi. Bản lề được chế tạo tinh xảo, người dùng có thể cảm nhận được sự thay đổi ánh sáng và bóng tối, tựa như ánh sáng của viên đá quý sang trọng. Không chỉ vậy, cụm camera Oppo Find N3 Flip được đặt trong module hình tròn nổi bật, độc đáo. Thanh trượt ở cạnh bên hỗ trợ chuyển đổi giữa các chế độ như Chuông, Rung hay Im lặng chi trong tích tắc.', 1100),
(14, 2, 'Samsung Galaxy M34 5G 8GB 128GB', 7490000, 5243000, '12.webp', 1, 0, 30, 'Samsung Galaxy M34 5G - Mạnh mẽ và ổn định\r\nGalaxy M34 5G chỉ mới vừa được ra mắt cách đây không lâu nhưng đã tạo nên được tiếng vang đặc biệt. Điểm ấn tượng đầu tiên chính là tân binh mới này đã có những nâng cấp thú vị cho với bản tiền nhiệm. Vậy hãy cùng bài viết này tìm hiểu xem, liệu rằng Galaxy M34 5G sẽ tạo nên những điểm nhấn gì ở cấu hình, camera, dung lượng pin và giá cả nhé.\r\n\r\nKhả năng nhiếp ảnh đỉnh cao mới\r\nVới hệ thống camera đa dạng, Samsung Galaxy M34 5G mang đến khả năng chụp ảnh đa phong cách và chất lượng cao. Bộ 3 camera phía sau gồm cảm biến chính 50MP, sẽ ghi lại mọi chi tiết rõ nét trong mỗi bức ảnh. Ống kính 8MP cho góc chụp siêu rộng mở ra không gian bao quát, giúp bạn chụp cảnh đẹp rộng lớn mà không bị hạn chế không gian. Cuối cùng là camera macro 2MP cho phép ghi lại những chi tiết tinh tế.\r\n\r\nSamsung Galaxy M34 5G - Mạnh mẽ và ổn định\r\n\r\nMặt trước của điện thoại cũng không thua kém với cảm biến 13MP, giúp người dùng có thể chụp ảnh selfie sắc nét và tự tin thể hiện vẻ đẹp của mình. Cùng có với đó là những tính năng và công nghệ chụp ảnh đi kèm, giúp cho những tác phẩm nhiếp ảnh của chiếc điện thoại trở nên độc đáo và đẹp mắt.\r\n\r\nNâng cấp về cấu hình và phiên bản giao diện mới\r\nSamsung Galaxy M34 5G sẽ được sở hữu con chip Exynos 1280 - đây chính là chip mới nhất của nhà Samsung. Exynos 1280 là một chipset có thể cho hiệu suất chơi game mạnh mẽ được sản xuất trên quy trình 5 nm. Nhờ đó mà smartphone mới nhất của dòng Samsung Galaxy M có thể đáp ứng được tốt nhu cầu chơi game của người dùng với các tựa game như Liên Quân Mobile, PUBG Mobile,..cùng mức đồ hoạ được thiết lập phù hợp.\r\n\r\nSamsung Galaxy M34 5G - Mạnh mẽ và ổn định\r\n\r\nNgoài ra, thiết bị còn mang đến một hệ thống bộ nhớ với 128 GB. Đi cùng đó là dung lượng RAM 8 GB, người dùng có thể tự do lựa chọn phiên bản phù hợp với nhu cầu sử dụng. Và ở phiên bản nào thì chúng cũng có thể hỗ trợ người dùng hoạt động đa nhiệm hơn với nhiều tác vụ. \r\n\r\nGalaxy M34 5G còn được tích hợp chạy trên Android với giao diện One UI khi xuất xưởng. Thiết bị sẽ được nhận phiên bản Android lớn và thời gian quy định vá lỗi bảo mật. \r\n\r\nViên pin cực khủng cùng những tính năng nổi bật\r\nĐiểm nhấn của chiếc điện thoại Galaxy M34 5G ngoài về cấu hình còn là viên pin với dung lượng cực khủng 6,000 mAh. Mức năng lượng này cho phép người dùng có thể sử dụng điện thoại để chơi game hay làm việc cả ngày mà không phải lo lắng. Ngoài ra, chế độ hỗ trợ sạc nhanh 25W cũng sẽ giúp thiết bị lấy lại năng lượng một cách nhanh chóng và tiện lợi.\r\n\r\nSamsung Galaxy M34 5G - Mạnh mẽ và ổn định\r\n\r\nBên cạnh các yếu tố trên thì điện thoại Samsung M34 5G còn được bổ sung thêm những tính năng quan trọng hỗ trợ mở khóa bằng khuôn mặt hay qua cổng USB Type-C, cảm biến vân tay dưới màn hình,... Galaxy M34 5G còn đảm bảo tốc độ internet nhanh chóng, mượt mà và đáng tin cậy nhờ việc tích hợp thêm 5G và 4G LTE. Và kết nối Wi-Fi 802.11 b/g/n/ac và Bluetooth sẽ hỗ trợ lướt web, xem video và chia sẻ dữ liệu dễ dàng.\r\n\r\nĐơn giản, thanh lịch, thể hiện phong cách riêng\r\nSamsung Galaxy M34 5G được thiết kế với một phong cách hiện đại cùng điểm nhấn notch hình giọt nước tạo nên sự kết hợp hoàn hảo giữa thẩm mỹ và tính năng. Ba màu sắc thể hiện cho ba cá tính khác nhau là Prism Silver, Midnight Blue và Waterfall Blue, đơn giản nhưng vô cùng sang trọng. Chính những thiết kế đã mang đến sự lựa chọn đa dạng cho người dùng, thoải mái thể hiện phong cách riêng của mình. \r\n\r\nSamsung Galaxy M34 5G - Mạnh mẽ và ổn định\r\nMàn hình và khả năng hiển thị ấn tượng\r\nĐiện thoại Samsung Galaxy M34 5G sở hữu màn hình Super AMOLED Full HD+ 6.5 inch vừa vặn. Tốc độ làm mới 120Hz sẽ giúp cho chiếc smartphone hạn chế tình trạng hình ảnh giật lag hay bị vỡ. Màn hình còn được trang bị thêm một tấm kính cường lực bảo vệ, khó có thể bị hỏng, vỡ hay tổn thương khi gặp những va chạm trực tiếp.', 0),
(15, 4, 'OPPO Find N3 16GB 512GB', 44990000, 31493000, '13.webp', 1, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nBậc thầy thiết kế, siêu mỏng nhe - Mỏng chỉ 239g, nhẹ chỉ 5.8mm với nếp gấp tàng hình\r\nRực rõ mọi màn hình hiển thị - Kích thước lên đến 7.8mm, độ phân giải 2K+ cùng tần số quét 120Hz mượt mà\r\nBậc thầy nhiếp ảnh - 3 camera hàng đầu đến 64MP kết hợp cùng đa dạng chế độ chụp hoàn hảo\r\nNâng cao hiệu suất sử dụng - Chip MediaTek Dimensity 9200 5G mạnh mẽ cùng hàng loạt tính năng đa nhiệm thông tinh\r\nOPPO Find N3 được chính thức ra mắt ngày 26/10 tại thị trường Việt Nam mang đến nhiều nâng cấp mới mẻ. Trên phiên bản điện thoại gập thế hệ thứ 3 này, OPPO tạo ra một mẫu flagship mạnh mẽ hơn với chip Qualcomm Snapdragon® 8 Gen 2 Mobile Platform, 16GB RAM, màn hình chính 7.82 inch, màn hinh ngoài 6.31 inch cùng hệ thống camera Hasselblad đầy ấn tượng.', 0),
(16, 3, 'Xiaomi Redmi Note 12 8GB 128GB', 4990000, 3493000, '14.webp', 1, 0, 30, 'Điện thoại Xiaomi Redmi Note 12 8GB Vàng - Cấu hình vượt trội, quay chụp đỉnh cao\r\nXiaomi Redmi Note 12 8GB 128GB có lẽ là cái tên được nhắc tới nhiều nhất khi nói về các dòng smartphone tốt trong phân khúc giá tầm trung. Thế hệ 12 của Series Xiaomi Redmi Note này được đánh giá cao về thiết kế thời thượng bên ngoài cùng hiệu năng mạnh mẽ thông qua chipset Qualcomm hiện đại. Dưới này là các đánh giá chi tiết về thông số kỹ thuật của Xiaomi Redmi Note 12 mà bạn có thể tham khảo thêm nhé!\r\n\r\nTrải nghiệm mượt mà mọi tác vụ với chipset Snapdragon 685 hiện đại\r\nSức mạnh xử lý, tính toán của Xiaomi Redmi Note 12 vàng tới từ con chip hiện đại của nhà Qualcomm - Snapdragon 685. Đây là con chip được sản xuất trên tiến trình 6nm, mang lại hiệu suất ấn tượng với tốc độ xung nhịp tối đa lên tới 2.8GHz. \r\n\r\nHIệu năng Xiaomi Redmi Note 12 8GB Vàng\r\n\r\nĐiều này đảm bảo cho máy luôn hoạt động mượt mà và hiệu quả trong các tác vụ hàng ngày như đàm thoại, lướt web và xem phim. Không chỉ vậy, Redmi Note 12 8GB còn hỗ trợ chơi các tựa game phổ biến như Liên Quân Mobile và PUBG Mobile với cấu hình phù hợp, đem tới trải nghiệm tốt nhất cho người dùng. Cụ thể, qua các bài test hiệu năng máy mang lại 360216 điểm trên phần mềm Benchmark và trên Geekbench 6 thì thiết bị cho 436 điểm đơn nhân và 1440 điểm đa nhân.\r\n\r\nHIệu năng Xiaomi Redmi Note 12 8GB Vàng\r\n\r\nCải thiện khả năng nhiếp ảnh với cảm biến camera lên tới 50MP\r\nVới bộ cảm biến 3 camera, bao gồm camera chính 50MP, camera góc siêu rộng 8MP và camera macro 2MP, Xiaomi Redmi Note 12 8GB cho phép người dùng thỏa sức ghi lại các phong cảnh khác nhau với chất lượng cực kỳ sắc nét.\r\n\r\nCamera Xiaomi Redmi Note 12 8GB Vàng\r\n\r\nĐồng thời, máy cũng hỗ trợ tính năng chụp ảnh chân dung với hiệu ứng bokeh tự nhiên, mang lại những bức ảnh đẹp và đầy ấn tượng. Thông qua cụm cảm biến hiện đại này của Redmi Note 12, bạn sẽ có được những trải nghiệm chụp ảnh và quay video cực kỳ tuyệt vời.\r\n\r\nThỏa sức làm việc giải trí suốt ngày dài với viên pin 5000mAh\r\nSo với thế hệ tiền nhiệm trước đó, dung lượng pin trên Redmi Note 12 128GB màu vàng dường như vẫn được giữ nguyên là 5000mAh. Tuy nhiên, do được nâng cấp về vi xử lý nên mức độ tiêu thụ điện năng của phân khúc smartphone này đã được tối ưu hơn rất nhiều. Cụ thể, máy có thể duy trì hoạt động trong suốt 1,35 ngày trước khi cần sạc lại. \r\n\r\nPin Xiaomi Redmi Note 12 8GB Vàng\r\nNgoài ra, Redmi Note 12 vàng còn hỗ trợ công nghệ sạc siêu nhanh với công suất tối đa 33W. Nhờ khả năng sạc nhanh này, bạn có thể tiết kiệm được nhiều thời gian hơn và không phải chờ đợi quá lâu trong quá trình nạp lại pin nữa rồi nhé!\r\n\r\nNâng tầm trải nghiệm hình ảnh thông qua màn hình cỡ lớn\r\nTrong phiên bản điện thoại Redmi Series mới nhất này, Xiaomi đã tích hợp cho máy màn hình AMOLED có độ phân giải Full HD+ (1080 x 2400 pixels) siêu sắc nét. Với công nghệ này, chất lượng hiển thị trên màn hình luôn đạt độ chi tiết cực cao, màu sắc sinh động, mang tới trải nghiệm hình ảnh chân thực cho mọi khung hình.\r\n\r\nMàn hình Xiaomi Redmi Note 12 8GB Vàng\r\nNgoài ra, Redmi Note 12 8GB còn sở hữu tần số quét màn hình đạt tới 120Hz. Nhờ vậy mà mọi trải nghiệm vuốt chạm của người dùng trên màn hình luôn cực kỳ nhanh nhạy, mượt mà. Đồng thời, máy cũng sẽ sở hữu độ sáng tối đa 1200nits, giúp cải thiện khả năng hiển thị hình ảnh mỗi khi được sử dụng ngoài trời.\r\n\r\nDiện mạo vuông vắn đầy thời thượng\r\nXiaomi Redmi Note 12 8GB có diện mạo đẹp mắt và được đánh giá là khá ấn tượng. Theo đó, máy sở hữu thiết kế viền vuông, các góc bo tròn kết hợp với khung vát phẳng tạo nên một vẻ ngoài hết sức hiện đại nhưng cũng không kém phần trẻ trung.\r\nThiết kế Xiaomi Redmi Note 12 8GB Vàng\r\nMặt trước của điện thoại được trang bị màn hình phẳng và được thiết kế dạng nốt ruồi. Viền màn hình được tối ưu hóa, tạo ra một không gian hiển thị rộng rãi, thoải mái. ', 0),
(17, 3, 'Xiaomi Redmi 13C 6GB 128GB', 3290000, 2632000, '15.webp', 1, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nChipset Helio G85 cho hiệu năng ổn định - Hoạt động mượt mà cho các tác vụ cơ bản hàng ngày.\r\nHệ thống camera kép mạnh mẽ - Cải thiện độ chi tiết và độ sắc nét cho từng bức ảnh.\r\nDung lượng pin khổng lồ lên đến 5000 mAh - Giúp bạn thoải mái trải nghiệm nhiều giờ sử dụng liên tục.\r\nMàn hình lớn kích thước 6.71 inch - Mang lại trải nghiệm xem ấn tượng.', 0);

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
(5, 'Tống Hoàng Bách', 'tonghoangbach123', 'Tonghoangbach123', 'tonghoangbach@gmail.com', '0123456789', 'Bắc Giang', 0),
(10, '', 'tuanbacninh', 'Tuanbacninh123', 'tuanbacninh@gmail.com', '', '', 0),
(11, '', 'thaygiao', 'Thaygiao123', 'thaygiao@gmail.com', '', '', 0);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
