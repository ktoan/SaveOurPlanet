-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 05:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saveourplannet`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `descActivity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `userID`, `descActivity`, `time`, `date`) VALUES
(1, 46, 'đã thêm một ảnh vào website', '12:40:45', '2021-11-06'),
(2, 46, 'đã thêm một ảnh vào website', '12:41:06', '2021-11-06'),
(3, 46, 'đã thêm một bài viết vào website', '12:47:18', '2021-11-06'),
(4, 46, 'đã sửa một bài viết', '12:50:31', '2021-11-06'),
(5, 46, 'đã xóa một bài viết', '13:07:21', '2021-11-06'),
(6, 46, 'đã đăng xuất khỏi hệ thống', '13:22:07', '2021-11-06'),
(7, 1, 'đã đăng nhập vào hệ thống', '13:22:12', '2021-11-06'),
(8, 1, 'đã duyệt một bài viết', '13:23:10', '2021-11-06'),
(9, 1, 'đã sửa một bài viết', '13:23:31', '2021-11-06'),
(10, 1, 'đã sửa một sự kiện', '13:29:00', '2021-11-06'),
(11, 1, 'đã duyệt một sự kiện', '13:29:26', '2021-11-06'),
(12, 1, 'đã xóa một sự kiện', '13:29:41', '2021-11-06'),
(13, 1, 'đã đăng một hình ảnh', '13:32:25', '2021-11-06'),
(14, 1, 'đã sửa một hình ảnh', '13:32:50', '2021-11-06'),
(15, 1, 'đã đăng nhập vào hệ thống', '13:33:05', '2021-11-06'),
(16, 1, 'đã cập nhật thông tin', '13:33:36', '2021-11-06'),
(17, 1, 'đã tạo một dự án', '13:36:22', '2021-11-06'),
(18, 1, 'đã duyệt một dự án', '13:36:56', '2021-11-06'),
(19, 1, 'đã sửa một dự án', '13:37:11', '2021-11-06'),
(20, 1, 'đã sửa một dự án', '13:37:11', '2021-11-06'),
(21, 1, 'đã xóa một dự án', '13:37:20', '2021-11-06'),
(22, 1, 'đã đăng xuất khỏi hệ thống', '13:47:02', '2021-11-06'),
(23, 46, 'đã đăng nhập vào hệ thống', '13:47:09', '2021-11-06'),
(24, 46, 'đã đăng xuất khỏi hệ thống', '13:55:00', '2021-11-06'),
(25, 46, 'đã đăng nhập vào hệ thống', '13:55:22', '2021-11-06'),
(26, 46, 'đã đăng xuất khỏi hệ thống', '14:00:36', '2021-11-06'),
(27, 46, 'đã đăng xuất khỏi hệ thống', '14:00:36', '2021-11-06'),
(28, 46, 'đã đăng nhập vào hệ thống', '14:01:41', '2021-11-06'),
(29, 46, 'đã thêm một bài viết vào website', '14:04:32', '2021-11-06'),
(30, 46, 'đã thay đổi thông tin cá nhân', '14:05:27', '2021-11-06'),
(31, 46, 'đã thay đổi ảnh đại diện', '14:05:39', '2021-11-06'),
(32, 46, 'đã cập nhật mật khẩu', '14:05:55', '2021-11-06'),
(33, 46, 'đã sửa một hình ảnh', '14:07:47', '2021-11-06'),
(34, 46, 'đã xóa một hình ảnh', '14:08:49', '2021-11-06'),
(35, 46, 'đã sửa một bài viết', '14:09:15', '2021-11-06'),
(36, 46, 'đã xóa một bài viết', '14:09:20', '2021-11-06'),
(37, 46, 'đã đăng xuất khỏi hệ thống', '14:09:32', '2021-11-06'),
(38, 1, 'đã đăng nhập vào hệ thống', '14:09:38', '2021-11-06'),
(39, 1, 'đã đăng xuất khỏi hệ thống', '14:10:06', '2021-11-06'),
(40, 1, 'đã đăng nhập vào hệ thống', '14:10:36', '2021-11-06'),
(41, 1, 'đã gửi email cho nktoan.20it1@vku.udn.vn', '14:12:05', '2021-11-06'),
(42, 1, 'đã tạo một slider', '14:13:04', '2021-11-06'),
(43, 1, 'đã duyệt một hình ảnh', '14:13:52', '2021-11-06'),
(44, 1, 'đã xóa một slider', '14:14:17', '2021-11-06'),
(45, 1, 'đã sửa một slider', '14:14:26', '2021-11-06'),
(46, 1, 'đã xóa một slider', '14:14:33', '2021-11-06'),
(47, 46, 'đã đăng nhập vào hệ thống', '07:11:16', '2021-11-08'),
(48, 51, 'đã đăng nhập vào hệ thống', '13:34:03', '2021-11-08'),
(49, 51, 'đã đăng xuất khỏi hệ thống', '13:48:28', '2021-11-08'),
(50, 51, 'đã đăng nhập vào hệ thống', '13:48:33', '2021-11-08'),
(51, 51, 'đã đăng xuất khỏi hệ thống', '13:49:35', '2021-11-08'),
(52, 51, 'đã đăng nhập vào hệ thống', '14:07:31', '2021-11-08'),
(53, 51, 'đã đăng xuất khỏi hệ thống', '14:09:08', '2021-11-08'),
(54, 52, 'đã đăng nhập vào hệ thống', '14:09:52', '2021-11-08'),
(55, 52, 'đã đăng xuất khỏi hệ thống', '14:10:11', '2021-11-08'),
(56, 52, 'đã đăng nhập vào hệ thống', '14:11:59', '2021-11-08'),
(57, 4, 'đã đăng nhập vào hệ thống', '16:36:09', '2021-11-08'),
(58, 1, 'đã đăng nhập vào hệ thống', '09:21:54', '2021-11-09'),
(59, 1, 'đã đăng xuất khỏi hệ thống', '09:37:58', '2021-11-09'),
(60, 46, 'đã đăng nhập vào hệ thống', '09:38:08', '2021-11-09'),
(61, 46, 'đã donate 150000 cho quỹ phát triển Website', '12:59:04', '2021-11-09'),
(62, 46, 'đã donate 8000000 cho dự án Hưởng ứng trồng cây gây rừng', '13:00:40', '2021-11-09'),
(63, 1, 'đã đăng nhập vào hệ thống', '17:24:32', '2021-11-11'),
(64, 1, 'đã đăng xuất khỏi hệ thống', '18:18:08', '2021-11-11'),
(65, 46, 'đã đăng nhập vào hệ thống', '18:38:50', '2021-11-11'),
(66, 4, 'đã đăng nhập vào hệ thống', '08:57:41', '2021-11-12'),
(67, 4, 'đã donate 7000000 cho dự án Hội nghị ASEAN về môi trường', '08:58:21', '2021-11-12'),
(68, 4, 'đã thay đổi ảnh đại diện', '08:58:59', '2021-11-12'),
(69, 4, 'đã đăng xuất khỏi hệ thống', '09:28:29', '2021-11-12'),
(70, 1, 'đã đăng nhập vào hệ thống', '09:28:35', '2021-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageSource` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateUpload` date NOT NULL,
  `createrId` int(10) UNSIGNED NOT NULL,
  `viewCount` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `introduction`, `content`, `imageSource`, `dateUpload`, `createrId`, `viewCount`, `status`) VALUES
(1, 'Ô nhiễm tiếng ồn, nguyên nhân và cách phòng tránh', 'Ô nhiễm tiếng ồn là một trong những vấn nạn cực kỳ nghiêm trọng ảnh hưởng lớn đến sức khỏe của cộng đồng trong xã hội hiện nay.', '<p><strong><em>&Ocirc; nhiễm tiếng ồn</em></strong>&nbsp;l&agrave; một trong những vấn nạn cực kỳ nghi&ecirc;m trọng ảnh hưởng lớn đến sức khỏe của cộng đồng trong x&atilde; hội hiện nay. Vậy nguy&ecirc;n nh&acirc;n g&acirc;y ra &ocirc; nhiễm tiếng ồn l&agrave; g&igrave;? C&aacute;ch ph&ograve;ng tr&aacute;nh ra sao? H&atilde;y theo d&otilde;i b&agrave;i viết dưới đ&acirc;y của <strong><em>Save Our Planet</em></strong>&nbsp;để biết th&ecirc;m chi tiết nh&eacute;!</p>\r\n\r\n<p><strong>1. Thế n&agrave;o l&agrave;&nbsp;&ocirc; nhiễm tiếng ồn?</strong></p>\r\n\r\n<p>&Ocirc; nhiễm tiếng ồn được hiểu l&agrave; một m&ocirc;i trường m&agrave; tại đ&oacute; ngưỡng &acirc;m thanh c&oacute; gi&aacute; trị vượt qu&aacute; mức quy định cho ph&eacute;p. Điều n&agrave;y g&acirc;y n&ecirc;n cảm gi&aacute;c nhức nhối, kh&oacute; chịu cho những người ở trong m&ocirc;i trường đ&oacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"https://file.hstatic.net/200000033050/file/o-nhiem-tieng-on-1_7a3c276fd7454b1a846a818b6134ec70_grande.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><strong>2. Nguy&ecirc;n nh&acirc;n g&acirc;y &ocirc; nhiễm tiếng ồn</strong></p>\r\n\r\n<p>Hiện nay đ&acirc;y đang l&agrave; vấn đề cực kỳ nhức nhối trong x&atilde; hội v&agrave; x&eacute;t một c&aacute;ch tổng thể về&nbsp;thực trạng &ocirc; nhiễm tiếng ồn&nbsp;th&igrave; ch&uacute;ng ta c&oacute; thể ph&acirc;n chia th&agrave;nh 2 nguy&ecirc;n nh&acirc;n g&acirc;y n&ecirc;n t&igrave;nh trạng n&agrave;y như sau:</p>\r\n\r\n<p><em><strong>Nguy&ecirc;n nh&acirc;n do tự nhi&ecirc;n</strong></em></p>\r\n\r\n<p>Tại nguy&ecirc;n nh&acirc;n n&agrave;y tiếng ồn ph&aacute;t sinh từ hoạt động của n&uacute;i lửa v&agrave; động đất. Tuy kh&ocirc;ng thường xuy&ecirc;n xảy ra nhưng n&oacute; lại c&oacute; sức c&ocirc;ng ph&aacute; cực lớn đến x&atilde; hội. Ch&iacute;nh v&igrave; thế trước khi c&aacute;c hiện tượng n&agrave;y diễn ra, ch&uacute;ng ta cần phải x&acirc;y dựng những biện ph&aacute;p ph&ograve;ng tr&aacute;nh th&iacute;ch hợp v&agrave; được diễn tập nhiều lần.</p>\r\n\r\n<p><em><strong>Nguy&ecirc;n nh&acirc;n do nh&acirc;n tạo</strong></em></p>\r\n\r\n<p>Đ&acirc;y ch&iacute;nh l&agrave; nguy&ecirc;n nh&acirc;n chủ yếu g&acirc;y ra hiện tượng &ocirc; nhiễm m&ocirc;i trường đang diễn ra như hiện nay.</p>\r\n\r\n<p>Đối với c&aacute;c nguy&ecirc;n nh&acirc;n do nh&acirc;n tạo ch&uacute;ng được ph&acirc;n chia th&agrave;nh c&aacute;c nguồn chủ yếu như sau:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><em><strong>Do c&aacute;c phương tiện giao th&ocirc;ng như &ocirc; t&ocirc;, xe m&aacute;y, m&aacute;y bay, t&agrave;u hỏa&hellip;</strong></em></p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Đ&acirc;y l&agrave; những phương tiện thường xuy&ecirc;n di chuyển tr&ecirc;n đường v&agrave; với sự ph&aacute;t triển ng&agrave;y c&agrave;ng hiện đại của x&atilde; hội th&igrave; lượng phương tiện n&agrave;y ng&agrave;y c&agrave;ng gia tăng. Ch&iacute;nh sự gia tăng n&agrave;y khiến tiếng ồn ph&aacute;t sinh từ qu&aacute; tr&igrave;nh hoạt động của động cơ, từ tiếng c&ograve;i, tiếng phanh xe&hellip;</p>\r\n\r\n<p><img alt=\"\" src=\"https://file.hstatic.net/200000033050/file/o-nhiem-tieng-on-3_b11a012b9e5541519e4069b0fb85ddd6_grande.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>Đối với m&aacute;y bay tuy chiếm số lượng kh&ocirc;ng nhiều những mỗi lần ch&uacute;ng cất c&aacute;nh v&agrave; hạ c&aacute;nh th&igrave; đều ph&aacute;t ra những &acirc;m thanh với tần suất kh&ocirc;ng nhỏ. Điều n&agrave;y cũng c&oacute; ảnh hưởng cực lớn tới đời sống sinh hoạt của khu d&acirc;n cư xung quanh.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><em><strong>Do c&aacute;c cơ sở sản xuất, kinh doanh</strong></em></p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Qu&aacute; tr&igrave;nh sản xuất bất cứ loại mặt h&agrave;ng, sản phẩm n&agrave;o cũng phải hờ sự hoạt động của hệ thống m&aacute;y m&oacute;c, thiết bị. L&uacute;c n&agrave;y khi c&aacute;c m&aacute;y m&oacute;c hoạt động đồng thời th&igrave; tiếng ồn sẽ ph&aacute;t sinh cực lớn.</p>\r\n\r\n<p><img alt=\"\" src=\"https://file.hstatic.net/200000033050/file/o-nhiem-tieng-on-4_cc4fa8ae058644c8b7769c28427bf146_grande.jpg\" style=\"width:100%\" /></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><em><strong>Do hoạt động x&acirc;y dựng</strong></em></p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Ng&agrave;y nay với mật độ x&acirc;y dựng ng&agrave;y c&agrave;ng lớn th&igrave; sự &ocirc; nhiễm &acirc;m thanh diễn ra c&agrave;ng r&otilde; rệt. Những loại m&aacute;y m&oacute;c như m&aacute;y ủi, m&aacute;y x&uacute;c, m&aacute;y đ&agrave;o, m&aacute;y trộn b&ecirc; t&ocirc;ng...đ&atilde; g&acirc;y n&ecirc;n những tiếng ồn cực kỳ kh&oacute; chịu.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><em><strong>Do đời sống sinh hoạt h&agrave;ng ng&agrave;y</strong></em></p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Trong cuộc sống hiện nay bạn sẽ dễ d&agrave;ng bắt gặp nhiều &acirc;m thanh đến từ tiếng la h&eacute;t, tiếng nhạc từ loa th&ugrave;ng, m&aacute;y nghe nhạc...D&ugrave; những &acirc;m thanh n&agrave;y kh&ocirc;ng qu&aacute; mạnh mẽ nhưng nếu như bạn bị nghe thường xuy&ecirc;n th&igrave; th&iacute;nh gi&aacute;c cũng c&oacute; thể bị ảnh hưởng.</p>\r\n\r\n<p><strong>3. Ảnh hưởng của &ocirc; nhiễm tiếng ồn</strong></p>\r\n\r\n<p>&Ocirc; nhiễm tiếng ồn c&oacute; ảnh hưởng cực kỳ nghi&ecirc;m trọng tới sức khỏe của con người hiện nay. Cụ thể như:</p>\r\n\r\n<p><em><strong>Suy giảm th&iacute;nh gi&aacute;c</strong></em></p>\r\n\r\n<p>C&oacute; lẽ đ&acirc;y l&agrave; ảnh hưởng đầu ti&ecirc;n m&agrave; ch&uacute;ng ta dễ d&agrave;ng nhận biết nếu như sống trong m&ocirc;i trường c&oacute; độ ồn qu&aacute; cao. C&aacute;c loại &acirc;m thanh diễn ra ở cường độ cao sẽ g&acirc;y ra sự nhiễu s&oacute;ng truyền v&agrave;o tai. Khi đ&oacute; n&oacute; sẽ l&agrave;m x&aacute;o trộn những chất lỏng gi&uacute;p hỗ trợ truyền &acirc;m giữa n&atilde;o v&agrave; tai đồng thời ph&aacute; hủy c&aacute;c loại tế b&agrave;o gi&uacute;p truyền t&iacute;n hiệu trong tai từ đ&oacute; l&agrave;m giảm đi th&iacute;nh gi&aacute;c của người chịu ảnh hưởng.</p>\r\n\r\n<p>Đặc biệt nếu như lượng tế b&agrave;o bị ph&aacute; hủy 50% th&igrave; con người sẽ bị mất hẳn th&iacute;nh gi&aacute;c.</p>\r\n\r\n<p><em><strong>Tăng nguy cơ l&agrave;m mắc c&aacute;c chứng bệnh tim mạch</strong></em></p>\r\n\r\n<p>Nếu như bạn tiếp x&uacute;c với sự &ocirc; nhiễm tiếng ồn trong nhiều năm li&ecirc;n tiếp th&igrave; khả năng ch&uacute;ng ta bị mắc c&aacute;c chứng bệnh li&ecirc;n quan đến tim mạch sẽ tăng l&ecirc;n 300%. Điều n&agrave;y sẽ khiến cho con người dễ bị mắc c&aacute;c chứng bệnh nư cao huyết &aacute;p, đau tim&hellip;</p>\r\n\r\n<p><em><strong>Rối loạn t&acirc;m l&yacute;</strong></em></p>\r\n\r\n<p>C&oacute; thể bạn kh&ocirc;ng nhận ra nhưng nếu bạn thường xuy&ecirc;n tiếp x&uacute;c trong một m&ocirc;i trường c&oacute; lượng &acirc;m thanh kh&aacute; lớn sẽ l&agrave;m bạn trở n&ecirc;n lo lắng, dễ nổi cấu v&agrave; nhiều khi mất đi l&iacute; tr&iacute; hoặc cũng c&oacute; thể l&agrave;m cho bạn kh&ocirc;ng c&oacute; được t&acirc;m l&yacute; thoải m&aacute;i cả ng&agrave;y d&agrave;i.</p>\r\n\r\n<p>C&oacute; những trường hợp ch&uacute;ng ta căng thảng tới mức trở n&ecirc;n tự ti, xa c&aacute;ch x&atilde; hội hoặc l&agrave;m việc kh&ocirc;ng hiệu quả do k&eacute;m tập trung.</p>\r\n\r\n<p><em><strong>Giảm chất lượng của giấc ngủ</strong></em></p>\r\n\r\n<p>Giấc ngủ của bạn sẽ trở n&ecirc;n chập chờn v&agrave; cực kỳ dễ giật m&igrave;nh khi m&ocirc;i trường ồn &agrave;o qu&aacute; mức. Một khi kh&ocirc;ng c&oacute; giấc ngủ ngon th&igrave; ch&uacute;ng ta sẽ trở n&ecirc;n mệt mỏi v&agrave; dễ bị mắc c&aacute;c chứng bệnh tim mạch.</p>\r\n\r\n<p><em><strong>Ảnh hưởng tới giao tiếp</strong></em></p>\r\n\r\n<p>Khi tiếng ồn lấn &aacute;p với giọng n&oacute;i của bạn sẽ khiến cho bạn gặp kh&oacute; khăn khi giao tiếp với người kh&aacute;c v&igrave; kh&ocirc;ng thể truyền đạt &yacute; m&igrave;nh muốn n&oacute;i một c&aacute;ch r&otilde; r&agrave;ng.</p>\r\n\r\n<p>&nbsp;</p>', 'slider-tieng-on.jpg', '2021-10-31', 1, 4390, 1),
(2, 'Ô nhiễm môi trường là gì?', 'Ô nhiễm môi trường là gì? Có mấy loại ô nhiễm? Nguyên nhân và biện pháp khắc phục của ô nhiễm môi trường', '<p><img alt=\"\" src=\"https://jes.edu.vn/wp-content/uploads/2019/09/0-nhiem-moi-truong-bao-ve-moi-truong-xanh-sach-dep-768x480.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>Hiện nay, vấn đề <strong>&ocirc; nhiễm m&ocirc;i trường</strong>&nbsp;đang l&agrave; vấn đề nhức nhối đồi với mỗi quốc gia. Kh&ocirc;ng ri&ecirc;ng g&igrave; Việt Nam, mỗi quốc gia, mỗi nước, mỗi địa điểm đều xảy ra t&igrave;nh trang &ocirc; nhiễm.<em>&nbsp;Kh&ocirc;ng &iacute;t th&igrave; nhiều, kh&ocirc;ng &ocirc; nhiễm kh&ocirc;ng kh&iacute; th&igrave; &ocirc; nhiễm nguồn nước. Kh&ocirc;ng &ocirc; nhiễm nguồn đất th&igrave; &ocirc; nhiễm tiếng ồn,&hellip;</em></p>\r\n\r\n<p>Hậu qua &ocirc; nhiễm để lại rất nặng nề, rất nhiều hệ lụy. Ch&uacute;ng biến đổi hệ sinh th&aacute;i ch&uacute;ng ta đang sinh sống, l&agrave;m băng tan chảy, nước biển d&acirc;ng, đất bị x&acirc;m nhập mặn&hellip;đ&oacute; l&agrave; minh chứng cho sự biến đổi khi hậu (<strong>hiệu ứng nh&agrave; k&iacute;nh</strong>) bắt nguồn từ sự &ocirc; nhiễm m&ocirc;i trường m&agrave; ra. Vậy, &ocirc; nhiễm mỗi trường l&agrave; g&igrave;, c&oacute; bao nhi&ecirc;u loại &ocirc; nhiễm, thực trạng, nguy&ecirc;n nh&acirc;n v&agrave; biện ph&aacute;p cần l&agrave;m nhất b&acirc;y giờ l&agrave; g&igrave;?</p>\r\n\r\n<p><strong>&Ocirc; nhiễm m&ocirc;i trường</strong>&nbsp;l&agrave; hiện tượng m&ocirc;i trường bị thay đổi v&igrave; t&iacute;nh chất Sinh &ndash; L&yacute; &ndash; H&oacute;a. G&acirc;y ảnh hưởng nghi&ecirc;m trọng đến sức khỏe con người, động &ndash; thực vật. Nguy&ecirc;n nh&acirc;n dẫn đến &ocirc; nhiễm m&ocirc;i trường l&agrave; do hoạt động của ch&uacute;ng ta g&acirc;y n&ecirc;n. B&ecirc;n cạnh đ&oacute;, c&oacute; một số nguy&ecirc;n nh&acirc;n kh&aacute;ch quan l&agrave; do tự nhi&ecirc;n g&acirc;y n&ecirc;n: Động đất, s&oacute;ng thần, v&ograve;i rồng&hellip;</p>\r\n\r\n<ul>\r\n	<li>Tr&aacute;i đất n&oacute;ng l&ecirc;n</li>\r\n	<li>Băng tan ở hai cực</li>\r\n	<li>Nước bi&ecirc;n d&acirc;ng</li>\r\n	<li>Đất liền bị x&acirc;m nhập</li>\r\n	<li>T&igrave;nh trạng sạc lỡ diễn ra nhiều hơn ở ven s&ocirc;ng ven suối</li>\r\n	<li>Mưa nắng thất thường, khi qu&aacute; n&oacute;ng, khi qu&aacute; lạnh. Thời gian nắng mưa kh&ocirc;ng biết trước được.</li>\r\n	<li>S&acirc;u bệnh hại ng&agrave;y c&agrave;ng kh&oacute; điều trị</li>\r\n	<li>Nguồn nước ng&agrave;y c&agrave;ng mất dần</li>\r\n	<li>Con người ng&agrave;y c&agrave;ng nhiều bệnh tật</li>\r\n</ul>\r\n\r\n<p>C&aacute;c dạng &ocirc; nhiễm ch&iacute;nh đ&oacute; l&agrave;: &Ocirc; nhiễm nguồn nước, &Ocirc; nhiễm kh&ocirc;ng kh&iacute;, &Ocirc; nhiễm đất, &Ocirc; nhiễm kh&ocirc;ng kh&iacute;&hellip;C&aacute;c dạng &ocirc; nhiễm n&agrave;y ch&uacute;ng ta sẽ t&igrave;m hiểu ph&acirc;n t&iacute;ch sau ở phần b&ecirc;n dưới.</p>\r\n\r\n<p><strong>Thực trạng &ocirc; nhiễm hiện nay ở nước ta.</strong></p>\r\n\r\n<p>Hiện nay vấn đề &ocirc; nhiễm ở nước ta đang ở t&igrave;nh trang b&aacute;o động. Dường như n&oacute; xảy ra ở hầu hết c&aacute;c tỉnh th&agrave;nh. Nhất l&agrave; &ocirc; nhiễm nguồn nước v&agrave; &ocirc; nhiễm kh&ocirc;ng kh&iacute;.</p>\r\n\r\n<p>Mới đ&acirc;y th&ocirc;i, chỉ số đo được từ AQI (chỉ số chất lượng kh&ocirc;ng kh&iacute;)cho thấy nước ta đang ở mức độ trung b&igrave;nh đến c&oacute; hại v&agrave; c&oacute; khi lại b&aacute;o rất hại(từ m&agrave;u cam đến m&agrave;u đỏ đậm). Nguy hiểm nhất l&agrave; khi c&oacute; b&aacute;o hiệu m&agrave;u t&iacute;m(rất c&oacute; hại) hay l&agrave; m&agrave;u n&acirc;u(nguy hiểm).</p>\r\n\r\n<p>Điều đ&oacute; cho thấy, c&aacute;c nh&agrave; m&aacute;y x&iacute; nghiệm mọc l&ecirc;n ng&agrave;y c&agrave;ng nhiều m&agrave; chưa gi&aacute;m s&aacute;t chặt chẽ trong kh&acirc;u xử l&yacute; r&aacute;c thải thải ra v&agrave; lượng kh&oacute;i bụi thải ra ngo&agrave;i m&ocirc;i trường chưa được xử l&yacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"https://jes.edu.vn/wp-content/uploads/2019/09/o-nhiem-moi-truong-tu-thuoc-bao-ve-thuc-vat.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute; th&igrave; phần lớn cũng l&agrave; do &yacute; thức của ch&uacute;ng ta: Vứt r&aacute;c chưa đ&uacute;ng nơi quy định, chưa biết c&aacute;ch ph&acirc;n loại r&aacute;c thải, chưa tận dụng được c&aacute;c loại <strong>phế liệu&nbsp;</strong>bỏ đi. Thải r&aacute;c sinh hoạt tr&ocirc;i theo nguồn nước hay c&oacute; những hộ d&acirc;n khi c&oacute;&nbsp;<strong>&ldquo;cơ hội&rdquo;&nbsp;</strong>mưa lớn sẽ đem r&aacute;c thả tr&ocirc;i theo d&ograve;ng nước, đổ thẳng xuống m&agrave; kh&ocirc;ng một ch&uacute;t nghĩ ngợi. Điều n&agrave;y đang l&agrave; được nhiều người l&ecirc;n &aacute;n gay gắt.</p>\r\n\r\n<p>Khi xảy ra c&aacute;c t&igrave;nh trạng &ocirc; nhiễm tr&ecirc;n bạn thấy cuộc sống hằng ng&agrave;y rất ngột ngạc. Đi đ&acirc;u cũng phải bịt khẩu trang, ra ngo&agrave;i đường trở về nh&agrave; l&agrave; loại bụi mịn d&iacute;nh đầy cơ thể. Mưa nắng, gi&oacute; b&atilde;o kh&ocirc;ng lường trước được.</p>\r\n\r\n<p>Hoa m&agrave;u, rau xanh ng&agrave;y c&agrave;ng bị &ocirc; nhiễm do ảnh hưởng từ nước thải từ c&aacute;c nh&agrave; m&aacute;y. Kh&ocirc;ng c&oacute; đất canh t&aacute;c hoặc phải bỏ kh&ocirc;ng v&igrave; bị ngập mặn. Thiếu hụt nước do nắng n&oacute;ng g&acirc;y ra. H&agrave;ng ng&agrave;n hecta ruộng lua phải chịu cảnh chết kh&ocirc;. Vụ mua gieo mạ th&igrave; chết l&ecirc;n chết xuống v&igrave; trời qu&aacute; lạnh v&agrave; ngập lụt g&acirc;y ra.</p>\r\n\r\n<p>C&aacute;c loại động vật dễ bị dịch bệnh. G&agrave; Vịt th&igrave;&nbsp;<em>c&uacute;m</em>&nbsp;gia cầm như A/H5N2 v&agrave;&nbsp;<em>AH5N5&nbsp;</em>AH5N1, Heo th&igrave; c&uacute;m A H1N1, H1N2, H3N1,H3N2, v&agrave; H2N3&hellip; c&ograve;n ở người th&igrave; dịch bệnh ho&agrave;n h&agrave;nh tr&ecirc;n to&agrave;n thế giới đ&oacute; l&agrave;&nbsp;SARS-CoV do một loại virus cực động g&acirc;y n&ecirc;n c&oacute; thể truyền từ người sang người.</p>\r\n\r\n<p>Hiện tượng ch&aacute;y rừng, sạc lỡ đồi n&uacute;i, mạch nước ngầm trong c&aacute;c khe hang động ng&agrave;y c&agrave;ng &iacute;t đi. C&oacute; nhưng nơi kh&ocirc; hẳn d&ograve;ng chảy. C&oacute; những d&ograve;ng chảy lại c&oacute; m&agrave;u kh&aacute;c lạ: khi n&acirc;u, khi đỏ khi lại đen s&igrave;&hellip;Đ&aacute;ng ch&uacute; &yacute; nhất l&agrave; hiện tượng ch&aacute;y rừng, ch&uacute;ng bộc ph&aacute;t một c&aacute;ch dữ dội, k&eacute;o theo đ&oacute; l&agrave; &ocirc; nhiễm kh&ocirc;ng kh&iacute;, thay đổi t&iacute;nh cơ học của đất, chim th&uacute; hệ sinh th&aacute;i đều bị thay đổi nghi&ecirc;m trọng.</p>', 'slider-nguon-nuoc.jpg', '2021-10-31', 1, 2568, 1),
(3, 'Bảo tồn: Bảo vệ mới cho báo đốm.', 'Các biện pháp mới để bảo vệ loài báo đốm đã được thống nhất tại hội nghị thượng đỉnh về động vật hoang dã được tổ chức tại Ấn Độ.', '<p><strong>Bảo tồn: Bảo vệ mới cho b&aacute;o đốm</strong><br />\r\n<br />\r\nC&aacute;c biện ph&aacute;p mới để bảo vệ lo&agrave;i b&aacute;o đốm đ&atilde; được thống nhất tại hội nghị thượng đỉnh về động vật hoang d&atilde; được tổ chức tại Ấn Độ.<br />\r\n<br />\r\nS&aacute;u quốc gia đưa ra kế hoạch tăng cường bảo vệ cho con m&egrave;o lớn được ph&aacute;t hiện khi n&oacute; lang thang qua bi&ecirc;n giới của c&aacute;c quốc gia kh&aacute;c nhau.<br />\r\n<br />\r\nLo&agrave;i n&agrave;y đ&atilde; mất khoảng 40% m&ocirc;i trường sống trong 100 năm qua.<br />\r\n<br />\r\nTrong khi luật ph&aacute;p tồn tại để bảo vệ lo&agrave;i b&aacute;o đốm ở hầu hết c&aacute;c quốc gia nơi n&oacute; sinh sống, c&aacute;c mối đe dọa vẫn tồn tại, bao gồm cả nạn ph&aacute; rừng v&agrave; săn trộm.<br />\r\n<br />\r\nC&aacute;c C&ocirc;ng ước về c&aacute;c lo&agrave;i di cư l&agrave; một điều ước quốc tế m&agrave; mục đ&iacute;ch để bảo tồn c&aacute;c lo&agrave;i di cư.<br />\r\n<br />\r\nBao gồm b&aacute;o đốm trong thỏa thuận sẽ gi&uacute;p c&aacute;c quốc gia bảo tồn m&ocirc;i trường sống quan trọng. Mục đ&iacute;ch l&agrave; để cho ph&eacute;p động vật di chuyển dọc theo h&agrave;nh lang giữa c&aacute;c quốc gia, gi&uacute;p tr&aacute;nh sự c&ocirc; lập c&oacute; thể dẫn đến tuyệt chủng.<br />\r\n<br />\r\nRebecca Regnery, ph&oacute; gi&aacute;m đốc động vật hoang d&atilde; tại nh&oacute;m bảo vệ động vật Humane Society International, cho biết việc liệt k&ecirc; con m&egrave;o lớn sẽ tạo ra một khung ph&aacute;p l&yacute; quốc tế.<br />\r\n<br />\r\n&quot;Điều n&agrave;y sẽ tăng cơ hội khuyến kh&iacute;ch v&agrave; t&agrave;i trợ cho c&ocirc;ng việc n&agrave;y, v&agrave; điều đ&oacute; rất quan trọng để hạn chế sự hủy hoại m&ocirc;i trường sống, duy tr&igrave; c&aacute;c h&agrave;nh lang di cư quan trọng v&agrave; giải quyết c&aacute;c vụ giết người để trả th&ugrave; v&agrave; bu&ocirc;n b&aacute;n,&quot; c&ocirc; n&oacute;i.<br />\r\n<br />\r\nPhạm vi hiện tại của b&aacute;o đốm k&eacute;o d&agrave;i từ r&igrave;a ph&iacute;a nam của Hoa Kỳ v&agrave; Mexico ở Bắc Mỹ, qua phần lớn Trung Mỹ, v&agrave; ph&iacute;a nam đến Paraguay v&agrave; bắc Argentina ở Nam Mỹ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://yeumoitruong.vn/attachments/_110961030_gettyimages-1143093047-jpg.11500/\" style=\"width:100%\" /></p>\r\n\r\n<p>&nbsp;</p>', 'bao-dom.jpg', '2021-10-31', 1, 2381, 1),
(5, 'Bảo vệ động vật hoang dã', 'Bảo vệ động vật hoang dã là một trong những vấn đề cấp thiết hiện nay. Nhiều loại động vật đang đứng trước bờ vực của sự tuyệt chủng.', '<h3><code><strong>Bảo vệ động vật hoang d&atilde; &ndash; Cần sự chung tay của cả thế giới</strong></code></h3>\r\n\r\n<p>Bảo vệ động vật hoang d&atilde;&nbsp;l&agrave; một trong những vấn đề cấp thiết hiện nay. Nhiều loại động vật đang đứng trước bờ vực của sự tuyệt chủng. Việc chung tay bảo vệ hệ sinh th&aacute;i của ch&uacute;ng ta l&agrave; điều cần c&oacute; sự chung tay của cộng đồng to&agrave;n thế giới. Tại sao phải bảo vệ c&aacute;c lo&agrave;i động vật hoang d&atilde;? Dưới đ&acirc;y l&agrave; một số những l&yacute; do m&agrave; ch&uacute;ng t&ocirc;i đưa ra để trả lời cho c&acirc;u hỏi n&agrave;y.</p>\r\n\r\n<p><strong><code>Vai tr&ograve; của việc bảo vệ động vật hoang d&atilde;</code></strong></p>\r\n\r\n<p>Việc bảo vệ c&aacute;c lo&agrave;i động vật hoang d&atilde; sẽ gi&uacute;p bảo tồn những nguồn gen qu&yacute; hiếm, kh&ocirc;ng những thế c&ograve;n gi&uacute;p cần bằng được hệ sinh th&aacute;i, đảm bảo được một m&ocirc;i trường sống bền vững cho con người.</p>\r\n\r\n<p>Theo con số ước t&iacute;nh của Hiệp hội bảo tồn động vật hoang d&atilde; &ndash; Wildlife Conservation Society (WCS) c&oacute; gần 1550 c&aacute;c lo&agrave;i th&uacute; qu&yacute; hiếm trong s&aacute;ch Đỏ&nbsp;đang đứng trước nguy cơ tuyệt chủng hoặc gần tuyệt chủng cần được bảo vệ. Tuy nhi&ecirc;n, việc bảo vệ động vật hoang d&atilde; gặp rất nhiều kh&oacute; khăn v&agrave; cần sự chung tay gi&uacute;p sức của tất cả mọi người.</p>\r\n\r\n<p>C&oacute; gần &frac12; lo&agrave;i sinh vật tr&ecirc;n tr&aacute;i đất cần được cư tr&uacute; v&agrave; sinh trưởng tốt ở c&aacute;c khu rừng nhiệt đới. Tuy nhi&ecirc;n, h&agrave;ng ng&agrave;n ha rừng đang dần bị thu hẹp do khai th&aacute;c rừng v&agrave; ch&aacute;y rừng do thi&ecirc;n nhi&ecirc;n v&agrave; ch&iacute;nh con người g&acirc;y ra, kh&ocirc;ng những thế c&ograve;n khiến cho nhiều lo&agrave;i sinh vật bị tuyệt chủng.</p>\r\n\r\n<p>Sự biến mất của nhiều lo&agrave;i động vật hoang d&atilde; kh&ocirc;ng chỉ l&agrave; do m&ocirc;i trường m&agrave; việc săn bắt tr&aacute;i ph&eacute;p cũng l&agrave;m cho số lượng động vật hoang d&atilde; giảm đi nhanh ch&oacute;ng.</p>\r\n\r\n<p>Việc bảo vệ động vật hoang d&atilde; đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng trong việc đảm bảo c&acirc;n bằng hệ sinh th&aacute;i, tăng sự bền vững cho m&ocirc;i trường sống, phục vụ sản xuất n&ocirc;ng nghiệp v&agrave; điều kiện cho việc ph&aacute;t triển một số ng&agrave;nh kinh tế kh&aacute;c.</p>\r\n\r\n<p><strong><code>Một số lợi &iacute;ch m&agrave; việc bảo vệ động vật hoang d&atilde; mang lại</code></strong></p>\r\n\r\n<p>Tại sao phải bảo vệ động vật hoang d&atilde;? Việc bảo vệ c&aacute;c lo&agrave;i động vật hoang d&atilde; c&oacute; thể mang lại rất nhiều những lợi &iacute;ch cho con người. Một số những lợi &iacute;ch cần phải kể đến như:</p>\r\n\r\n<p><em><strong><code>1. Đa dạng sinh học</code></strong></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hiện nay, tr&ecirc;n tr&aacute;i đất c&oacute; khoảng 15 triệu sinh vật đang c&ugrave;ng sinh sống v&agrave; ph&aacute;t triển. Mọi c&aacute; thể, giống lo&agrave;i đều đ&oacute;ng một vai tr&ograve; nhất định trong mạng lưới phức tạp m&agrave; ta gọi l&agrave; sinh quyển. Ngược lại, sinh quyển của tr&aacute;i đất được tạo n&ecirc;n từ v&ocirc; số hệ sinh th&aacute;i bao gồm c&aacute;c lo&agrave;i động, thực vật cũng như m&ocirc;i trường sống tự nhi&ecirc;n của ch&uacute;ng. Bảo vệ động vật hoang d&atilde; l&agrave; bảo vệ đa dạng sinh học.</p>\r\n\r\n<p>Chưa c&oacute; một nghi&ecirc;n cứu đầy đủ n&agrave;o về c&aacute;c loại động vật hoang d&atilde; c&oacute; những t&aacute;c động như thế n&agrave;o. Nhưng nếu một hệ sinh th&aacute;i biến mất th&igrave; đồng nghĩa c&aacute;c phản ứng d&acirc;y chuyền l&ecirc;n c&aacute;c hệ sinh th&aacute;i kh&aacute;c cũng sẽ bị ảnh hưởng v&agrave; sự tuyệt chủng của ch&uacute;ng c&oacute; thể g&acirc;y ra những hậu quả to&agrave;n cầu.</p>\r\n\r\n<p><em><strong><code>2. Lợi &iacute;ch n&ocirc;ng nghiệp</code></strong></em></p>\r\n\r\n<p>Việc bảo vệ động vật hoang d&atilde; l&agrave; điều cấp thiết v&igrave; những lợi &iacute;ch m&agrave; ch&uacute;ng mang lại cho con người l&agrave; kh&ocirc;ng hề nhỏ. Nhiều lo&agrave;i động vật c&oacute; lợi &iacute;ch quan trọng trong ng&agrave;nh n&ocirc;ng nghiệp. Thay v&igrave; việc sử dụng c&aacute;c loại thuốc bảo vệ thực vật, nhiều lo&agrave;i c&ocirc;n tr&ugrave;ng, động vật được người n&ocirc;ng d&acirc;n sử dụng để ti&ecirc;u diệt s&acirc;u bọ g&acirc;y hại cho m&ugrave;a m&agrave;ng. Đ&acirc;y l&agrave; một trong những biện ph&aacute;p thay thế an to&agrave;n, hiệu quả với m&ocirc;i trường v&agrave; &iacute;t tốn k&eacute;m cho người n&ocirc;ng d&acirc;n.</p>\r\n\r\n<p><code><em><strong>3. Đ&oacute;ng g&oacute;p về y học</strong></em></code></p>\r\n\r\n<p>Trong qu&aacute; tr&igrave;nh đấu tranh để sinh tồn với thi&ecirc;n nhi&ecirc;n v&agrave; nhiều loại sinh vật kh&aacute;c th&igrave; một số lo&agrave;i động vật hoang d&atilde; đ&atilde; tự t&igrave;m ra nhiều c&aacute;ch để kh&aacute;ng vi khuẩn cũng như kh&aacute;ng được c&aacute;c tế b&agrave;o ung thư. Cơ thể ch&uacute;ng c&oacute; thể tạo ra nhiều c&aacute;c loại phần tử mới m&agrave; c&aacute;c nh&agrave; khoa học trước nay chưa từng biết tới.</p>\r\n\r\n<p>Việc t&igrave;m hiểu v&agrave; nghi&ecirc;n cứu c&aacute;c đặc t&iacute;nh n&agrave;y từ c&aacute;c lo&agrave;i động vật hoang d&atilde; c&oacute; thể gi&uacute;p cho c&aacute;c nh&agrave; khoa học t&igrave;m ra những phương ph&aacute;p chữa bệnh mới v&agrave; hiệu quả. Do đ&oacute;, việc bảo vệ động vật hoang d&atilde; cũng l&agrave; bảo vệ c&aacute;c nguồn dược liệu qu&yacute;.</p>\r\n\r\n<p>Ngo&agrave;i ra, trong c&oacute; thể của nhiều lo&agrave;i động vật hoang d&atilde; c&oacute; chứa nhiều chất h&oacute;a học hữu &iacute;ch, phục vụ tốt cho việc b&agrave;o chế c&aacute;c loại dược phẩm. Nhiều loại thuốc kh&aacute;ng sinh, c&aacute;c loại thực phẩm chức năng, c&aacute;c loại thuốc giảm đau, chất chống ung thư v&agrave; thuốc chữa bệnh m&aacute;u kh&oacute; đ&ocirc;ng hiện nay cũng c&oacute; nguồn nguy&ecirc;n liệu từ c&aacute;c loại động vật hoang d&atilde;.</p>\r\n\r\n<p>Do đ&oacute;, nhiều loại động vật đứng trước bờ vực tuyệt chủng trước khi những lợi &iacute;ch y học của ch&uacute;ng được biết đến.</p>\r\n\r\n<p><em><strong><code>4. Điều tiết m&ocirc;i trường</code></strong></em></p>\r\n\r\n<p>Việc bảo vệ động vật hoang d&atilde; đ&oacute;ng một vai tr&ograve; quan trọng trong việc điều tiết v&agrave; đ&aacute;nh gi&aacute; được chất lượng m&ocirc;i trường.</p>\r\n\r\n<p>V&iacute; dụ như: Sự sụt giảm nhanh ch&oacute;ng về số lượng đại b&agrave;ng đầu bạc v&agrave; chim ưng v&agrave;o giữa thế kỷ 20 l&agrave; một trong những lời cảnh b&aacute;o về sự nguy hiểm của một loại thuốc trừ s&acirc;u mạnh được sử dụng rộng r&atilde;i l&agrave; DDT.</p>\r\n\r\n<p>Qu&aacute; tr&igrave;nh t&iacute;ch tụ của loại thuốc trừ s&acirc;u n&agrave;y trong cơ thể động vật sẽ l&agrave;m suy yếu khả năng sinh sản v&agrave; l&agrave;m cản trở qu&aacute; tr&igrave;nh ấp trứng th&agrave;nh c&ocirc;ng của loại động vật n&agrave;y.</p>\r\n\r\n<p>Những loại động vật c&oacute; khả năng x&aacute;c định những nguy hiểm của m&ocirc;i trường do t&aacute;c động của biến đổi kh&iacute; hậu v&agrave; c&aacute;c chất &ocirc; nhiễm ảnh hưởng lớn tới m&ocirc;i trường sống.</p>\r\n\r\n<p><em><strong><code>5. Gi&aacute; trị kinh tế</code></strong></em></p>\r\n\r\n<p>Việc ch&uacute;ng ta chung tay bảo vệ động vật hoang d&atilde; cũng sẽ &iacute;t nhiều mang lại gi&aacute; trị về mặt kinh tế cho con người. Những vườn quốc gia tr&ecirc;n to&agrave;n thế giới đ&atilde; được triển khai quy hoạch để gi&uacute;p tăng trưởng cho ng&agrave;nh du lịch.</p>\r\n\r\n<p>Theo con số thống k&ecirc; của ban quản l&yacute; vườn quốc gia thuộc Bang Texas, Hoa Kỳ. Hoạt động xem chim l&agrave; một trong những hoạt động giải tr&iacute; ngo&agrave;i trời, gi&uacute;p thu về khoảng 400 triệu đ&ocirc; v&agrave;o ng&acirc;n s&aacute;ch mỗi năm.</p>\r\n\r\n<p><em><strong><code>6. Những gi&aacute; tr&iacute; v&ocirc; h&igrave;nh</code></strong></em></p>\r\n\r\n<p>Ngo&agrave;i những gi&aacute; tr&iacute; về mặt kinh tế, n&ocirc;ng nghiệp, y tế th&igrave; vấn đề bảo vệ động vật hoang d&atilde; v&agrave; nhiều loại động vật c&ograve;n đem lại nhiều niềm cảm hứng cho c&aacute;c t&aacute;c giả, nghệ sĩ v&agrave; nhiều người quan t&acirc;m tới thi&ecirc;n nhi&ecirc;n hoang d&atilde;.</p>\r\n\r\n<p>Nhiều những c&acirc;u chuyện, bộ phim vệ động vật hoang d&atilde; được tr&igrave;nh chiếu v&agrave; đi v&agrave;o l&ograve;ng nhiều người tr&ecirc;n to&agrave;n thế giới. Những bức tranh v&agrave; h&agrave;ng loạt c&aacute;c triển l&atilde;m ảnh về c&aacute;c lo&agrave;i động vật đ&atilde; được tổ chức tr&ecirc;n to&agrave;n thế giới, thu h&uacute;t rất nhiều sự quan t&acirc;m của dư luận.</p>\r\n\r\n<p><strong><code>Biện ph&aacute;p bảo vệ động vật hoang d&atilde;</code></strong></p>\r\n\r\n<p>Tại sao phải bảo vệ động vật hoang d&atilde;? C&acirc;u hỏi đ&atilde; được ch&uacute;ng t&ocirc;i giải đ&aacute;p. Vậy c&oacute; những biện ph&aacute;p n&agrave;o để gi&uacute;p c&aacute;c lo&agrave;i động vật tho&aacute;t khỏi nguy cơ tuyệt chủng?</p>\r\n\r\n<p>Hiện nay, đ&atilde; c&oacute; 199 Quốc Gia tr&ecirc;n to&agrave;n thế tới đ&atilde; tham gia v&agrave; k&yacute; c&ocirc;ng ước Đa dạng sinh học để chung tay bảo vệ c&aacute;c lo&agrave;i động vật đứng trước nguy cơ tuyệt chủng.</p>\r\n\r\n<p>Một số những giải ph&aacute;p gi&uacute;p bảo tồn v&agrave; bảo vệ động vật hoang d&atilde; được đưa ra bao gồm:</p>\r\n\r\n<ul>\r\n	<li>Việc một số loại đang c&oacute; nguy cơ biến mất, một phần l&agrave; do sự săn bắn của con người. N&ecirc;n cần phải xử l&yacute; nghi&ecirc;m c&aacute;c đối tượng cầm đầu c&aacute;c đường d&acirc;y bu&ocirc;n b&aacute;n động vật hoang d&atilde; tr&aacute;i ph&eacute;p.</li>\r\n	<li>X&acirc;y dựng v&agrave; bảo tồn c&aacute;c nguồn gen động vật c&oacute; nguy cơ tuyệt chủng v&agrave; lưu giữ c&aacute;c ngo&agrave;i gen khỏe mạnh trong v&ograve;ng 50 năm tới.</li>\r\n	<li>Nghi&ecirc;m cấm việc bu&ocirc;n b&aacute;n sừng t&ecirc; gi&aacute;c, ng&agrave; voi dưới mọi h&igrave;nh thức.</li>\r\n	<li>Ngăn chặn, tội phạm bu&ocirc;n b&aacute;n động vật tr&aacute;i ph&eacute;p tr&ecirc;n mạng lưới internet.</li>\r\n	<li>Tăng cường tiếng n&oacute;i của c&aacute;c cơ quan c&oacute; thẩm quyền trong việc bảo vệ động vật hoang d&atilde;.</li>\r\n</ul>\r\n\r\n<p>Tăng mức h&igrave;nh phạt đối với c&aacute;c h&agrave;nh động bu&ocirc;n b&aacute;n động vật hoang d&atilde; tr&aacute;i ph&eacute;p. Thậm ch&iacute;, trong c&aacute;c b&agrave;i viết https://rusi.org/commentary/wildlife-crime-financial-crime-response-needs-reflect v&agrave; https://www.rusi.org/commentary/wildlife-crime-financial-crime-response-needs-reflect c&ograve;n đề xuất xếp tội phạm bu&ocirc;n b&aacute;n động thực vật hoang d&atilde; ngang h&agrave;ng với tội phạm t&agrave;i ch&iacute;nh.</p>\r\n\r\n<p>Việc ph&ograve;ng chống săn bắt v&agrave; bu&ocirc;n b&aacute;n động vật tr&aacute;i ph&eacute;p l&agrave; điều cấp thiết cần triển khai. Ngo&agrave;i ra, vấn đề cấp thiết kh&ocirc;ng k&eacute;m đ&oacute; ch&iacute;nh l&agrave; việc n&acirc;ng cao &yacute; thức v&agrave; sự hiểu biết của con người đối với m&ocirc;i trường tự nhi&ecirc;n n&oacute;i chung v&agrave; việc bảo vệ động vật hoang d&atilde; n&oacute;i ri&ecirc;ng.</p>\r\n\r\n<p>C&aacute;c kh&oacute;a học cho học sinh, c&aacute;c trường tr&igrave;nh đ&agrave;o tạo về hệ sinh th&aacute;i v&agrave; quản l&yacute; đa dạng sinh học sẽ khiến cho x&atilde; hội nhận thức r&otilde; hơn về tầm quan trọng của m&ocirc;i trường sống xung quanh.&nbsp;C&oacute; vẻ như ch&uacute;ng ta đ&atilde; quen với m&ocirc;i trường tự nhi&ecirc;n v&ocirc; c&ugrave;ng đa dạng m&agrave; ch&uacute;ng ta qu&ecirc;n mất một điều rằng động vật hoang d&atilde; cũng cần phải được bảo vệ.</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; những vấn đề xung quanh việc bảo tồn, bảo vệ động vật hoang d&atilde;. Hy vọng, qua b&agrave;i viết n&agrave;y sẽ gi&uacute;p bạn đọc nhận thức được tầm quan trọng của việc bảo tồn c&aacute;c lo&agrave;i động thực vật hoang d&atilde;. Bảo vệ thi&ecirc;n nhi&ecirc;n ch&iacute;nh l&agrave; bảo vệ cho ch&iacute;nh sự sống của ch&uacute;ng ta.</p>\r\n\r\n<p>Động vật l&agrave; bạn của con người!</p>', 'wildlife-animals.jpg', '2021-11-03', 1, 2364, 1),
(8, 'Ô nhiễm phóng xạ hạt nhân', 'Nguyên nhân, ảnh hưởng - hậu quả và cách khắc phục đối với bức xạ hạt nhân', '<p><strong>Phần 1:&nbsp;</strong><strong>Nguy&ecirc;n nh&acirc;n g&acirc;y &ocirc; nhiễm ph&oacute;ng xạ</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;&Ocirc; nhiễm ph&oacute;ng xạ xảy ra khi c&oacute; sự hiện diện hoặc lắng đọng của c&aacute;c chất ph&oacute;ng xạ trong kh&iacute; quyển hoặc m&ocirc;i trường, ch&uacute;ng xảy ra theo c&aacute;ch ngẫu nhi&ecirc;n v&agrave; g&acirc;y ra mối đe dọa đến m&ocirc;i trường do ph&acirc;n r&atilde; ph&oacute;ng xạ. Sự ph&aacute; hủy m&agrave; chất ph&oacute;ng xạ tạo ra l&agrave; do sự ph&aacute;t xạ c&aacute;c ion ph&oacute;ng xạ nguy hiểm như c&aacute;c hạt beta hay alpha, tia gamma hoặc hạt nơ-tr&ocirc;n trong m&ocirc;i trường nơi m&agrave; ch&uacute;ng tồn tại.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;C&aacute;c chất c&oacute; t&iacute;nh bức xạ &ndash; sự kh&ocirc;ng ổn định của c&aacute;c hạt trong hạt nh&acirc;n của c&aacute;c chất ph&oacute;ng xạ c&oacute; thể tạo ra ảnh hưởng nghi&ecirc;m trọng, th&acirc;m ch&iacute; ph&aacute; hủy thực vật, động vật v&agrave; cuộc sống con người. Mức độ thiệt hại v&agrave; độ nguy hiểm đối với m&ocirc;i trường phụ thuộc v&agrave; nồng độ chất ph&oacute;ng xạ, mức năng lượng do bức xạ ph&aacute;t ra, khoảng c&aacute;ch của chất ph&oacute;ng xạ đối với c&aacute;c vật phơi nhiễm v&agrave; loại ph&oacute;ng xạ. Dưới đ&acirc;y l&agrave; giải th&iacute;ch chi tiết về nguy&ecirc;n nh&acirc;n, ảnh hưởng v&agrave; giải ph&aacute;p đối với &ocirc; nhiễm ph&oacute;ng xạ.</p>\r\n\r\n<p><strong>Nguy&ecirc;n nh&acirc;n g&acirc;y &ocirc; nhiễm ph&oacute;ng xạ</strong></p>\r\n\r\n<p><strong>1. Tai nạn hạt nh&acirc;n từ c&aacute;c nh&agrave; m&aacute;y sản xuất hạt nh&acirc;n</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trong thế giới hiện đại, nhiều dạng năng lượng đ&atilde; được kh&aacute;m ph&aacute;. Một trong số đ&oacute; l&agrave; năng lượng hạt nh&acirc;n, được coi l&agrave; nguồn năng lượng tiềm năng nhất. C&aacute;c b&aacute;o c&aacute;o chỉ ra rằng năng lượng hạt nh&acirc;n c&oacute; mức nguy hiểm cao l&agrave; do mức độ bức xạ cao của ch&uacute;ng.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; Do đ&oacute;, việc sử dụng năng lượng hạt nh&acirc;n bị cấm ở nhiều quốc gia, nhưng bằng nhiều c&aacute;ch nghi&ecirc;n cứu x&aacute;c định mức độ an to&agrave;n của năng lượng hạt nh&acirc;n với m&ocirc;i trường, ch&uacute;ng ta đ&atilde; đưa ra nhiều giải ph&aacute;p ph&ograve;ng ngừa th&iacute;ch hợp nhất khi sử dụng ch&uacute;ng. Đối với một v&agrave;i quốc gia kh&aacute;c, việc xảy ra c&aacute;c tai nạn năng lượng hạt nh&acirc;n như&nbsp; nh&agrave; m&aacute;y điện hạt nh&acirc;n Fukushima Daiichi (2011), thảm họa Chernobyl (1986), v&agrave; sự cố Three Mile Island (1979) đ&atilde; khiến h&agrave;ng ng&agrave;n người thiệt mạng v&agrave; nhiều người kh&aacute;c bị ảnh hưởng bởi bức xạ khuếch t&aacute;n.</p>\r\n\r\n<p><img alt=\"\" src=\"https://sosmoitruong.com/wp-content/uploads/2021/05/dongdat3.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><strong>2. Sử dụng năng lượng hạt nh&acirc;n l&agrave;m vũ kh&iacute; hủy diệt h&agrave;ng loại</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Việc sử dụng t&ecirc;n lửa hạt nh&acirc;n v&agrave; boom nguy&ecirc;n tử, một dạng năng lượng hạt nh&acirc;n trong chiến tranh thế giới thứ hai kh&ocirc;ng chỉ giải th&iacute;ch được nguy&ecirc;n nh&acirc;n m&agrave; c&ograve;n giải th&iacute;ch bản chất g&acirc;y hại của &ocirc; nhiễm ph&oacute;ng xạ.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;T&aacute;c động của &ocirc; nhiễm ph&oacute;ng xạ đến từ kết quả chiến tranh thế giới thứ 2 &nbsp;bởi cuộc thảm s&aacute;t bằng boom nguy&ecirc;n tử ở Hiroshima v&agrave; Nagasaki (1945) đ&atilde; được chứng minh cho đến h&ocirc;m nay, những đứa trẻ sinh ra với c&aacute;c biến chứng như chậm ph&aacute;t triển tr&iacute; tuệ cũng như c&aacute;c t&igrave;nh trạng tự kỉ v&agrave; rối loạn kh&aacute;c. Số ca mắc ung thư ở hai trị trấn n&agrave;y cũng nhiều hơn những v&ugrave;ng kh&aacute;c ở Nhật.</p>\r\n\r\n<p><strong>3. Sử dụng đồng vị ph&oacute;ng xạ</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Đồng vị ph&oacute;ng xạ được sử dụng để chế tạo c&aacute;c m&aacute;y d&ograve; kim loại, chụp X &ndash; quang trong y tế hay được sử dụng trong c&ocirc;ng nghiệp luyện kim, . . . C&aacute;c chất đồng vị như uranium c&oacute; nồng độ bức xạ cao trong ch&uacute;ng. Mặt kh&aacute;c, c&aacute;c đồng vị th&ocirc;ng thường như chất ph&oacute;ng xạ chứa carbon dễ d&agrave;ng t&igrave;m thấy trong c&aacute;c đường nước thải y tế, nước thải c&ocirc;ng nghiệp, . . .</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Nếu hầu hết nước thải từ nguồn kh&ocirc;ng được xử l&yacute; trước khi thải ra m&ocirc;i trường th&igrave; c&aacute;c đồng vị sẽ kết hợp với c&aacute;c hợp chất v&agrave; nguy&ecirc;n tố kh&aacute;c c&oacute; trong nước. Khi thả ra nguồn nước sinh hoạt hoặc thải ra v&ugrave;ng nước d&ugrave;ng cho đ&aacute;nh bắt hoặc nu&ocirc;i trồng thủy hải sản sẽ g&acirc;y &ocirc; nhiễm v&agrave; tăng khả năng hấp thụ bức xạ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://sosmoitruong.com/wp-content/uploads/2021/05/20210329_070623_473175_ung-dung-dong-vi-ph.max-1800x1800.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><strong>4. Khai th&aacute;c</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Khai th&aacute;c chủ yếu bao gồm việc đ&agrave;o c&aacute;c quặng kho&aacute;ng sản, sau đ&oacute; được chia th&agrave;nh c&aacute;c mảnh nhỏ hơn, để dễ d&agrave;ng quản l&yacute;. V&iacute; dụ như Radium v&agrave; Uranium c&oacute; nguồn gốc tự nhi&ecirc;n hay nh&acirc;n tạo đều c&oacute; t&iacute;nh ph&oacute;ng xạ như nhau.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Do đ&oacute;, khai th&aacute;c mỏ l&agrave;m tăng c&aacute;c qu&aacute; tr&igrave;nh địa chất tự nhi&ecirc;n bằng c&aacute;ch di chuyển c&aacute;c vật liệu n&agrave;y từ b&ecirc;n dưới tr&aacute;i đất l&ecirc;n bề mặt. C&aacute;c kho&aacute;ng chất kh&aacute;c cũng c&oacute; bức xạ l&agrave; thori, plutonium, radon, kali, carbon v&agrave; phốt pho.</p>\r\n\r\n<p><strong>5. Sự lan tr&agrave;n của c&aacute;c h&oacute;a chất ph&oacute;ng xạ</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Đ&atilde; c&oacute; những trường hợp ph&oacute;ng xạ tr&agrave;n ra đại dương khi t&agrave;u va v&agrave;o nhau hay va v&agrave;o những d&ograve;ng s&ocirc;ng băng hoặc rạn san h&ocirc;, điều n&agrave;y v&ocirc; h&igrave;nh chung đ&atilde; giải ph&oacute;ng h&oacute;a chất v&agrave;o đường thủy v&agrave; trong khi quyển. Phần lớn c&aacute;c h&oacute;a chất n&agrave;y, bao gồm cả c&aacute;c sản phẩm dầu mỏ đều c&oacute; thể c&oacute; một lượng ph&oacute;ng xạ tự nhi&ecirc;n.</p>\r\n\r\n<p><img alt=\"\" src=\"https://sosmoitruong.com/wp-content/uploads/2021/05/can-canh-tham-hoa-moi-truong-ngoai-khoi-mauritius-sau-su-co-tran-dau-1-768x489.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><strong>6. Thử nghiệm về bức xạ</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Bức xạ c&oacute; rất nhiều đặc t&iacute;nh th&uacute; vị, điều n&agrave;y đ&atilde; thức đẩy rất nhiều nh&agrave; khoa học tiến h&agrave;nh c&aacute;c cuộc thử nghiệm v&agrave; nghi&ecirc;n cứu về n&oacute;. Một trong số đ&oacute; l&agrave; khả năng điều trị v&agrave; chữa khỏi bệnh ung thư.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;H&oacute;a trị, l&agrave; một s&aacute;ng kiến y tế chữa b&ecirc;nh ung thư bằng c&aacute;ch sử dụng bức xạ để ngăn chặn sự ph&aacute;t triển của c&aacute;c tế b&agrave;o ung thư cũng như giữ cho hệ thống miễn dịch được khỏe mạnh. Mặc d&ugrave; hữu &iacute;ch như vậy, nhưng c&aacute;c nh&agrave; khoa học đ&atilde; tiếp x&uacute;c với bức xạ đều bị phơi nhiễm. Điều đ&oacute; đ&atilde; dẫn đến c&aacute;i chết của nhiều nh&agrave; khoa học hoặc những biến chứng kh&aacute;c k&eacute;o d&agrave;i.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Theo b&aacute;o c&aacute;o của Đại hội đồng Li&ecirc;n Hợp Quốc, việc thử hạt nh&acirc;n l&agrave; nguy&ecirc;n nh&acirc;n ch&iacute;nh g&acirc;y phơi nhiễm ph&oacute;ng xạ của con người.</p>\r\n\r\n<p><strong>7. Tia vũ trụ v&agrave; c&aacute;c nguồn tự nhi&ecirc;n kh&aacute;c</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Tia vũ trụ l&agrave; c&aacute;c hạt nguy&ecirc;n tử năng lượng cực cao &ndash; chủ yếu l&agrave; proton v&agrave; hạt nh&acirc;n nguy&ecirc;n tử k&egrave;m theo ph&aacute;t xạ điện từ, do đ&oacute; g&acirc;y ra &ocirc; nhiễm ph&oacute;ng xạ. V&iacute; dụ như tia gamma, được cho l&agrave; c&oacute; mức bức xạ cao nhất sẽ t&ugrave;y thuộc v&agrave;o cường độ của ch&uacute;ng hay một số tia kh&aacute;c ở trong v&ugrave;ng kh&ocirc;ng nh&igrave;n thấy bằng mắt thường. Số lượng c&aacute;c tia tới tr&aacute;i đất phụ thuộc v&agrave;o độ cao v&agrave; vị tr&iacute; địa l&yacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"https://sosmoitruong.com/wp-content/uploads/2021/05/t%E1%BA%A3i-xu%E1%BB%91ng.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>C&oacute; thể c&oacute; c&aacute;c bức xạ tr&ecirc;n mặt đất từ c&aacute;c nguy&ecirc;n tố ph&oacute;ng xạ trong vỏ tr&aacute;i đất. C&aacute;c nguy&ecirc;n tố ph&oacute;ng xạ n&agrave;y bao gồm Kali 40, radium 224, radon 222, thorium 232, uranium 235, uranium 238 v&agrave; Carbon 14 xuất hiện trong đ&aacute;, đất v&agrave; nước.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Cũng c&oacute; thể c&oacute; c&aacute;c nu-cl&ecirc;-&ocirc;-t&iacute;t kh&ocirc;ng ổn định được chia th&agrave;nh c&aacute;c phần nhỏ hơn v&agrave; ph&aacute;t ra bức xạ năng lượng c&oacute; thể x&acirc;m nhập v&agrave;o cơ thể của sinh vật kh&aacute;c th&ocirc;ng qua kh&ocirc;ng kh&iacute; trong qu&aacute; tr&igrave;nh h&ocirc; hấp.</p>\r\n\r\n<p><strong>8. Xử l&yacute; v&agrave; thải bỏ chất thải hạt nh&acirc;n</strong></p>\r\n\r\n<p>&nbsp; &nbsp; Chất thải ph&oacute;ng xạ gồm hai loại &ndash; mức độ cao, mức độ thấp. Ch&uacute;ng chủ yếu đến từ vũ kh&iacute; qu&acirc;n sự, vật liệu l&agrave;m sạch từ c&aacute;c nh&agrave; m&aacute;y hạt nh&acirc;n, c&aacute;c cơ sở qu&acirc;n sự, thải ra từ qu&aacute; tr&igrave;nh xử l&yacute; plutonium v&agrave; c&aacute;c đồng vị ph&oacute;ng xạ kh&aacute;c từ c&aacute;c bệnh viện v&agrave; ph&ograve;ng th&iacute; nghiệm.</p>\r\n\r\n<p><img alt=\"\" src=\"https://sosmoitruong.com/wp-content/uploads/2021/05/O-nhiem-chat-phong-xa-trong-nuoc.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>&nbsp; &nbsp; Việc xử l&yacute; v&agrave; ti&ecirc;u hủy chất thải hạt nh&acirc;n c&oacute; thể tạo ra bức xạ từ thấp đến trung b&igrave;nh trong thời gian d&agrave;i. T&aacute;c động của ch&uacute;ng kh&ocirc;ng chỉ kh&oacute; dự đo&aacute;n m&agrave; c&ograve;n kh&oacute; nhận biết v&igrave; ph&oacute;ng xạ c&oacute; thể g&acirc;y &ocirc; nhiễm v&agrave; lan truyền qua kh&ocirc;ng kh&iacute;, nước v&agrave; đất. Mặt kh&aacute;c, việc x&aacute;c định vị tr&iacute; của một số chất thải hạt nh&acirc;n l&agrave; kh&ocirc;ng hề đơn giản.</p>\r\n\r\n<p>&nbsp;Vấn đề ch&iacute;nh của chất thải bức xạ l&agrave; kh&ocirc;ng thể bị ph&acirc;n hủy hoặc xử l&yacute; về mặt h&oacute;a học hoặc sinh học. C&aacute;c lựa chọn duy nhất l&agrave; được lưu chứa trong c&aacute;c th&ugrave;ng k&iacute;n c&oacute; che chắn bằng vật liệu bảo vệ bức xạ (chẳng hạn như Pb) hoặc pha lo&atilde;ng chất thải đ&oacute;.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Ngo&agrave;i ra, chất thải bức xạ c&oacute; thể lưu trữ ở những v&ugrave;ng xa x&ocirc;i c&oacute; &iacute;t hoặc kh&ocirc;ng c&oacute; sự sống. Tuy nhi&ecirc;n, bất kỳ tấm l&aacute; chắn tự nhi&ecirc;n hay nh&acirc;n tạo đều sẽ bị hư hỏng theo thời gian, v&igrave; vậy c&aacute;c hoạt động xử l&yacute; chất thải bức xạ cần được x&aacute;c định cẩn thận v&agrave; &aacute;p dụng c&aacute;c biện ph&aacute;p hạn chế kịp thời.</p>\r\n\r\n<p>&nbsp;</p>', 'o-nhiem-phong-xa.jpg', '2021-11-06', 46, 1537, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `blogId` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userId`, `blogId`, `comment`, `date`, `time`) VALUES
(16, 52, 2, 'Bài viết bổ ích! ^^', '2021-11-08', '16:33:05'),
(17, 4, 1, 'Hello', '2021-11-08', '16:36:28'),
(18, 4, 1, 'Quỳnh thấy bài này hay !', '2021-11-08', '16:41:45'),
(19, 52, 1, 'Bài viết hay lắm ạ! ^^', '2021-11-08', '16:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(10) UNSIGNED NOT NULL,
  `useId` int(10) UNSIGNED NOT NULL,
  `projectId` int(10) UNSIGNED DEFAULT NULL,
  `typeProduct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeCheckout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amout` double NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `useId`, `projectId`, `typeProduct`, `desc`, `typeCheckout`, `amout`, `date`, `time`) VALUES
(1, 46, NULL, 'Thanh toán hóa đơn - Ủng hộ website', 'Thanh toán hóa đơn lúc 10:11:19 09-11-2021', 'AGRIBANK', 1500000, '2021-11-09', '11:12:12'),
(2, 46, NULL, 'Thanh toán hóa đơn - Ủng hộ website', 'Thanh toán hóa đơn lúc 11:11:24 09-11-2021', 'AGRIBANK', 1500000, '2021-11-09', '11:13:31'),
(7, 46, 1, 'Thanh toán hóa đơn - Ủng hộ dự án \"Hưởng ứng trồng cây gây rừng\"', 'Thanh toán hóa đơn lúc 11:11:35 09-11-2021', 'DONGABANK', 20000000, '2021-11-09', '11:28:40'),
(8, 46, NULL, 'Thanh toán hóa đơn - Ủng hộ website', 'Thanh toán hóa đơn lúc 12:11:58 09-11-2021', 'BIDV', 150000, '2021-11-09', '12:59:04'),
(9, 46, 1, 'Thanh toán hóa đơn - Ủng hộ dự án \"Hưởng ứng trồng cây gây rừng\"', 'Thanh toán hóa đơn lúc 13:11:32 09-11-2021', 'TPBANK', 8000000, '2021-11-09', '13:00:40'),
(10, 4, 3, 'Thanh toán hóa đơn - Ủng hộ dự án \"Hội nghị ASEAN về môi trường\"', 'Thanh toán hóa đơn lúc 08:11:06 12-11-2021', 'VISA', 7000000, '2021-11-12', '08:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noMembers` int(11) NOT NULL DEFAULT 0,
  `dateCreate` date NOT NULL,
  `createrId` int(10) UNSIGNED NOT NULL,
  `imageSource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `introduction`, `content`, `time`, `date`, `location`, `noMembers`, `dateCreate`, `createrId`, `imageSource`, `status`) VALUES
(1, 'Làm sạch bãi biển khu vực xóm Mũi', 'Hưởng ứng ngày Nước thế giới (22-3) và chiến dịch “Hãy làm sạch biển” của Trung tâm Truyền thông Tài nguyên và Môi trường (Bộ Tài nguyên và Môi trường)', '<p>Hưởng ứng ng&agrave;y Nước thế giới (22-3) v&agrave; chiến dịch &ldquo;H&atilde;y l&agrave;m sạch biển&rdquo; của Trung t&acirc;m Truyền th&ocirc;ng T&agrave;i nguy&ecirc;n v&agrave; M&ocirc;i trường (Bộ T&agrave;i nguy&ecirc;n v&agrave; M&ocirc;i trường), chiều 21-3, tại xóm Mũi ̣(th&ocirc;n Thành Đạt, xã Phước Đ&ocirc;̀ng, TP. Nha Trang), mạng lưới bảo v&ecirc;̣ m&ocirc;i trường vịnh Nha Trang tổ chức chương tr&igrave;nh &ldquo;Chung tay bảo v&ecirc;̣ m&ocirc;i trường, bỏ rác đúng nơi quy định&rdquo;.</p>\r\n\r\n<p>Tại đ&acirc;y, hơn 100 người gồm: Đo&agrave;n vi&ecirc;n Chi đoàn Ban quản lý Vịnh Nha Trang, Đoàn thanh ni&ecirc;n xã Phước Đ&ocirc;̀ng, c&aacute;c t&igrave;nh nguyện vi&ecirc;n đến từ Trường Đại học Nha Trang v&agrave; một số c&ocirc;ng ty du lịch đ&oacute;ng tr&ecirc;n địa b&agrave;n TP. Nha Trang, người d&acirc;n x&oacute;m Mũi, Trạm kiểm so&aacute;t Bi&ecirc;n ph&ograve;ng H&ograve;n Rớ... đ&atilde; tham gia thu gom r&aacute;c thải tại đường tho&aacute;t nước khu vực x&oacute;m Mũi. Sau hơn 2 giờ, hơn 1 tấn r&aacute;c được thu gom, đưa l&ecirc;n xe đẩy để C&ocirc;ng ty cổ phần M&ocirc;i trường đ&ocirc; thị Nha Trang xử l&yacute;.</p>\r\n\r\n<p>Cũng nhân dịp này, đại diện Cleanup world tuyên truyền, hướng dẫn người dân, các tình nguyện viên bảo vệ môi trường bằng những hành động cụ thể thiết thực hàng ngày. Nhóm cũng tặng bà con và các tình nguyện viên các gói chế phẩm vi sinh có thể dùng xử lý môi trường hoặc dùng ủ phân hữu cơ từ các rác thải hữu cơ quy mô hộ gia đình</p>\r\n\r\n<p>Theo người d&acirc;n x&oacute;m Mũi, r&aacute;c tại đ&acirc;y chủ yếu từ biển tấp v&agrave;o v&agrave; một &iacute;t do người d&acirc;n xả ra b&atilde;i biển.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://baokhanhhoa.vn/dataimages/202103/original/images5445095_1.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>&nbsp;</p>', '08:00:00', '2021-10-30', 'Xóm Mũi, Khánh Hòa', 5, '2021-10-31', 1, 'rac-bien.jpg', 1),
(2, 'Trồng rừng Phú Thọ', 'Phú Thọ chú trọng phát triển kinh tế rừng bền vững. Phú Thọ luôn xác định lâm nghiệp là tiềm năng và lợi thế trong phát triển kinh tế của địa phương.', '<p><strong>Trong những năm qua, Ph&uacute; Thọ lu&ocirc;n x&aacute;c định l&acirc;m nghiệp l&agrave; tiềm năng v&agrave; lợi thế trong ph&aacute;t triển kinh tế của địa phương. Do đ&oacute;, b&ecirc;n cạnh c&aacute;c ch&iacute;nh s&aacute;ch hỗ trợ ph&aacute;t triển l&acirc;m nghiệp của Ch&iacute;nh phủ, tỉnh Ph&uacute; Thọ cũng đ&atilde; ban h&agrave;nh nhiều ch&iacute;nh s&aacute;ch hỗ trợ sản xuất n&ocirc;ng nghiệp giai đoạn 2016 &ndash; 2020; trong đ&oacute; c&oacute; l&acirc;m nghiệp v&agrave; đ&atilde; mang lại hiệu quả thiết thực.</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"https://img.dantocmiennui.vn/t620/uploaded/yrguvatbpqhat/2021_06_18/vna_potal_bao_ve_rung_phu_tho_day_manh_cong_tac_quan_ly_bao_ve_su_dung_rung_gan_voi_phat_trien_lam_nghiep_ben_vung_stand.jpg\" style=\"width:100%\" /></strong></p>\r\n\r\n<p>Thực tế cho thấy, c&aacute;c ch&iacute;nh s&aacute;ch hỗ trợ ph&aacute;t triển l&acirc;m nghiệp từng bước l&agrave;m thay đổi căn bản nhận thức của người d&acirc;n về bảo vệ v&agrave; ph&aacute;t triển rừng, đồng thời khuyến kh&iacute;ch được người d&acirc;n t&iacute;ch cực tham gia trồng rừng, tạo n&ecirc;n phong tr&agrave;o rộng khắp tr&ecirc;n địa b&agrave;n tỉnh Ph&uacute; Thọ. Tỉnh c&oacute; diện t&iacute;ch rừng l&agrave; hơn 140.600 ha, tỷ lệ che phủ rừng tr&ecirc;n địa b&agrave;n tỉnh đạt 39,8%; tạo việc l&agrave;m, tăng thu nhập cho người d&acirc;n địa phương; h&igrave;nh th&agrave;nh được c&aacute;c v&ugrave;ng nguy&ecirc;n liệu gỗ rừng trồng ổn định để phục vụ cho ng&agrave;nh c&ocirc;ng nghiệp chế biến l&acirc;m sản.</p>\r\n\r\n<p>Huyện Đoan H&ugrave;ng l&agrave; địa phương c&oacute; diện t&iacute;ch rừng hơn 13.000 ha. Trong số đ&oacute;, diện t&iacute;ch đất l&acirc;m nghiệp do người d&acirc;n quản l&yacute;, canh t&aacute;c gần 9.000 ha, c&ograve;n lại l&agrave; đất thuộc c&aacute;c n&ocirc;ng, l&acirc;m trường v&agrave; c&aacute;c tổ chức kh&aacute;c. Trong những năm qua, người d&acirc;n đ&atilde; chủ động b&aacute;m đất, b&aacute;m rừng để sản xuất l&acirc;m nghiệp, bước đầu đ&atilde; mang lại hiệu quả kinh tế r&otilde; rệt.<br />\r\n<br />\r\nHộ gia đ&igrave;nh &ocirc;ng Nguyễn Văn Học ở khu 3, x&atilde; Ca Đ&igrave;nh, huyện Đoan H&ugrave;ng c&oacute; hơn 30 ha đất l&acirc;m nghiệp. &Ocirc;ng Học cho biết, trong những năm qua, gia đ&igrave;nh đ&atilde; tập trung trồng c&acirc;y bạch đ&agrave;n v&agrave; c&acirc;y keo. Sau chu kỳ từ 6 - 7 năm, rừng trồng cho thu nhập từ 80 - 120 triệu đồng/ha. Đầu ra cho sản phẩm gỗ cũng rất thuận lợi v&igrave; thương l&aacute;i đến tận nơi thu mua. Trong những năm tới, gia đ&igrave;nh &ocirc;ng sẽ chuyển dần sang trồng rừng gỗ lớn để hiệu quả kinh tế cao hơn.<br />\r\n<br />\r\nTheo Ho&agrave;ng Văn S&aacute;ng, Hạt trưởng Hạt kiểm l&acirc;m huyện Đoan H&ugrave;ng, người d&acirc;n trong huyện chủ yếu trồng rừng l&agrave; keo v&agrave; bạch đ&agrave;n; trong đ&oacute; hơn 90% l&agrave; c&acirc;y keo lai. Hằng năm, to&agrave;n huyện khai th&aacute;c gần 100 ngh&igrave;n m3 gỗ với hơn 150 cơ sở kinh doanh, chế biến l&acirc;m sản. Đ&acirc;y l&agrave; điều kiện thuận lợi cho người trồng rừng, v&igrave; người d&acirc;n kh&ocirc;ng phải lo đầu ra cho sản phẩm. Tuy nhi&ecirc;n, tr&ecirc;n địa b&agrave;n huyện hiện chỉ c&oacute; gần 300 ha rừng gỗ lớn được cấp Chứng chỉ quản l&yacute; rừng bền vững (FSC). Trong thời gian tới, huyện sẽ khuyến kh&iacute;ch v&agrave; hướng dẫn b&agrave; con chuyển dần sang trồng c&acirc;y gỗ lớn cho hiệu quả kinh tế cao hơn.<br />\r\n<br />\r\nTheo Sở N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n tỉnh Ph&uacute; Thọ, giai đoạn 2016 - 2020, tỉnh đ&atilde; tổ chức bảo vệ nghi&ecirc;m hơn 17 ngh&igrave;n ha diện t&iacute;ch rừng đặc dụng, hơn 22 ngh&igrave;n ha rừng ph&ograve;ng hộ; thực hiện trồng 103,4 ha rừng đặc dụng v&agrave; 425,7 ha rừng ph&ograve;ng hộ; r&agrave; so&aacute;t, điều chỉnh quy hoạch ba loại rừng giai đoạn 2016 - 2025, định hướng đến năm 2030.<br />\r\n<br />\r\nPh&oacute; Gi&aacute;m đốc Sở N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n tỉnh Ph&uacute; Thọ Trần T&uacute; Anh cho biết, ph&aacute;t triển kinh tế rừng l&agrave; một trong những nhiệm vụ trọng t&acirc;m trong cơ cấu kinh tế chung của tỉnh. Đặc biệt, ng&agrave;nh chế biến gỗ tr&ecirc;n địa b&agrave;n tỉnh ph&aacute;t triển kh&aacute; nhanh, to&agrave;n tỉnh hiện c&oacute; 178 doanh nghiệp, 6 hợp t&aacute;c x&atilde;, 714 cơ sở chế biến gỗ v&agrave; l&acirc;m sản quy m&ocirc; vừa; khoảng 2,1 ngh&igrave;n cơ sở chế biến gỗ quy m&ocirc; hộ gia đ&igrave;nh.<br />\r\n<br />\r\nĐể ph&aacute;t triển kinh tế rừng bền vững, tỉnh Ph&uacute; Thọ đ&atilde; đưa ra định hướng tiếp tục cơ cấu lại sản xuất l&acirc;m nghiệp, tạo động lực mới cho ph&aacute;t triển l&acirc;m nghiệp, cụ thể: bảo vệ, ph&aacute;t triển v&agrave; sử dụng hiệu quả, bền vững diện t&iacute;ch rừng hiện c&oacute;, bảo tồn nguồn gen v&agrave; đa dạng sinh học của rừng; n&acirc;ng cao năng suất, chất lượng v&agrave; ph&aacute;t huy gi&aacute; trị của từng loại rừng. Tỉnh chỉ đạo trồng rừng sản xuất tập trung, tuyển chọn giống c&oacute; chất lượng, nguồn gốc xuất xứ đưa v&agrave;o sản xuất, đẩy mạnh th&acirc;m canh n&acirc;ng cao hiệu quả kinh tế rừng trồng theo hướng ph&aacute;t triển l&acirc;m nghiệp đa chức năng...<br />\r\n<br />\r\nPh&uacute; Thọ đẩy mạnh trồng v&agrave; chăm s&oacute;c c&acirc;y ph&acirc;n t&aacute;n b&igrave;nh qu&acirc;n tr&ecirc;n hai triệu c&acirc;y/năm, g&oacute;p phần thực hiện Đề &aacute;n trồng một tỷ c&acirc;y xanh của Thủ tướng Ch&iacute;nh phủ. Ph&aacute;t triển t&iacute;ch rừng trồng quế 3.000 ha tr&ecirc;n địa b&agrave;n huyện T&acirc;n Sơn v&agrave; Y&ecirc;n Lập; ph&aacute;t triển nh&oacute;m c&aacute;c sản phẩm l&acirc;m sản ngo&agrave;i gỗ c&oacute; thế mạnh như m&acirc;y tre, dược liệu... với diện t&iacute;ch khoảng 500 ha tại huyện T&acirc;n Sơn, Y&ecirc;n Lập v&agrave; Thanh Sơn, Hạ H&ograve;a. Tỉnh phấn đấu đến năm 2030, gi&aacute; trị thu nhập từ rừng trồng sản xuất tăng 2 lần/đơn vị diện t&iacute;ch so với năm 2020.<br />\r\n<br />\r\nĐể hiện thực ho&aacute; những mục ti&ecirc;u tr&ecirc;n, Ph&uacute; Thọ sẽ thực hiện c&oacute; hiệu quả c&aacute;c chủ trương, ch&iacute;nh s&aacute;ch hỗ trợ ph&aacute;t triển l&acirc;m nghiệp. Tỉnh r&agrave; so&aacute;t, ho&agrave;n thiện ch&iacute;nh s&aacute;ch hỗ trợ ph&aacute;t triển sản xuất, tạo động lực cho ph&aacute;t triển l&acirc;m nghiệp v&agrave; ph&ugrave; hợp với điều kiện, định hướng ph&aacute;t triển của tỉnh. Ph&uacute; Thọ cũng r&agrave; so&aacute;t quy hoạch, kế hoạch sử dụng đất; khai th&aacute;c tối đa tiềm năng đất đai theo hướng bảo vệ v&agrave; n&acirc;ng cao hiệu quả sử dụng đất n&ocirc;ng l&acirc;m trường sau thu hồi; điều chỉnh quy hoạch 3 loại rừng giai đoạn 2016 - 2025, định hướng đến năm 2030.<br />\r\n<br />\r\nB&ecirc;n cạnh đ&oacute;, tỉnh tiếp tục chuyển giao, ứng dụng nhanh th&agrave;nh tựu khoa học, c&ocirc;ng nghệ ti&ecirc;n tiến v&agrave;o sản xuất, nhất l&agrave; c&ocirc;ng nghệ cao, c&ocirc;ng nghệ sinh học, trồng rừng gỗ lớn, đổi mới c&ocirc;ng nghệ sản xuất, bảo quản, chế biến,... coi đ&acirc;y l&agrave; yếu tố trọng yếu tạo bước đột ph&aacute; trong sản xuất nhằm n&acirc;ng cao năng suất, chất lượng, sức cạnh tranh của sản phẩm. Tỉnh tranh thủ c&aacute;c nguồn vốn hỗ trợ từ ng&acirc;n s&aacute;ch trung ương; x&atilde; hội h&oacute;a c&aacute;c nguồn lực; tăng cường mở rộng hợp t&aacute;c với c&aacute;c nước, tổ chức quốc tế để tranh thủ, thu h&uacute;t nguồn vốn hỗ trợ ph&aacute;t triển sản xuất v&agrave; đầu tư x&acirc;y dựng kết cấu hạ tầng n&ocirc;ng nghiệp, n&ocirc;ng th&ocirc;n.</p>', '08:00:00', '2021-12-15', 'Rừng nguyên sinh Bắc Phú Thọ', 3, '2021-10-31', 1, 'rung-xanh-phu-tho.jpg', 1),
(3, 'Xử lý rác thải tại các khu du lịch biển', 'Thanh Hóa có nhiều khu du lịch biển nổi tiếng. Theo đó, cùng với việc đầu tư xây dựng cơ sở vật chất, hạ tầng kỹ thuật, việc đảm bảo môi trường biển xanh - sạch - đẹp cũng được các địa phương đặc biệt quan tâm.', '<p>Nổi tiếng với b&atilde;i biển d&agrave;i v&agrave; đẹp, mỗi năm Khu du lịch biển Sầm Sơn đ&oacute;n h&agrave;ng triệu lượt kh&aacute;ch. Tỷ lệ thuận với sự gia tăng về lượng kh&aacute;ch đ&oacute; l&agrave; hệ thống nh&agrave; h&agrave;ng, cơ sở lưu tr&uacute;. Hiện nay, TP Sầm Sơn c&oacute; tới gần 500 kh&aacute;ch sạn, h&agrave;ng trăm nh&agrave; h&agrave;ng ăn uống. Từ đ&oacute; m&agrave; lượng nước thải, r&aacute;c thải mỗi năm của th&agrave;nh phố cũng kh&ocirc;ng hề nhỏ.</p>\r\n\r\n<p>Theo thống k&ecirc; của C&ocirc;ng ty CP M&ocirc;i trường đ&ocirc; thị v&agrave; Dịch vụ du lịch Sầm Sơn, ở thời gian cao điểm đ&oacute;n kh&aacute;ch dịp h&egrave;, mỗi ng&agrave;y đơn vị thu gom từ 130 - 150 tấn r&aacute;c thải. Chưa kể, những th&aacute;ng m&ugrave;a mưa, lượng r&aacute;c thải ph&aacute;t sinh tr&ocirc;i dạt v&agrave;o bờ biển c&oacute; thể l&ecirc;n tới h&agrave;ng ngh&igrave;n tấn. Cụ thể, m&ugrave;a mưa năm 2019, lượng r&aacute;c thải ph&aacute;t sinh tại khu vực b&atilde;i biển l&ecirc;n tới 5.000 tấn; năm 2020 tr&ecirc;n 1.000 tấn. C&ograve;n ở thời điểm dịch bệnh, vắng kh&aacute;ch như hiện nay, mỗi ng&agrave;y th&agrave;nh phố cũng c&oacute; tới 90 - 100 tấn r&aacute;c thải.</p>\r\n\r\n<p>Nhằm đảm bảo vệ sinh m&ocirc;i trường, hiện nay 100% cơ sở kinh doanh dịch vụ du lịch tr&ecirc;n địa b&agrave;n TP Sầm Sơn đều thực hiện cam kết sử dụng nước sạch v&agrave; xử l&yacute; r&aacute;c thải h&agrave;ng ng&agrave;y. C&ugrave;ng với c&aacute;c tuyến đường nội thị, khu vực b&atilde;i biển Sầm Sơn cũng được trang bị th&ugrave;ng r&aacute;c. Nhờ đ&oacute;, c&ocirc;ng việc thu gom r&aacute;c thải trở n&ecirc;n thuận lợi hơn.</p>\r\n\r\n<p>&Ocirc;ng L&ecirc; Văn Hiển, Ph&oacute; Gi&aacute;m đốc C&ocirc;ng ty CP M&ocirc;i trường đ&ocirc; thị v&agrave; Dịch vụ du lịch Sầm Sơn, cho biết: Điều đ&aacute;ng mừng l&agrave; trong những năm gần đ&acirc;y, &yacute; thức bảo vệ m&ocirc;i trường n&oacute;i chung, khu vực b&atilde;i biển n&oacute;i ri&ecirc;ng của người d&acirc;n v&agrave; kh&aacute;ch du lịch ng&agrave;y c&agrave;ng được n&acirc;ng cao, hạn chế tối đa việc xả r&aacute;c nơi đ&ocirc; thị v&agrave; vứt r&aacute;c ra biển. Hơn nữa, việc &aacute;p dụng quy định v&agrave; chế t&agrave;i xử phạt được TP Sầm Sơn thực hiện nghi&ecirc;m t&uacute;c, quyết liệt. Nhờ đ&oacute;, t&igrave;nh trạng xả r&aacute;c ra biển trong v&agrave;i năm trở lại đ&acirc;y giảm đi đ&aacute;ng kể.</p>\r\n\r\n<p>Cũng theo &ocirc;ng L&ecirc; Văn Hiển, hiện nay việc thu gom r&aacute;c thải kh&ocirc;ng gặp nhiều kh&oacute; khăn, đơn vị sẵn s&agrave;ng huy động nh&acirc;n lực, vật lực khi v&agrave;o m&ugrave;a du lịch, lượng r&aacute;c thải lớn. Hạn chế lớn nhất vẫn l&agrave; việc xử l&yacute; r&aacute;c thải. Việc xử l&yacute; r&aacute;c thải của th&agrave;nh phố vẫn thực hiện bằng biện ph&aacute;p ch&ocirc;n lấp, phủ bạt HDPE (tấm nhựa chuy&ecirc;n dụng ngăn m&ugrave;i, chống mưa). Với lượng r&aacute;c thải lớn mỗi ng&agrave;y, đặc biệt l&agrave; v&agrave;o m&ugrave;a mưa, nguy cơ &ocirc; nhiễm m&ocirc;i trường v&agrave; ảnh hưởng đến c&aacute;c hộ d&acirc;n khu vực l&acirc;n cận b&atilde;i r&aacute;c l&agrave; rất lớn. Việc tăng cường th&ecirc;m c&aacute;c chế phẩm sinh học cũng chỉ l&agrave; giải ph&aacute;p mang t&iacute;nh tạm thời. Do vậy, th&agrave;nh phố đang đẩy nhanh tiến độ thi c&ocirc;ng x&acirc;y dựng nh&agrave; m&aacute;y xử l&yacute; r&aacute;c thải tại x&atilde; Quảng Minh, nhằm giải quyết triệt để vấn đề r&aacute;c thải tr&ecirc;n địa b&agrave;n.</p>\r\n\r\n<p>C&ugrave;ng với Khu du lịch biển Sầm Sơn, thi&ecirc;n nhi&ecirc;n đ&atilde; ban tặng cho huyện Hoằng H&oacute;a 12 km bờ biển. Với mục ti&ecirc;u trở th&agrave;nh khu du lịch biển xanh - sạch - đẹp, c&ocirc;ng t&aacute;c thu gom, xử l&yacute; r&aacute;c thải tại Khu du lịch sinh th&aacute;i biển Hải Tiến l&agrave; một trong những nhiệm vụ quan trọng, được c&aacute;c cấp ch&iacute;nh quyền địa phương v&agrave; doanh nghiệp quan t&acirc;m. 100% doanh nghiệp du lịch đ&atilde; k&yacute; hợp đồng với c&aacute;c c&ocirc;ng ty m&ocirc;i trường, thu&ecirc; lao động dọn vệ sinh khu du lịch v&agrave; thường xuy&ecirc;n thu gom r&aacute;c thải khu vực b&atilde;i biển. Ngo&agrave;i ra, c&aacute;c nh&agrave; h&agrave;ng, kh&aacute;ch sạn đ&atilde; lắp đặt hệ thống th&ugrave;ng chứa r&aacute;c thải, hướng dẫn du kh&aacute;ch bỏ r&aacute;c đ&uacute;ng nơi quy định. Điển h&igrave;nh, C&ocirc;ng ty TNHH Đầu tư v&agrave; Du lịch Hải Tiến đầu tư gần 1.000 th&ugrave;ng chứa r&aacute;c c&oacute; k&iacute;ch cỡ kh&aacute;c nhau, được bố tr&iacute; trong c&aacute;c ph&ograve;ng nghỉ, b&ecirc;n ngo&agrave;i kh&aacute;ch sạn v&agrave; khu vực bờ biển thuộc c&ocirc;ng ty quản l&yacute;. R&aacute;c thải sau thu gom được ph&acirc;n loại, xử l&yacute; bằng c&aacute;ch ch&ocirc;n lấp, ti&ecirc;u hủy hoặc được c&aacute;c c&ocirc;ng ty m&ocirc;i trường chở đến nơi tập kết r&aacute;c theo quy định.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn3.ivivu.com/2017/05/bien-sam-son-ivivu-1.png\" style=\"width:100%\" /></p>\r\n\r\n<p>Ngo&agrave;i ra, c&aacute;c khu du lịch biển kh&aacute;c trong tỉnh như: Khu du lịch biển Ti&ecirc;n Trang (huyện Quảng Xương), Khu du lịch sinh th&aacute;i biển Hải H&ograve;a (thị x&atilde; Nghi Sơn)... c&ocirc;ng t&aacute;c thu gom, xử l&yacute; r&aacute;c thải cũng đ&atilde; được c&aacute;c địa phương v&agrave; đơn vị kinh doanh quan t&acirc;m. C&aacute;c khu du lịch biển đ&atilde; ban h&agrave;nh v&agrave; thực hiện nghi&ecirc;m c&aacute;c quy chế về bảo vệ m&ocirc;i trường. Đồng thời, phối hợp với c&aacute;c ban, ng&agrave;nh, đo&agrave;n thể tổ chức tổng vệ sinh m&ocirc;i trường biển định kỳ, bảo đảm kh&ocirc;ng để tồn đọng r&aacute;c tr&ecirc;n b&atilde;i biển v&agrave; c&aacute;c trục đường, khu vực c&ocirc;ng cộng. Việc thực hiện giải ph&aacute;p ph&acirc;n loại v&agrave; xử l&yacute; c&aacute;c loại r&aacute;c thải ngay từ ban đầu, nhằm hạn chế tối đa r&aacute;c thải ra m&ocirc;i trường cũng được thực hiện nghi&ecirc;m t&uacute;c.</p>\r\n\r\n<p>&Ocirc;ng Phạm Đ&igrave;nh Hải, Gi&aacute;m đốc C&ocirc;ng ty TNHH SoTo (Khu du lịch biển Ti&ecirc;n Trang, huyện Quảng Xương), cho biết: C&ugrave;ng với việc bố tr&iacute; th&ugrave;ng đựng r&aacute;c tại c&aacute;c khu vực trong khu du lịch, ch&uacute;ng t&ocirc;i c&ograve;n thường xuy&ecirc;n dọn dẹp vệ sinh m&ocirc;i trường biển. Đặc biệt, huy động nh&acirc;n lực thu gom r&aacute;c thải tr&ocirc;i dạt v&agrave;o bờ biển v&agrave;o m&ugrave;a mưa. Để thuận lợi cho việc xử l&yacute; r&aacute;c của c&ocirc;ng ty m&ocirc;i trường, c&ocirc;ng ty cũng đ&atilde; quan t&acirc;m thực hiện ph&acirc;n loại r&aacute;c, từ r&aacute;c thải nhựa, tới r&aacute;c thải hữu cơ. Đồng thời, để giữ g&igrave;n khu du lịch biển xanh - sạch - đẹp, c&ocirc;ng ty đ&atilde; ph&aacute;t động phong tr&agrave;o trong c&aacute;n bộ, nh&acirc;n vi&ecirc;n v&agrave; c&oacute; h&igrave;nh thức thưởng phạt r&otilde; r&agrave;ng.</p>\r\n\r\n<p>C&oacute; thể n&oacute;i, để du lịch biển thực sự mang t&iacute;nh chuy&ecirc;n nghiệp, văn minh, th&acirc;n thiện, tạo ấn tượng tốt đẹp đối với du kh&aacute;ch, yếu tố m&ocirc;i trường l&agrave; hết sức quan trọng. Tuy nhi&ecirc;n, thực tế tại c&aacute;c khu du lịch biển, mặc d&ugrave; nước thải, r&aacute;c thải đ&atilde; được thu gom, song phần lớn mới dừng lại ở xử l&yacute; theo phương thức ch&ocirc;n lấp, phủ bạt... Nguy cơ g&acirc;y &ocirc; nhiễm ra m&ocirc;i trường l&agrave; rất lớn. Do đ&oacute;, việc tập trung c&aacute;c nguồn lực đầu tư ho&agrave;n thiện hệ thống xử l&yacute; r&aacute;c thải, nước thải cần được c&aacute;c cấp, ng&agrave;nh v&agrave; ch&iacute;nh quyền địa phương quan t&acirc;m hơn nữa, hướng tới sự ph&aacute;t triển du lịch bền vững.</p>', '08:30:00', '2021-11-06', 'Biển Bãi Đông, Thanh Hóa', 2, '2021-10-31', 1, 'bien.jpg', 1),
(4, 'Biến \"rác thải thời trang\" thành tiền', 'Từ những bộ quần áo cũ, qua bàn tay khéo léo của Hải Yến đã trở thành các sản phẩm độc lạ, bắt nhịp với xu hướng thời trang.', '<p>Những chiếc quần jeans cũ được giặt sạch sẽ, phơi kh&ocirc; v&agrave; lựa chọn giữ lại những chi tiết đặc trưng. C&aacute;c sản phẩm tạo ra c&oacute; thể c&oacute; nhiều h&igrave;nh th&ugrave; kh&aacute;c nhau từ t&uacute;i x&aacute;ch, ba l&ocirc; cho đến d&eacute;p đi trong nh&agrave;. Mỗi sản phẩm được l&agrave;m từ vật liệu t&aacute;i chế kh&aacute;c nhau n&ecirc;n c&oacute; những họa tiết trang tr&iacute; rất kh&aacute;c biệt, kh&oacute; c&oacute; thể l&agrave;m sản phẩm thứ hai giống y hệt.</p>\r\n\r\n<p>Nguyễn Thị Hải Yến, chủ cửa h&agrave;ng t&aacute;i chế thời trang M&egrave;o T&ocirc;m Handmade, TP Bắc Ninh chia sẻ: &quot;Ch&iacute;nh hoạ tiết của quần jean như đai quần, t&uacute;i quần trở th&agrave;nh những hoạ tiết độc đ&aacute;o của t&uacute;i x&aacute;ch, ba l&ocirc;. Hiện tại, c&aacute;c sản phẩm m&igrave;nh b&aacute;n dao động từ 100.000 - 450.000. M&igrave;nh thấy việc m&igrave;nh biến quần jean cũ th&agrave;nh t&uacute;i x&aacute;ch m&agrave; c&oacute; thể gia tăng được thu nhập th&igrave; điều đ&oacute; rất tuyệt&quot;.<img alt=\"\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2020/3/17/tui-15844161216361076052622.png\" style=\"width:100%\" /></p>\r\n\r\n<p>Những kh&aacute;ch h&agrave;ng ủng hộ sản phẩm đa phần l&agrave; những bạn y&ecirc;u th&iacute;ch sự mới lạ v&agrave; quan t&acirc;m đến vấn đề m&ocirc;i trường, muốn sử dụng vật dụng t&aacute;i chế từ đồ cũ. Kh&ocirc;ng chỉ mua trực tiếp tại cửa h&agrave;ng, nhiều vị kh&aacute;ch ngỏ &yacute; đặt sản phẩm từ chiếc quần jean cũ họ mang đến.</p>\r\n\r\n<p>Thời trang l&agrave; ng&agrave;nh c&oacute; quy m&ocirc; rất lớn v&agrave; tiếp tục ph&aacute;t triển như vũ b&atilde;o. M&ocirc;i trường sẽ được giải cứu khỏi &ocirc; nhiễm từ r&aacute;c thải thời trang như thế n&agrave;o c&ograve;n t&ugrave;y thuộc v&agrave;o &yacute; thức mỗi ch&uacute;ng ta. Với việc c&aacute;c bạn trẻ s&aacute;ng tạo t&uacute;i x&aacute;ch, d&eacute;p l&ecirc;... từ những chiếc quần jeans cũ, lỗi mốt, những sản phẩm n&agrave;y kh&ocirc;ng chỉ độc lạ, m&agrave; c&ograve;n bắt nhịp xu hướng thời trang t&aacute;i chế.</p>', '10:00:00', '2021-11-04', 'Hà Nội', 4, '2021-10-31', 1, 'recycling.jpg', 1),
(5, 'Ngày \"trái đất\"', 'Ngày Trái đất (22/4) ra đời cách đây hơn 50 năm có ý nghĩa đặc biệt, với những hoạt động bảo vệ môi trường rộng rãi tại trên 190 nước với sự tham gia trực tiếp của hàng chục triệu người.', '<p>Ng&agrave;y Tr&aacute;i đất (22/4) ra đời c&aacute;ch đ&acirc;y hơn 50 năm c&oacute; &yacute; nghĩa đặc biệt, với những hoạt động bảo vệ m&ocirc;i trường rộng r&atilde;i tại tr&ecirc;n 190 nước với sự tham gia trực tiếp của h&agrave;ng chục triệu người.</p>\r\n\r\n<p><strong>* Lịch sử ra đời ng&agrave;y Tr&aacute;i đất</strong></p>\r\n\r\n<p>Ng&agrave;y Tr&aacute;i đất&nbsp;(Earth Day - ED) được đề xuất lần đầu ở Mỹ năm 1970, &ocirc;ng John McConnell l&agrave; người đề xướng Ng&agrave;y Tr&aacute;i đất. &Ocirc;ng đ&atilde; vận động cử h&agrave;nh t&ocirc;n vinh Tr&aacute;i đất ng&agrave;y 21/03/1970.</p>\r\n\r\n<p><img alt=\"\" src=\"http://tnmttuyenquang.gov.vn/media/images/ngay-trai-dat-4.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>Th&agrave;nh phố San Francisco của Mỹ đ&atilde; hưởng ứng, c&ocirc;ng bố ng&agrave;y 21/3/1970 l&agrave; Ng&agrave;y Tr&aacute;i đất, v&agrave; sau đ&oacute; Tổng Thư k&yacute; Li&ecirc;n Hiệp quốc U Thant đ&atilde; c&ocirc;ng bố đ&oacute; l&agrave; Ng&agrave;y Tr&aacute;i đất Quốc tế.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, sau n&agrave;y một bộ phận đ&ocirc;ng đảo những người ủng hộ Ng&agrave;y Tr&aacute;i đất tin tưởng sau ng&agrave;y Ch&uacute;a Phục sinh mới thật sự l&agrave; Ng&agrave;y Tr&aacute;i đất, v&agrave; họ cử h&agrave;nh v&agrave;o ng&agrave;y 22/4 h&agrave;ng năm.</p>\r\n\r\n<p>Ng&agrave;y Tr&aacute;i đất thứ hai do &ocirc;ng Gaylord Nelson, nguy&ecirc;n thượng nghị sĩ đảng d&acirc;n chủ bang Wisconsin, Mỹ, ph&aacute;t động v&agrave;o ng&agrave;y 22/4/1970 với 20 triệu người tham gia. Đ&oacute; l&agrave; ng&agrave;y m&agrave; nh&acirc;n loại tạm g&aacute;c lại những c&ocirc;ng việc h&agrave;ng ng&agrave;y, những lo lắng buồn phiền để suy nghĩ v&agrave; h&agrave;nh động cho thế giới tự nhi&ecirc;n m&agrave; ch&uacute;ng ta đang sống.</p>\r\n\r\n<p>Cựu Tổng thống Mỹ Bill Clinton&nbsp;từng tuy&ecirc;n bố: &quot;L&agrave; cha đẻ của Ng&agrave;y Tr&aacute;i đất, Nelson đồng thời l&agrave; người ti&ecirc;n phong để sau n&agrave;y cho ra đời c&aacute;c sự kiện kh&aacute;c nối tiếp Ng&agrave;y Tr&aacute;i đất, đ&oacute; l&agrave; Luật Bảo vệ m&ocirc;i trường, Luật Kh&ocirc;ng kh&iacute; sạch, Luật Nước sạch v&agrave; Luật Nước uống an to&agrave;n&quot;.</p>\r\n\r\n<p>Nelson l&agrave; người ủng hộ c&ocirc;ng cuộc bảo vệ m&ocirc;i trường tự nhi&ecirc;n v&agrave; được biết đến như một trong những nh&agrave; l&atilde;nh đạo về m&ocirc;i trường đầu ti&ecirc;n tr&ecirc;n thế giới. &Ocirc;ng được đ&aacute;nh gi&aacute; l&agrave; một người khi&ecirc;m nhường, h&agrave;i hước v&agrave; kh&ocirc;ng bao giờ bị ảnh hưởng bởi quyền lực v&agrave; sự ph&ugrave; hoa của những cương vị &ocirc;ng từng nắm giữ.</p>\r\n\r\n<p>Năm 1995, 15 năm sau khi về hưu, Nelson được Tổng thống Bill Clinton trao tặng Hu&acirc;n chương Tự do cho những nỗ lực của &ocirc;ng trong c&ocirc;ng t&aacute;c m&ocirc;i trường. &Ocirc;ng qua đời ng&agrave;y 3/7/2005.</p>\r\n\r\n<p>Năm 2009, Ng&agrave;y Tr&aacute;i đất đ&atilde; được&nbsp;Li&ecirc;n Hợp Quốc&nbsp;c&ocirc;ng nhận.&nbsp;</p>\r\n\r\n<p>*<strong>&nbsp;&Yacute; nghĩa của Ng&agrave;y Tr&aacute;i đất</strong></p>\r\n\r\n<p>Ng&agrave;y Tr&aacute;i đất l&agrave; ng&agrave;y vận động to&agrave;n d&acirc;n n&acirc;ng cao nhận thức v&agrave; h&agrave;nh động nhằm bảo vệ gi&aacute; trị của m&ocirc;i trường tự nhi&ecirc;n to&agrave;n cầu.</p>\r\n\r\n<p><img alt=\"\" src=\"http://tnmttuyenquang.gov.vn/media/images/lich-su-va-y-nghia-cua-ngay-trai-dat.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>Trong Ng&agrave;y Tr&aacute;i đất, mọi người thường tổ chức c&aacute;c hoạt động nhằm mục đ&iacute;ch bảo vệ m&ocirc;i trường như tuy&ecirc;n truyền k&ecirc;u gọi mọi người chung sức bảo vệ m&ocirc;i trường sống, tổ chức trồng c&acirc;y xanh, thu gom r&aacute;c thải, bảo vệ m&ocirc;i trường sống xanh sạch đẹp.</p>', '19:00:00', '2022-04-22', 'Khắp nơi trên thế giới', 1, '2021-11-03', 1, 'world-day.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_activities`
--

CREATE TABLE `event_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `eventId` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 là tham gia - 1 là thoát',
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_activities`
--

INSERT INTO `event_activities` (`id`, `userId`, `eventId`, `status`, `time`, `date`) VALUES
(1, 25, 1, 0, '08:11:35', '2021-11-03'),
(2, 25, 1, 1, '08:11:39', '2021-11-03'),
(3, 25, 1, 0, '08:11:03', '2021-11-03'),
(4, 25, 1, 1, '08:11:06', '2021-11-03'),
(5, 25, 1, 0, '08:11:09', '2021-11-03'),
(6, 4, 1, 0, '08:11:26', '2021-11-03'),
(7, 4, 1, 1, '08:11:30', '2021-11-03'),
(8, 4, 1, 0, '08:11:33', '2021-11-03'),
(9, 4, 1, 1, '08:11:35', '2021-11-03'),
(10, 4, 1, 0, '08:11:38', '2021-11-03'),
(11, 4, 4, 0, '08:11:47', '2021-11-03'),
(12, 4, 3, 0, '08:11:55', '2021-11-03'),
(13, 4, 2, 0, '08:11:04', '2021-11-03'),
(14, 6, 4, 0, '08:40:17', '2021-11-03'),
(15, 46, 1, 0, '14:33:42', '2021-11-03'),
(16, 46, 1, 1, '14:11:45', '2021-11-03'),
(17, 46, 3, 0, '14:33:53', '2021-11-03'),
(18, 46, 1, 0, '14:34:00', '2021-11-03'),
(19, 46, 5, 0, '19:22:49', '2021-11-03'),
(20, 46, 4, 0, '19:23:04', '2021-11-03'),
(22, 46, 1, 1, '11:11:13', '2021-11-04'),
(23, 46, 1, 0, '11:23:34', '2021-11-04'),
(24, 46, 2, 0, '11:23:45', '2021-11-04'),
(25, 46, 2, 1, '11:11:49', '2021-11-04'),
(26, 46, 2, 0, '11:23:54', '2021-11-04'),
(27, 47, 1, 0, '14:08:24', '2021-11-04'),
(28, 47, 1, 1, '14:11:29', '2021-11-04'),
(29, 47, 1, 0, '14:08:33', '2021-11-04'),
(30, 46, 1, 1, '14:11:11', '2021-11-04'),
(31, 46, 1, 0, '14:16:22', '2021-11-04'),
(32, 46, 1, 1, '14:11:31', '2021-11-04'),
(33, 46, 1, 0, '14:16:36', '2021-11-04'),
(34, 46, 1, 1, '12:11:10', '2021-11-05'),
(35, 46, 1, 0, '12:44:16', '2021-11-05'),
(36, 46, 1, 1, '13:11:21', '2021-11-05'),
(37, 46, 1, 0, '13:20:23', '2021-11-05'),
(38, 46, 1, 1, '14:11:30', '2021-11-05'),
(39, 46, 1, 0, '14:03:35', '2021-11-05'),
(40, 15, 1, 0, '14:06:11', '2021-11-05'),
(41, 15, 2, 0, '14:06:19', '2021-11-05'),
(42, 15, 4, 0, '14:06:29', '2021-11-05'),
(47, 46, 1, 1, '19:11:48', '2021-11-05'),
(48, 46, 1, 0, '19:27:54', '2021-11-05'),
(49, 46, 3, 1, '14:11:44', '2021-11-06'),
(50, 46, 3, 0, '14:02:51', '2021-11-06'),
(51, 46, 5, 1, '14:11:42', '2021-11-06'),
(52, 46, 5, 0, '14:07:09', '2021-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `createrId` int(10) UNSIGNED NOT NULL,
  `dateUpload` date NOT NULL,
  `imageSource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `createrId`, `dateUpload`, `imageSource`, `status`) VALUES
(1, 1, '2021-10-31', 'slider-tieng-on.jpg', 1),
(2, 1, '2021-10-31', 'slider-anh-sang.jpg', 1),
(3, 1, '2021-10-31', 'slider-nguon-nuoc.jpg', 1),
(4, 1, '2021-10-31', 'cause-4.jpg', 1),
(5, 1, '2021-10-31', 'cause-1.jpg', 1),
(6, 1, '2021-10-31', 'bao-dom.jpg', 1),
(7, 1, '2021-10-31', 'recycling.jpg', 1),
(8, 1, '2021-10-31', 'haze-event.jpg', 1),
(9, 3, '2021-10-31', 'bien.jpg', 1),
(12, 1, '2021-11-03', 'environment-pollution.jpg', 1),
(13, 1, '2021-11-03', 'wildlife-animals.jpg', 1),
(14, 1, '2021-11-03', 'world-day.jpg', 1),
(19, 46, '2021-11-05', 'o-nhiem-phong-xa.jpg', 0),
(20, 15, '2021-11-05', 'pexels-roberto-nickson-2478248.jpg', 1),
(21, 15, '2021-11-05', 'nguyen-nhan-dong-vat-hoang-da.jpg', 0),
(22, 1, '2021-11-05', 'o-nhiem-phong-xa.jpg', 1),
(24, 46, '2021-11-05', 'wildlife-animals.jpg', 0),
(25, 46, '2021-11-05', 'o-nhiem-phong-xa.jpg', 0),
(26, 46, '2021-11-06', 'jean-old.jpg', 1),
(28, 1, '2021-11-06', 'slider-o-nhiem-dat.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fullname`, `email`, `message`) VALUES
(1, 'Toan Khanh Nguyen', 'nktoan.20it1@vku.udn.vn', 'Hello Admin'),
(2, 'Tony Nguyen', 'nktoan@gmail.com', 'Tony nek'),
(3, 'Nguyen Khanh Toan', 'nktoantest@gmail.com', 'Website này ok mà máy tôi lag quá ạ :))))'),
(4, 'Toan Khanh Nguyen', 'cxv89466@zwoho.com', 'Chào bạn, tui thích website này'),
(7, 'Toan Nguyenn', 'cxv89466@zwoho.com', '123'),
(8, 'Toan Nguyenn', 'cxv89466@zwoho.com', 'Hello adminnnnn'),
(9, 'Toan Nguyenn', 'cxv89466@zwoho.com', 'Website này ok đấy :))))');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_10_26_064555_create_sliders_table', 1),
(4, '2021_10_26_090816_create_roles_table', 1),
(5, '2021_10_27_075502_create_images_table', 1),
(6, '2021_10_27_085832_create_events_table', 1),
(7, '2021_10_27_115041_create_blogs_table', 1),
(8, '2021_10_28_102234_create_projects_table', 1),
(9, '2021_10_31_132240_create_regis_notifications_table', 2),
(10, '2021_10_31_141002_create_messages_table', 3),
(13, '2021_11_01_054105_create_event_activities_table', 4),
(26, '2021_11_03_055407_create_garbage_blogs_table', 5),
(27, '2021_11_05_063620_create_activities_table', 6),
(28, '2021_11_06_075730_create_social_table', 7),
(30, '2021_11_07_021713_create_comments_table', 8),
(31, '2021_11_08_055719_alter_users_table', 9),
(32, '2021_11_09_023940_create_donation_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `creater` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` double NOT NULL,
  `now` double NOT NULL DEFAULT 0,
  `noMembers` int(11) NOT NULL DEFAULT 0,
  `imageSource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateCreate` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `creater`, `name`, `introduction`, `description`, `content`, `goal`, `now`, `noMembers`, `imageSource`, `dateCreate`, `status`) VALUES
(1, 1, 'Hưởng ứng trồng cây gây rừng', 'Thực hiện lời dạy của Bác, phong trào trồng cây, trồng rừng đã được các cấp ủy Đảng, chính quyền và nhân dân cả nước nói chung, tỉnh Phú Thọ nói riêng tích cực tham gia hưởng ứng.', 'Thời gian qua, tỉnh Phú Thọ luôn xác định trồng cây gây rừng là việc làm quan trọng trong quá trình phát triển kinh tế - xã hội, bảo vệ môi trường, ứng phó với biến đổi khí hậu.', '<p><strong>T&iacute;ch cực tham gia hưởng ứng trồng c&acirc;y g&acirc;y rừng</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>PhuthoPortal - M&ugrave;a xu&acirc;n năm 1960, Tết trồng c&acirc;y đầu ti&ecirc;n được Chủ tịch Hồ Ch&iacute; Minh ph&aacute;t động. 57 năm tr&ocirc;i qua, thực hiện lời dạy của B&aacute;c, phong tr&agrave;o trồng c&acirc;y, trồng rừng đ&atilde; được c&aacute;c cấp ủy Đảng, ch&iacute;nh quyền v&agrave; nh&acirc;n d&acirc;n cả nước n&oacute;i chung, tỉnh Ph&uacute; Thọ n&oacute;i ri&ecirc;ng t&iacute;ch cực tham gia hưởng ứng. Từ đ&oacute;, độ che phủ rừng ng&agrave;y c&agrave;ng tăng đ&atilde; đem lại những lợi &iacute;ch thiết thực về kinh tế - x&atilde; hội v&agrave; m&ocirc;i trường.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thời gian qua, tỉnh Ph&uacute; Thọ lu&ocirc;n x&aacute;c định trồng c&acirc;y g&acirc;y rừng l&agrave; việc l&agrave;m quan trọng trong qu&aacute; tr&igrave;nh ph&aacute;t triển kinh tế - x&atilde; hội, bảo vệ m&ocirc;i trường, ứng ph&oacute; với biến đổi kh&iacute; hậu. Đồng thời l&agrave; một trong những nhiệm vụ trọng t&acirc;m để l&agrave;m gi&agrave;u th&ecirc;m c&aacute;c diện t&iacute;ch rừng hiện nay tr&ecirc;n địa b&agrave;n tỉnh, nhất l&agrave; trong điều kiện kh&iacute; hậu đang diễn biến ng&agrave;y một phức tạp, cực đoan, ảnh hưởng đến đời sống sinh hoạt, sản xuất của người d&acirc;n v&agrave; l&agrave; hướng giảm ngh&egrave;o cho b&agrave; con n&ocirc;ng d&acirc;n.</p>\r\n\r\n<p>Tr&ecirc;n tinh thần đ&oacute;, Ph&uacute; Thọ đ&atilde; tập trung chỉ đạo, ho&agrave;n th&agrave;nh c&aacute;c chỉ ti&ecirc;u về trồng, quản l&yacute;, bảo vệ rừng. Trong đ&oacute;, tập trung chỉ đạo ph&aacute;t triển kinh tế đồi rừng theo hướng đa chức năng, trọng t&acirc;m l&agrave; ph&aacute;t triển c&acirc;y gỗ lớn, c&acirc;y dược liệu v&agrave; c&acirc;y ăn quả đặc sản dưới t&aacute;n rừng. HĐND tỉnh đ&atilde; ban h&agrave;nh Nghị quyết số 05/2019/NQ-HĐND về ch&iacute;nh s&aacute;ch hỗ trợ, khuyến kh&iacute;ch ph&aacute;t triển n&ocirc;ng nghiệp, n&ocirc;ng th&ocirc;n tr&ecirc;n địa b&agrave;n, trong đ&oacute;, khuyến kh&iacute;ch c&aacute;c địa phương, đơn vị đẩy mạnh trồng rừng th&acirc;m canh, rừng c&acirc;y gỗ lớn. Chỉ t&iacute;nh ri&ecirc;ng năm 2020, từ nguồn ng&acirc;n s&aacute;ch, tỉnh đ&atilde; hỗ trợ 600ha chuyển h&oacute;a rừng gỗ lớn, &nbsp;8.500ha rừng được cấp chứng chỉ rừng bền vững.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, hằng năm, tỉnh x&acirc;y dựng kế hoạch v&agrave; ph&aacute;t động Tết trồng c&acirc;y v&agrave;o dịp đầu năm nhằm vận động, khuyến kh&iacute;ch c&aacute;c đơn vị, địa phương v&agrave; nh&acirc;n d&acirc;n tr&ecirc;n địa b&agrave;n tham gia t&iacute;ch cực v&agrave;o việc trồng c&acirc;y xanh. Những năm gần đ&acirc;y, việc x&atilde; hội h&oacute;a trồng c&acirc;y xanh c&oacute; sức lan tỏa ng&agrave;y c&agrave;ng s&acirc;u rộng. C&aacute;c cơ quan, đơn vị, địa phương đ&atilde; chủ động mua c&acirc;y xanh v&agrave; tổ chức thực hiện Tết trồng c&acirc;y đảm bảo thiết thực, tiết kiệm, hiệu quả.</p>\r\n\r\n<p><img alt=\"\" src=\"https://phutho.gov.vn/sites/default/files/users/user200/tr1.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>Hiện nay, tỷ lệ độ che phủ rừng tr&ecirc;n to&agrave;n tỉnh đạt 39,7%. Trong đ&oacute;, rừng đặc dụng 17.304ha; rừng ph&ograve;ng hộ 33.474,3ha; rừng sản xuất 29.300ha. T&iacute;nh ri&ecirc;ng năm 2020, diện t&iacute;ch trồng rừng tập trung đạt 9.800ha, trong đ&oacute; trồng rừng ph&ograve;ng hộ, đặc dụng 70,5ha; trồng rừng gỗ lớn 3.053ha. Nhiều địa phương c&oacute; diện t&iacute;ch rừng lớn đ&atilde; t&iacute;ch cực tham gia trồng c&acirc;y g&acirc;y rừng như: T&acirc;n Sơn, Y&ecirc;n Lập, Đoan H&ugrave;ng, Cẩm Kh&ecirc;&hellip;</p>\r\n\r\n<p>B&agrave; Trần Thị Thu Hưởng - Trưởng ph&ograve;ng N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n huyện Cẩm Kh&ecirc; cho biết: Năm 2021, to&agrave;n huyện sẽ trồng 50.000 c&acirc;y ph&acirc;n t&aacute;n; 20ha rừng tập trung. Để đảm bảo việc trồng c&acirc;y, trồng rừng đ&uacute;ng kế hoạch, ph&ograve;ng đ&atilde; tham mưu UBND huyện chỉ đạo c&aacute;c đơn vị, địa phương tổ chức r&agrave; so&aacute;t hiện trạng quỹ đất l&acirc;m nghiệp tr&ecirc;n địa b&agrave;n v&agrave; tr&ecirc;n cơ sở chỉ ti&ecirc;u kế hoạch về trồng c&acirc;y, trồng rừng ph&acirc;n bổ chỉ ti&ecirc;u cho c&aacute;c x&atilde;, thị trấn khẩn trương thực hiện c&aacute;c bước khảo s&aacute;t, thiết kế, lập dự to&aacute;n, xử l&yacute; thực b&igrave;, cuốc hố, chuẩn bị đầy đủ về c&acirc;y giống, vật tư ph&acirc;n b&oacute;n, nh&acirc;n lực... B&ecirc;n cạnh đ&oacute;, tổ chức tập huấn, hướng dẫn kỹ thuật trồng, tranh thủ thời vụ v&agrave; thời tiết thuận lợi để trồng c&acirc;y, trồng rừng, &aacute;p dụng c&aacute;c biện ph&aacute;p th&acirc;m canh rừng; hướng dẫn b&oacute;n l&oacute;t v&agrave; b&oacute;n th&uacute;c ph&acirc;n đầy đủ, trồng dặm để đảm bảo mật độ, chăm s&oacute;c đủ lần, đủ lượt.</p>\r\n\r\n<p><img alt=\"\" src=\"https://phutho.gov.vn/sites/default/files/users/user200/tr2.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>&Ocirc;ng Trần T&uacute; Anh - Ph&oacute; Gi&aacute;m đốc Sở N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n cho biết: Năm 2021, to&agrave;n tỉnh phấn đấu trồng rừng tập trung đạt 9.100ha; chuyển h&oacute;a rừng gỗ lớn 600ha; trồng c&acirc;y ph&acirc;n t&aacute;n 1 triệu c&acirc;y. Để đạt được mục ti&ecirc;u n&agrave;y, b&ecirc;n cạnh việc lựa chọn những c&acirc;y trồng ph&ugrave; hợp, c&oacute; gi&aacute; trị thay thế những giống cũ sẽ mang lại hiệu quả kinh tế cao, h&igrave;nh th&agrave;nh c&aacute;c v&ugrave;ng trồng c&acirc;y h&agrave;ng h&oacute;a theo chiến lược ph&aacute;t triển kinh tế - x&atilde; hội của tỉnh. C&aacute;c đơn vị, địa phương &nbsp;cần l&agrave;m tốt việc tổ chức Tết trồng c&acirc;y hằng năm; tăng cường c&aacute;c biện ph&aacute;p ph&ograve;ng ch&aacute;y, chữa ch&aacute;y rừng, chống chặt ph&aacute;, khai th&aacute;c rừng tr&aacute;i ph&eacute;p.</p>\r\n\r\n<p>Theo kế hoạch, Tết trồng c&acirc;y năm 2021 bắt đầu từ ng&agrave;y 17/2/2021 (tức m&ugrave;ng 6 th&aacute;ng Gi&ecirc;ng năm T&acirc;n Sửu 2021) đến ng&agrave;y 17/3, to&agrave;n tỉnh trồng&nbsp;623.000&nbsp;c&acirc;y ph&acirc;n t&aacute;n, 632ha rừng tập trung. Lễ ph&aacute;t động &ldquo;Tết trồng c&acirc;y đời đời nhớ ơn B&aacute;c Hồ&rdquo; cấp tỉnh được tổ chức tại C&ocirc;ng vi&ecirc;n Văn Lang, th&agrave;nh phố Việt Tr&igrave; ng&agrave;y 17/2/2021.</p>\r\n\r\n<p>Để phong tr&agrave;o trồng c&acirc;y, trồng rừng tiếp tục lan tỏa, đem lại hiệu quả thiết thực th&igrave; trồng c&acirc;y phải gắn với tr&aacute;ch nhiệm quản l&yacute;, bảo vệ nhằm đảm bảo tỷ lệ c&acirc;y sống cao. Đồng thời cần tuy&ecirc;n dương kịp thời c&aacute;c đơn vị, c&aacute; nh&acirc;n điển h&igrave;nh l&agrave;m tốt c&ocirc;ng t&aacute;c trồng, chăm s&oacute;c v&agrave; bảo vệ c&acirc;y xanh.</p>', 500000000, 230000000, 0, 'rung-xanh-phu-tho.jpg', '2021-10-31', 1),
(2, 1, '1.000 bạn trẻ dọn rác, trồng cây ở biển Khánh Hòa', 'TTO - Chiều 26-10, gần 1.000 bạn trẻ là đại biểu trên hành trình ‘Tôi yêu Tổ quốc tôi’ cùng các đoàn viên thanh niên đã chung tay dọn sạch bãi biển tại huyện Vạn Ninh, tỉnh Khánh Hòa.', 'Trong hai ngày 26 và 27-10, hành trình ‘Tôi yêu Tổ quốc tôi’ đưa các đại biểu, thanh niên tiêu biểu đến tỉnh Khánh Hòa.', '<p>C&aacute;c đại biểu thanh ni&ecirc;n đ&atilde; c&ugrave;ng tham quan đ&igrave;nh Ph&uacute; Cang, một di t&iacute;ch lịch sử - văn h&oacute;a cấp quốc gia thuộc x&atilde; Vạn Ph&uacute;, huyện Vạn Ninh, d&acirc;ng hương v&agrave; nghe giới thiệu về lịch sử của đ&igrave;nh Ph&uacute; Cang.</p>\r\n\r\n<p>Gần 1.000 bạn trẻ đ&atilde; xắn tay dọn dẹp vệ sinh b&atilde;i biển tại huyện Vạn Ninh, tỉnh Kh&aacute;nh H&ograve;a v&agrave; trồng c&acirc;y xanh tại đ&igrave;nh Ph&uacute; Cang. Ai nấy đều h&agrave;o hứng g&oacute;p một phần sức của m&igrave;nh chung tay l&agrave;m sạch m&ocirc;i trường biển.</p>\r\n\r\n<p>C&ograve;n bạn L&ecirc; Phạm Thụy Duy&ecirc;n (31 tuổi, đại biểu tỉnh Tiển Giang) cho biết: đ&acirc;y l&agrave; lần đầu ti&ecirc;n Duy&ecirc;n tham gia h&agrave;nh tr&igrave;nh &yacute; nghĩa do Trung ương Hội LHTN Việt Nam tổ chức.</p>\r\n\r\n<p>Duy&ecirc;n chia sẻ: &quot;Được đến tham quan tận mắt v&agrave; nghe ch&iacute;nh những l&atilde;o th&agrave;nh nơi đ&acirc;y kể về di t&iacute;ch lịch sử văn h&oacute;a đ&igrave;nh Ph&uacute; Cang, t&ocirc;i thật sự x&uacute;c động v&agrave; thấy tự h&agrave;o khi được l&agrave; một trong những đại biểu tham gia h&agrave;nh tr&igrave;nh, biết th&ecirc;m về một di t&iacute;ch lịch sử - văn h&oacute;a đặc biệt của đất nước&quot;.</p>\r\n\r\n<p>Duy&ecirc;n cho biết sau h&agrave;nh tr&igrave;nh, bạn sẽ đăng tải những h&igrave;nh ảnh về hoạt động &yacute; nghĩa tại những miền đất mới của Tổ quốc l&ecirc;n c&aacute;c trang mạng của đơn vị, tuy&ecirc;n truyền c&aacute;c bạn trẻ chung tay bảo vệ m&ocirc;i trường ở địa phương nơi m&igrave;nh ở.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn.tuoitre.vn/thumb_w/586/2019/10/26/img3094-15720932549971726915514.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>Theo c&aacute;c đại biểu tr&ecirc;n h&agrave;nh tr&igrave;nh, quan trọng nhất kh&ocirc;ng phải l&agrave; khối lượng r&aacute;c được c&aacute;c bạn thu gom m&agrave; qua những hoạt động n&agrave;y, tuy&ecirc;n truyền cho người d&acirc;n v&agrave; du kh&aacute;ch &yacute; thức hơn trong việc bảo vệ m&ocirc;i trường.</p>\r\n\r\n<p>Nhiều người d&acirc;n địa phương chứng kiến đ&atilde; khen ngợi hoạt động của c&aacute;c bạn trẻ. B&agrave; Nguyễn Thị Vương (53 tuổi, th&ocirc;n Ph&uacute; Cang 2 Nam, x&atilde; Vạn Ph&uacute;, huyện Vạn Ninh, tỉnh Kh&aacute;nh H&ograve;a) cho biết: &quot;L&agrave;m nghề bắt chip ch&iacute;p ở b&atilde;i biển n&agrave;y nhiều năm, thấy r&aacute;c người d&acirc;n thiếu &yacute; thức tấp ra b&atilde;i biển ng&agrave;y một nhiều, tr&ocirc;i hết ra biển. C&aacute;c bạn thanh ni&ecirc;n dọn dẹp vệ sinh ở đ&acirc;y l&agrave; rất &yacute; nghĩa&quot;.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn.tuoitre.vn/thumb_w/586/2019/10/26/img3103-15720933173121849560826-15720965067821840259176.png\" style=\"width:100%\" /></p>\r\n\r\n<p>Tại Kh&aacute;nh H&ograve;a, Trung ương Hội LHTN Việt Nam c&ugrave;ng Tỉnh đo&agrave;n Kh&aacute;nh H&ograve;a cũng tổ chức chương tr&igrave;nh du ca cộng đồng, giao lưu với 1.000 thanh ni&ecirc;n địa phương chủ đề &quot;Tổ quốc nh&igrave;n từ biển&quot; với c&aacute;c tiết mục giao lưu văn nghệ, d&acirc;n vũ v&agrave; nhảy flashmod trong tối 26-10.</p>\r\n\r\n<p>S&aacute;ng 27-10, đo&agrave;n sẽ thăm khu tưởng niệm chiến sĩ Gạc Ma, tỉnh Kh&aacute;nh H&ograve;a - một &quot;địa chỉ đỏ&quot; gi&aacute;o dục chủ quyền biển đảo cho thế hệ trẻ.</p>', 100000000, 70000000, 0, 'bien-khanh-hoa.jpg', '2021-10-31', 1),
(3, 1, 'Hội nghị ASEAN về môi trường', 'Bộ Tài nguyên và Môi trường sẽ tổ chức Hội nghị Nhóm công tác ASEAN về môi trường biển và đới bờ lần thứ 21.', 'Hội nghị các quan chức cao cấp ASEAN về môi trường lần thứ 31 và các Hội nghị khác có liên quan tại TP. Đà Nẵng.', '<p>Theo hướng dẫn tổ chức c&aacute;c Hội nghị Bộ trưởng v&agrave; Hội nghị quan chức cao cấp (SOM) chuy&ecirc;n ng&agrave;nh trong năm Chủ tịch ASEAN 2020 của Ban thư k&yacute; ASEAN 2020, Bộ T&agrave;i nguy&ecirc;n v&agrave; M&ocirc;i trường được giao chủ tr&igrave; tổ chức c&aacute;c sự kiện trong lĩnh vực t&agrave;i nguy&ecirc;n v&agrave; m&ocirc;i trường, trong đ&oacute; bao gồm tổ chức Hội nghị Nh&oacute;m c&ocirc;ng t&aacute;c ASEAN về m&ocirc;i trường biển v&agrave; đới bờ lần thứ 21(AWGCME 21);&nbsp;<a href=\"https://baotainguyenmoitruong.vn/Hoi-nghi-cac-quan-chuc-cao-cap-ASEAN-ve-moi-truong-ptag.html\">Hội nghị c&aacute;c quan chức cao cấp ASEAN về m&ocirc;i trường</a>&nbsp;lần thứ 31 (ASOEN 31) v&agrave; c&aacute;c Hội nghị kh&aacute;c c&oacute; li&ecirc;n quan.</p>\r\n\r\n<p>Theo đ&oacute;, Bộ T&agrave;i nguy&ecirc;n v&agrave; M&ocirc;i trường đ&atilde; giao Tổng cục M&ocirc;i trường - đơn vị đầu mối c&aacute;c hoạt động hợp t&aacute;c ASEAN về m&ocirc;i trường, chủ tr&igrave;, phối hợp với c&aacute;c cơ quan c&oacute; li&ecirc;n quan chuẩn bị tổ chức c&aacute;c Hội nghị n&agrave;y.</p>\r\n\r\n<p>Cụ thể, Hội nghị AWGCME lần thứ 21 dự kiến từ ng&agrave;y 13 &ndash; 15/5/2020 tại TP. Đ&agrave; Nẵng. Hội nghị quan chức cao cấp ASEAN về m&ocirc;i trường lần thứ 31 v&agrave; c&aacute;c Hội nghị kh&aacute;c c&oacute; li&ecirc;n quan dự kiến từ ng&agrave;y 16 &ndash; 22/8/2020 tại TP. Đ&agrave; Nẵng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://btnmt.1cdn.vn/2020/02/28/da-nang.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p>Bộ T&agrave;i nguy&ecirc;n v&agrave; M&ocirc;i trường v&agrave; Ban thư k&yacute; ASEAN quyết định lựa chọn th&agrave;nh phố Đ&agrave; Nẵng l&agrave; địa điểm tổ chức c&aacute;c Hội nghị v&igrave; đ&acirc;y sẽ l&agrave; dịp để Việt Nam giới thiệu v&agrave; quảng b&aacute; về văn h&oacute;a v&agrave; h&igrave;nh ảnh đất nước, con người từ nhiều v&ugrave;ng, miền kh&aacute;c nhau của đất nước. Th&agrave;nh phố Đ&agrave; Nẵng nhận được nhiều thiện cảm v&agrave; ghi dấu ấn trong mắt bạn b&egrave; quốc tế th&ocirc;ng qua việc được lựa chọn l&agrave; địa điểm tổ chức th&agrave;nh c&ocirc;ng nhiều Hội nghị quốc tế lớn v&agrave; quan trọng.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, Đ&agrave; Nẵng l&agrave; th&agrave;nh phố thứ 2 ở Việt Nam nhận được giải thưởng Th&agrave;nh phố bền vững về m&ocirc;i trường ASEAN năm 2011 v&agrave; l&agrave; một trong ba th&agrave;nh phố ở Việt Nam tham gia v&agrave;o mạng lưới c&aacute;c Th&agrave;nh phố th&ocirc;ng minh của ASEAN năm 2018.</p>', 1000000000, 907000000, 0, 'hoi-nghi-asean.jpg', '2021-10-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `regis_notifications`
--

CREATE TABLE `regis_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regis_notifications`
--

INSERT INTO `regis_notifications` (`id`, `email`) VALUES
(1, 'nktoan63.it@gmail.com'),
(2, 'nktoan.20it1@vku.udn.vn'),
(3, 'ntnquynh.20it1@vku.udn.vn'),
(4, 'lqviet.20it1@vku.udn.vn'),
(5, 'nktoantest@gmail.com'),
(6, 'nktoanwork@gmail.com'),
(7, 'nhuquynh20022407@gmail.com'),
(8, 'toannguyenvkuni@gmail.com'),
(9, 'Vietnguyen@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `searchInfo` int(11) NOT NULL DEFAULT 0,
  `viewMess` int(11) NOT NULL DEFAULT 0,
  `sendMail` int(11) NOT NULL DEFAULT 0,
  `addSlider` int(11) NOT NULL DEFAULT 0,
  `manageSlider` int(11) NOT NULL DEFAULT 0,
  `browseSlider` int(11) NOT NULL DEFAULT 0,
  `addImage` int(11) NOT NULL DEFAULT 0,
  `manageImage` int(11) NOT NULL DEFAULT 0,
  `browseImage` int(11) NOT NULL DEFAULT 0,
  `addEvent` int(11) NOT NULL DEFAULT 0,
  `manageEvent` int(11) NOT NULL DEFAULT 0,
  `browseEvent` int(11) NOT NULL DEFAULT 0,
  `addBlog` int(11) NOT NULL DEFAULT 0,
  `manageBlog` int(11) NOT NULL DEFAULT 0,
  `browseBlog` int(11) NOT NULL DEFAULT 0,
  `addProject` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `searchInfo`, `viewMess`, `sendMail`, `addSlider`, `manageSlider`, `browseSlider`, `addImage`, `manageImage`, `browseImage`, `addEvent`, `manageEvent`, `browseEvent`, `addBlog`, `manageBlog`, `browseBlog`, `addProject`) VALUES
(1, 'System User', 2, 2, 2, 1, 0, 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageSource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `imageSource`, `status`) VALUES
(1, 'Nguyên nhân gây ô nhiễm môi trường nước', 'Rác thải y tế; Thiên tai; Sản xuất nông nghiệp; Bùng nổ dân số; Hoạt động công nghiệp; Rác thải sinh hoạt; Quá trình đô thị hóa.', 'slider-nguon-nuoc.jpg', 1),
(2, 'Nguyên nhân gây ô nhiễm môi trường đất', 'Đất nhiễm phèn; Đất nhiễm mặn; Tro than - xỉ than; Thuốc trừ sâu - diệt cỏ; Các ngành công nghiệp; Rác thải sinh hoạt của người dân.', 'slider-o-nhiem-dat.jpg', 1),
(3, 'Nguyên nhân gây ô nhiễm không khí', 'Bụi, gió; Núi lửa phun trào; Bão, lốc xoáy; Giao mùa; Cháy rừng; Hoạt động công - nông nghiệp; Giao thông vận tải, xây dưng cơ sở hạ tầng.', 'slider-khong-khi.jpg', 1),
(4, 'Nguyên nhân ô nhiễm ánh sáng', 'Phát sinh trong quá trình sinh hoạt, hoạt động kinh tế của con người. Ví dụ: Lạm dụng, sử dụng không đúng hoặc quá mức ánh sáng nhân tạo', 'slider-anh-sang.jpg', 1),
(6, 'Nguyên nhân gây ô nhiễm phóng xạ', 'Tự nhiên: Động đất, núi lửa phun trào làm chất phóng xạ nhiễm ra bên ngoài; Nhân tạo: Công nghiệp khai khoáng, phản ứng hạt nhân.', 'o-nhiem-phong-xa.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifyCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatarDefault.jpeg',
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `dateCreated` date NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `password`, `phone`, `address`, `sex`, `verifyCode`, `avatar`, `utype`, `dateCreated`, `token`) VALUES
(1, 'nktoanwork@gmail.com', 'Khánh Toàn', '9b314a3f79d1c556b1d78d0510647df0', '0868319857', '18 Le thien Tri', 'Nam', NULL, 'UIMG2021110512202361852187444c9.jpg', 'Admin', '2021-10-25', ''),
(2, 'khanhtoan@su.sop.vn', 'Khánh Toàn', '9b314a3f79d1c556b1d78d0510647df0', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'System User', '2021-10-31', ''),
(3, 'nktoan@gmail.com', 'Toan Khanh Nguyen', '9b314a3f79d1c556b1d78d0510647df0', '0868319857', '18 Le Thien Tri', 'Nam', NULL, 'UIMG2021110407142661838852b53b1.jpg', 'User', '2021-10-31', ''),
(4, 'nhuquynh@gmail.com', 'Nhu Quynh', '7528b90ae7f2d7d025c82ff94e5eb299', NULL, NULL, NULL, NULL, 'UIMG20211112015859618dca63315c4.jpg', 'User', '2021-10-31', ''),
(5, 'nhuquynh@su.sop.vn', 'Như Quỳnh', '7528b90ae7f2d7d025c82ff94e5eb299', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'System User', '2021-11-01', ''),
(6, 'lukas96@hotmail.se', 'Lukas', '5ffbebd2077f20d99ef765864156691e', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-01', ''),
(7, 'leviet@su.sop.vn', 'Quốc Việt', '98b3b7cd0430fbec6272a126c5188c1e', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'System User', '2021-11-01', ''),
(8, 'Kimanh124@gmail.com', 'Nguyễn Thị Kim Anh', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-01', ''),
(9, 'Tranthao@gmail.com', 'Trần Thị Thu Thảo', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(10, 'Baotran@gmail.com', 'Trần Văn Bảo', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(11, 'Tuannguyen@gmail.com', 'Nguyễn Văn Tuấn', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(12, 'Linhthuy@gmail.com', 'Võ Thị Thùy Linh', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(13, 'Hau123@gmail.com', 'Võ Trung Hậu', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(14, 'Thaimanh247@gmail.com', 'Thái Văn Mạnh', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(15, 'Nhuhoai@gmail.com', 'Như Hoài', 'a574c15b02f86c8ca6b81af022e63287', '0123456789', 'Vinh Linh', 'Nữ', NULL, 'UIMG202111050711556184d93b79f86.jpg', 'User', '2021-11-02', ''),
(16, 'Dini146@gmail.com', 'Dương Hàn Di Ni', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(17, 'Trongtan@gmail.com', 'Dương Trọng Tấn', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(18, 'Hoainguyen@gmail.com', 'Nguyễn Thị Thu Hoài', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(19, 'Changg178@gmail.com', 'Lê Thị Quỳnh Trang', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(20, 'Hanguyen356@gmail.com', 'Nguyễn Thị Mỹ Hạ', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(21, 'Thanhhuyen312@gmail.com', 'Nguyễn Thị Thanh Huyền', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(22, 'Vietnguyen@gmail.com', 'Võ Viết Nguyên', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(23, 'Tiendung@gmail.com', 'Nguyễn Tiến Dũng', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(24, 'Tainguyen236@gmail.com', 'Nguyễn Phi Tài', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(25, 'Annguyen432@gmail.com', 'Nguyễn Văn An', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(26, 'Vietdinh234@gmail.com', 'Trần Viết Đình', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-02', ''),
(27, 'usv31220@boofx.com', 'Trần Văn Minh', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(28, 'vfw17470@cuoly.com', 'Võ Mai Thư', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(29, 'rgk82218@cuoly.com', 'Trần Mỹ Linh', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(30, 'ccs82051@zwoho.com', 'Nguyễn Hương', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(31, 'dmz07142@zwoho.com', 'Võ Minh Phúc', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(32, 'xde15277@zwoho.com', 'Đặng Bá Ty', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(33, 'mjf99978@zwoho.com', 'Nguyễn Thành Công', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(34, 'fbt40547@boofx.com', 'Nguyễn Bá Chung', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(35, 'qic79117@cuoly.com', 'Đào Lê Phương Hoa', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(36, 'ais85150@zwoho.com', 'Trần Nguyễn Anh Tuấn', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(37, 'zvi13744@cuoly.com', 'Lê Văn Vũ', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(38, 'eog32433@cuoly.com', 'Đặng Hoàng Châu', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(39, 'bqm65401@boofx.com', 'Võ Thu Mai', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(40, 'roa04012@boofx.com', 'Huỳnh Thanh Thư', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(41, 'sot79339@cuoly.com', 'Lê Công Vinh', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(42, 'aan56453@cuoly.com', 'Phan Thị Bích Thuận', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(43, 'ale83371@boofx.com', 'Võ Thu Trang', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(44, 'ema39190@zwoho.com', 'Đinh Thị Thư', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(45, 'yro32917@zwoho.com', 'Phạm Anh Nam', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-03', ''),
(46, 'cxv89466@zwoho.com', 'Toàn Nguyễn', '9b314a3f79d1c556b1d78d0510647df0', '0868319857', '17 Phan Huy Chu', 'Nam', NULL, 'UIMG2021110607053961862943960bf.jpg', 'User', '2021-11-03', 'FHCKUA'),
(47, 'nktoantest@gmail.com', 'Nguyen Khanh Toan', '70e4960018937470b91d5eec302f68f1', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-04', ''),
(48, 'tonynguyen@gmail.com', 'Tony Nguyen', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-05', ''),
(49, 'accounttest@gmail.com', 'Nguyen Khanh Toan', '70e4960018937470b91d5eec302f68f1', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-05', ''),
(50, 'cxv89496@zwoho.com', 'Tony Nguyen', 'd166d92d531966f8b60988762835d0c8', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-06', ''),
(51, 'nktoan63.it@gmail.com', 'Toan Nguyen', '70e4960018937470b91d5eec302f68f1', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-08', 'OBGZZT'),
(52, 'nktoan.20it1@vku.udn.vn', 'Toan Khanh Nguyen', 'd166d92d531966f8b60988762835d0c8', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-08', 'XVGWKK'),
(53, 'Toantran21@gmail.com', 'Trần Quốc Toản', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-11', NULL),
(54, 'Vanthanh@gmail.com', 'Trần Văn Thanh', 'a574c15b02f86c8ca6b81af022e63287', NULL, NULL, NULL, NULL, 'avatarDefault.jpeg', 'User', '2021-11-11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_createrid_foreign` (`createrId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_userid_foreign` (`userId`),
  ADD KEY `comments_blogid_foreign` (`blogId`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_useid_foreign` (`useId`),
  ADD KEY `donation_projectid_foreign` (`projectId`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_createrid_foreign` (`createrId`);

--
-- Indexes for table `event_activities`
--
ALTER TABLE `event_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_activities_userid_foreign` (`userId`),
  ADD KEY `event_activities_eventid_foreign` (`eventId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_createrid_foreign` (`createrId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_creater_foreign` (`creater`);

--
-- Indexes for table `regis_notifications`
--
ALTER TABLE `regis_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_unique` (`role`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_activities`
--
ALTER TABLE `event_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regis_notifications`
--
ALTER TABLE `regis_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `activities_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `activities_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_createrid_foreign` FOREIGN KEY (`createrId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blogid_foreign` FOREIGN KEY (`blogId`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_projectid_foreign` FOREIGN KEY (`projectId`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donation_useid_foreign` FOREIGN KEY (`useId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_createrid_foreign` FOREIGN KEY (`createrId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_activities`
--
ALTER TABLE `event_activities`
  ADD CONSTRAINT `event_activities_eventid_foreign` FOREIGN KEY (`eventId`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_activities_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_createrid_foreign` FOREIGN KEY (`createrId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_creater_foreign` FOREIGN KEY (`creater`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
