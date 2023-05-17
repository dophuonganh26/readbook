-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 09:07 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdoctruyen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'admin', 'admin@gmail.com', '2023-04-01 00:21:33', '$2y$10$fB2nP.NYZ9N8v5Or8yELZugVjx.hQHiSRKrDcugQUIHKKFhAKtc.G', 'VkH4UXJJprD37Hus7XksFcqRjB2qpQ5zuYmMnnrG5NIvaapSKNwPGmLqMmQr', '2023-04-01 00:21:33', '2023-05-17 06:59:19', '/storage/images/avatars/anh-cute-tho-di-xe-may.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Truyện ngôn tình', '2023-04-01 00:58:38', '2023-04-01 00:58:38'),
(2, 'Ngôn tình Việt Nam', '2023-04-01 01:00:00', '2023-04-01 01:00:00'),
(3, 'Xuyên không', '2023-04-01 01:01:01', '2023-04-01 01:01:01'),
(4, 'Đam Mỹ', '2023-04-02 10:03:25', '2023-04-02 10:03:25'),
(5, 'Truyện VOZ', '2023-04-02 10:03:36', '2023-04-02 10:03:36'),
(7, 'Tiên Hiệp', '2023-04-02 10:03:58', '2023-04-02 10:03:58'),
(8, 'Truyện Kiếm Hiệp', '2023-04-02 10:04:20', '2023-04-02 10:04:20'),
(9, 'Kỹ Năng Sống', '2023-04-02 10:04:28', '2023-04-02 10:04:28'),
(10, 'Tiểu Thuyết Phương Tây', '2023-04-02 10:04:38', '2023-04-02 10:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `story_id`, `content`, `view`, `created_at`, `updated_at`) VALUES
(1, 'Chương 01', 1, '<p style=\"text-align:justify\">﻿\"A...\" Vân Nghê vì bị ném mạnh lên chiếc giường lớn mà không khỏi cảm thấy choáng váng.<br />\r\n\"Sắp làm người đàn bà của anh rồi mà em còn dám đến câu lạc bộ đêm! Đến đó làm gì?\"<br />\r\nCố Hạo Khương chầm chậm tiến đến giường, ngón tay thon dài đang nhẹ nhàng cởi từng nút áo sơ mi trên thân hình rắn chắc, vạm vỡ. Đôi mắt sắc lạnh lại đang thể hiện sự tức giận không che giấu càng làm hắn trong mắt Vân Nghê giống như một vị thần cuồng ngạo. Sắc đẹp như tạc từ tượng của hắn nháy mắt đều bị nộ khí che lấp!<br />\r\n\"Tôi..Tôi là... Ưm...\"<br />\r\nChưa kịp để cô nói được câu nào, Cố Hạo Khương đã nhanh chóng giữ lấy cái cằm xinh đẹp của Vân Nghê, đưa môi lưỡi mình quấn sâu vào môi lưỡi cô, ra sức ʍúŧ mát, có lúc lại dùng răng mình day day môi cô...</p>\r\n\r\n<p><br />\r\n<br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Vân Nghê là lần đầu tiếp xúc thân mật với nam nhân, bị hắn khuấy đảo như thế, cô đã cảm thấy hơi say. Vậy mà người đàn ông này không dừng lại ở đó, một tay vẫn giữ cằm cô, một tay tìm đến nơi to tròn trước иgự¢.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">\"Ư... Đừng...Á\"</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Nhân lúc hắn thả môi cô ra để cô có thể bắt kịp nhịp của hắn, Vân Nghê muốn dùng lời nói để ngăn cản hành động cuồng dã kia, lại bị hắn hung hăng xé nát bộ váy của mình, cảnh xuân trong mấy chốc hiện ra không che dấu.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Vân Nghê muốn lấy tay che đi bộ иgự¢ trắng tuyết của mình, nào ngờ Cố Hạo Khương nhanh tay hơn, chế trụ cả hai tay cô đưa lên đỉnh đầu:</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">\"Đêm nay tôi sẽ cho em biết em thực sự là của ai!\"</span><br />\r\n<br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">\"Á...Ư... Thật khó chịu...anh đi ra....\"</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">\"Đừng ngại bảo bối, loại chuyện này sớm muộn gì em cũng trải qua cùng anh, đêm nay yên lặng hưởng thụ được không?\"</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Cô đang \\\'phiêu du\\\' bồng bềnh, lại bị giọng nói nam tính của hắn mê hoặc, không ngờ lại gật đầu một cái.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Cố Hạo Khương kích động, ngón tay bên dưới càng ra vào nhanh hơn. Vân Nghê điên cuồng vặn vẹo, đầu óc như muốn nổ tung, sau đó thét lớn một tiếng, mật dịch lại chảy ra như một con suối nhỏ.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Cố Hạo Khương thở dốc, dụς ∀ọηg bên dưới đã căng cứng đến phát đau, nhưng khi nhìn thấy nơi hoa huy*t nhỏ hẹp kia không ngừng chảy ra d*m thủy, hắn lại cố gắng chịu đựng thêm chút nữa, cuối người xuống mà ngoạm lấy cả môi dưới của cô, hút trọn mật dịch ngọt ngào...</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Vân Nghê lại bắt đầu thở dốc, ngăn không cho mình lại phát ra tiếng rên ᗪâᗰ đãng kia, nhưng mà cái lưỡi không xương của hắn không chịu để yên, hết lเế๓ láק bên ngoài lại bắt đầu thọc sâu vào bên trong khuấy đảo.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Cố Hạo Khương say mê đùa nghịch nơi tư mật này, bên trong vừa ấm áp, vừa như có lực hút mà quấn lấy lưỡi hắn. Hắn bắt trọn cặp ௱ôЛƓ căng tròn của cô, ngăn không cho cô động đậy, sau đó nâng nó lên cao hơn một chút, còn mình ra sức hút lấy hoa huy*t như muốn hút hết phần mật dịch chưa chịu chảy ra.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">\"Á..a..aaa\"</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Vân Nghê bị kích thích tột độ, chất dịch trắng ᴆục không ngừng trào ra như mong muốn của hắn. Hắn nhắm mắt hưởng thụ, lại vòng lưỡi liếm sạch một lần nữa, sau đó mới cầm cự long căng cứng của mình mà chà nhẹ bên ngoài cửa mình của cô:</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">\"Em đúng là tiểu ᗪâᗰ đãng, tôi mới kích thích em một chút mà em đã ra nhiều như thế! Nếu phân thân này của tôi đâm sâu vào bên trong em, không biết còn như thế nào?\"</span><br />\r\n<br />\r\n<br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Như để cô thấy cự long của mình, hắn cầm cự long đặt nhẹ lên phần bụng phẳng của cô, đập nhẹ lên nó nghe cả tiếng \\\'bạch\\\' nhỏ.</span></p>', 1, '2023-04-12 09:12:00', '2023-05-12 09:58:32'),
(2, 'Chương 01', 2, '<p style=\"text-align:justify\">﻿Thành phố Thịnh Châu, một thành phố nổi tiếng thế giới về sòng bạc, nơi đây là thiên đường trong mơ của đám nhà giàu phất lên sau một đêm, mỗi ngày đều có vô số người mang cả đống tiền lớn đổ vào thành phố này. Nó thỏa mãn một bộ phận những người chỉ trong một đêm thăng quan tiến chức, giàu lên nhanh chóng trở thành người thượng lưu, nó cũng khiến cho vô số người tán gia bại sản, vợ con ly tán, có người căm thù nó, cũng có người vô cùng thích sắc màu như truyện cổ tích của nó.<br />\r\nLà người dân bình thường của thành phố Thịnh Châu, loại sắc màu thần thoại này dường như không ảnh hưởng nhiều đến cuộc sống của họ. Cuộc sống trôi qua theo tuần tự của họ cũng giống như những người dân ở thành phố khác, cho dù ở cùng một thành phố thì những nơi đó cũng không phải là nơi bọn họ có thể lui tới. Tất nhiên, những người này đều sẽ ghi nhớ một chuyện, nếu gặp phải họ Thẩm hay họ Chu, bọn họ sẽ vô cùng cẩn thận, hai gia tộc lớn này đã chiếm cứ thành phố Thịnh Châu nhiều năm, không ai biết gốc rễ của bọn họ sâu bao nhiêu.<br />\r\nRất nhiều người đều không thể quên được sự việc xảy ra tại thành phố Thịnh Châu vào bảy năm trước, theo những người từng chứng kiến kể lại, trên mặt đất bày la liệt các thi thể ૮ɦếƭ trong tình trạng bi thảm, trời mưa khiến máu chảy thành sông, phía cảnh sát bắt được vô số người, nhưng cũng không thể làm gì được chúng, bọn chúng làm chứng cho nhau, bao che nhau, cũng chỉ có thể trừng phạt một số người.<br />\r\nTrận thảm họa đó là lần đầu tiên người dân thành phố Thịnh Châu chân chính trải nghiệm uy lực của thần tiên đánh nhau, Thẩm gia và Chu gia gây chiến, sinh mạng giống như một trò đùa trẻ con, rất nhiều cửa hàng bị phá hủy, vô số người bốc hơi trong một đêm, khoảng thời gian đó, mọi người đi trên đường cũng sẽ cẩn thận từng li từng tí, chỉ sợ sẽ ảnh hưởng đến mình.<br />\r\nMãi cho đến bây giờ, khi có người nhắc tới sự việc của bảy năm trước, mọi người đều sẽ co rúm lại theo bản năng, đó là lần đầu tiên bọn họ thật sự ý thức được ý nghĩa tồn tại của Chu gia và Thẩm gia, đó không phải là gia đình được diễn trong các bộ phim, càng không phải là một trò chơi, mà đó là sự thật, sự thật xảy ra ngay bên cạnh bọn họ.</p>\r\n\r\n<p><br />\r\n<br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Bên ngoài hội sở tư nhân Bích Thủy Thiên Đường, một hàng xe màu đen được thiết kế riêng dừng lại cùng lúc, những người đàn ông mặc âu phục giày da đồng thời mở cửa xe, nhịp bước vững vàng, hành động mau lẹ, trấn thủ các cửa ra vào của Bích Thủy Thiên Đường. Bọn họ nói năng thận trọng, ánh mắt cảnh giác nhìn xung quanh, giống như chiến sĩ từng được huấn luyện vô số lần, bất kể là thể lực hay sức quan sát thì người bình thường cũng không thể nào so được.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Có người ở phía xa nhìn thấy cảnh này liền nhanh chóng rời đi, ngu hơn nữa cũng biết chắc chắn là có nhân vật lớn giá lâm.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Qua một lúc, chiếc ô tô Sedan màu đen trông rất bình thường mở cửa ra, một đôi chân mang giày da chạm lên mặt đất, ngay sau đó là hai chân thon dài, vòng eo gầy gò nhưng vô cùng mạnh mẽ, phần cổ xinh đẹp, gương mặt góc cạnh tinh xảo bị kính đen che mất đôi mắt, chỉ là màu da hơi vàng của anh ẩn giấu vài phần cảm giác đẹp đẽ.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">“Anh Trạch.” Thanh niên đứng bên cạnh người đàn ông khẽ nhíu mày: “Anh không nên đích thân đến đây.”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Ngón tay của người đàn ông đè vào khuy áo thứ hai đếm từ dưới lên, ánh mắt khẽ dừng trên mặt của Thẩm Trường Kim, khóe miệng hơi nhếch: “Nếu đối phương đã dùng trăm phương nghìn kế muốn tôi ra mặt, hà cớ gì tôi không chiều ý bọn họ?”</span><br />\r\n<br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Không ai tin chuyện này chỉ đơn giản như vậy, nếu không phải Thẩm Trường Mộc kéo, Thẩm Trường Kim còn hận không thể đoạt lấy ly rượu trong tay Thẩm Định Trạch, uống nó thay anh.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Thẩm Định Trạch biết thức ăn này sẽ không có vấn đề gì, lý do rất đơn giản, bất kể là Hướng Việt hay Quách Kiến An đều là kẻ tham sống sợ ૮ɦếƭ, sẽ không sẵn lòng vì người khác mà bán mạng, một khi anh xảy ra chuyện thì những người ở đây hôm nay đừng hòng trốn thoát dù chỉ một người.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Tay phải Thẩm Định Trạch gõ gõ bàn, Hướng Việt nhanh chóng chú ý đến, sợ Thẩm Định Trạch không kiên nhẫn nên anh ta nháy mắt với thuộc hạ của mình: “Chỉ có mấy người chúng ta uống rượu cũng không thú vị gì lắm, nghe nói một trong những thứ đặc sắc nhất ở đây của ông chủ Quách chính là mỹ nữ, chi bằng chúng ta gặp thử xem.”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Thẩm Trường Kim và Thẩm Trường Mộc bốn mắt nhìn nhau, trong đầu cùng lúc xuất hiện ba chữ- mỹ nhân kế?</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Thẩm Định Trạch dừng việc gõ bàn, trên mặt vẫn không có quá nhiều biểu cảm, chỉ là trong lòng anh lại lơ đãng, hóa ra là đang đợi trò này. Từ xưa đến nay, mỹ nhân kế đã trở thành một điều bình thường, nhưng không thể phủ nhận được tầm quan trọng của nó, phụ nữ rất nhiều lúc bị đàn ông khinh thường mang đi làm công cụ, nhưng cũng rất nhiều lúc sẽ vì phụ nữ mà thua không còn manh giáp.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Hướng Việt thấy Thẩm Định Trạch không lên tiếng phản đối, trong lòng liền ổn định lại, cơ thể cũng buông lỏng theo.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Quách Kiến An vô cùng thông minh, lập tức tự mình dẫn người đến, chẳng bao lâu, mấy cô gái trẻ tuổi xinh đẹp đẩy cửa bước vào, khí chất của mỗi người không giống nhau, trong sáng, dễ thương, kiều diễm,… không có một khí chất nào trùng lặp, nếu không phải xuất hiện ở nơi này, có lẽ còn cho rằng các cô ấy xuất thân từ gia đình đoan chính, trên người không có chút xíu vẻ phong trần nào.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Tuy các cô gái đều rất xinh đẹp, nhưng vẫn có một con hạc đứng giữa bầy gà, khiến người ta không dời nổi mắt. Hướng Việt nhìn chằm chằm, cô gái này thật xinh đẹp, vừa đơn thuần lại xinh xắn, đúng kiểu đàn ông thích nhất. Hướng Việt hắng giọng một tiếng: “Còn đứng đó làm gì?” Vừa nói vừa nhìn Thẩm Định Trạch.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Các cô gái rất có mắt nhìn, nhanh chóng ngồi vào chỗ, hơn nữa còn ngồi ở nơi không xa không gần.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Dương Mĩ Na nhìn Thẩm Định Trạch một cái, vẻ mặt hơi ửng đỏ, cắn môi, sau đó ngồi bên cạnh Thẩm Định Trạch, cô ta nhỏ giọng lên tiếng: “Em tên là Na Na.”</span><br />\r\n<br />\r\n<br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Hướng Việt một mực nhìn Thẩm Định Trạch chăm chú, thấy biểu hiện của Dương Mĩ Na, anh ta cười cười, thuận tay ôm vai cô gái bên cạnh, một tay khác nâng ly rượu lên: “Anh Trạch, tôi thật lòng xin lỗi anh, không biết anh có bằng lòng tha thứ cho tôi không?”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Dương Mĩ Na không hề ngốc, cô ta lập tức rót rượu đầy ly cho Thẩm Định Trạch, chuẩn bị đưa cho anh, nhưng một ánh mắt của Thẩm Định Trạch vừa lia tới, cô ta tức khắc không dám có bất kỳ động tác nào, ly rượu suýt chút nữa cũng bị rơi mất. Dương Mĩ Na rất xinh đẹp, cô ta từng thấy ánh mắt của rất nhiều người đàn ông nhìn cô ta, nhưng chưa từng thấy ánh mắt nào như anh, giống như bản thân chỉ là một món đồ đơn thuần, hoặc nói là một vật thể ૮ɦếƭ, khiến cô ta không dám nảy sinh tâm tư của thiếu nữ nữa.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Chỉ có một loại người, sau khi anh ấy xuất hiện lập tức thu hút ánh mắt của tất cả mọi người, giống như một vật thể phát sáng. Mọi người đều nhìn Thẩm Định Trạch, nhưng anh lại nhìn chằm chằm ly rượu trên bàn, vừa rồi Dương Mĩ Na run tay làm rơi chút rượu lên bàn. Thẩm Trường Mộc đang định đổi ly rượu khác cho anh, đúng lúc này anh lại cầm ly rượu lên, anh không uống mà lắc vài cái, dường như tim của mọi người cũng lắc lư theo thứ chất lỏng trong ly của anh, cuối cùng anh dừng lại, ly rượu khẽ nghiêng, dựa vào ánh đèn trên trần nhà và góc độ này vừa khéo có thể để anh nhìn thấy rõ ràng vị trí của Hướng Việt, chính xác hơn mà nói là vị trí của cô gái ngồi bên cạnh Hướng Việt.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Cô gái mặc một chiếc váy dài màu trắng để lộ cánh tay, nhìn có vẻ tùy ý nhưng đã trải qua quá trình trang điểm ăn mặc công phu, mà giờ phút này, tay của Hướng Việt đang đặt lên phần da thịt cô để lộ ra ngoài.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Không ai phát hiện tay của Thẩm Định Trạch khẽ siết chặt, sau đó anh mỉm cười: “Nhờ phúc của anh tôi mới có thể thấy được điểm đặc sắc của nơi này, nói gì mà tha thứ với không tha thứ chứ?”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Anh uống một ngụm rượu, tay ôm vai Dương Mĩ Na một cách tự nhiên.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Hướng Việt bật cười ha ha, rốt cuộc bầu không khí cũng bắt đầu sôi nổi lên.</span></p>', 4, '2023-04-12 09:16:50', '2023-05-13 17:54:52'),
(3, 'Chương 02', 2, '<p style=\"text-align:justify\">﻿Dương Mĩ Na chỉ cảm thấy cơ thể mình lâng lâng, hoàn toàn quên mất bản thân đang ở đâu, đôi tay này ôm vai cô ta lại khiến cô ta nóng bừng từ nội tâm đến thân thể, cô ta phải hết sức kiềm chế mình mới có thể dằn xuống được nỗi kích động ấy. Trong lòng trăm mối cảm xúc ngổn ngang, người đàn ông này chỉ nhìn một cái cũng khiến lòng cô ta sinh ra khát khao, cho dù cô ta không thể nói được anh tốt ở điểm nào, lại thích anh vì cái gì, nhưng cô ta sẽ không kìm được mà trở nên hèn mọn trước mặt anh.<br />\r\nThẩm Định Trạch tùy ý nói chuyện với Hướng Việt, cho đến khi bữa ăn kết thúc, Thẩm Định Trạch ra khỏi phòng, cửa phòng giống như một đường ranh giới nào đó, anh nhanh chóng thu lại tay của mình, như thể ghét bỏ thứ gì, anh dùng khăn giấy lau lau tay.<br />\r\nNụ cười của Dương Mĩ Na cứng đờ trên khoé miệng, nhìn thấy động tác của Thẩm Định Trạch, cô ta giống như bị sét đánh, biểu cảm phút chốc biến thành tổn thương, sau đó, không có ai để ý đến cô ta, bọn họ cứ thế lướt qua cô ta đi mất, tựa như cô ta chỉ là đồ vật, không đúng, phải là không khí.<br />\r\nCòn Hướng Việt ở trong phòng nhìn cô gái ngồi bên cạnh mình, tuy cô không kiều diễm bằng Dương Mĩ Na, nhưng cũng rất xinh đẹp, anh ta không nhịn được mà bật cười, đêm nay có lẽ là một đêm không tồi, anh ta lấy tay nâng cằm cô lên: “Em tên gì?”<br />\r\n“Tiểu Dư.” Cô để mặc cho Hướng Việt tiến hành đánh giá mình như đang xem xét một món hàng.</p>\r\n\r\n<p><br />\r\n<br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">“Tiểu Ngư? Khá hay, cái tên rất thú vị.” Hướng Việt liên tục gật đầu.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">(* Dư và Ngư có cùng âm đọc là yú.)</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Cô nghe ra được cái tên mà anh ta hiểu nhầm, nhưng cô không hề giải thích, chỉ khẽ mỉm cười. Hướng Việt đang định nói gì đó, điện thoại chợt reo lên, anh ta nhìn màn hình điện thoại, sống lưng bất giác dựng thẳng, không ngừng gật đầu với người ở đầu bên kia điện thoại: “Vâng vâng, được.”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Cúp điện thoại, Hướng Việt nhìn cô, vẻ mặt lộ ra vài phần tiếc nuối. Anh ta đứng dậy, kéo cô lên, ôm vào иgự¢ mình rồi đi ra ngoài. Trên hành lang bên ngoài phòng, Dương Mĩ Na đang cắn môi, vẻ mặt quật cường, lệ trong mắt tựa như rơi lại như không rơi, giống như hoa tươi xinh đẹp phiêu diêu giữa gió mưa, cô thấy mà còn thương xót, Hướng Việt thì nhìn đến ngẩn cả người, mấy giây sau mới hồi hồn lại được, nhìn người trong иgự¢: “Tôi còn có việc, em đi trước đi.”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Cô giống như không hề nhìn thấy vẻ chiếm hữu và sự rung động khi nhìn thấy cái đẹp trong mắt Hướng Việt. Cô rời khỏi иgự¢ anh ta, xách túi của mình chuẩn bị rời đi. Hướng Việt cười cười, chắc là cảm thấy cô vô cùng biết điều nên lấy ra một tờ chi phiếu, men theo cổ của cô nhét vào trong, cô không từ chối, rút chi phiếu ra vẫy vẫy tay với anh ta rồi một mình đi trước.</span><br />\r\n<br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">“Vâng.” Diệp Thanh lập tức ra lệnh cho thuộc hạ chuẩn bị rời đi, chiếc xe này của anh không thể lái đi đầu tiên, cũng không thể lái đi cuối cùng, hơn nữa còn phải tùy lúc đổi vị trí.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Một hàng xe nhanh chóng chạy ra con đường bên ngoài Bích Thủy Thiên Đường, chỉ có tiếng xe ma sát với mặt đất trầm bổng lên xuống, một hàng chỉnh tề, không có bất kỳ sự khác biệt nào.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Khi Diệp Thanh lướt qua mấy người đó, có âm thanh loáng thoáng truyền đến, hình như là tiếng của người đàn ông đang chửi kháy, muốn cho cô gái kia một bài học, tránh cho cô ấy không biết thế nào là lợi hại, không xem bọn họ ra gì.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Xe vừa định chạy qua, một người đàn ông túm lấy tóc cô gái, giơ tay hung hãn giáng một bạt tai lên mặt cô gái.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Gương mặt tươi cười như hoa thoáng qua trong đầu Thẩm Định Trạch: “Dừng xe!”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Anh nói rất nhỏ, nhưng Diệp Thanh vẫn nghe thấy, Thẩm Định Trạch khẽ nhìn Diệp Thanh, Diệp Thanh lập tức hiểu ý.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Gần như cùng một lúc, Thẩm Trường Kim đi ra từ chiếc xe màu đen, anh bước vài bước lên trước, khi người đàn ông đang kéo Mạnh Nhược Dư trên đất chuẩn bị cho cô cái bạt tai thứ hai thì anh đã nắm lấy cổ tay của hắn: “Là đàn ông đừng тһô Ьạᴏ với phụ nữ như vậy!”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Người đàn ông bị ngăn lại phẫn nộ ngút trời: “Mày là cái thá gì, dám quản chuyện của ông đây, mày biết ông đây là ai không? Thiếu nợ phải trả tiền, đạo lý hiển nhiên, có là ông trời thì cũng cút cho tao.”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">“Ồ? Anh là ai?” Thẩm Trường Kim dùng sức, cổ tay của hắn tựa như bị Ϧóþ gãy, đau đến mức toàn thân hắn gần như tê liệt, nghĩ lại mà sợ kinh khủng.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Những người bên cạnh hắn tức khắc nhận ra sự bất thường ở đây, nhìn thấy mấy chiếc xe ở chỗ không xa, bọn chúng hiểu ngay là có nhân vật lớn ghé thăm, hối hận cực kì, nếu như biết sẽ gặp phải người như vậy, bọn chúng tuyệt đối sẽ không đi đòi nợ cô gái này vào ngày hôm nay.</span><br />\r\n<br />\r\n<br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Người đàn ông buông lỏng tay, hận không thể quỳ xuống trước mặt Thẩm Trường Kim: “Không, không… liên quan đến tôi, cô gái này nợ tiền chúng tôi, đại ca sai chúng tôi đến đây đòi nợ, thật sự không có chút liên quan gì đến tôi cả.”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Thẩm Trường Kim thả tay ra: “Cút!”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Người đàn ông như được đại xá, mang theo đàn em chạy như bỏ trốn.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Thẩm Trường Kim không nhìn cô gái trên mặt đất, loại người tính mạng nằm trên mũi dao như bọn họ không có thời gian cũng như tình cảm để thương hương tiếc ngọc cô gái này, anh đang định xoay người trở về xe của mình thì đột nhiên nghĩ đến chuyện gì, bước chân chợt khựng lại.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Tất cả xe đều dừng lại, không di chuyển, nếu nói chỉ đơn thuần là kêu anh ra mặt cứu người, vậy bọn họ nên lái xe đi trước, nhưng bọn họ không đi, chứng tỏ Thẩm Định Trạch không hề ra lệnh. Mà với tính cách của Thẩm Định Trạch, đừng nói cô gái này chỉ đơn giản là bị đánh, cho dù cô ấy bị người ta ђàภђ ђạ đến ૮ɦếƭ, Thẩm Định Trạch cũng sẽ không dấy lên bất kỳ cảm xúc nào, nhưng Thẩm Định Trạch lại kêu dừng xe.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Lúc này, Thẩm Trường Kim mới bắt đầu nghiêm túc đánh giá cô gái trên mặt đất, cô đang định bò dậy, có lẽ cổ tay bị thương không có sức nên hoàn toàn không thể chống nổi, cô cắn môi, vết máu ở khóe miệng và gương mặt sưng phù khiến cô cực kì nhếch nhác, nhưng đôi mắt trong veo linh động như thể biết nói lại làm cô trở nên tràn đầy sức sống, xinh đẹp diễm lệ.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Thẩm Trường Kim đưa tay đỡ cô, Mạnh Nhược Dư mượn sức của anh đứng dậy, sau đó lập tức buông tay anh ra: “Cảm ơn anh đã cứu tôi.”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Hình như cô nhìn về phía đoàn xe một cái, nhưng không nói gì cả. Thẩm Trường Kim sờ sờ cằm, vậy mà anh lại có thể hiểu được ý vừa rồi của cô, cô biết anh nghe ai sai bảo mới đi cứu, người thật sự cần cảm ơn là một người nào đó ngồi trong đoàn xe kia, nhưng vì nguyên nhân gì đó mà trong lòng cô biết rõ không cần tạo mối quan hệ với đối phương.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Người sinh tồn ở nơi này quả nhiên biết mình có bao nhiêu phân lượng.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Thẩm Trường Kim: “Tiểu thư, cho tôi cơ hội đưa cô đi một đoạn đường nhé?”</span><br />\r\n<br />\r\n<br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Mạnh Nhược Dư lắc đầu: “Không cần đâu, cảm ơn ý tốt của anh.”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Thẩm Trường Kim ngồi ở vị trí này nhiều năm, đã sớm quên mất cảm giác bị người ta từ chối: “Cô không sợ bọn chúng quay lại tìm cô sao?”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Mạnh Nhược Dư không nhìn anh, dường như cô đã bị thương vài chỗ, cô hít sâu một hơi: “Bọn chúng sẽ không quay lại đâu.”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Giọng cô chắc chắn, khiến Thẩm Trường Kim không kìm được có vài phần thiện cảm với cô, dáng vẻ xinh đẹp, biết thân biết phận, còn có đủ sự thông minh. Anh nhìn về hướng đoàn xe, đưa tay chặn Mạnh Nhược Dư.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Quả nhiên cô rất thông minh, nhìn anh hai giây, sau đó lập tức đi theo anh lên xe, anh dùng hành động ra hiệu với cô, anh làm như vậy chẳng qua là nghe người ta sai bảo thôi, anh hoàn toàn không có sự lựa chọn.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Sau khi Mạnh Nhược Dư lên xe, đoàn xe bắt đầu tiến về phía trước.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Diệp Thanh thỉnh thoảng nhìn về phía sau, ngày hôm nay Thẩm Định Trạch thật sự khiến người ta cảm thấy kì lạ, ngay cả bản thân Diệp Thanh cũng không có cách nào đoán được rốt cuộc anh đang nghĩ gì.</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Dưới sự quan sát không liên tục của Diệp Thanh, cuối cùng Thẩm Định Trạch lên tiếng: “Bảo cô ta cút.”</span><br />\r\n<span style=\"font-family:robotoregular; font-size:19px\">Cô ta là ai, bọn họ đều biết.</span></p>', 3, '2023-04-12 09:17:21', '2023-05-13 17:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_view_logs`
--

CREATE TABLE `chapter_view_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapter_view_logs`
--

INSERT INTO `chapter_view_logs` (`id`, `chapter_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-05-11 16:56:26', '2023-05-11 16:56:26'),
(2, 3, '2023-05-11 16:56:44', '2023-05-11 16:56:44'),
(3, 1, '2023-05-12 09:58:32', '2023-05-12 09:58:32'),
(4, 2, '2023-05-12 10:06:25', '2023-05-12 10:06:25'),
(5, 3, '2023-05-12 10:08:36', '2023-05-12 10:08:36'),
(6, 2, '2023-05-13 17:34:10', '2023-05-13 17:34:10'),
(7, 3, '2023-05-13 17:51:47', '2023-05-13 17:51:47'),
(8, 2, '2023-05-13 17:54:52', '2023-05-13 17:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `story_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `story_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Truyện cảm động quá, ủng hộ ad', '2023-04-24 15:48:08', '2023-04-24 15:48:08'),
(2, 1, 1, 'Cảm ơn bạn', '2023-04-24 15:48:45', '2023-04-24 15:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `cookie_user_chapter`
--

CREATE TABLE `cookie_user_chapter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `story_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cookie_user_chapter`
--

INSERT INTO `cookie_user_chapter` (`id`, `user_token`, `chapter_id`, `story_id`, `created_at`, `updated_at`) VALUES
(1, '1a13ad72a74a7d1a3b949640ee3bc5068c6b28afa661e56f538f93a4ba1d8706', 2, 2, '2023-05-09 10:17:10', '2023-05-09 10:18:29'),
(2, '94ed534fe24a3fae174141665ec993971b0a0685e0fbc1d9ed946065d7f955f2', 2, 2, '2023-05-11 16:56:26', '2023-05-11 16:57:00'),
(4, '6a57d1bf344d6cc4553de99a091a1ec8415a242d52c884d699fe327db0ec5591', 2, 2, '2023-05-12 10:06:25', '2023-05-12 10:12:00'),
(5, 'd0d9ecad1380928d58e6aefabf5576850d8417cff53621e8e372536b9943715e', 2, 2, '2023-05-13 17:34:10', '2023-05-13 17:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `author_id`, `follower_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '2023-04-28 15:39:42', '2023-04-28 15:39:42'),
(3, 2, 1, '2023-04-28 15:39:56', '2023-04-28 15:39:56'),
(4, 2, 3, '2023-04-28 15:41:12', '2023-04-28 15:41:12'),
(5, 1, 3, '2023-04-28 15:41:20', '2023-04-28 15:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_31_234204_create_admins_table', 1),
(6, '2023_03_31_234215_create_parent_categories_table', 1),
(7, '2023_03_31_234222_create_categories_table', 1),
(8, '2023_04_01_014707_add_status_column_to_parent_categories_table', 1),
(9, '2023_04_02_171933_add_status_column_to_users_table', 2),
(13, '2023_04_10_000505_create_stories_table', 3),
(14, '2023_04_10_000657_create_wishlists_table', 3),
(15, '2023_04_10_002410_create_chapters_table', 3),
(16, '2023_04_11_095857_create_follows_table', 3),
(17, '2023_04_23_012225_create_comments_table', 4),
(18, '2023_04_26_145922_create_ratings_table', 5),
(19, '2023_05_05_194543_create_cookie_user_chapter_table', 6),
(20, '2023_05_06_224420_create_notifications_table', 6),
(21, '2023_05_11_185117_create_chapter_view_logs_table', 7),
(22, '2023_05_12_092607_create_traffics_table', 8),
(23, '2023_05_16_091656_add_release_column_to_stories_table', 9),
(24, '2023_05_17_105153_add_avatar_column_to_admins_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('23f99a50-ae9c-4d65-9cce-a518bc20084a', 'App\\Notifications\\AuthorNotification', 'App\\Models\\User', 1, '{\"date\":\"09\\/05\\/2023 17:25:02\",\"type\":1,\"author\":\"\\u0110\\u1ed7 Ph\\u01b0\\u01a1ng Anh\",\"story\":\"Test\"}', NULL, '2023-05-09 10:25:02', '2023-05-09 10:25:02'),
('68621343-83aa-4c63-a448-abde60c89311', 'App\\Notifications\\AuthorNotification', 'App\\Models\\User', 3, '{\"date\":\"09\\/05\\/2023 17:25:02\",\"type\":1,\"author\":\"\\u0110\\u1ed7 Ph\\u01b0\\u01a1ng Anh\",\"story\":\"Test\"}', NULL, '2023-05-09 10:25:02', '2023-05-09 10:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `parent_categories`
--

CREATE TABLE `parent_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `parent_categories`
--

INSERT INTO `parent_categories` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Sáng tác', '2023-04-01 00:31:41', '2023-04-01 00:31:41', 1),
(2, 'Truyện dịch', '2023-04-01 00:32:13', '2023-05-15 08:51:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `story_id` bigint(20) UNSIGNED NOT NULL,
  `star` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `story_id`, `star`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, '2023-04-28 15:38:32', '2023-04-28 15:38:32'),
(2, 1, 1, 2, '2023-04-28 15:38:40', '2023-04-28 15:38:40'),
(3, 2, 2, 5, '2023-04-28 15:39:04', '2023-04-28 15:39:04'),
(4, 3, 2, 3, '2023-04-28 15:41:25', '2023-04-28 15:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_category_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `release` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `name`, `user_id`, `author`, `parent_category_id`, `category_id`, `image`, `short_description`, `reason`, `status`, `created_at`, `updated_at`, `release`) VALUES
(1, 'Đêm Ngày Sủng Nịnh', 2, 'Đỗ Phương Anh', 2, 1, '/storage/images/stories/dem-ngay-sung-ninh-1-thichtruyen.webp', '<p><span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"A...\" Vân Nghê vì bị ném mạnh lên chiếc giường lớn mà không khỏi cảm thấy choáng váng.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Sắp làm người đàn bà của anh rồi mà em còn dám đến câu lạc bộ đêm! Đến đó làm gì?\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Cố Hạo Khương chầm chậm tiến đến giường, ngón tay thon dài đang nhẹ nhàng cởi từng nút áo sơ mi trên thân hình rắn chắc, vạm vỡ. Đôi mắt sắc lạnh lại đang thể hiện sự tức giận không che giấu càng làm hắn trong mắt Vân Nghê giống như một vị thần cuồng ngạo. Sắc đẹp như tạc từ tượng của hắn nháy mắt đều bị nộ khí che lấp!</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Tôi..Tôi là... Ưm...\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Chưa kịp để cô nói được câu nào, Cố Hạo Khương đã nhanh chóng giữ lấy cái cằm xinh đẹp của Vân Nghê, đưa môi lưỡi mình quấn sâu vào môi lưỡi cô, ra sức ʍúŧ mát, có lúc lại dùng răng mình day day môi cô...</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Vân Nghê là lần đầu tiếp xúc thân mật với nam nhân, bị hắn khuấy đảo như thế, cô đã cảm thấy hơi say. Vậy mà người đàn ông này không dừng lại ở đó, một tay vẫn giữ cằm cô, một tay tìm đến nơi to tròn trước иgự¢.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Ư... Đừng...Á\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Nhân lúc hắn thả môi cô ra để cô có thể bắt kịp nhịp của hắn, Vân Nghê muốn dùng lời nói để ngăn cản hành động cuồng dã kia, lại bị hắn hung hăng xé nát bộ váy của mình, cảnh xuân trong mấy chốc hiện ra không che dấu.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Vân Nghê muốn lấy tay che đi bộ иgự¢ trắng tuyết của mình, nào ngờ Cố Hạo Khương nhanh tay hơn, chế trụ cả hai tay cô đưa lên đỉnh đầu:</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Đêm nay tôi sẽ cho em biết em thực sự là của ai!\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Nói rồi hắn cúi đầu liếm quanh một bên gò bồng, tay kia thì không quên ra sức xoa nắn bên còn lại, khiến nó một mảng đỏ hồng.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Vân Nghê không chịu nổi kích thích, cứ vặn vẹo thân mình, trên miệng còn phát ra tiếng ՐêՈ Րỉ mê người, hai hạt đậu đỏ cũng vì vậy mà ¢ươиg ¢ứиg lên.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Cố Hạo Khương khẽ nhếch miệng cười, phà hơi thở của mình lên иgự¢ cô, sau đó lại cúi xuống cắn nhẹ hạt châu trước иgự¢.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"A..\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Vân Nghê toàn thân run rẫy, bị hắn trêu trọc làm sao có thể an tĩnh, cảm giác vừa ngượng vừa đê mê này thật làm cho cô xấu hổ đến phát khóc. Khóe mắt bắt đầu có những giọt nước long lanh.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Hức...\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Nghe tiếng khóc của cô, Cố Hạo Khương ngẩng đầu lên thì thấy tiểu nữ nhân của mình khuôn mặt phiếm hồng, đôi mắt xinh đẹp đã có một tầng hơi nước.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Hắn đau lòng, nhanh chóng áp chế dụς ∀ọηg cùng cơn nộ huấn xuống, hôn lên khóe mắt đáng thương kia:</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Ngoan nào, sao lại khóc? Anh sẽ rất đau lòng!\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Vân Nghê ngước nhìn tên đàn ông xấu xa này, bao nhiêu uất ức bỗng chốc tuôn trào:</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Anh! Cái đồ khốn này! Không cho tôi giải thích đã hung hăng chiếm tiện nghi của tôi! Lại đùa giỡn với tôi như thế! Hức..Hức\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Cố Hạo Khương nghe cô vợ nhỏ của mình oan ức kể tội, vui vẻ bật cười thành tiếng, hắn cười đẹp đến nổi cô quên cả nức nở, chăm chú nhìn hắn.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Cố Hạo Khương lại bắt đầu nổi hứng tiếp tục:</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Anh nào có đùa giỡn em bao giờ? Huống hồ phía dưới này của em thật ẩm ướt!\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Nói rồi hắn đưa bàn tay của mình xuống lần mò nơi tư mật nhất của cô, dù chỉ đang vuốt ve bên ngoài chiếc ҨЦầЛ ŁóŤ, nhưng Vân Nghê vẫn không chịu nổi mà rên rĩ:</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Ư...a...a... Dừng...dừng lại...\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Cố Hạo Khương lần này lại nghe theo cô, dừng ngón tay mình lại, nhưng Vân Nghê lại thấy bất ngờ, bên dưới cảm thấy thật ngứa quá!! Nhìn biểu tình mất mát của cô, Cố Hạo Khương lại nhanh chóng dụ dỗ:</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Bảo bối, có phải em muốn anh?\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Hứ! Làm...làm gì có đâu!\" Vân Nghê ngại ngùng không thừa nhận, nếu thật thừa nhận như vậy thì mất mặt ૮ɦếƭ...</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Hắn ta cười xảo trá, không muốn tiếp tục chọc ghẹo cô nữa, vội xé nát cái ҨЦầЛ ŁóŤ mỏng manh của cô, đưa tay khuấy sâu vào bên trong hoa huy*t.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Á...Ư... Thật khó chịu...anh đi ra....\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Đừng ngại bảo bối, loại chuyện này sớm muộn gì em cũng trải qua cùng anh, đêm nay yên lặng hưởng thụ được không?\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Cô đang \\\\\\\'phiêu du\\\\\\\' bồng bềnh, lại bị giọng nói nam tính của hắn mê hoặc, không ngờ lại gật đầu một cái.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Cố Hạo Khương kích động, ngón tay bên dưới càng ra vào nhanh hơn. Vân Nghê điên cuồng vặn vẹo, đầu óc như muốn nổ tung, sau đó thét lớn một tiếng, mật dịch lại chảy ra như một con suối nhỏ.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Cố Hạo Khương thở dốc, dụς ∀ọηg bên dưới đã căng cứng đến phát đau, nhưng khi nhìn thấy nơi hoa huy*t nhỏ hẹp kia không ngừng chảy ra d*m thủy, hắn lại cố gắng chịu đựng thêm chút nữa, cuối người xuống mà ngoạm lấy cả môi dưới của cô, hút trọn mật dịch ngọt ngào...</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Vân Nghê lại bắt đầu thở dốc, ngăn không cho mình lại phát ra tiếng rên ᗪâᗰ đãng kia, nhưng mà cái lưỡi không xương của hắn không chịu để yên, hết lเế๓ láק bên ngoài lại bắt đầu thọc sâu vào bên trong khuấy đảo.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Cố Hạo Khương say mê đùa nghịch nơi tư mật này, bên trong vừa ấm áp, vừa như có lực hút mà quấn lấy lưỡi hắn. Hắn bắt trọn cặp ௱ôЛƓ căng tròn của cô, ngăn không cho cô động đậy, sau đó nâng nó lên cao hơn một chút, còn mình ra sức hút lấy hoa huy*t như muốn hút hết phần mật dịch chưa chịu chảy ra.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Á..a..aaa\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Vân Nghê bị kích thích tột độ, chất dịch trắng ᴆục không ngừng trào ra như mong muốn của hắn. Hắn nhắm mắt hưởng thụ, lại vòng lưỡi liếm sạch một lần nữa, sau đó mới cầm cự long căng cứng của mình mà chà nhẹ bên ngoài cửa mình của cô:</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">\"Em đúng là tiểu ᗪâᗰ đãng, tôi mới kích thích em một chút mà em đã ra nhiều như thế! Nếu phân thân này của tôi đâm sâu vào bên trong em, không biết còn như thế nào?\"</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Như để cô thấy cự long của mình, hắn cầm cự long đặt nhẹ lên phần bụng phẳng của cô, đập nhẹ lên nó nghe cả tiếng \\\\\\\'bạch\\\\\\\' nhỏ.</span></p>', '', 1, '2023-04-12 09:08:07', '2023-05-16 03:01:44', 0),
(2, 'Cực Hạn Triền Miên', 1, NULL, 1, 3, '/storage/images/stories/ong-trum-hac-dao-muu-ke-sau-1-thichtruyen.webp', '<p><span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thành phố Thịnh Châu, một thành phố nổi tiếng thế giới về sòng bạc, nơi đây là thiên đường trong mơ của đám nhà giàu phất lên sau một đêm, mỗi ngày đều có vô số người mang cả đống tiền lớn đổ vào thành phố này. Nó thỏa mãn một bộ phận những người chỉ trong một đêm thăng quan tiến chức, giàu lên nhanh chóng trở thành người thượng lưu, nó cũng khiến cho vô số người tán gia bại sản, vợ con ly tán, có người căm thù nó, cũng có người vô cùng thích sắc màu như truyện cổ tích của nó.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Là người dân bình thường của thành phố Thịnh Châu, loại sắc màu thần thoại này dường như không ảnh hưởng nhiều đến cuộc sống của họ. Cuộc sống trôi qua theo tuần tự của họ cũng giống như những người dân ở thành phố khác, cho dù ở cùng một thành phố thì những nơi đó cũng không phải là nơi bọn họ có thể lui tới. Tất nhiên, những người này đều sẽ ghi nhớ một chuyện, nếu gặp phải họ Thẩm hay họ Chu, bọn họ sẽ vô cùng cẩn thận, hai gia tộc lớn này đã chiếm cứ thành phố Thịnh Châu nhiều năm, không ai biết gốc rễ của bọn họ sâu bao nhiêu.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Rất nhiều người đều không thể quên được sự việc xảy ra tại thành phố Thịnh Châu vào bảy năm trước, theo những người từng chứng kiến kể lại, trên mặt đất bày la liệt các thi thể ૮ɦếƭ trong tình trạng bi thảm, trời mưa khiến máu chảy thành sông, phía cảnh sát bắt được vô số người, nhưng cũng không thể làm gì được chúng, bọn chúng làm chứng cho nhau, bao che nhau, cũng chỉ có thể trừng phạt một số người.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Trận thảm họa đó là lần đầu tiên người dân thành phố Thịnh Châu chân chính trải nghiệm uy lực của thần tiên đánh nhau, Thẩm gia và Chu gia gây chiến, sinh mạng giống như một trò đùa trẻ con, rất nhiều cửa hàng bị phá hủy, vô số người bốc hơi trong một đêm, khoảng thời gian đó, mọi người đi trên đường cũng sẽ cẩn thận từng li từng tí, chỉ sợ sẽ ảnh hưởng đến mình.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Mãi cho đến bây giờ, khi có người nhắc tới sự việc của bảy năm trước, mọi người đều sẽ co rúm lại theo bản năng, đó là lần đầu tiên bọn họ thật sự ý thức được ý nghĩa tồn tại của Chu gia và Thẩm gia, đó không phải là gia đình được diễn trong các bộ phim, càng không phải là một trò chơi, mà đó là sự thật, sự thật xảy ra ngay bên cạnh bọn họ.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Bên ngoài hội sở tư nhân Bích Thủy Thiên Đường, một hàng xe màu đen được thiết kế riêng dừng lại cùng lúc, những người đàn ông mặc âu phục giày da đồng thời mở cửa xe, nhịp bước vững vàng, hành động mau lẹ, trấn thủ các cửa ra vào của Bích Thủy Thiên Đường. Bọn họ nói năng thận trọng, ánh mắt cảnh giác nhìn xung quanh, giống như chiến sĩ từng được huấn luyện vô số lần, bất kể là thể lực hay sức quan sát thì người bình thường cũng không thể nào so được.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Có người ở phía xa nhìn thấy cảnh này liền nhanh chóng rời đi, ngu hơn nữa cũng biết chắc chắn là có nhân vật lớn giá lâm.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Qua một lúc, chiếc ô tô Sedan màu đen trông rất bình thường mở cửa ra, một đôi chân mang giày da chạm lên mặt đất, ngay sau đó là hai chân thon dài, vòng eo gầy gò nhưng vô cùng mạnh mẽ, phần cổ xinh đẹp, gương mặt góc cạnh tinh xảo bị kính đen che mất đôi mắt, chỉ là màu da hơi vàng của anh ẩn giấu vài phần cảm giác đẹp đẽ.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">“Anh Trạch.” Thanh niên đứng bên cạnh người đàn ông khẽ nhíu mày: “Anh không nên đích thân đến đây.”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Ngón tay của người đàn ông đè vào khuy áo thứ hai đếm từ dưới lên, ánh mắt khẽ dừng trên mặt của Thẩm Trường Kim, khóe miệng hơi nhếch: “Nếu đối phương đã dùng trăm phương nghìn kế muốn tôi ra mặt, hà cớ gì tôi không chiều ý bọn họ?”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thẩm Trường Kim ngẩn người chốc lát, sau đó cùng Thẩm Trường Mộc đi theo phía sau Thẩm Định Trạch. Bọn họ lấy Kim Mộc Thủy Hỏa Thổ để đặt tên, là “đầy tớ” của Thẩm gia, từ nhỏ đã lớn lên cùng Thẩm Định Trạch, bọn họ tồn tại vì Thẩm Định Trạch, đó là ý nghĩa sống đã ăn sâu bén rễ trong năm người bọn họ. Năm người mỗi người phụ trách một nhiệm vụ riêng, thay Thẩm Định Trạch quản lý tất cả, giúp anh đứng vững gót chân, trở thành người nói một là một ở Thẩm gia hiện nay.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thẩm Trường Mộc vỗ nhẹ một cái lên vai của người anh em, nếu Thẩm Định Trạch đã quyết định tự mình đến đây một chuyến, đương nhiên là có lý do của anh, bọn họ nghe theo là được rồi, không cần bận tâm đến những chuyện khác.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Một đoàn người bước vào trong, Bích Thủy Thiên Đường nào dám tiếp đón những vị khách khác, ông chủ Quách Kiến An đích thân tiến đến chào hỏi. Trong những năm qua, việc kinh doanh của Quách Kiến An càng làm càng phất lên, một số người có máu mặt cũng sẽ gọi ông ta một tiếng ông chủ Quách, người khác không biết rõ tình hình, nhưng trong lòng ông ta biết rõ, ông ta có thể làm đến ngày hôm nay là vì Chu gia và Thẩm gia cần người như ông ta tồn tại, một số xích mích cần thiết không thể khiến cho người của hai bên nhúng tay vào, tự nhiên sẽ cần đến Quách Kiến An, một người không qua lại và không có lợi ích liên quan đến Chu gia và Thẩm gia, như vậy mới có thể duy trì được sự bình yên ngoài mặt.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Quách Kiến An cẩn thận đi theo, cũng âm thầm lặng lẽ quan sát người thanh niên này. Năm đó, khi người nắm quyền ở Thẩm gia- Thẩm Diệu Minh muốn giao tất cả cho người con trai bất ngờ xuất hiện này, làm một đám người kinh hãi đến rớt cả cằm. Không nói đến chuyện bên cạnh Thẩm Diệu Minh có con trai trưởng và con trai thứ Thẩm Định Khải, Thẩm Định Bình đi theo ông ấy nhiều năm, mà chính tuổi tác chỉ sắp 18 của Thẩm Định Trạch cũng khiến mọi người không phục. Nhưng Thẩm Diệu Minh cứ khăng khăng làm theo ý mình, trong trận đại chiến với Chu gia đã mất đi người con trai thứ Thẩm Định Bình, khiến Thẩm Định Khải tàn phế, quả thật đẩy Thẩm Định Trạch đến vị trí này, thế mà hôm nay sau bảy năm, không có ai dám nói Thẩm Định Trạch một câu không đúng, đồng thời cũng hiểu vì sao Thẩm Diệu Minh cứ khư khư cố chấp như vậy.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Đến căn phòng hẹn trước, vừa mở cửa, người bên trong lập tức tiến lên nghênh đón. Quách Kiến An là người thông minh, biết cho dù Thẩm Định Trạch có đích thân đến đây cũng sẽ không trách tội ông ta chuyện gì, bởi vì người như ông ta cùng lắm cũng chỉ là nghe người khác sai bảo mà thôi, không đắc tội nổi Thẩm gia, cũng không đắc tội nổi Chu gia, vì vậy Thẩm Định Trạch sẽ không tính nợ lên người ông ta, nên ông ta liền xoay người chuẩn bị rời đi.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Hướng Việt híp mắt, lập tức cười lên: “Anh Trạch vừa đến thì ông chủ Quách định đi ngay, người không biết còn tưởng ông không hoan nghênh anh ta đấy!”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Trong lòng Quách Kiến An chợt căng thẳng, nén sự chán ghét dưới đáy lòng, người này quả thật là đang muốn kéo mình xuống nước: “Nào có nào có, hai vị đều là khách quý, tôi sợ bọn họ phục vụ không chu đáo nên chuẩn bị tự mình đi giám sát thôi.”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Hướng Việt cười như không cười: “Ông chủ Quách đích thân đón người, còn chỗ nào phục vụ không chu đáo nữa? Tôi còn không có được đãi ngộ này của ông chủ Quách đâu.”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thẩm Định Trạch lấy kính đen xuống, cầm khăn lau một cách thờ ơ, nhìn cũng không thèm nhìn Hướng Việt một cái. Thẩm Trường Mộc khoanh hai tay trước иgự¢ đứng bên trái anh, cực kì không khách khí: “Nghe nói ông chủ Hướng luôn nói nhiều, quả nhiên là danh bất hư truyền, chúng tôi đến là vì lời xin lỗi của anh, sao trông anh không có chút thành ý gì hết vậy?”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Hướng Việt đau buồn nhíu mày: “Thành ý của tôi nhiều lắm đấy! Chỉ là đợi lâu quá hình như tiêu hết mấy lời xin lỗi rồi. Anh Trạch mau đến đây ngồi, mau đến đây ngồi, để tránh cho hai thuộc hạ của anh cảm thấy tôi tiếp đón anh không được chu đáo.”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Vẻ mặt Thẩm Trường Kim đầy phẫn nộ, nhưng Thẩm Định Trạch lại ngẩng đầu với vẻ mặt rất bình tĩnh, khóe miệng lộ ra ý cười: “Nếu ông chủ Hướng không có thành ý, chúng tôi cần gì phải ngồi xuống lãng phí thời gian!”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Sắc mặt Hướng Việt thay đổi, lập tức thu lại vẻ mặt tùy tiện, vội vàng tiến lên trước, ngay cả đầu cũng bất giác cúi thấp: “Là tôi nói sai rồi, tôi tự phạt ba ly xin lỗi anh, mong anh đại nhân đại lượng không tính toán lỗi lầm vô ý của tôi.” Lúc nói, ba ly rượu mạnh đã cạn sạch trong một hớp.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Ánh mắt thâm trầm của Thẩm Định Trạch quan sát Hướng Việt, chắc chắn Hướng Việt là người của Chu gia, điểm này không sai. Chuyện này từ khi bắt đầu đã thấy rõ sự kì lạ. Trong sòng bạc, rake và rakeback* đều là quy tắc được ngầm thừa nhận, dù cho có người muốn đánh chủ ý vào rakeback, trong trường hợp biết có liên quan đến Thẩm gia cũng sẽ không thừa nước ᴆục thả câu, vậy mà Hướng Việt vẫn cứ làm, tất nhiên anh không tin đối phương thật sự vì chút tiền đó, bởi vì suy cho cùng chuyện này không đem lại tổn thất gì cho anh.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">(* Rake và rakeback là quy tắc trong trò poker. Người chơi muốn tham gia ván bài sẽ phải chia hoa hồng cho sòng poker, thông thường là từ 3-5%, ví dụ bạn bỏ ra 100 đô, sòng bài sẽ lấy 5 đô, 95 đô còn lại sẽ thuộc về người thắng. Số tiền sòng poker thu chính là rake. Sòng poker luôn trả lại cho bạn một phần số tiền rake đã thu nhằm khuyến khích bạn chơi nhiều hơn, đó gọi là rakeback, càng chơi nhiều số tiền hoàn trả sẽ càng lớn. Cre: sieubet.com)</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thẩm Định Trạch không tin Chu gia làm chuyện này mà không có lý do chính đáng nào, khả năng duy nhất là thông qua chuyện này để thu hút sự chú ý của anh. Hơn nữa, phản ứng vừa rồi của Hướng Việt càng chứng minh suy đoán của anh, rốt cuộc bọn họ muốn làm gì? Anh thật sự có chút tò mò.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thẩm Định Trạch không nói, Thẩm Trường Kim và Thẩm Trường Mộc đương nhiên cũng không lên tiếng.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thẩm Định Trạch đứng một cách nhàn nhã ung dung, bầu không khí trong phòng nhanh chóng đông cứng, ngay cả tiếng hít thở cũng trở nên có thể nghe thấy rõ ràng. Qua một lúc thật lâu, anh mới bước đến trực tiếp ngồi xuống, còn Hướng Việt không dám tùy tiện nữa, anh ta lau mồ hôi lạnh trên trán, cũng thở phào một hơi, chỉ cần hôm nay Thẩm Định Trạch không rời đi thì nhiệm vụ của anh ta xem như hoàn thành.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thức ăn do đích thân Quách Kiến An giám sát được mang lên bàn, đây cũng là cách tỏ rõ thái độ, thức ăn sẽ không do bất kì người nào làm chủ, dù là Hướng Việt hay là Thẩm Định Trạch, bất cứ một người nào xảy ra chuyện ở đây thì cái mạng nhỏ của ông ta không thể giữ nổi.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Trong thời gian dùng bữa, Hướng Việt luôn cẩn thận ở bên cạnh giải thích với Thẩm Định Trạch, chuyện đó tuyệt đối chỉ là hiểu lầm, quả thật anh ta có tham gia, nhưng cũng là bị người ta lừa gạt, bọn họ nói phải đến sòng bạc làm vài ván lớn nên Hướng Việt mới dám giới thiệu bọn họ đến chỗ này.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thái độ của Thẩm Định Trạch không lạnh không nóng, nhưng rượu Hướng Việt kính anh vẫn uống một ly.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Không ai tin chuyện này chỉ đơn giản như vậy, nếu không phải Thẩm Trường Mộc kéo, Thẩm Trường Kim còn hận không thể đoạt lấy ly rượu trong tay Thẩm Định Trạch, uống nó thay anh.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thẩm Định Trạch biết thức ăn này sẽ không có vấn đề gì, lý do rất đơn giản, bất kể là Hướng Việt hay Quách Kiến An đều là kẻ tham sống sợ ૮ɦếƭ, sẽ không sẵn lòng vì người khác mà bán mạng, một khi anh xảy ra chuyện thì những người ở đây hôm nay đừng hòng trốn thoát dù chỉ một người.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Tay phải Thẩm Định Trạch gõ gõ bàn, Hướng Việt nhanh chóng chú ý đến, sợ Thẩm Định Trạch không kiên nhẫn nên anh ta nháy mắt với thuộc hạ của mình: “Chỉ có mấy người chúng ta uống rượu cũng không thú vị gì lắm, nghe nói một trong những thứ đặc sắc nhất ở đây của ông chủ Quách chính là mỹ nữ, chi bằng chúng ta gặp thử xem.”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thẩm Trường Kim và Thẩm Trường Mộc bốn mắt nhìn nhau, trong đầu cùng lúc xuất hiện ba chữ- mỹ nhân kế?</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Thẩm Định Trạch dừng việc gõ bàn, trên mặt vẫn không có quá nhiều biểu cảm, chỉ là trong lòng anh lại lơ đãng, hóa ra là đang đợi trò này. Từ xưa đến nay, mỹ nhân kế đã trở thành một điều bình thường, nhưng không thể phủ nhận được tầm quan trọng của nó, phụ nữ rất nhiều lúc bị đàn ông khinh thường mang đi làm công cụ, nhưng cũng rất nhiều lúc sẽ vì phụ nữ mà thua không còn manh giáp.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Hướng Việt thấy Thẩm Định Trạch không lên tiếng phản đối, trong lòng liền ổn định lại, cơ thể cũng buông lỏng theo.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Quách Kiến An vô cùng thông minh, lập tức tự mình dẫn người đến, chẳng bao lâu, mấy cô gái trẻ tuổi xinh đẹp đẩy cửa bước vào, khí chất của mỗi người không giống nhau, trong sáng, dễ thương, kiều diễm,… không có một khí chất nào trùng lặp, nếu không phải xuất hiện ở nơi này, có lẽ còn cho rằng các cô ấy xuất thân từ gia đình đoan chính, trên người không có chút xíu vẻ phong trần nào.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Tuy các cô gái đều rất xinh đẹp, nhưng vẫn có một con hạc đứng giữa bầy gà, khiến người ta không dời nổi mắt. Hướng Việt nhìn chằm chằm, cô gái này thật xinh đẹp, vừa đơn thuần lại xinh xắn, đúng kiểu đàn ông thích nhất. Hướng Việt hắng giọng một tiếng: “Còn đứng đó làm gì?” Vừa nói vừa nhìn Thẩm Định Trạch.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Các cô gái rất có mắt nhìn, nhanh chóng ngồi vào chỗ, hơn nữa còn ngồi ở nơi không xa không gần.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Dương Mĩ Na nhìn Thẩm Định Trạch một cái, vẻ mặt hơi ửng đỏ, cắn môi, sau đó ngồi bên cạnh Thẩm Định Trạch, cô ta nhỏ giọng lên tiếng: “Em tên là Na Na.”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Hướng Việt một mực nhìn Thẩm Định Trạch chăm chú, thấy biểu hiện của Dương Mĩ Na, anh ta cười cười, thuận tay ôm vai cô gái bên cạnh, một tay khác nâng ly rượu lên: “Anh Trạch, tôi thật lòng xin lỗi anh, không biết anh có bằng lòng tha thứ cho tôi không?”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Dương Mĩ Na không hề ngốc, cô ta lập tức rót rượu đầy ly cho Thẩm Định Trạch, chuẩn bị đưa cho anh, nhưng một ánh mắt của Thẩm Định Trạch vừa lia tới, cô ta tức khắc không dám có bất kỳ động tác nào, ly rượu suýt chút nữa cũng bị rơi mất. Dương Mĩ Na rất xinh đẹp, cô ta từng thấy ánh mắt của rất nhiều người đàn ông nhìn cô ta, nhưng chưa từng thấy ánh mắt nào như anh, giống như bản thân chỉ là một món đồ đơn thuần, hoặc nói là một vật thể ૮ɦếƭ, khiến cô ta không dám nảy sinh tâm tư của thiếu nữ nữa.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Chỉ có một loại người, sau khi anh ấy xuất hiện lập tức thu hút ánh mắt của tất cả mọi người, giống như một vật thể phát sáng. Mọi người đều nhìn Thẩm Định Trạch, nhưng anh lại nhìn chằm chằm ly rượu trên bàn, vừa rồi Dương Mĩ Na run tay làm rơi chút rượu lên bàn. Thẩm Trường Mộc đang định đổi ly rượu khác cho anh, đúng lúc này anh lại cầm ly rượu lên, anh không uống mà lắc vài cái, dường như tim của mọi người cũng lắc lư theo thứ chất lỏng trong ly của anh, cuối cùng anh dừng lại, ly rượu khẽ nghiêng, dựa vào ánh đèn trên trần nhà và góc độ này vừa khéo có thể để anh nhìn thấy rõ ràng vị trí của Hướng Việt, chính xác hơn mà nói là vị trí của cô gái ngồi bên cạnh Hướng Việt.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Cô gái mặc một chiếc váy dài màu trắng để lộ cánh tay, nhìn có vẻ tùy ý nhưng đã trải qua quá trình trang điểm ăn mặc công phu, mà giờ phút này, tay của Hướng Việt đang đặt lên phần da thịt cô để lộ ra ngoài.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Không ai phát hiện tay của Thẩm Định Trạch khẽ siết chặt, sau đó anh mỉm cười: “Nhờ phúc của anh tôi mới có thể thấy được điểm đặc sắc của nơi này, nói gì mà tha thứ với không tha thứ chứ?”</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Anh uống một ngụm rượu, tay ôm vai Dương Mĩ Na một cách tự nhiên.</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:robotoregular; font-size:17px\">Hướng Việt bật cười ha ha, rốt cuộc bầu không khí cũng bắt đầu sôi nổi lên.</span></p>', '', 1, '2023-04-12 09:15:36', '2023-04-12 09:16:03', 1),
(4, 'Test', 1, NULL, 1, 7, '/storage/images/stories/anh-cute-tho-di-xe-may.jpg', '<p>test</p>', NULL, 0, '2023-05-15 09:01:05', '2023-05-15 09:01:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `traffics`
--

CREATE TABLE `traffics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `traffics`
--

INSERT INTO `traffics` (`id`, `user_token`, `created_at`, `updated_at`) VALUES
(1, '6a57d1bf344d6cc4553de99a091a1ec8415a242d52c884d699fe327db0ec5591', '2023-05-12 09:19:35', '2023-05-12 09:19:35'),
(3, 'bb621b91f337c01b1673e36da2c1d908923fd99fd29551d73dff36c33e8f58b7', '2023-05-12 09:41:48', '2023-05-12 09:41:48'),
(4, 'f954a1702165fd5a2b9ce2bc949552466b0d2c8cb453b0d67419cd3b86db0bd8', '2023-05-12 09:44:23', '2023-05-12 09:44:23'),
(5, 'c1f7b4d4b2d6ed373e9c4490c616384ea0deb95b2540128c728fdfe49066e273', '2023-05-12 09:46:24', '2023-05-12 09:46:24'),
(6, '7fd99fdd866b70383dc999e06580c3337331edc4f1a23f6cc59103eba5caa81d', '2023-05-12 09:48:17', '2023-05-12 09:48:17'),
(7, 'd0d9ecad1380928d58e6aefabf5576850d8417cff53621e8e372536b9943715e', '2023-05-13 16:31:47', '2023-05-13 16:31:47'),
(8, '17e9fee669ce3fe8aafd58ae49d4a9589f8137855ba9db13ebb3b87328c8b29c', '2023-05-15 08:14:17', '2023-05-15 08:14:17'),
(9, 'a2b3e0177c0e66a41869d6dbcdd20aeb0012568aee867580b2875186e42883d5', '2023-05-16 01:45:53', '2023-05-16 01:45:53'),
(10, '6e8722f1d6db39e414c8ae93f8886d8d8fe3d1b21969027366a98c9c1efa1ba6', '2023-05-17 02:55:09', '2023-05-17 02:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `introduce`, `facebook`, `instagram`, `tiktok`, `twitter`, `avatar`, `provider`, `provider_id`, `access_token`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Phương Anh', 'phuonganh@gmail.com', NULL, '$2y$10$4frmtZfSNSEyGW6fP3DOe.Td/wKpgOPZyPy3hDsAu.6JzeNAU6m2u', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'g9IZpA0LWp5bS7MOEGo1xLDADuy4WQtxXOn87DbLg1lDaGOaLPL2MZWVHNw1', '2023-04-02 10:05:34', '2023-05-15 16:39:35', 1),
(2, 'Đỗ Phương Anh', 'dophuonganh9062@gmail.com', NULL, '$2y$10$CUQuQxNPEgipujjHv8J.5eagUsnnduutFN2cXVAAVat3ivKq1uNd2', NULL, NULL, 'http://www.instagram.com/averykeelan', 'https://vm.tiktok.com/ZMe4nDHHt/', 'https://www.twitter.com/averykeelan', '/storage/images/avatars/anh-cute-tho-di-xe-may.jpg', NULL, NULL, NULL, 'bYlOVLq25n5itmHgHh4Jkd9MTWX7AvlLAJvPsvp3MVrJ3bILjEu8lY6Ad7fk', '2023-04-02 10:09:02', '2023-05-16 04:52:38', 1),
(3, 'Test', 'test@gmail.com', NULL, '$2y$10$xddEi.nSXdEgwcJ0nzAddOiu7hGj41UlB5edqdxM5CB8FDs/njmu2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nZcFWoEZD2lqdkel0Vn7gwYuajW2FZzUxwWKFH2uXefIyYNljUKab6maPPgv', '2023-04-28 15:40:36', '2023-04-28 15:40:36', 1),
(4, 'Luân Nguyễn', 'nguyenhuuluan17@gmail.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AGNmyxZxZ8QM3QMjDrRvhNXkFVt1sJNqdGJfURqoeHMKZg=s96-c', NULL, NULL, NULL, 'WPS2LSxXULlvbeIsZu8iZSewVLehXafeJXqZBdKyY8M3ug7Wya1wDYWaWpVN', '2023-05-10 16:19:03', '2023-05-10 16:19:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `story_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `story_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-04-12 09:14:00', '2023-04-12 09:14:00'),
(3, 2, 2, '2023-05-16 03:08:33', '2023-05-16 03:08:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `admins_email_unique` (`email`) USING BTREE;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `chapters_story_id_index` (`story_id`) USING BTREE;

--
-- Indexes for table `chapter_view_logs`
--
ALTER TABLE `chapter_view_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapter_view_logs_chapter_id_index` (`chapter_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `comments_user_id_index` (`user_id`) USING BTREE,
  ADD KEY `comments_story_id_index` (`story_id`) USING BTREE;

--
-- Indexes for table `cookie_user_chapter`
--
ALTER TABLE `cookie_user_chapter`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `cookie_user_chapter_chapter_id_index` (`chapter_id`) USING BTREE,
  ADD KEY `cookie_user_chapter_story_id_index` (`story_id`) USING BTREE,
  ADD KEY `cookie_user_chapter_user_token_unique` (`user_token`(768)) USING HASH;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `follows_author_id_index` (`author_id`) USING BTREE,
  ADD KEY `follows_follower_id_index` (`follower_id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`) USING BTREE;

--
-- Indexes for table `parent_categories`
--
ALTER TABLE `parent_categories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE;

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ratings_user_id_index` (`user_id`) USING BTREE,
  ADD KEY `ratings_story_id_index` (`story_id`) USING BTREE;

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `stories_user_id_index` (`user_id`) USING BTREE,
  ADD KEY `stories_parent_category_id_index` (`parent_category_id`) USING BTREE,
  ADD KEY `stories_category_id_index` (`category_id`) USING BTREE;

--
-- Indexes for table `traffics`
--
ALTER TABLE `traffics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `traffics_user_token_unique` (`user_token`) USING HASH;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `wishlists_story_id_index` (`story_id`) USING BTREE,
  ADD KEY `wishlists_user_id_index` (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chapter_view_logs`
--
ALTER TABLE `chapter_view_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cookie_user_chapter`
--
ALTER TABLE `cookie_user_chapter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `parent_categories`
--
ALTER TABLE `parent_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `traffics`
--
ALTER TABLE `traffics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chapter_view_logs`
--
ALTER TABLE `chapter_view_logs`
  ADD CONSTRAINT `chapter_view_logs_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cookie_user_chapter`
--
ALTER TABLE `cookie_user_chapter`
  ADD CONSTRAINT `cookie_user_chapter_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cookie_user_chapter_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follows_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `stories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `parent_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
