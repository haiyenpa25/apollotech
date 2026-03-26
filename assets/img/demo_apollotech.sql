-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 26, 2026 lúc 03:03 AM
-- Phiên bản máy phục vụ: 10.11.16-MariaDB-ubu2204
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo_apollotech`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_contents`
--

CREATE TABLE `cms_contents` (
  `id` int(11) NOT NULL,
  `page` varchar(100) NOT NULL,
  `key_name` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `lang` varchar(10) NOT NULL DEFAULT 'vi',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_contents`
--

INSERT INTO `cms_contents` (`id`, `page`, `key_name`, `value`, `lang`, `updated_at`) VALUES
(1, 'global', 'footer_col1', 'SITE MAP', 'vi', '2026-03-23 03:26:34'),
(2, 'he-thong-thong-tin-lien-lac', 'sol2_i3', 'Hệ thống Ăng-ten chia sẻ đa nhà mạng', 'vi', '2026-03-23 03:26:34'),
(3, 'index', 'hero_desc_2', 'Với hệ thống quản lý chất lượng đạt tiêu chuẩn quốc tế ISO 9001:2015, chúng tôi cam kết mang đến sự chuyên nghiệp và chuẩn mực trong từng dự án. Với tiềm lực mạnh mẽ và đội ngũ chuyên gia giàu kinh nghiệm, Apollo Technologies tự tin là đối tác chiến lược cung cấp các giải pháp toàn diện bao gồm:                ', 'vi', '2026-03-23 03:26:34'),
(4, 'index', 'vl_sect_desc', 'Apollo Technologies không chỉ cung cấp dịch vụ, chúng tôi đồng hành cùng sự phát triển của bạn thông qua những giải pháp công nghệ tiên tiến cùng chính sách ưu đãi vượt trội.                ', 'vi', '2026-03-23 03:26:34'),
(5, 'index', 'vl_card1_d', 'Chúng tôi cam kết mang đến hệ sinh thái sản phẩm và dịch vụ đạt tiêu chuẩn chất lượng cao. Bằng việc liên tục nghiên cứu và ứng dụng các công nghệ mới, Apollo Technologies nỗ lực tối ưu hóa trải nghiệm, giúp khách hàng bứt phá trong kỷ nguyên số.', 'vi', '2026-03-23 03:26:34'),
(6, 'index', 'stat_4_num', '5', 'vi', '2026-03-23 03:26:34'),
(7, 'index', 'cta_title', '\n            Apollo Technologies là đối tác tin cậy<br>cung cấp các giải pháp công nghệ hiện đại        ', 'vi', '2026-03-23 03:26:34'),
(8, 'news', '0', '{\"id\":\"item_69bbb94d73999\",\"slug\":\"chatgpt-dang-ngon-tai-nguyen-vuot-tam-kiem-soat\",\"title\":\"ChatGPT đang \'ngốn\' tài nguyên vượt tầm kiểm soát\",\"date\":\"19\\/03\\/2026\",\"category\":\"Xu hướng & Thị trường\",\"excerpt\":\"Nhu cầu tài nguyên của ChatGPT đang ngày càng trở nên quá tải.\",\"content\":\"<h2>Nhu cầu tài nguyên của ChatGPT đang ngày càng trở nên quá tải.                          <\\/h2><p>Theo <em>Digital Trends<\\/em>, một nghiên cứu mới cho thấy chatbot AI nổi tiếng ChatGPT của OpenAI đang tiêu tốn một lượng lớn tài nguyên nước và điện, đặt ra những lo ngại về tác động môi trường của công nghệ trí tuệ nhân tạo (AI).<\\/p><p>Theo nghiên cứu, lượng nước cần thiết để <a class=\\\"seo-suggest-link link-inline-content\\\" href=\\\"https:\\/\\/thanhnien.vn\\/nguoi-tre-ua-chuong-su-dung-chatgpt-de-xin-viec-lam-185240815095040408.htm\\\" target=\\\"_blank\\\" title=\\\"Người trẻ ưa chuộng sử dụng ChatGPT để xin việc làm\\\">ChatGPT<\\/a> soạn một email 100 từ có thể lên tới 1,4 lít, tùy thuộc vào vị trí địa lý của trung tâm dữ liệu. Điều này là do nhiều trung tâm dữ liệu AI hiện nay sử dụng hệ thống làm mát bằng chất lỏng, đòi hỏi lượng nước lớn để vận hành.<\\/p><p><br><\\/p><p>Ngoài ra, việc sử dụng ChatGPT cũng tiêu tốn một lượng <a class=\\\"seo-suggest-link link-inline-content\\\" href=\\\"https:\\/\\/thanhnien.vn\\/iphone-17-pro-se-trang-bi-chip-2nm-do-tsmc-san-xuat-185240415100953328.htm\\\" target=\\\"_blank\\\" title=\\\"iPhone 17 Pro sẽ trang bị chip 2nm do TSMC sản xuất \\\">điện năng<\\/a> đáng kể. Nếu chỉ 1\\/10 dân số Mỹ sử dụng ChatGPT để viết một email 100 từ mỗi tuần, lượng điện tiêu thụ sẽ tương đương với toàn bộ hộ gia đình ở thủ đô Washington (Mỹ) trong 20 ngày.<\\/p><p>Đây không phải là vấn đề riêng của ChatGPT. Các mô hình AI khác như Llama 3.1 của Meta hay siêu máy tính của xAI cũng đòi hỏi lượng nước và điện khổng lồ để huấn luyện và vận hành.<\\/p><p>Gần đây, cũng đã có báo cáo về việc AI tạo sinh có thể khiến lượng <a class=\\\"seo-suggest-link link-inline-content\\\" href=\\\"https:\\/\\/thanhnien.vn\\/ai-tao-sinh-khien-luong-khi-thai-carbon-tang-gap-ba-lan-185240910095525115.htm\\\" target=\\\"_blank\\\" title=\\\"AI tạo sinh khiến lượng khí thải carbon tăng gấp ba lần\\\">khí thải carbon<\\/a> phát ra môi trường tăng gấp ba lần, nguyên nhân cũng chính từ các trung tâm dữ liệu. Cụ thể, báo cáo của Morgan Stanley dự đoán ngành công nghiệp trung tâm dữ liệu có thể thải ra tới 2,5 tỉ tấn khí nhà kính vào năm 2030, gấp ba lần so với dự đoán nếu không có sự xuất hiện của AI tạo sinh.<\\/p><p>Từ những con số của nghiên cứu trên cho thấy sự phát triển nhanh chóng của AI tạo sinh đang đặt ra những thách thức lớn về tài nguyên và <a class=\\\"seo-suggest-link link-inline-content\\\" href=\\\"https:\\/\\/thanhnien.vn\\/airpods-4-khong-co-cap-sac-khi-ra-mat-185240913204514179.htm\\\" target=\\\"_blank\\\" title=\\\"AirPods 4 không có cáp sạc khi ra mắt\\\">môi trường<\\/a>. Mục tiêu tiên quyết của những công ty công nghệ lớn là cần tìm kiếm các giải pháp bền vững hơn để giảm thiểu tác động tiêu cực của công nghệ này đến tài nguyên môi trường.<\\/p><p><em>Nguồn sưu tầm: <\\/em><a href=\\\"https:\\/\\/thanhnien.vn\\/chatgpt-dang-ngon-tai-nguyen-vuot-tam-kiem-soat-185240921085802019.htm\\\" target=\\\"_blank\\\"><em>https:\\/\\/thanhnien.vn\\/chatgpt-dang-ngon-tai-nguyen-vuot-tam-kiem-soat-185240921085802019.htm<\\/em><\\/a><\\/p>\",\"image\":\"https:\\/\\/images2.thanhnien.vn\\/zoom\\/1200_630\\/528068263637045248\\/2024\\/9\\/21\\/co2-emissions-ai-data-centers-1726884675197-1726884677548661678473-0-0-1046-2000-crop-1726884728452411590918.png\",\"featured\":false}', 'vi', '2026-03-23 03:35:31'),
(9, 'news', '1', '{\"id\":\"item_69bbb90a0510a\",\"slug\":\"chi-nguoi-viet-moi-co-the-lam-ra-san-pham-nay-trong-linh-vuc-5-000-ty-usd-cuu-giup-hang-nghin-nguoi\",\"title\":\"Chỉ người Việt mới có thể làm ra sản phẩm này trong lĩnh vực 5.000 tỷ USD, cứu giúp hàng nghìn người\",\"date\":\"19\\/03\\/2026\",\"category\":\"Xu hướng & Thị trường\",\"excerpt\":\"Việc làm ra sản phẩm này có thể góp phần hạn chế thiệt hại trong bão lũ cho người Việt Nam.\",\"content\":\"<p>  <\\/p><p>  Theo dự báo của Tập đoàn Dữ liệu quốc tế IDC, đến năm 2030,  <strong>   trí tuệ nhân tạo (AI) sẽ mang lại trị giá tương đương 5.000 tỷ USD cho kinh tế toàn cầu.  <\\/strong>  Công nghệ AI được coi là một trong những các ngành công nghệ chiến lược ở Việt Nam. <\\/p><p> <\\/p><p>  Đây cũng là một trong những nội dung được thảo luận trong cuộc làm việc của Phó Thủ tướng Nguyễn Chí Dũng với Mạng lưới Đổi mới sáng tạo và chuyên gia Việt Nam về phát triển các ngành công nghệ chiến lược, ngày 26\\/11, tại Trung tâm Đổi mới sáng tạo Quốc gia (NIC) cơ sở Hòa Lạc. <\\/p><p> <\\/p><p>  <strong>   <em>    Việt Nam cần làm gì để phát triển nhanh các ngành công nghệ chiến lược trong 1 - 2 năm tới?   <\\/em>  <\\/strong> <\\/p><p> <\\/p><p>  Để trả lời câu hỏi này, đặc biệt là phát triển AI, theo PGS-TS Nguyễn Phi Lê, điều hành Viện nghiên cứu và phát triển trí tuệ nhân tạo (AI4LIFE), ĐH Bách khoa Hà Nội,  <strong>   vấn đề cốt lõi là Việt Nam phải có nguồn lực.  <\\/strong> <\\/p><p> <\\/p><p><br><\\/p><p> <\\/p><p>  PGS phân tích, đặc biệt, chúng ta phải phát triển AI để giải quyết bài toán đặc thù của Việt Nam. Chẳng hạn, năm nay bão lũ xảy ra rất nhiều, cứ hết đợt này đến đợt khác. Các nước lớn ở trên thế giới như Mỹ, Trung Quốc, EU… có những mô hình lớn để dự báo thời tiết. Nhưng khi đem những mô hình lớn này về áp dụng với tình hình bão lũ của Việt Nam thì lại không hiệu quả, bởi họ huấn luyện dựa trên dữ liệu của thế giới. Hơn nữa, đặc trưng khí hậu của Việt Nam hoàn toàn khác với thế giới. <\\/p><p> <\\/p><p>  \\\"Do đó, muốn xây dựng những giải pháp AI đặc trưng cho Việt Nam thì bắt buộc phải là những người làm AI của Việt Nam và những chuyên gia khí tượng của nước ta ngồi làm cùng với nhau. Muốn làm được việc này thì cần phải có những người hiểu rất sâu về AI, làm rất giỏi về AI của Việt Nam thì mới làm được. Nhưng theo tôi, đội ngũ này ở Việt Nam là vô cùng mỏng\\\", PGS Nguyễn Phi Lê nhấn mạnh. <\\/p><p> <\\/p><h2 class=\\\"align-center\\\">  Đào tạo tầng lớp tinh hoa về AI, tạo sản phẩm chiến lược \\\"made in Vietnam\\\" <\\/h2><p> <\\/p><p><br><\\/p><p> <\\/p><p>  Xuất phát từ thực tế này, PGS Nguyễn Phi Lê kiến nghị với Phó Thủ tướng: \\\"Chúng ta trước tiên phải đẩy mạnh đào tạo tầng lớp tinh hoa về AI. Nói thẳng ra thì việc đào tạo AI ở các trường ĐH ở Việt Nam mới chỉ dừng lại chủ yếu ở bậc ĐH. Ở bậc này, sinh viên chỉ mới sử dụng được AI mà thôi, chứ không làm được các sản phẩm AI chuyên sâu\\\". <\\/p><p>                                                                             <\\/p><p>  Vị chuyên gia này giải thích, Việt Nam hơi ngược với thế giới là tỷ lệ sinh viên học sau ĐH rất thấp. Trong khi trên thế giới, tỷ lệ này lại ngang bằng nhau. Các bạn học sau ĐH ở Việt Nam nhiều khi còn không bằng các bạn học ĐH. Bởi những người giỏi nhất thì đi nước ngoài học và họ thường ở lại đó làm luôn. Như vậy, trình độ nhân lực AI và chất lượng cao ở Việt Nam là vô cùng thấp. Do đó, để giải bài toán này, không còn cách nào khác là chúng ta phải đào tạo tầng lớp tinh hoa về AI. <\\/p><p> <\\/p><p>  PGS Nguyễn Phi Lê đề xuất Việt Nam nên thành lập các cụm AI master, giống như Trung Quốc đã làm. Các cụm AI này sẽ quy tụ những trường ĐH hàng đầu của Việt Nam. Các công ty công nghệ có thể ra đề bài và các trường ĐH sẽ chọn ra những sinh viên giỏi nhất để đào tạo ở bậc thạc sĩ và tiến sĩ. Chúng ta có thể dùng chính những bài toán mà các doanh nghiệp đưa ra để đầu tư tiền cho các sinh viên học. Học xong, các bạn có thể làm việc tại các doanh nghiệp này. <\\/p><p> <\\/p><p>  \\\"Ngoài ra, ở các cụm AI này, chúng ta có thể kết nối với các chuyên gia ở những viện, trường hàng đầu trên thế giới. Bởi có nhiều người muốn đóng góp xây dựng và phát triển AI cho Việt Nam. Đây là cách để Việt Nam phát triển AI một cách bền vững và làm chủ công nghệ này\\\", PGS Nguyễn Phi Lê cho biết. <\\/p><p> <\\/p><p>  Nữ PGS chia sẻ: \\\"Thứ hai, về sản phẩm chiến lược, tôi thấy có một số sản phẩm mà chúng ta nên làm, chỉ có người Việt mới có thể làm được.  <strong>   Đầu tiên là AI trong khí tượng thủy văn (của Việt Nam - PV).  <\\/strong>  <strong>   Đây là thứ chỉ có Việt Nam mới làm được.  <\\/strong>  Bởi dữ liệu chúng ta có sẵn bao nhiêu năm qua và đội ngũ chuyên gia về khí tượng thủy văn và chuyên gia AI có thể làm được. Lũ lụt là vấn đề có tầm ảnh hưởng xã hội lớn và chúng ta có thể áp dụng AI để giải quyết\\\". <\\/p><p> <\\/p><h2 class=\\\"align-center\\\">  Giải quyết những \\\"bài toán lớn\\\" của đất nước hiện nay <\\/h2><p> <\\/p><p><br><\\/p><p> <\\/p><p>  Tại cuộc làm việc, với với Mạng lưới Đổi mới sáng tạo và chuyên gia, Phó Thủ tướng đề nghị bám sát chủ trương của Đảng, Nhà nước, nhất là Nghị quyết 57, 11 ngành công nghệ chiến lược và giải quyết những \\\"bài toán lớn\\\" của đất nước hiện nay. <\\/p><p> <\\/p><p>  Ngoài ra, Phó Thủ tướng đề nghị mạng lưới chủ động nghiên cứu, đề xuất chương trình hợp tác quốc tế, kết nối chuyên gia Việt Nam trong và ngoài nước vào các dự án ngắn và dự án chiến lược. Đồng thời tích cực tham gia phản biện chính sách, xây dựng chiến lược, chính sách, chuyển giao tri thức, đào tạo chuyên gia và cố vấn công nghệ; cũng như huy động nguồn lực quốc tế, hình thành các trung tâm R&amp;D, hỗ trợ đào tạo, triển khai các sản phẩm… <\\/p><p> <\\/p><p>  Theo Phó Thủ tướng, xây dựng và phát triển các ngành công nghệ chiến lược là yêu cầu tất yếu, nhiệm vụ trọng tâm và lâu dài, nâng cao năng lực cạnh tranh để giúp Việt Nam phát triển đột phá, nhanh, bền vững. Hơn nữa, đây cũng là con đường ngắn nhất để Việt Nam bắt kịp, tiến cùng, vượt lên để bứt phá trở thành quốc gia phát triển, thịnh vượng và tự cường. <\\/p><p> <\\/p><p>  Nhiệm vụ này đòi hỏi sự vào cuộc của toàn bộ hệ thống chính trị, sự chung tay của người dân và cộng đồng doanh nghiệp và đặc biệt là sự dấn thân của đội ngũ chuyên gia, nhà khoa học, sự đồng hành của bạn bè quốc tế. <\\/p><p><br><\\/p>\",\"image\":\"https:\\/\\/cafefcdn.com\\/thumb_w\\/1200\\/203337114487263232\\/2025\\/11\\/27\\/avatar1764227594479-1764227594873727350620.jpg\",\"featured\":false}', 'vi', '2026-03-23 03:35:31'),
(10, 'news', '2', '{\"id\":\"item_69bbb49242995\",\"slug\":\"tai-sao-gia-ram-tang-2026-ram-tang-gia-phai-lam-sao\",\"title\":\"Tại sao giá RAM tăng 2026? RAM tăng giá phải làm sao?\",\"date\":\"19\\/03\\/2026\",\"category\":\"Xu hướng & Thị trường\",\"excerpt\":\"Giá RAM tăng mạnh thời gian gần đây khiến nhiều người lo lắng. Tại sao giá RAM tăng đột biến? RAM tăng giá cho đến khi nào? Click ngay!\",\"content\":\"<p><em>Nguồn sưu tầm: <a href=\\\"https:\\/\\/dienthoaivui.com.vn\\/tin-tuc\\/gia-ram-tang\\\" target=\\\"_blank\\\">https:\\/\\/dienthoaivui.com.vn\\/tin-tuc\\/gia-ram-tang<\\/a><\\/em><\\/p><p><br><\\/p><p style=\\\"text-align: justify;\\\"><strong>Giá RAM tăng<\\/strong> đang trở thành chủ đề được nhiều người quan tâm trong thị trường linh kiện máy tính. Tình trạng RAM tăng giá liên tục khiến chi phí nâng cấp PC, laptop và máy chủ trở nên đắt đỏ hơn. Vậy tại sao giá RAM tăng mạnh trong thời gian gần đây và người dùng nên làm gì khi giá linh kiện này leo thang? Hãy cùng tìm hiểu nguyên nhân và cách ứng phó trong bài viết dưới đây.<\\/p><h2 style=\\\"text-align: justify;\\\"><strong>Tại sao giá RAM tăng 2026?<\\/strong><\\/h2><p style=\\\"text-align: justify;\\\"><a href=\\\"https:\\/\\/dienthoaivui.com.vn\\/tin-tuc\\/gia-ram-tang\\\"><strong>Giá RAM tăng<\\/strong><\\/a> 2026 đang trở thành vấn đề được nhiều người dùng máy tính và game thủ quan tâm khi chi phí nâng cấp PC ngày càng cao. Vậy đâu là nguyên nhân khiến RAM tăng giá trong thời gian gần đây? Hãy cùng theo dõi các lý do chi tiết ngay bên dưới nhé.<\\/p><h3 style=\\\"text-align: justify;\\\"><strong>Sự bùng nổ AI khiến nguồn cung RAM cho PC bị thu hẹp<\\/strong><\\/h3><p style=\\\"text-align: justify;\\\">Sự bùng nổ của AI và nhu cầu mở rộng trung tâm dữ liệu là nguyên nhân lớn khiến giá RAM tăng mạnh. Để huấn luyện mô hình AI, vận hành chatbot và xử lý dữ liệu lớn, các doanh nghiệp công nghệ phải đầu tư nhiều máy chủ hiệu năng cao với nhu cầu DRAM và HBM rất lớn.<\\/p><p style=\\\"text-align: justify;\\\"><img loading=\\\"lazy\\\" src=\\\"https:\\/\\/image.dienthoaivui.com.vn\\/x,webp,q90\\/https:\\/\\/dashboard.dienthoaivui.com.vn\\/uploads\\/dashboard\\/editor_upload\\/gia-ram-tang-1.jpg\\\" width=\\\"840\\\" height=\\\"500\\\" alt=\\\"Tại sao giá RAM tăng?\\\"><\\/p><p style=\\\"text-align: justify;\\\">Khi các hãng sản xuất ưu tiên nguồn lực cho RAM server và HBM phục vụ AI, nguồn cung RAM cho PC và laptop bị thu hẹp. Điều này khiến DRAM tăng giá, kéo theo giá RAM bán lẻ leo thang và người dùng phổ thông phải mua linh kiện với mức giá cao hơn trước.<\\/p><h3 style=\\\"text-align: justify;\\\"><strong>Chiến lược cắt giảm sản lượng của các “ông lớn”<\\/strong><\\/h3><p style=\\\"text-align: justify;\\\">Sau giai đoạn 2023-2024 khi giá RAM rẻ kỷ lục và thị trường dư cung. Nhiều nhà sản xuất bộ nhớ lớn như Samsung, SK Hynix và Micron đã chủ động cắt giảm sản lượng. Đây là chiến lược quen thuộc của ngành bán dẫn nhằm cân bằng lại cung cầu và bảo vệ biên lợi nhuận.<\\/p><p style=\\\"text-align: justify;\\\"><img loading=\\\"lazy\\\" src=\\\"https:\\/\\/image.dienthoaivui.com.vn\\/x,webp,q90\\/https:\\/\\/dashboard.dienthoaivui.com.vn\\/uploads\\/dashboard\\/editor_upload\\/gia-ram-tang-2.jpg\\\" width=\\\"840\\\" height=\\\"500\\\" alt=\\\"Chiến lược cắt giảm sản lượng của các “ông lớn”\\\"><\\/p><p style=\\\"text-align: justify;\\\">Việc giảm sản lượng khiến lượng chip nhớ tung ra thị trường thấp hơn trước. Khi nhu cầu bắt đầu phục hồi, đặc biệt từ các trung tâm dữ liệu và hệ thống AI, nguồn cung RAM nhanh chóng trở nên hạn chế. Điều này góp phần đẩy giá DRAM và RAM thương mại tăng mạnh trở lại.<\\/p><h3 style=\\\"text-align: justify;\\\"><strong>Sự chuyển dịch sang chuẩn DDR5<\\/strong><\\/h3><p style=\\\"text-align: justify;\\\">Thị trường bộ nhớ cũng đang trải qua giai đoạn chuyển đổi từ DDR4 sang DDR5. Các nhà sản xuất dần ưu tiên dây chuyền cho chuẩn RAM mới để phục vụ nền tảng CPU và máy chủ thế hệ mới.<\\/p><p style=\\\"text-align: justify;\\\"><img loading=\\\"lazy\\\" src=\\\"https:\\/\\/image.dienthoaivui.com.vn\\/x,webp,q90\\/https:\\/\\/dashboard.dienthoaivui.com.vn\\/uploads\\/dashboard\\/editor_upload\\/gia-ram-tang-3.jpg\\\" width=\\\"840\\\" height=\\\"500\\\" alt=\\\"Sự chuyển dịch sang chuẩn DDR5\\\"><\\/p><p style=\\\"text-align: justify;\\\">Tuy nhiên, quá trình chuyển đổi công nghệ không diễn ra ngay lập tức. Trong giai đoạn quá độ, nguồn cung DDR4 có thể bị suy giảm trong khi DDR5 vẫn chưa đạt sản lượng lớn. Điều này khiến thị trường RAM nói chung dễ rơi vào tình trạng thiếu hụt cục bộ và giá bán tăng lên.<\\/p><h3 style=\\\"text-align: justify;\\\"><strong>Biến động địa chính trị và logistics<\\/strong><\\/h3><p style=\\\"text-align: justify;\\\">Chuỗi cung ứng bán dẫn toàn cầu chịu ảnh hưởng lớn từ các yếu tố địa chính trị và logistics. Những căng thẳng thương mại, hạn chế xuất khẩu công nghệ hay các vấn đề vận chuyển quốc tế đều có thể làm gián đoạn quá trình sản xuất và phân phối chip nhớ.<\\/p><p style=\\\"text-align: justify;\\\"><img loading=\\\"lazy\\\" src=\\\"https:\\/\\/image.dienthoaivui.com.vn\\/x,webp,q90\\/https:\\/\\/dashboard.dienthoaivui.com.vn\\/uploads\\/dashboard\\/editor_upload\\/gia-ram-tang-4.jpg\\\" width=\\\"840\\\" height=\\\"500\\\" alt=\\\"Biến động địa chính trị và logistics\\\"><\\/p><p style=\\\"text-align: justify;\\\">Khi chi phí vận chuyển tăng hoặc nguồn cung linh kiện bị chậm trễ, giá thành RAM trên thị trường cũng có xu hướng tăng theo. Dù không phải nguyên nhân chính, các yếu tố này vẫn góp phần làm thị trường bộ nhớ trở nên biến động hơn trong thời gian gần đây.<\\/p><h2 style=\\\"text-align: justify;\\\"><strong>RAM tăng giá ảnh hưởng như thế nào?<\\/strong><\\/h2><p style=\\\"text-align: justify;\\\">Giá RAM tăng không chỉ khiến người dùng phải chi nhiều tiền hơn mà còn tạo ra nhiều tác động đến thị trường nói chung. Từ chi phí build PC, giá laptop cho đến hạ tầng máy chủ của doanh nghiệp đều có thể bị ảnh hưởng. Dưới đây là những tác động rõ rệt nhất khi RAM tăng giá trên thị trường hiện nay.<\\/p><h3 style=\\\"text-align: justify;\\\"><strong>Người dùng tốn nhiều chi phí hơn khi nâng cấp máy tính<\\/strong><\\/h3><p style=\\\"text-align: justify;\\\">Khi RAM tăng giá, chi phí nâng cấp PC hoặc laptop cũng tăng theo đáng kể. Trước đây, người dùng có thể dễ dàng nâng cấp từ 8GB lên 16GB RAM với mức chi phí khá thấp. Nhưng khi giá bộ nhớ tăng, việc nâng cấp này trở nên đắt đỏ hơn.<\\/p><h3 style=\\\"text-align: justify;\\\"><strong>Laptop và PC tăng giá theo hoặc bị giảm cấu hình<\\/strong><\\/h3><p style=\\\"text-align: justify;\\\">RAM là một trong những linh kiện quan trọng của máy tính. Vì vậy khi giá RAM tăng, các hãng sản xuất laptop và PC cũng phải điều chỉnh chi phí sản xuất. Trong nhiều trường hợp, giá bán của laptop hoặc máy tính lắp sẵn có thể tăng nhẹ để bù chi phí linh kiện. Nếu không tăng giá, nhà sản xuất có thể lựa chọn giảm cấu hình RAM mặc định trên một số dòng máy để giữ mức giá cạnh tranh.<\\/p><h3 style=\\\"text-align: justify;\\\"><strong>Doanh nghiệp và trung tâm dữ liệu chịu áp lực chi phí<\\/strong><\\/h3><p style=\\\"text-align: justify;\\\">Không chỉ người dùng cá nhân, các doanh nghiệp vận hành hệ thống máy chủ cũng bị ảnh hưởng khi RAM tăng giá. Máy chủ và hệ thống lưu trữ dữ liệu thường cần dung lượng RAM rất lớn để xử lý khối lượng công việc nặng.<\\/p><p style=\\\"text-align: justify;\\\"><img loading=\\\"lazy\\\" src=\\\"https:\\/\\/image.dienthoaivui.com.vn\\/x,webp,q90\\/https:\\/\\/dashboard.dienthoaivui.com.vn\\/uploads\\/dashboard\\/editor_upload\\/gia-ram-tang-5.jpg\\\" width=\\\"840\\\" height=\\\"500\\\" alt=\\\"RAM tăng giá ảnh hưởng như thế nào?\\\"><\\/p><p style=\\\"text-align: justify;\\\">Khi giá bộ nhớ tăng, chi phí đầu tư hạ tầng công nghệ thông tin của doanh nghiệp cũng tăng theo. Từ đó có thể ảnh hưởng đến ngân sách vận hành và kế hoạch mở rộng hệ thống trong tương lai.<\\/p><h2 style=\\\"text-align: justify;\\\"><strong>Bảng giá RAM tăng 2026 so với 2025<\\/strong><\\/h2><p style=\\\"text-align: justify;\\\">Thị trường RAM trong thời gian gần đây ghi nhận mức tăng giá khá mạnh, đặc biệt vào cuối năm 2025. Theo nhiều báo cáo thị trường, giá RAM DDR4 đã tăng đáng kể do các hãng sản xuất chuyển hướng sang những dòng bộ nhớ phục vụ AI và trung tâm dữ liệu.<\\/p><p style=\\\"text-align: justify;\\\">Dưới đây là bảng giá RAM mà bạn có thể tham khảo (cập nhật T3\\/2026):<\\/p><p>\\r\\n\\r\\n\\r\\n\\r\\n<\\/p><p><strong>Loại RAM<\\/strong><\\/p><p>\\r\\n\\r\\n\\r\\n<\\/p><p><strong>Giá trung bình 2025 (VNĐ)<\\/strong><\\/p><p>\\r\\n\\r\\n\\r\\n<\\/p><p><strong>Giá trung bình 2026 (VNĐ)<\\/strong><\\/p><p>\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n<\\/p><p><strong>DDR4 8GB (Bus 3200)<\\/strong><\\/p><p>\\r\\n\\r\\n\\r\\n<\\/p><p>450.000 - 600.000<\\/p><p>\\r\\n\\r\\n\\r\\n<\\/p><p>850.000 - 1.100.000<\\/p><p>\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n<\\/p><p><strong>DDR4 16GB (Bus 3200)<\\/strong><\\/p><p>\\r\\n\\r\\n\\r\\n<\\/p><p>900.000 - 1.200.000<\\/p><p>\\r\\n\\r\\n\\r\\n<\\/p><p>1.700.000 - 2.200.000<\\/p><p>\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n<\\/p><p><strong>DDR5 16GB (Bus 5600\\/6000)<\\/strong><\\/p><p>\\r\\n\\r\\n\\r\\n<\\/p><p>1.300.000 - 1.600.000<\\/p><p>\\r\\n\\r\\n\\r\\n<\\/p><p>2.400.000 - 3.000.000<\\/p><p>\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n<\\/p><p><strong>DDR5 32GB (Bus 6000+)<\\/strong><\\/p><p>\\r\\n\\r\\n\\r\\n<\\/p><p>2.600.000 - 3.200.000<\\/p><p>\\r\\n\\r\\n\\r\\n<\\/p><p>4.800.000 - 5.800.000<\\/p><p>\\r\\n\\r\\n\\r\\n\\r\\n<\\/p><p style=\\\"text-align: justify;\\\">Thị trường RAM năm 2026 đang trải qua một đợt biến động giá kỷ lục do sự bùng nổ của hạ tầng AI và chiến lược siết chặt nguồn cung từ các nhà sản xuất. Với mức tăng trung bình từ 80% đến 100%, người dùng phổ thông và các nhà sáng tạo nội dung đang phải đối mặt với chi phí sở hữu công nghệ cao nhất trong nhiều năm qua.<\\/p><p style=\\\"text-align: justify;\\\">Dự kiến tình trạng khan hàng và giá cao sẽ còn kéo dài ít nhất đến hết nửa đầu năm 2026, tạo nên một “điểm nghẽn” lớn cho việc nâng cấp cũng như mua sắm thiết bị công nghệ mới.<\\/p><h2 style=\\\"text-align: justify;\\\"><strong>Giá RAM còn tăng đến khi nào?<\\/strong><\\/h2><p style=\\\"text-align: justify;\\\">Theo nhiều dự báo thị trường, đà tăng giá RAM có thể tiếp tục kéo dài ít nhất đến đầu hoặc giữa năm 2026. Khi các hãng sản xuất mở rộng công suất nhà máy và cân bằng lại sản lượng giữa RAM cho AI và RAM tiêu dùng, thị trường mới có khả năng ổn định trở lại.<\\/p><p style=\\\"text-align: justify;\\\"><img loading=\\\"lazy\\\" src=\\\"https:\\/\\/image.dienthoaivui.com.vn\\/x,webp,q90\\/https:\\/\\/dashboard.dienthoaivui.com.vn\\/uploads\\/dashboard\\/editor_upload\\/gia-ram-tang-6.jpg\\\" width=\\\"840\\\" height=\\\"500\\\" alt=\\\"Giá RAM còn tăng đến khi nào?\\\"><\\/p><p style=\\\"text-align: justify;\\\">Tuy nhiên, mức tăng có thể không còn quá mạnh như giai đoạn cuối 2025 mà sẽ tăng chậm hơn hoặc dao động theo từng quý. Vì vậy, nếu đang có nhu cầu nâng cấp máy tính, người dùng nên theo dõi biến động giá RAM để lựa chọn thời điểm mua phù hợp.<\\/p><h2 style=\\\"text-align: justify;\\\"><strong>Giá RAM tăng đột biến phải làm sao?<\\/strong><\\/h2><p style=\\\"text-align: justify;\\\">Khi giá RAM tăng mạnh trong thời gian ngắn, nhiều người dùng có thể gặp khó khăn khi muốn nâng cấp hoặc build PC mới. Tuy nhiên, nếu lựa chọn đúng thời điểm và cấu hình phù hợp, bạn vẫn có thể tối ưu chi phí. Dưới đây là một số giải pháp giúp bạn hạn chế tác động khi RAM tăng giá.<\\/p><h3 style=\\\"text-align: justify;\\\"><strong>Chọn dung lượng RAM phù hợp với nhu cầu<\\/strong><\\/h3><p style=\\\"text-align: justify;\\\">Không phải lúc nào dung lượng RAM càng cao cũng cần thiết. Nếu chỉ sử dụng cho công việc văn phòng, học tập hoặc lướt web, 8GB RAM vẫn có thể đáp ứng tốt.<\\/p><p style=\\\"text-align: justify;\\\"><img loading=\\\"lazy\\\" src=\\\"https:\\/\\/image.dienthoaivui.com.vn\\/x,webp,q90\\/https:\\/\\/dashboard.dienthoaivui.com.vn\\/uploads\\/dashboard\\/editor_upload\\/gia-ram-tang-7.jpg\\\" width=\\\"840\\\" height=\\\"500\\\" alt=\\\"Giá RAM tăng đột biến phải làm sao?\\\"><\\/p><p style=\\\"text-align: justify;\\\">Với nhu cầu chơi game hoặc làm việc đa nhiệm, 16GB RAM là lựa chọn phổ biến và cân bằng giữa hiệu năng và chi phí.<\\/p><h3 style=\\\"text-align: justify;\\\"><strong>Tận dụng các chương trình khuyến mãi<\\/strong><\\/h3><p style=\\\"text-align: justify;\\\">Nhiều cửa hàng linh kiện và hệ thống bán lẻ thường có các chương trình giảm giá hoặc ưu đãi theo mùa. Việc theo dõi các chương trình khuyến mãi có thể giúp bạn mua RAM với mức giá tốt hơn so với giá niêm yết trên thị trường.<\\/p><h3 style=\\\"text-align: justify;\\\"><strong>So sánh giá giữa nhiều thương hiệu<\\/strong><\\/h3><p style=\\\"text-align: justify;\\\">Các thương hiệu RAM như Kingston, Corsair hay G.Skill thường có mức giá khác nhau tùy dòng sản phẩm và bus RAM. So sánh giá giữa các thương hiệu sẽ giúp bạn tìm được lựa chọn phù hợp với ngân sách mà vẫn đảm bảo hiệu năng.<\\/p><h3 style=\\\"text-align: justify;\\\"><strong>Cân nhắc nâng cấp sớm nếu có nhu cầu<\\/strong><\\/h3><p style=\\\"text-align: justify;\\\">Trong bối cảnh giá RAM vẫn có xu hướng tăng, nếu bạn đang có kế hoạch nâng cấp máy tính thì nên cân nhắc mua sớm. Điều này giúp tránh việc phải trả mức giá cao hơn trong tương lai khi thị trường tiếp tục biến động.<\\/p><h2 style=\\\"text-align: justify;\\\"><strong>Kết luận<\\/strong><\\/h2><p style=\\\"text-align: justify;\\\"><strong>Giá RAM tăng<\\/strong> đang khiến chi phí nâng cấp PC, laptop hoặc build máy mới cao hơn trước. Vì vậy, nếu có nhu cầu nâng cấp thiết bị, bạn nên theo dõi giá sớm để chọn sản phẩm phù hợp và tối ưu chi phí. Đừng quên theo dõi chuyên mục tin tức của <strong><a href=\\\"https:\\/\\/dienthoaivui.com.vn\\/\\\" target=\\\"_blank\\\" rel=\\\"noreferrer noopener\\\">Điện Thoại Vui<\\/a> <\\/strong>để cập nhật thêm nhiều thông tin công nghệ hữu ích nhé!<\\/p>\",\"image\":\"https:\\/\\/dashboard.dienthoaivui.com.vn\\/uploads\\/wp-content\\/uploads\\/images\\/gia-ram-tang-meta-thumbnail.jpg\",\"featured\":false}', 'vi', '2026-03-23 03:35:31'),
(11, 'san-pham-cntt', 'img_periph', '/assets/images/solutions/img_69bcfbc5e75bf.jpg', 'vi', '2026-03-23 03:26:35'),
(12, 'san-pham-cntt', 'img_pc', '/assets/images/solutions/img_69bd078d21f4d.jpg', 'vi', '2026-03-23 03:26:35'),
(13, 'san-pham-cntt', 'img_software', '/assets/images/solutions/img_69bcfdbc6b9b7.png', 'vi', '2026-03-23 03:26:35'),
(14, 'san-pham-cntt', 'p_service', 'Tư vấn thiết kế hạ tầng CNTT, triển khai lắp đặt, bảo trì định kỳ và hỗ trợ kỹ thuật tại chỗ hoặc từ xa. Đội ngũ kỹ sư Apollo được chứng chỉ Cisco, HPE, Microsoft — phục vụ từ SME đến tập đoàn lớn trên toàn quốc.', 'vi', '2026-03-23 03:26:35'),
(15, 'san-pham-khong-khi', 'img_vrv', '/assets/images/solutions/img_69bcf96a3b45d.png', 'vi', '2026-03-23 03:26:35'),
(16, 'san-pham-khong-khi', 'h_vrv', 'Điều hòa không khí LG', 'vi', '2026-03-23 03:26:35'),
(17, 'san-pham-khong-khi', 'p_split', '<span class=\"fontstyle0\">Đây là dòng máy lạnh chính xác, được thiết kế và&nbsp;phát triển cho các nhà cung cấp Internet, trung&nbsp;tâm xử lý dữ liệu, phòng máy viễn thông hoặc các&nbsp;trung tâm xử lý môi trường, nơi sử dụng các thiết bị<br>có tải nhiệt lớn.</span><br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', 'vi', '2026-03-23 03:26:35'),
(18, 'san-pham-khong-khi', 'h_split', 'Máy lạnh chính xác', 'vi', '2026-03-23 03:26:35'),
(19, 'san-pham-khong-khi', 'p_ahu', '<span class=\"fontstyle0\">Daikin là nhà sản xuất máy&nbsp;điều hòa không khí hàng&nbsp;đầu thế giới và các sản&nbsp;phẩm của chúng tôi được bán tại hơn 140 quốc gia.<br>Kể từ đầu những năm 1930, chúng tôi đã tiến một bước dài trong việc hiện thực hóa một môi trường và chất lượng&nbsp;cuộc sống tốt hơn thông&nbsp;qua việc cung cấp các giải pháp điều hòa không khí. Khám phá tiếng nói của khách hàng, công nghệ quan trọng và câu<br>chuyện của chúng tôi.&nbsp;</span><br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', 'vi', '2026-03-23 03:26:35'),
(20, 'san-pham-khong-khi', 'h_ahu', 'Điều hòa không khí Daikin', 'vi', '2026-03-23 03:26:35'),
(21, 'san-pham-khong-khi', 'p_hepa', '<span class=\"fontstyle0\">Công nghệ đột phá WindFree™ từ Samsung&nbsp;ASHRAE (Hội kỹ sư nghiên cứu về Tủ lạnh, Máy&nbsp;Sưởi và Điều Hòa Không Khí tại Mỹ) định nghĩa&nbsp;“luồng không khí dễ chịu\" là không khí đạt tốc độ&nbsp;dưới 0,15m/s và không có sự hiện diện của gió buốt.</span> \n<br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', 'vi', '2026-03-23 03:26:35'),
(22, 'san-pham-khong-khi', 'h_hepa', 'Điều hòa không khí Samsung', 'vi', '2026-03-23 03:26:35'),
(23, 'san-pham-khong-khi', 'img_split', '/assets/images/solutions/img_69bd0bcf710d1.jpg', 'vi', '2026-03-23 03:26:35'),
(24, 'san-pham-khong-khi', 'img_ahu', '/assets/images/solutions/img_69bd0be168229.jpg', 'vi', '2026-03-23 03:26:35'),
(25, 'san-pham-khong-khi', 'img_hepa', '/assets/images/solutions/img_69bd0be634982.jpg', 'vi', '2026-03-23 03:26:35'),
(26, 'thang-may', 'img_passenger', 'http://127.0.0.1/mws/apollotech/storage/uploads/2026/03/thagn-khach-480x320-69c10c501c243.png', 'vi', '2026-03-23 09:48:02'),
(27, 'thang-may', 'img_hospital', '/assets/images/solutions/img_69bcf802d2e21.png', 'vi', '2026-03-23 03:26:35'),
(28, 'thang-may', 'img_car', '/assets/images/solutions/img_69bcf809ce5ba.png', 'vi', '2026-03-23 03:26:35'),
(29, 'thang-may', 'img_food', '/assets/images/solutions/img_69bcf8132daee.png', 'vi', '2026-03-23 03:26:35'),
(30, 'thang-may', 'img_brand', '/assets/images/solutions/img_69bcf81a16e35.png', 'vi', '2026-03-23 03:26:35'),
(62, 'global', 'header_phone', '(+84) 82 343 6996', 'en', '2026-03-24 09:32:07'),
(63, 'global', 'header_email', 'contact@apollotech.vn', 'en', '2026-03-24 09:32:07'),
(64, 'global', 'header_time', 'Monday – Friday: 08:00–17:30', 'en', '2026-03-24 09:32:07'),
(65, 'global', 'menu_home', 'Homepage', 'en', '2026-03-24 09:32:07'),
(66, 'global', 'menu_solutions', 'Solution', 'en', '2026-03-24 09:32:07'),
(67, 'global', 'menu_sol_cntt', 'Information technology', 'en', '2026-03-24 09:32:07'),
(68, 'global', 'menu_sol_sec', 'Security Solutions', 'en', '2026-03-24 09:32:07'),
(69, 'global', 'menu_sol_tel', 'Contact information', 'en', '2026-03-24 09:32:07'),
(70, 'global', 'menu_sol_av', 'Audio &amp; Video', 'en', '2026-03-24 09:32:07'),
(71, 'global', 'menu_sol_me', 'Electromechanical Systems', 'en', '2026-03-24 09:32:07'),
(72, 'global', 'menu_sol_sw', 'Software Solutions', 'en', '2026-03-24 09:32:07'),
(73, 'global', 'menu_sol_iot', 'IoT solutions', 'en', '2026-03-24 09:32:07'),
(74, 'global', 'menu_fields', 'Field', 'en', '2026-03-24 09:32:07'),
(75, 'global', 'menu_projects', 'Project type', 'en', '2026-03-24 09:32:07'),
(76, 'global', 'menu_products', 'Product', 'en', '2026-03-24 09:32:07'),
(77, 'global', 'menu_partners', 'Partner', 'en', '2026-03-24 09:32:07'),
(78, 'global', 'menu_news', 'News', 'en', '2026-03-24 09:32:07'),
(79, 'global', 'menu_contact', 'Contact', 'en', '2026-03-24 09:32:07'),
(80, 'san-pham-khong-khi', 'hero_title', 'SẢN PHẨM <span>KHÔNG KHÍ</span>', 'en', '2026-03-24 07:51:55'),
(81, 'san-pham-khong-khi', 'hero_desc', 'Apollo Technologies cung cấp và lắp đặt các thiết bị xử lý không khí chính hãng — điều hòa trung tâm, thông gió công nghiệp và lọc khí — cho công trình dân dụng và thương mại trên toàn quốc.', 'en', '2026-03-24 07:51:55'),
(82, 'san-pham-khong-khi', 'sec_title', 'Danh mục Sản phẩm Không khí', 'en', '2026-03-24 07:51:55'),
(83, 'san-pham-khong-khi', 'sec_desc', 'Từ điều hòa dân dụng đến hệ thống làm lạnh trung tâm quy mô lớn, Apollo cung cấp giải pháp không khí toàn diện cho mọi loại công trình.', 'en', '2026-03-24 07:51:55'),
(84, 'san-pham-khong-khi', 'h_vrv', 'Điều hòa không khí LG', 'en', '2026-03-24 07:51:55'),
(85, 'san-pham-khong-khi', 'p_vrv', 'Hệ thống VRV/VRF và Chiller làm lạnh trung tâm cho toà nhà văn phòng, khách sạn, trung tâm thương mại. Các thương hiệu hàng đầu: Daikin, LG Multi V, Mitsubishi City Multi, Carrier Chiller — điều khiển thông minh, tiết kiệm năng lượng vượt trội.', 'en', '2026-03-24 07:51:55'),
(86, 'san-pham-khong-khi', 'h_split', 'Máy lạnh chính xác', 'en', '2026-03-24 07:51:55'),
(87, 'san-pham-khong-khi', 'p_split', '<span class=\"fontstyle0\">Đây là dòng máy lạnh chính xác, được thiết kế và&nbsp;phát triển cho các nhà cung cấp Internet, trung&nbsp;tâm xử lý dữ liệu, phòng máy viễn thông hoặc các&nbsp;trung tâm xử lý môi trường, nơi sử dụng các thiết bị<br>có tải nhiệt lớn.</span><br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', 'en', '2026-03-24 07:51:55'),
(88, 'san-pham-khong-khi', 'h_ahu', 'Điều hòa không khí Daikin', 'en', '2026-03-24 07:51:55'),
(89, 'san-pham-khong-khi', 'p_ahu', '<span class=\"fontstyle0\">Daikin là nhà sản xuất máy&nbsp;điều hòa không khí hàng&nbsp;đầu thế giới và các sản&nbsp;phẩm của chúng tôi được bán tại hơn 140 quốc gia.<br>Kể từ đầu những năm 1930, chúng tôi đã tiến một bước dài trong việc hiện thực hóa một môi trường và chất lượng&nbsp;cuộc sống tốt hơn thông&nbsp;qua việc cung cấp các giải pháp điều hòa không khí. Khám phá tiếng nói của khách hàng, công nghệ quan trọng và câu<br>chuyện của chúng tôi.&nbsp;</span><br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', 'en', '2026-03-24 07:51:55'),
(90, 'san-pham-khong-khi', 'h_hepa', 'Điều hòa không khí Samsung', 'en', '2026-03-24 07:51:55'),
(91, 'san-pham-khong-khi', 'p_hepa', '<span class=\"fontstyle0\">Công nghệ đột phá WindFree™ từ Samsung&nbsp;ASHRAE (Hội kỹ sư nghiên cứu về Tủ lạnh, Máy&nbsp;Sưởi và Điều Hòa Không Khí tại Mỹ) định nghĩa&nbsp;“luồng không khí dễ chịu\" là không khí đạt tốc độ&nbsp;dưới 0,15m/s và không có sự hiện diện của gió buốt.</span> \n<br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', 'en', '2026-03-24 07:51:55'),
(92, 'san-pham-khong-khi', 'cta_title', 'Cần tư vấn hệ thống Không khí?', 'en', '2026-03-24 07:51:55'),
(93, 'san-pham-khong-khi', 'cta_desc', 'Đội ngũ kỹ sư Apollo luôn sẵn sàng khảo sát, thiết kế và cung cấp giải pháp Điều hòa – Thông gió – Lọc khí phù hợp nhất với công trình của bạn.', 'en', '2026-03-24 07:51:55'),
(94, 'global', 'footer_desc', 'Apollo Technologies Joint Stock Company – a technology enterprise focused on industrialization, modernization, and digital transformation in Vietnam.', 'en', '2026-03-24 09:32:07'),
(95, 'global', 'footer_col1', 'SITE MAP', 'en', '2026-03-24 09:32:07'),
(103, 'global', 'footer_col2', 'Solution', 'en', '2026-03-24 09:32:07'),
(111, 'global', 'footer_col3', 'Contact', 'en', '2026-03-24 09:32:07'),
(112, 'global', 'footer_address', '8th Floor, 58 Nguyen Dinh Chieu Street, Tan Dinh Ward, District 1, Ho Chi Minh City', 'en', '2026-03-24 09:32:07'),
(113, 'global', 'footer_phone', '(+84) 82 343 6996', 'en', '2026-03-24 09:32:07'),
(114, 'global', 'footer_email', 'contact@apollotech.vn', 'en', '2026-03-24 09:32:07'),
(115, 'global', 'footer_time', 'Monday – Friday: 08:00 – 17:30', 'en', '2026-03-24 09:32:07'),
(116, 'global', 'footer_cert_text', '<strong style=\"color:#fff;\">ISO 9001:2015</strong><br> Quality Management System<br><strong style=\"color:#fff;\"></strong>', 'en', '2026-03-24 09:32:07'),
(117, 'global', 'footer_copyright', 'APOLLO TECHNOLOGIES JOINT STOCK COMPANY. All rights reserved.', 'en', '2026-03-24 09:32:07'),
(118, 'index', 'hero_title', '\n                    \n                    APOLLO GIẢI PHÁP<br>TỐI ƯU<br><em>CHO DOANH<br>NGHIỆP&nbsp;</em>', 'vi', '2026-03-24 08:17:25'),
(120, 'global', 'menu_solutions', 'Giải pháp', 'vi', '2026-03-24 09:00:44'),
(136, 'global', 'menu_prod_thangmay', 'Elevator Products', 'en', '2026-03-24 09:32:07'),
(137, 'global', 'menu_prod_me', 'Electromechanical Products', 'en', '2026-03-24 09:32:07'),
(138, 'global', 'menu_prod_air', 'Air Products', 'en', '2026-03-24 09:32:07'),
(139, 'global', 'menu_prod_cntt', 'IT products', 'en', '2026-03-24 09:32:07'),
(143, 'index', 'hero_title', '<br>APOLLO THE OPTIMAL \n                    \n                    \n                    SOLUTION <br><em>FOR <br>BUSINESSES&nbsp;</em>', 'en', '2026-03-24 09:21:31'),
(144, 'index', 'hero_desc_1', 'Apollo Technologies Joint Stock Company is a technology-based enterprise that aims to contribute to the ongoing industrialization, modernization, and digital transformation in Vietnam and to expand internationally. With the motto \"Fast and Perfect,\" we constantly strive to provide our customers with the fastest, most efficient, and highest-quality products and services.', 'en', '2026-03-24 09:21:31'),
(145, 'index', 'hero_desc_2', 'With a quality management system that meets the international standard ISO 9001:2015, we are committed to delivering professionalism and excellence in every project. With strong potential and a team of experienced experts, Apollo Technologies is confident in being a strategic partner providing comprehensive solutions including:', 'en', '2026-03-24 09:21:31'),
(146, 'index', 'stat_1_num', '100+', 'en', '2026-03-24 09:21:31'),
(147, 'index', 'stat_1_lbl', 'Project', 'en', '2026-03-24 09:21:31'),
(148, 'index', 'stat_2_num', '50+', 'en', '2026-03-24 09:21:31'),
(149, 'index', 'stat_2_lbl', 'Partner', 'en', '2026-03-24 09:21:31'),
(150, 'index', 'stat_3_num', '7+', 'en', '2026-03-24 09:21:31'),
(151, 'index', 'stat_3_lbl', 'Solution', 'en', '2026-03-24 09:21:31'),
(152, 'index', 'stat_4_num', '5+', 'en', '2026-03-24 09:21:31'),
(153, 'index', 'stat_4_lbl', 'Year of the New Year', 'en', '2026-03-24 09:21:31'),
(154, 'index', 'proj_sect_tag', 'Project Portfolio', 'en', '2026-03-24 09:21:31'),
(155, 'index', 'proj_sect_title', '<span>FEATURED</span> PROJECTS<span></span>', 'en', '2026-03-24 09:21:31'),
(156, 'index', 'proj_sect_desc', 'We provide cutting-edge technological solutions that optimize operations and drive sustainable growth for our partners. The projects below represent the highest standards that Apollo Technologies strives for throughout our partnership.', 'en', '2026-03-24 09:21:31'),
(157, 'index', 'proj_sect_btn', 'View all', 'en', '2026-03-24 09:21:31'),
(158, 'index', 'proj_1_tag', 'Vacation', 'en', '2026-03-24 09:21:31'),
(159, 'index', 'proj_1_name', 'TTC Doc Let ddd', 'en', '2026-03-24 09:21:31'),
(160, 'index', 'proj_1_tags2', 'ICT · AV · Security', 'en', '2026-03-24 09:21:31'),
(161, 'index', 'proj_2_tag', 'Apartment', 'en', '2026-03-24 09:21:31'),
(162, 'index', 'proj_2_name', 'Huyen Diep Apartment Building', 'en', '2026-03-24 09:21:31'),
(163, 'index', 'proj_2_tags2', 'ICT · Electromechanical · IoT', 'en', '2026-03-24 09:21:31'),
(164, 'index', 'proj_3_tag', 'Hotel', 'en', '2026-03-24 09:21:31'),
(165, 'index', 'proj_3_name', 'Hyatt Regency Nha Trang', 'en', '2026-03-24 09:21:31'),
(166, 'index', 'proj_3_tags2', 'ICT · AV · Security', 'en', '2026-03-24 09:21:31'),
(167, 'index', 'proj_4_tag', 'Education', 'en', '2026-03-24 09:21:31'),
(168, 'index', 'proj_4_name', 'Hung Vuong University', 'en', '2026-03-24 09:21:31'),
(169, 'index', 'proj_4_tags2', 'ICT · Telecommunications · Software', 'en', '2026-03-24 09:21:31'),
(170, 'index', 'proj_5_tag', 'Hospital', 'en', '2026-03-24 09:21:31'),
(171, 'index', 'proj_5_name', 'Dak Nong Hospital', 'en', '2026-03-24 09:21:31'),
(172, 'index', 'proj_5_tags2', 'ICT · Security · Electromechanical', 'en', '2026-03-24 09:21:31'),
(173, 'index', 'proj_6_tag', 'Golf course', 'en', '2026-03-24 09:21:31'),
(174, 'index', 'proj_6_name', 'Mekong Golf', 'en', '2026-03-24 09:21:31'),
(175, 'index', 'proj_6_tags2', 'AV · Security · IoT', 'en', '2026-03-24 09:21:31'),
(176, 'index', 'proj_7_tag', 'Hotel', 'en', '2026-03-24 09:21:31'),
(177, 'index', 'proj_7_name', 'Luvista Quy Nhon', 'en', '2026-03-24 09:21:31'),
(178, 'index', 'proj_7_tags2', 'ICT · AV · Electromechanical', 'en', '2026-03-24 09:21:31'),
(179, 'index', 'proj_8_tag', 'Mixed-use', 'en', '2026-03-24 09:21:31'),
(180, 'index', 'proj_8_name', 'Menas Zone Vy Da', 'en', '2026-03-24 09:21:31'),
(181, 'index', 'proj_8_tags2', 'Security · ICT · AV', 'en', '2026-03-24 09:21:31'),
(182, 'index', 'proj_9_tag', 'Office', 'en', '2026-03-24 09:21:31'),
(183, 'index', 'proj_9_name', 'Republic Plaza', 'en', '2026-03-24 09:21:31'),
(184, 'index', 'proj_9_tags2', 'ICT · Telecommunications · Electromechanical', 'en', '2026-03-24 09:21:31'),
(185, 'index', 'proj_10_tag', 'Resort', 'en', '2026-03-24 09:21:31'),
(186, 'index', 'proj_10_name', 'L\'alya Ninh Vân Bay', 'en', '2026-03-24 09:21:31'),
(187, 'index', 'proj_10_tags2', 'AV · ICT · Security', 'en', '2026-03-24 09:21:31'),
(188, 'index', 'proj_11_tag', 'Hotel', 'en', '2026-03-24 09:21:31'),
(189, 'index', 'proj_11_name', 'TUI Blue Tuy Hoa', 'en', '2026-03-24 09:21:31'),
(190, 'index', 'proj_11_tags2', 'ICT · AV · Security', 'en', '2026-03-24 09:21:31'),
(191, 'index', 'proj_12_tag', 'Hotel', 'en', '2026-03-24 09:21:31'),
(192, 'index', 'proj_12_name', 'TUI Blue Nha Trang', 'en', '2026-03-24 09:21:31'),
(193, 'index', 'proj_12_tags2', 'ICT · AV · Security', 'en', '2026-03-24 09:21:31'),
(194, 'index', 'proj_13_tag', 'F&amp;amp;B', 'en', '2026-03-24 09:21:31'),
(195, 'index', 'proj_13_name', 'Byblos restaurant chain', 'en', '2026-03-24 09:21:31'),
(196, 'index', 'proj_13_tags2', 'AV · Security · IoT', 'en', '2026-03-24 09:21:31'),
(197, 'index', 'proj_14_tag', 'F&amp;amp;B', 'en', '2026-03-24 09:21:31'),
(198, 'index', 'proj_14_name', 'Texas restaurant chain', 'en', '2026-03-24 09:21:31'),
(199, 'index', 'proj_14_tags2', 'AV · Security · IoT', 'en', '2026-03-24 09:21:31'),
(200, 'index', 'sol_sect_title', 'We provide solutions', 'en', '2026-03-24 09:21:31'),
(201, 'index', 'sol_item_1', 'Information and Communication Technology (ICT) Infrastructure', 'en', '2026-03-24 09:21:31'),
(202, 'index', 'sol_item_2', 'Security Solutions', 'en', '2026-03-24 09:21:31'),
(203, 'index', 'sol_item_3', 'Telecommunication Systems', 'en', '2026-03-24 09:21:31'),
(204, 'index', 'sol_item_4', 'AV (Audio Visual) System', 'en', '2026-03-24 09:21:31'),
(205, 'index', 'sol_item_5', 'Software Solutions', 'en', '2026-03-24 09:21:31'),
(206, 'index', 'sol_item_6', 'Mechanical and electrical (M&amp;E) systems', 'en', '2026-03-24 09:21:31'),
(207, 'index', 'sol_item_7', 'IoT (Internet of Things) solutions', 'en', '2026-03-24 09:21:31'),
(208, 'index', 'vl_sect_tag', '<i class=\"fas fa-minus\"></i> <i class=\"fas fa-minus\"></i>', 'en', '2026-03-24 09:21:31'),
(209, 'index', 'vl_sect_title', '<br>Comprehensive technology solutions for <span>businesses.</span>', 'en', '2026-03-24 09:21:31'),
(210, 'index', 'vl_sect_desc', 'Apollo Technologies doesn\'t just provide services; we partner with you in your growth through cutting-edge technological solutions and exceptional incentive policies.', 'en', '2026-03-24 09:21:31'),
(211, 'index', 'vl_sub', 'APOLLO TECHNOLOGIES - YOUR PARTNER', 'en', '2026-03-24 09:21:31'),
(212, 'index', 'vl_card1_t', 'Breakthrough Quality – Innovative Technology', 'en', '2026-03-24 09:21:31'),
(213, 'index', 'vl_card1_d', 'We are committed to providing a high-quality ecosystem of products and services. Through continuous research and application of new technologies, Apollo Technologies strives to optimize the experience, helping customers thrive in the digital age.', 'en', '2026-03-24 09:21:31'),
(214, 'index', 'vl_card2_t', 'Dedicated Partnership – Comprehensive Support', 'en', '2026-03-24 09:21:31'),
(215, 'index', 'vl_card2_d', 'Customers are at the heart of everything we do. With our professional and friendly support team and flexible response process, we ensure that all your requests are met quickly, accurately, and efficiently.', 'en', '2026-03-24 09:21:31'),
(216, 'index', 'vl_card3_t', 'Absolute Security – Unwavering Trust', 'en', '2026-03-24 09:21:31'),
(217, 'index', 'vl_card3_d', 'We understand that data is a business\'s most valuable asset. Apollo Technologies has established a multi-layered security system, committed to protecting the absolute safety and integrity of all our partners\' information. This is the core foundation for building a sustainable and trustworthy partnership.', 'en', '2026-03-24 09:21:31'),
(218, 'index', 'cta_tag', 'Contact us', 'en', '2026-03-24 09:21:31'),
(219, 'index', 'cta_title', 'Apollo Technologies is a trusted partner <br>providing cutting-edge technology solutions.', 'en', '2026-03-24 09:21:31'),
(220, 'index', 'cta_desc', 'Contact us today for consultation and to receive the best solutions for your business.', 'en', '2026-03-24 09:21:31'),
(221, 'index', 'cta_btn1', 'Get a Free Consultation', 'en', '2026-03-24 09:21:31'),
(222, 'index', 'cta_btn2', 'View Project', 'en', '2026-03-24 09:21:31'),
(374, 'giai-phap-cong-nghe-thong-tin', 'sol2_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/may-chu-69c26278ba416.jpg', 'vi', '2026-03-24 10:07:53'),
(397, 'giai-phap-cong-nghe-thong-tin', 'bc_home', 'Homepage', 'en', '2026-03-24 09:32:07'),
(398, 'giai-phap-cong-nghe-thong-tin', 'bc_sol', 'Solution', 'en', '2026-03-24 09:32:07'),
(399, 'giai-phap-cong-nghe-thong-tin', 'bc_curr', 'Information Technology Solutions', 'en', '2026-03-24 09:32:07'),
(400, 'giai-phap-cong-nghe-thong-tin', 'hero_title', '<span>IT INFRASTRUCTURE SYSTEM</span>', 'en', '2026-03-24 09:32:07'),
(401, 'giai-phap-cong-nghe-thong-tin', 'hero_desc', 'Apollo provides advanced infrastructure solutions, specifically designed to help organizations build a modern, reliable, and scalable technology infrastructure.', 'en', '2026-03-24 09:32:07'),
(402, 'giai-phap-cong-nghe-thong-tin', 'sol1_title', 'Networking system', 'en', '2026-03-24 09:32:07'),
(403, 'giai-phap-cong-nghe-thong-tin', 'sol1_desc', 'Building a stable, high-speed, and secure connectivity platform ensures seamless data flow throughout the organization.', 'en', '2026-03-24 09:32:07'),
(404, 'giai-phap-cong-nghe-thong-tin', 'sol1_i1', 'Enterprise LAN/WAN/WLAN network design', 'en', '2026-03-24 09:32:07'),
(405, 'giai-phap-cong-nghe-thong-tin', 'sol1_i2', 'Next-generation firewall (NGFW), UTM', 'en', '2026-03-24 09:32:07'),
(406, 'giai-phap-cong-nghe-thong-tin', 'sol1_i3', 'VLAN partitioning, access security.', 'en', '2026-03-24 09:32:07'),
(407, 'giai-phap-cong-nghe-thong-tin', 'sol1_i4', 'Comprehensive WiFi (Cisco, Aruba, Ruckus)', 'en', '2026-03-24 09:32:07'),
(408, 'giai-phap-cong-nghe-thong-tin', 'sol1_i5', 'Network Monitoring and Management (NMS)', 'en', '2026-03-24 09:32:07'),
(409, 'giai-phap-cong-nghe-thong-tin', 'sol2_title', 'Server and Storage Systems', 'en', '2026-03-24 09:32:07'),
(410, 'giai-phap-cong-nghe-thong-tin', 'sol2_desc', 'Solutions from leading global vendors provide centralized computing power and data storage space, enabling secure information management and efficient retrieval.', 'en', '2026-03-24 09:32:07'),
(411, 'giai-phap-cong-nghe-thong-tin', 'sol2_i1', 'HPE, Dell, Lenovo servers (Rack/Tower/Blade)', 'en', '2026-03-24 09:32:07'),
(412, 'giai-phap-cong-nghe-thong-tin', 'sol2_i2', 'SAN, NAS, All-Flash Array storage', 'en', '2026-03-24 09:32:07'),
(413, 'giai-phap-cong-nghe-thong-tin', 'sol2_i3', 'VMware virtualization, Hyper-V, Proxmox', 'en', '2026-03-24 09:32:07'),
(414, 'giai-phap-cong-nghe-thong-tin', 'sol2_i4', 'Backup &amp; DR (Disaster Recovery)', 'en', '2026-03-24 09:32:07'),
(415, 'giai-phap-cong-nghe-thong-tin', 'sol2_i5', 'Deploying Cloud Hybrid/Private', 'en', '2026-03-24 09:32:07'),
(416, 'giai-phap-cong-nghe-thong-tin', 'sol3_title', 'Structured Cabling System', 'en', '2026-03-24 09:32:07'),
(417, 'giai-phap-cong-nghe-thong-tin', 'sol3_desc', 'The cabling system is designed scientifically, standardized, and synchronized, creating flexibility for expanding and maintaining the connectivity infrastructure.', 'en', '2026-03-24 09:32:07'),
(418, 'giai-phap-cong-nghe-thong-tin', 'sol3_i1', 'Cat6/Cat6A/Cat7 copper cable for LAN', 'en', '2026-03-24 09:32:07'),
(419, 'giai-phap-cong-nghe-thong-tin', 'sol3_i2', 'Multimode/singlemode fiber optic cable', 'en', '2026-03-24 09:32:07'),
(420, 'giai-phap-cong-nghe-thong-tin', 'sol3_i3', 'Standard rack cabinets, patch panels, and trunking.', 'en', '2026-03-24 09:32:07'),
(421, 'giai-phap-cong-nghe-thong-tin', 'sol3_i4', 'Fluke per-port test certificate', 'en', '2026-03-24 09:32:07'),
(422, 'giai-phap-cong-nghe-thong-tin', 'sol3_i5', 'Cable management labeling system', 'en', '2026-03-24 09:32:07'),
(423, 'giai-phap-cong-nghe-thong-tin', 'sol4_title', 'Server Room', 'en', '2026-03-24 09:32:07'),
(424, 'giai-phap-cong-nghe-thong-tin', 'sol4_desc', 'Establish a standard technical space with optimal cooling, power supply, raised floor, and physical security to protect core equipment.', 'en', '2026-03-24 09:32:07'),
(425, 'giai-phap-cong-nghe-thong-tin', 'sol4_i1', 'Precision Cooling (CRAC/CRAH) air conditioners', 'en', '2026-03-24 09:32:07'),
(426, 'giai-phap-cong-nghe-thong-tin', 'sol4_i2', 'UPS, backup generator', 'en', '2026-03-24 09:32:07'),
(427, 'giai-phap-cong-nghe-thong-tin', 'sol4_i3', 'Raised floor, anti-static.', 'en', '2026-03-24 09:32:07'),
(428, 'giai-phap-cong-nghe-thong-tin', 'sol4_i4', 'DCIM system - environmental monitoring', 'en', '2026-03-24 09:32:07'),
(429, 'giai-phap-cong-nghe-thong-tin', 'sol4_i5', 'Security cameras, access control.', 'en', '2026-03-24 09:32:07'),
(430, 'giai-phap-cong-nghe-thong-tin', 'cta_title', 'IT infrastructure consulting for businesses.', 'en', '2026-03-24 09:32:07'),
(431, 'giai-phap-cong-nghe-thong-tin', 'cta_desc', 'Apollo\'s team of engineers, with experience in implementing over 100 projects, is ready to assist you in designing an optimal and cost-effective system.', 'en', '2026-03-24 09:32:07');
INSERT INTO `cms_contents` (`id`, `page`, `key_name`, `value`, `lang`, `updated_at`) VALUES
(432, 'giai-phap-cong-nghe-thong-tin', 'cta_btn', 'Contact us for consultation now.', 'en', '2026-03-24 09:32:07'),
(457, 'he-thong-thong-tin-lien-lac', 'sol2_i2', '<br>', 'vi', '2026-03-24 09:34:58'),
(458, 'giai-phap', 's5_i3', 'Thang máy&nbsp;', 'vi', '2026-03-24 09:44:13'),
(459, 'giai-phap', 's5_i4', '<br>', 'vi', '2026-03-24 09:44:34'),
(460, 'giai-phap', 's5_i5', '<br>', 'vi', '2026-03-24 09:44:45'),
(461, 'giai-phap', 's5_i2', 'Điều hòa không khí', 'vi', '2026-03-24 09:44:59'),
(462, 'giai-phap', 's6_i5', '<br>', 'vi', '2026-03-24 09:45:20'),
(463, 'giai-phap', 's6_i4', 'AConnect - Wifi Marketing', 'vi', '2026-03-24 09:48:27'),
(465, 'giai-phap', 's6_i1', 'AVoucher – Quản lý Voucher', 'vi', '2026-03-24 09:48:58'),
(466, 'giai-phap', 's6_i2', 'AHome – Quản lý căn hộ', 'vi', '2026-03-24 09:49:09'),
(467, 'he-thong-thong-tin-lien-lac', 'sol2_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/IBS-69c34fb8c6ea3.jpg', 'vi', '2026-03-25 03:00:09'),
(469, 'giai-phap-phan-mem', 'sol1_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/screencapture-admin-conasi365-vn-dashboard-2026-03-24-16_55_-69c2601a16a39.png', 'vi', '2026-03-24 09:57:47'),
(470, 'giai-phap-phan-mem', 'sol2_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/Ahome-69c2607898636.png', 'vi', '2026-03-24 09:59:23'),
(471, 'he-thong-thong-tin-lien-lac', 'sol1_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/pbx-69c2603e67c65.webp', 'vi', '2026-03-24 09:58:24'),
(473, 'giai-phap-phan-mem', 'sol1_i5', 'Tích hợp app, website bán hàng', 'vi', '2026-03-24 10:01:06'),
(474, 'giai-phap-cong-nghe-thong-tin', 'sol4_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/phong-server-69c260eca0606.jpg', 'vi', '2026-03-24 10:01:18'),
(475, 'giai-phap-phan-mem', 'sol1_desc', 'Giải pháp quản lý và phát hành voucher điện tử thông minh. Giúp doanh nghiệp tối ưu hóa các chiến dịch khuyến mãi, tăng tỷ lệ chuyển đổi khách hàng và quản lý ngân sách marketing một cách chặt chẽ, chính xác trên nền tảng số.', 'vi', '2026-03-24 10:02:22'),
(476, 'he-thong-thong-tin-lien-lac', 'sol4_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/bo_dam-69c26639a190d.png', 'vi', '2026-03-24 10:23:56'),
(478, 'giai-phap-phan-mem', 'sol2_desc', 'Nền tảng quản lý vận hành quản lý khu dân cư toàn diện. AHome kết nối Ban quản lý và cư dân, giúp tự động hóa quy trình thu phí, tiếp nhận phản ánh và quản lý tiện ích nội khu, mang lại trải nghiệm sống hiện đại và tiện nghi.', 'vi', '2026-03-24 10:03:59'),
(481, 'giai-phap-cong-nghe-thong-tin', 'sol2_desc', 'Giải pháp từ các hãng hàng đầu thế giới, cung cấp sức mạnh tính toán và khả năng vận hành ổn định, tin cậy, bảo mật.', 'vi', '2026-03-24 10:08:46'),
(483, 'giai-phap-cong-nghe-thong-tin', 'sol4_i1', 'Hệ thống máy lạnh chính xác, chuyên dụng cho phòng máy chủ', 'vi', '2026-03-24 10:10:42'),
(484, 'giai-phap-cong-nghe-thong-tin', 'sol4_i2', 'Nguồn điện dự phòng (UPS) công suất cao', 'vi', '2026-03-24 10:11:31'),
(485, 'giai-phap-cong-nghe-thong-tin', 'sol4_i5', 'Hệ thống giám sát an ninh, kiểm soát ra vào', 'vi', '2026-03-24 10:11:45'),
(486, 'giai-phap-cong-nghe-thong-tin', 'sol1_i1', 'Thiết kế mô hình mạng LAN/WAN/WLAN doanh nghiệp', 'vi', '2026-03-24 10:12:18'),
(489, 'giai-phap-phan-mem', 'sol4_desc', 'AConnect là giải pháp Wifi marketing toàn diện, sử dụng nền tảng Wifi sẵn có để tiếp cận và tương tác với khách hàng. Hệ thống cho phép doanh nghiệp triển khai các chiến dịch quảng cáo một cách nhanh chóng, các công cụ tích hợp giúp theo dõi chỉ số tương tác và giám sát hiệu quả trực quan', 'vi', '2026-03-25 07:13:08'),
(491, 'giai-phap-phan-mem', 'sol4_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/Picture1-69c38b5c66d74.png', 'vi', '2026-03-25 07:14:38'),
(492, 'giai-phap-phan-mem', 'sol4_i1', 'Tăng trải nghiệm khách hàng sử dụng wifi', 'vi', '2026-03-25 07:16:10'),
(493, 'giai-phap-phan-mem', 'sol4_i2', 'Tận dụng hạ tầng wifi sẵn có để triển khai các chiến dịch quảng cáo', 'vi', '2026-03-25 07:16:53'),
(494, 'giai-phap-phan-mem', 'sol4_i3', 'Hỗ trợ marketer xây dựng chân dung khách hàng (Customer Persona)<br>', 'vi', '2026-03-25 07:21:10'),
(495, 'giai-phap-phan-mem', 'sol4_i4', 'Xây dựng các chiến dịch remarketing như gợi ý nhắc nhở, up-sell, cross-sell trên nền tảng wifi', 'vi', '2026-03-25 07:22:37'),
(496, 'giai-phap-phan-mem', 'sol4_i5', 'Tăng lượt truy cập website/fanpage bằng redirection URL', 'vi', '2026-03-25 07:22:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_history`
--

CREATE TABLE `cms_history` (
  `id` int(11) NOT NULL,
  `page` varchar(100) DEFAULT NULL,
  `key_name` varchar(255) DEFAULT NULL,
  `value` longtext DEFAULT NULL,
  `lang` varchar(10) DEFAULT 'vi',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_history`
--

INSERT INTO `cms_history` (`id`, `page`, `key_name`, `value`, `lang`, `created_at`) VALUES
(1, 'thang-may', 'img_passenger', '/assets/images/solutions/img_69bcf7fe06558.png', 'vi', '2026-03-23 09:48:02'),
(2, 'index', 'hero_title', '\n                    APOLLO GIẢI PHÁP<br>TỐI ƯU<br><em>CHO DOANH<br>NGHIỆP 123</em>', 'vi', '2026-03-24 08:17:25'),
(3, 'global', 'header_time', 'Thứ 2 – Thứ 6: 08:00–17:30', 'en', '2026-03-24 09:20:42'),
(4, 'global', 'menu_home', 'Trang chủ', 'en', '2026-03-24 09:20:42'),
(5, 'global', 'menu_solutions', 'Giải pháp', 'en', '2026-03-24 09:20:42'),
(6, 'global', 'menu_sol_cntt', 'Công nghệ thông tin', 'en', '2026-03-24 09:20:42'),
(7, 'global', 'menu_sol_sec', 'Giải pháp An ninh', 'en', '2026-03-24 09:20:42'),
(8, 'global', 'menu_sol_tel', 'Thông tin liên lạc', 'en', '2026-03-24 09:20:42'),
(9, 'global', 'menu_sol_av', 'Âm thanh &amp; Hình ảnh', 'en', '2026-03-24 09:20:42'),
(10, 'global', 'menu_sol_me', 'Hệ thống Cơ điện', 'en', '2026-03-24 09:20:42'),
(11, 'global', 'menu_sol_sw', 'Giải pháp Phần mềm', 'en', '2026-03-24 09:20:42'),
(12, 'global', 'menu_sol_iot', 'Giải pháp IoT', 'en', '2026-03-24 09:20:42'),
(13, 'global', 'menu_fields', 'Lĩnh vực', 'en', '2026-03-24 09:20:42'),
(14, 'global', 'menu_projects', 'Loại hình dự án', 'en', '2026-03-24 09:20:42'),
(15, 'global', 'menu_products', 'Sản phẩm', 'en', '2026-03-24 09:20:42'),
(16, 'global', 'menu_partners', 'Đối tác', 'en', '2026-03-24 09:20:42'),
(17, 'global', 'menu_news', 'Tin tức', 'en', '2026-03-24 09:20:42'),
(18, 'global', 'menu_contact', 'Liên hệ', 'en', '2026-03-24 09:20:42'),
(19, 'global', 'footer_desc', 'Apollo Technologies Joint Stock Company – doanh nghiệp công nghệ hướng đến công nghiệp hóa, hiện đại hóa và chuyển đổi số tại Việt Nam.', 'en', '2026-03-24 09:20:42'),
(20, 'global', 'footer_col2', 'Giải pháp', 'en', '2026-03-24 09:20:42'),
(21, 'global', 'footer_col3', 'Liên hệ', 'en', '2026-03-24 09:20:42'),
(22, 'global', 'footer_address', 'Tầng 8, 58 Nguyễn Đình Chiểu, P. Tân Định, Q.1, TP. Hồ Chí Minh', 'en', '2026-03-24 09:20:42'),
(23, 'global', 'footer_time', 'Thứ Hai – Thứ Sáu: 08:00 – 17:30', 'en', '2026-03-24 09:20:42'),
(24, 'global', 'footer_cert_text', 'Hệ thống quản lý<br>chất lượng<br><strong style=\"color:#fff;\">ISO 9001:2015</strong>', 'en', '2026-03-24 09:20:42'),
(25, 'index', 'hero_title', '<br>APOLLO: THE OPTIMAL \n                    \n                    \n                    SOLUTION <br><em>FOR <br>BUSINESSES&nbsp;</em>', 'en', '2026-03-24 09:21:24'),
(26, 'index', 'hero_title', '\n                    <br>APOLLO THE OPTIMAL \n                    \n                    \n                    SOLUTION <br><em>FOR <br>BUSINESSES&nbsp;</em>                ', 'en', '2026-03-24 09:21:31'),
(27, 'index', 'proj_13_tag', 'F&amp;B', 'en', '2026-03-24 09:21:31'),
(28, 'index', 'proj_14_tag', 'F&amp;B', 'en', '2026-03-24 09:21:31'),
(29, 'index', 'vl_sect_tag', '<i class=\"fas fa-minus\"></i>', 'en', '2026-03-24 09:21:31'),
(30, 'giai-phap', 's6_i4', 'AConnect', 'vi', '2026-03-24 09:48:27'),
(31, 'he-thong-thong-tin-lien-lac', 'sol2_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/in-building-solution-495x344-69c25e58d692c.jpg', 'vi', '2026-03-24 09:55:01'),
(32, 'giai-phap-phan-mem', 'sol2_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/screencapture-living-conasi-vn-dashboard-2026-03-24-16_50_14-69c260261a15b.png', 'vi', '2026-03-24 09:59:23'),
(33, 'he-thong-thong-tin-lien-lac', 'sol4_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/walkie_talkie_blank-69c2613d9665d.jpg', 'vi', '2026-03-24 10:03:23'),
(34, 'he-thong-thong-tin-lien-lac', 'sol4_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/walkie_talkie_blank2-69c2616a8acae.jpg', 'vi', '2026-03-24 10:04:16'),
(35, 'giai-phap-cong-nghe-thong-tin', 'sol2_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/server-room-after-69c25962c4092.jpg', 'vi', '2026-03-24 10:07:53'),
(36, 'he-thong-thong-tin-lien-lac', 'sol4_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/walkie_talkie_blank-69c2619ea7975.jpg', 'vi', '2026-03-24 10:09:32'),
(37, 'he-thong-thong-tin-lien-lac', 'sol4_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/walkie_talkie_blank3-69c262db89c1d.jpg', 'vi', '2026-03-24 10:23:56'),
(38, 'he-thong-thong-tin-lien-lac', 'sol2_img', 'https://demo.apollotech.vn/storage/uploads/2026/03/image_bc880a1c-69c25f7358aab.jpg', 'vi', '2026-03-25 03:00:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('super_admin','editor') DEFAULT 'editor',
  `full_name` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `is_active` tinyint(1) DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cms_users`
--

INSERT INTO `cms_users` (`id`, `username`, `password`, `role`, `full_name`, `email`, `is_active`, `last_login`, `created_at`) VALUES
(1, 'admin', '$2y$10$fP7jcrp.DWKrCn75eI783e9qmRbk25y.4FpEpwnKN9knziqkRbi3y', 'super_admin', 'Super Admin', '', 1, '2026-03-25 13:32:52', '2026-03-23 04:20:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media_files`
--

CREATE TABLE `media_files` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `original_name` varchar(255) DEFAULT '',
  `path` varchar(500) NOT NULL,
  `url` varchar(500) NOT NULL,
  `mime_type` varchar(100) DEFAULT '',
  `size` int(11) DEFAULT 0,
  `width` int(11) DEFAULT 0,
  `height` int(11) DEFAULT 0,
  `alt_text` varchar(500) DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `media_files`
--

INSERT INTO `media_files` (`id`, `filename`, `original_name`, `path`, `url`, `mime_type`, `size`, `width`, `height`, `alt_text`, `created_at`) VALUES
(1, 'av-audio.jpg', 'av-audio.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/av-audio.jpg', '/mws/apollotech/assets/images/solutions/av-audio.jpg', 'image/jpeg', 44223, 0, 0, '', '2026-03-23 03:26:27'),
(2, 'av-led.jpg', 'av-led.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/av-led.jpg', '/mws/apollotech/assets/images/solutions/av-led.jpg', 'image/jpeg', 120315, 0, 0, '', '2026-03-23 03:26:27'),
(3, 'av-projector.jpg', 'av-projector.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/av-projector.jpg', '/mws/apollotech/assets/images/solutions/av-projector.jpg', 'image/jpeg', 91338, 0, 0, '', '2026-03-23 03:26:27'),
(4, 'av-smart-space.jpg', 'av-smart-space.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/av-smart-space.jpg', '/mws/apollotech/assets/images/solutions/av-smart-space.jpg', 'image/jpeg', 105368, 0, 0, '', '2026-03-23 03:26:28'),
(5, 'ict-cabling.jpg', 'ict-cabling.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/ict-cabling.jpg', '/mws/apollotech/assets/images/solutions/ict-cabling.jpg', 'image/jpeg', 89244, 0, 0, '', '2026-03-23 03:26:30'),
(6, 'ict-networking.jpg', 'ict-networking.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/ict-networking.jpg', '/mws/apollotech/assets/images/solutions/ict-networking.jpg', 'image/jpeg', 138934, 0, 0, '', '2026-03-23 03:26:30'),
(7, 'ict-server-room.jpg', 'ict-server-room.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/ict-server-room.jpg', '/mws/apollotech/assets/images/solutions/ict-server-room.jpg', 'image/jpeg', 161046, 0, 0, '', '2026-03-23 03:26:30'),
(8, 'ict-server.jpg', 'ict-server.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/ict-server.jpg', '/mws/apollotech/assets/images/solutions/ict-server.jpg', 'image/jpeg', 167758, 0, 0, '', '2026-03-23 03:26:30'),
(9, 'img_1492161247920-7f287e07ebba.jpg', 'img_1492161247920-7f287e07ebba.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1492161247920-7f287e07ebba.jpg', '/mws/apollotech/assets/images/solutions/img_1492161247920-7f287e07ebba.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:26:31'),
(10, 'img_1504384308090-c894fdcc538d.jpg', 'img_1504384308090-c894fdcc538d.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1504384308090-c894fdcc538d.jpg', '/mws/apollotech/assets/images/solutions/img_1504384308090-c894fdcc538d.jpg', 'image/jpeg', 92691, 0, 0, '', '2026-03-23 03:26:31'),
(11, 'img_1504917595217-d4fb525148cf.jpg', 'img_1504917595217-d4fb525148cf.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1504917595217-d4fb525148cf.jpg', '/mws/apollotech/assets/images/solutions/img_1504917595217-d4fb525148cf.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:26:31'),
(12, 'img_1506521781263-d8422e82f27a.jpg', 'img_1506521781263-d8422e82f27a.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1506521781263-d8422e82f27a.jpg', '/mws/apollotech/assets/images/solutions/img_1506521781263-d8422e82f27a.jpg', 'image/jpeg', 83121, 0, 0, '', '2026-03-23 03:26:31'),
(13, 'img_1511795409834-ef04bbd61622.jpg', 'img_1511795409834-ef04bbd61622.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1511795409834-ef04bbd61622.jpg', '/mws/apollotech/assets/images/solutions/img_1511795409834-ef04bbd61622.jpg', 'image/jpeg', 81431, 0, 0, '', '2026-03-23 03:26:31'),
(14, 'img_1516321318423-f06f85e504b3.jpg', 'img_1516321318423-f06f85e504b3.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1516321318423-f06f85e504b3.jpg', '/mws/apollotech/assets/images/solutions/img_1516321318423-f06f85e504b3.jpg', 'image/jpeg', 57984, 0, 0, '', '2026-03-23 03:26:31'),
(15, 'img_1517245386807-bb43f82c33c4.jpg', 'img_1517245386807-bb43f82c33c4.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1517245386807-bb43f82c33c4.jpg', '/mws/apollotech/assets/images/solutions/img_1517245386807-bb43f82c33c4.jpg', 'image/jpeg', 63724, 0, 0, '', '2026-03-23 03:26:31'),
(16, 'img_1520697840682-345229242966.jpg', 'img_1520697840682-345229242966.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1520697840682-345229242966.jpg', '/mws/apollotech/assets/images/solutions/img_1520697840682-345229242966.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:26:31'),
(17, 'img_1522071820081-009f0129c71c.jpg', 'img_1522071820081-009f0129c71c.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1522071820081-009f0129c71c.jpg', '/mws/apollotech/assets/images/solutions/img_1522071820081-009f0129c71c.jpg', 'image/jpeg', 77843, 0, 0, '', '2026-03-23 03:26:31'),
(18, 'img_1531482615713-2afd69097998.jpg', 'img_1531482615713-2afd69097998.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1531482615713-2afd69097998.jpg', '/mws/apollotech/assets/images/solutions/img_1531482615713-2afd69097998.jpg', 'image/jpeg', 84980, 0, 0, '', '2026-03-23 03:26:31'),
(19, 'img_1544197150-b99a580bb7a8.jpg', 'img_1544197150-b99a580bb7a8.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1544197150-b99a580bb7a8.jpg', '/mws/apollotech/assets/images/solutions/img_1544197150-b99a580bb7a8.jpg', 'image/jpeg', 63038, 0, 0, '', '2026-03-23 03:26:31'),
(20, 'img_1546704107-16474fb83fd8.jpg', 'img_1546704107-16474fb83fd8.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1546704107-16474fb83fd8.jpg', '/mws/apollotech/assets/images/solutions/img_1546704107-16474fb83fd8.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:26:31'),
(21, 'img_1550751827-4bd374c3f58b.jpg', 'img_1550751827-4bd374c3f58b.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1550751827-4bd374c3f58b.jpg', '/mws/apollotech/assets/images/solutions/img_1550751827-4bd374c3f58b.jpg', 'image/jpeg', 112045, 0, 0, '', '2026-03-23 03:26:31'),
(22, 'img_1551739440-5dd934d3a94a.jpg', 'img_1551739440-5dd934d3a94a.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1551739440-5dd934d3a94a.jpg', '/mws/apollotech/assets/images/solutions/img_1551739440-5dd934d3a94a.jpg', 'image/jpeg', 96513, 0, 0, '', '2026-03-23 03:26:31'),
(23, 'img_1555421689-d68471e18982.jpg', 'img_1555421689-d68471e18982.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1555421689-d68471e18982.jpg', '/mws/apollotech/assets/images/solutions/img_1555421689-d68471e18982.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:26:31'),
(24, 'img_1556740749-88005eb1cadc.jpg', 'img_1556740749-88005eb1cadc.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1556740749-88005eb1cadc.jpg', '/mws/apollotech/assets/images/solutions/img_1556740749-88005eb1cadc.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:26:31'),
(25, 'img_1557597770-8cd0506e788c.jpg', 'img_1557597770-8cd0506e788c.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1557597770-8cd0506e788c.jpg', '/mws/apollotech/assets/images/solutions/img_1557597770-8cd0506e788c.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:26:32'),
(26, 'img_1558346490-a72e53ae2d4f.jpg', 'img_1558346490-a72e53ae2d4f.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1558346490-a72e53ae2d4f.jpg', '/mws/apollotech/assets/images/solutions/img_1558346490-a72e53ae2d4f.jpg', 'image/jpeg', 73735, 0, 0, '', '2026-03-23 03:26:32'),
(27, 'img_1558494949-ef010cbdcc31.jpg', 'img_1558494949-ef010cbdcc31.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1558494949-ef010cbdcc31.jpg', '/mws/apollotech/assets/images/solutions/img_1558494949-ef010cbdcc31.jpg', 'image/jpeg', 89387, 0, 0, '', '2026-03-23 03:26:32'),
(28, 'img_1560518883-ce09059eeffa.jpg', 'img_1560518883-ce09059eeffa.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1560518883-ce09059eeffa.jpg', '/mws/apollotech/assets/images/solutions/img_1560518883-ce09059eeffa.jpg', 'image/jpeg', 52725, 0, 0, '', '2026-03-23 03:26:32'),
(29, 'img_1562408522402-eba5be36ec46.jpg', 'img_1562408522402-eba5be36ec46.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1562408522402-eba5be36ec46.jpg', '/mws/apollotech/assets/images/solutions/img_1562408522402-eba5be36ec46.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:26:32'),
(30, 'img_1563986768609-322da13575f3.jpg', 'img_1563986768609-322da13575f3.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1563986768609-322da13575f3.jpg', '/mws/apollotech/assets/images/solutions/img_1563986768609-322da13575f3.jpg', 'image/jpeg', 62154, 0, 0, '', '2026-03-23 03:26:32'),
(31, 'img_1564227708573-03f44af0c034.jpg', 'img_1564227708573-03f44af0c034.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1564227708573-03f44af0c034.jpg', '/mws/apollotech/assets/images/solutions/img_1564227708573-03f44af0c034.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:26:32'),
(32, 'img_1581092580497-e0d23cbdf1dc.jpg', 'img_1581092580497-e0d23cbdf1dc.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1581092580497-e0d23cbdf1dc.jpg', '/mws/apollotech/assets/images/solutions/img_1581092580497-e0d23cbdf1dc.jpg', 'image/jpeg', 87252, 0, 0, '', '2026-03-23 03:26:32'),
(33, 'img_1584433144859-1e247eb98b1c.jpg', 'img_1584433144859-1e247eb98b1c.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1584433144859-1e247eb98b1c.jpg', '/mws/apollotech/assets/images/solutions/img_1584433144859-1e247eb98b1c.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:26:32'),
(34, 'img_1585246738927-aa822d5d8fb8.jpg', 'img_1585246738927-aa822d5d8fb8.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1585246738927-aa822d5d8fb8.jpg', '/mws/apollotech/assets/images/solutions/img_1585246738927-aa822d5d8fb8.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:26:32'),
(35, 'img_1598488035139-bdbb2231ce04.jpg', 'img_1598488035139-bdbb2231ce04.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1598488035139-bdbb2231ce04.jpg', '/mws/apollotech/assets/images/solutions/img_1598488035139-bdbb2231ce04.jpg', 'image/jpeg', 86354, 0, 0, '', '2026-03-23 03:26:32'),
(36, 'img_69bcf71f455f2.jpg', 'img_69bcf71f455f2.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf71f455f2.jpg', '/mws/apollotech/assets/images/solutions/img_69bcf71f455f2.jpg', 'image/jpeg', 102985, 0, 0, '', '2026-03-23 03:26:32'),
(37, 'img_69bcfbc5e75bf.jpg', 'img_69bcfbc5e75bf.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcfbc5e75bf.jpg', '/mws/apollotech/assets/images/solutions/img_69bcfbc5e75bf.jpg', 'image/jpeg', 114453, 0, 0, '', '2026-03-23 03:26:32'),
(38, 'img_69bcfd0d20344.jpg', 'img_69bcfd0d20344.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcfd0d20344.jpg', '/mws/apollotech/assets/images/solutions/img_69bcfd0d20344.jpg', 'image/jpeg', 42776, 0, 0, '', '2026-03-23 03:26:32'),
(39, 'img_69bd075ebe983.jpg', 'img_69bd075ebe983.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd075ebe983.jpg', '/mws/apollotech/assets/images/solutions/img_69bd075ebe983.jpg', 'image/jpeg', 409691, 0, 0, '', '2026-03-23 03:26:32'),
(40, 'img_69bd078d21f4d.jpg', 'img_69bd078d21f4d.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd078d21f4d.jpg', '/mws/apollotech/assets/images/solutions/img_69bd078d21f4d.jpg', 'image/jpeg', 409691, 0, 0, '', '2026-03-23 03:26:33'),
(41, 'img_69bd0bcf710d1.jpg', 'img_69bd0bcf710d1.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd0bcf710d1.jpg', '/mws/apollotech/assets/images/solutions/img_69bd0bcf710d1.jpg', 'image/jpeg', 434124, 0, 0, '', '2026-03-23 03:26:33'),
(42, 'img_69bd0bdda755f.jpg', 'img_69bd0bdda755f.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd0bdda755f.jpg', '/mws/apollotech/assets/images/solutions/img_69bd0bdda755f.jpg', 'image/jpeg', 278427, 0, 0, '', '2026-03-23 03:26:33'),
(43, 'img_69bd0be168229.jpg', 'img_69bd0be168229.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd0be168229.jpg', '/mws/apollotech/assets/images/solutions/img_69bd0be168229.jpg', 'image/jpeg', 366471, 0, 0, '', '2026-03-23 03:26:33'),
(44, 'img_69bd0be634982.jpg', 'img_69bd0be634982.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd0be634982.jpg', '/mws/apollotech/assets/images/solutions/img_69bd0be634982.jpg', 'image/jpeg', 265830, 0, 0, '', '2026-03-23 03:26:33'),
(45, 'iot-smart-control.jpg', 'iot-smart-control.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/iot-smart-control.jpg', '/mws/apollotech/assets/images/solutions/iot-smart-control.jpg', 'image/jpeg', 54486, 0, 0, '', '2026-03-23 03:26:33'),
(46, 'me-electrical.jpg', 'me-electrical.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/me-electrical.jpg', '/mws/apollotech/assets/images/solutions/me-electrical.jpg', 'image/jpeg', 94136, 0, 0, '', '2026-03-23 03:26:33'),
(47, 'me-elevator.jpg', 'me-elevator.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/me-elevator.jpg', '/mws/apollotech/assets/images/solutions/me-elevator.jpg', 'image/jpeg', 99695, 0, 0, '', '2026-03-23 03:26:33'),
(48, 'me-hvac.jpg', 'me-hvac.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/me-hvac.jpg', '/mws/apollotech/assets/images/solutions/me-hvac.jpg', 'image/jpeg', 129559, 0, 0, '', '2026-03-23 03:26:33'),
(49, 'sec-access-control.jpg', 'sec-access-control.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-access-control.jpg', '/mws/apollotech/assets/images/solutions/sec-access-control.jpg', 'image/jpeg', 69285, 0, 0, '', '2026-03-23 03:26:33'),
(50, 'sec-cctv.jpg', 'sec-cctv.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-cctv.jpg', '/mws/apollotech/assets/images/solutions/sec-cctv.jpg', 'image/jpeg', 89985, 0, 0, '', '2026-03-23 03:26:33'),
(51, 'sec-guard-tour.jpg', 'sec-guard-tour.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-guard-tour.jpg', '/mws/apollotech/assets/images/solutions/sec-guard-tour.jpg', 'image/jpeg', 508156, 0, 0, '', '2026-03-23 03:26:34'),
(52, 'sec-pa-system.jpg', 'sec-pa-system.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-pa-system.jpg', '/mws/apollotech/assets/images/solutions/sec-pa-system.jpg', 'image/jpeg', 129443, 0, 0, '', '2026-03-23 03:26:34'),
(53, 'sec-parking.jpg', 'sec-parking.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-parking.jpg', '/mws/apollotech/assets/images/solutions/sec-parking.jpg', 'image/jpeg', 125913, 0, 0, '', '2026-03-23 03:26:34'),
(54, 'sec-video-door.jpg', 'sec-video-door.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-video-door.jpg', '/mws/apollotech/assets/images/solutions/sec-video-door.jpg', 'image/jpeg', 79356, 0, 0, '', '2026-03-23 03:26:34'),
(55, 'soft-aconnect.jpg', 'soft-aconnect.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/soft-aconnect.jpg', '/mws/apollotech/assets/images/solutions/soft-aconnect.jpg', 'image/jpeg', 112713, 0, 0, '', '2026-03-23 03:26:34'),
(56, 'soft-aevent.jpg', 'soft-aevent.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/soft-aevent.jpg', '/mws/apollotech/assets/images/solutions/soft-aevent.jpg', 'image/jpeg', 116076, 0, 0, '', '2026-03-23 03:26:34'),
(57, 'soft-ahome.jpg', 'soft-ahome.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/soft-ahome.jpg', '/mws/apollotech/assets/images/solutions/soft-ahome.jpg', 'image/jpeg', 74996, 0, 0, '', '2026-03-23 03:26:34'),
(58, 'soft-avoucher.jpg', 'soft-avoucher.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/soft-avoucher.jpg', '/mws/apollotech/assets/images/solutions/soft-avoucher.jpg', 'image/svg+xml', 13514, 0, 0, '', '2026-03-23 03:26:34'),
(59, 'sol-av.jpg', 'sol-av.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-av.jpg', '/mws/apollotech/assets/images/solutions/sol-av.jpg', 'image/jpeg', 120315, 0, 0, '', '2026-03-23 03:26:34'),
(60, 'sol-ict.jpg', 'sol-ict.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-ict.jpg', '/mws/apollotech/assets/images/solutions/sol-ict.jpg', 'image/jpeg', 89244, 0, 0, '', '2026-03-23 03:26:34'),
(61, 'sol-iot.jpg', 'sol-iot.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-iot.jpg', '/mws/apollotech/assets/images/solutions/sol-iot.jpg', 'image/jpeg', 54486, 0, 0, '', '2026-03-23 03:26:34'),
(62, 'sol-me.jpg', 'sol-me.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-me.jpg', '/mws/apollotech/assets/images/solutions/sol-me.jpg', 'image/jpeg', 94136, 0, 0, '', '2026-03-23 03:26:34'),
(63, 'sol-security.jpg', 'sol-security.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-security.jpg', '/mws/apollotech/assets/images/solutions/sol-security.jpg', 'image/jpeg', 89985, 0, 0, '', '2026-03-23 03:26:34'),
(64, 'sol-software.jpg', 'sol-software.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-software.jpg', '/mws/apollotech/assets/images/solutions/sol-software.jpg', 'image/jpeg', 112713, 0, 0, '', '2026-03-23 03:26:34'),
(65, 'sol-telecom.jpg', 'sol-telecom.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-telecom.jpg', '/mws/apollotech/assets/images/solutions/sol-telecom.jpg', 'image/jpeg', 138539, 0, 0, '', '2026-03-23 03:26:34'),
(66, 'tel-ibs.jpg', 'tel-ibs.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/tel-ibs.jpg', '/mws/apollotech/assets/images/solutions/tel-ibs.jpg', 'image/svg+xml', 11144, 0, 0, '', '2026-03-23 03:26:34'),
(67, 'tel-networking.jpg', 'tel-networking.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/tel-networking.jpg', '/mws/apollotech/assets/images/solutions/tel-networking.jpg', 'image/jpeg', 138934, 0, 0, '', '2026-03-23 03:26:34'),
(68, 'tel-pbx.jpg', 'tel-pbx.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/tel-pbx.jpg', '/mws/apollotech/assets/images/solutions/tel-pbx.jpg', 'image/jpeg', 138539, 0, 0, '', '2026-03-23 03:26:34'),
(69, 'tel-walkie-talkie.jpg', 'tel-walkie-talkie.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/tel-walkie-talkie.jpg', '/mws/apollotech/assets/images/solutions/tel-walkie-talkie.jpg', 'image/jpeg', 57850, 0, 0, '', '2026-03-23 03:26:34'),
(70, 'img_69bcf7fe06558.png', 'img_69bcf7fe06558.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf7fe06558.png', '/mws/apollotech/assets/images/solutions/img_69bcf7fe06558.png', 'image/png', 967378, 0, 0, '', '2026-03-23 03:26:34'),
(71, 'img_69bcf802d2e21.png', 'img_69bcf802d2e21.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf802d2e21.png', '/mws/apollotech/assets/images/solutions/img_69bcf802d2e21.png', 'image/png', 962430, 0, 0, '', '2026-03-23 03:26:34'),
(72, 'img_69bcf809ce5ba.png', 'img_69bcf809ce5ba.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf809ce5ba.png', '/mws/apollotech/assets/images/solutions/img_69bcf809ce5ba.png', 'image/png', 949266, 0, 0, '', '2026-03-23 03:26:34'),
(73, 'img_69bcf8132daee.png', 'img_69bcf8132daee.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf8132daee.png', '/mws/apollotech/assets/images/solutions/img_69bcf8132daee.png', 'image/png', 958464, 0, 0, '', '2026-03-23 03:26:34'),
(74, 'img_69bcf81a16e35.png', 'img_69bcf81a16e35.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf81a16e35.png', '/mws/apollotech/assets/images/solutions/img_69bcf81a16e35.png', 'image/png', 285917, 0, 0, '', '2026-03-23 03:26:34'),
(75, 'img_69bcf9334dcbe.png', 'img_69bcf9334dcbe.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf9334dcbe.png', '/mws/apollotech/assets/images/solutions/img_69bcf9334dcbe.png', 'image/png', 877054, 0, 0, '', '2026-03-23 03:26:34'),
(76, 'img_69bcf96a3b45d.png', 'img_69bcf96a3b45d.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf96a3b45d.png', '/mws/apollotech/assets/images/solutions/img_69bcf96a3b45d.png', 'image/png', 458015, 0, 0, '', '2026-03-23 03:26:34'),
(77, 'img_69bcfdbc6b9b7.png', 'img_69bcfdbc6b9b7.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcfdbc6b9b7.png', '/mws/apollotech/assets/images/solutions/img_69bcfdbc6b9b7.png', 'image/png', 747522, 0, 0, '', '2026-03-23 03:26:34'),
(78, 'av-audio.jpg', 'av-audio.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/av-audio.jpg', '/mws/apollotech/assets/images/solutions/av-audio.jpg', 'image/jpeg', 44223, 0, 0, '', '2026-03-23 03:35:31'),
(79, 'av-led.jpg', 'av-led.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/av-led.jpg', '/mws/apollotech/assets/images/solutions/av-led.jpg', 'image/jpeg', 120315, 0, 0, '', '2026-03-23 03:35:31'),
(80, 'av-projector.jpg', 'av-projector.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/av-projector.jpg', '/mws/apollotech/assets/images/solutions/av-projector.jpg', 'image/jpeg', 91338, 0, 0, '', '2026-03-23 03:35:31'),
(81, 'av-smart-space.jpg', 'av-smart-space.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/av-smart-space.jpg', '/mws/apollotech/assets/images/solutions/av-smart-space.jpg', 'image/jpeg', 105368, 0, 0, '', '2026-03-23 03:35:31'),
(82, 'ict-cabling.jpg', 'ict-cabling.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/ict-cabling.jpg', '/mws/apollotech/assets/images/solutions/ict-cabling.jpg', 'image/jpeg', 89244, 0, 0, '', '2026-03-23 03:35:31'),
(83, 'ict-networking.jpg', 'ict-networking.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/ict-networking.jpg', '/mws/apollotech/assets/images/solutions/ict-networking.jpg', 'image/jpeg', 138934, 0, 0, '', '2026-03-23 03:35:31'),
(84, 'ict-server-room.jpg', 'ict-server-room.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/ict-server-room.jpg', '/mws/apollotech/assets/images/solutions/ict-server-room.jpg', 'image/jpeg', 161046, 0, 0, '', '2026-03-23 03:35:31'),
(85, 'ict-server.jpg', 'ict-server.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/ict-server.jpg', '/mws/apollotech/assets/images/solutions/ict-server.jpg', 'image/jpeg', 167758, 0, 0, '', '2026-03-23 03:35:31'),
(86, 'img_1492161247920-7f287e07ebba.jpg', 'img_1492161247920-7f287e07ebba.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1492161247920-7f287e07ebba.jpg', '/mws/apollotech/assets/images/solutions/img_1492161247920-7f287e07ebba.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:35:31'),
(87, 'img_1504384308090-c894fdcc538d.jpg', 'img_1504384308090-c894fdcc538d.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1504384308090-c894fdcc538d.jpg', '/mws/apollotech/assets/images/solutions/img_1504384308090-c894fdcc538d.jpg', 'image/jpeg', 92691, 0, 0, '', '2026-03-23 03:35:31'),
(88, 'img_1504917595217-d4fb525148cf.jpg', 'img_1504917595217-d4fb525148cf.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1504917595217-d4fb525148cf.jpg', '/mws/apollotech/assets/images/solutions/img_1504917595217-d4fb525148cf.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:35:31'),
(89, 'img_1506521781263-d8422e82f27a.jpg', 'img_1506521781263-d8422e82f27a.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1506521781263-d8422e82f27a.jpg', '/mws/apollotech/assets/images/solutions/img_1506521781263-d8422e82f27a.jpg', 'image/jpeg', 83121, 0, 0, '', '2026-03-23 03:35:31'),
(90, 'img_1511795409834-ef04bbd61622.jpg', 'img_1511795409834-ef04bbd61622.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1511795409834-ef04bbd61622.jpg', '/mws/apollotech/assets/images/solutions/img_1511795409834-ef04bbd61622.jpg', 'image/jpeg', 81431, 0, 0, '', '2026-03-23 03:35:31'),
(91, 'img_1516321318423-f06f85e504b3.jpg', 'img_1516321318423-f06f85e504b3.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1516321318423-f06f85e504b3.jpg', '/mws/apollotech/assets/images/solutions/img_1516321318423-f06f85e504b3.jpg', 'image/jpeg', 57984, 0, 0, '', '2026-03-23 03:35:31'),
(92, 'img_1517245386807-bb43f82c33c4.jpg', 'img_1517245386807-bb43f82c33c4.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1517245386807-bb43f82c33c4.jpg', '/mws/apollotech/assets/images/solutions/img_1517245386807-bb43f82c33c4.jpg', 'image/jpeg', 63724, 0, 0, '', '2026-03-23 03:35:31'),
(93, 'img_1520697840682-345229242966.jpg', 'img_1520697840682-345229242966.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1520697840682-345229242966.jpg', '/mws/apollotech/assets/images/solutions/img_1520697840682-345229242966.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:35:31'),
(94, 'img_1522071820081-009f0129c71c.jpg', 'img_1522071820081-009f0129c71c.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1522071820081-009f0129c71c.jpg', '/mws/apollotech/assets/images/solutions/img_1522071820081-009f0129c71c.jpg', 'image/jpeg', 77843, 0, 0, '', '2026-03-23 03:35:31'),
(95, 'img_1531482615713-2afd69097998.jpg', 'img_1531482615713-2afd69097998.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1531482615713-2afd69097998.jpg', '/mws/apollotech/assets/images/solutions/img_1531482615713-2afd69097998.jpg', 'image/jpeg', 84980, 0, 0, '', '2026-03-23 03:35:31'),
(96, 'img_1544197150-b99a580bb7a8.jpg', 'img_1544197150-b99a580bb7a8.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1544197150-b99a580bb7a8.jpg', '/mws/apollotech/assets/images/solutions/img_1544197150-b99a580bb7a8.jpg', 'image/jpeg', 63038, 0, 0, '', '2026-03-23 03:35:31'),
(97, 'img_1546704107-16474fb83fd8.jpg', 'img_1546704107-16474fb83fd8.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1546704107-16474fb83fd8.jpg', '/mws/apollotech/assets/images/solutions/img_1546704107-16474fb83fd8.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:35:31'),
(98, 'img_1550751827-4bd374c3f58b.jpg', 'img_1550751827-4bd374c3f58b.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1550751827-4bd374c3f58b.jpg', '/mws/apollotech/assets/images/solutions/img_1550751827-4bd374c3f58b.jpg', 'image/jpeg', 112045, 0, 0, '', '2026-03-23 03:35:31'),
(99, 'img_1551739440-5dd934d3a94a.jpg', 'img_1551739440-5dd934d3a94a.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1551739440-5dd934d3a94a.jpg', '/mws/apollotech/assets/images/solutions/img_1551739440-5dd934d3a94a.jpg', 'image/jpeg', 96513, 0, 0, '', '2026-03-23 03:35:31'),
(100, 'img_1555421689-d68471e18982.jpg', 'img_1555421689-d68471e18982.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1555421689-d68471e18982.jpg', '/mws/apollotech/assets/images/solutions/img_1555421689-d68471e18982.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:35:31'),
(101, 'img_1556740749-88005eb1cadc.jpg', 'img_1556740749-88005eb1cadc.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1556740749-88005eb1cadc.jpg', '/mws/apollotech/assets/images/solutions/img_1556740749-88005eb1cadc.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:35:31'),
(102, 'img_1557597770-8cd0506e788c.jpg', 'img_1557597770-8cd0506e788c.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1557597770-8cd0506e788c.jpg', '/mws/apollotech/assets/images/solutions/img_1557597770-8cd0506e788c.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:35:31'),
(103, 'img_1558346490-a72e53ae2d4f.jpg', 'img_1558346490-a72e53ae2d4f.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1558346490-a72e53ae2d4f.jpg', '/mws/apollotech/assets/images/solutions/img_1558346490-a72e53ae2d4f.jpg', 'image/jpeg', 73735, 0, 0, '', '2026-03-23 03:35:31'),
(104, 'img_1558494949-ef010cbdcc31.jpg', 'img_1558494949-ef010cbdcc31.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1558494949-ef010cbdcc31.jpg', '/mws/apollotech/assets/images/solutions/img_1558494949-ef010cbdcc31.jpg', 'image/jpeg', 89387, 0, 0, '', '2026-03-23 03:35:31'),
(105, 'img_1560518883-ce09059eeffa.jpg', 'img_1560518883-ce09059eeffa.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1560518883-ce09059eeffa.jpg', '/mws/apollotech/assets/images/solutions/img_1560518883-ce09059eeffa.jpg', 'image/jpeg', 52725, 0, 0, '', '2026-03-23 03:35:31'),
(106, 'img_1562408522402-eba5be36ec46.jpg', 'img_1562408522402-eba5be36ec46.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1562408522402-eba5be36ec46.jpg', '/mws/apollotech/assets/images/solutions/img_1562408522402-eba5be36ec46.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:35:31'),
(107, 'img_1563986768609-322da13575f3.jpg', 'img_1563986768609-322da13575f3.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1563986768609-322da13575f3.jpg', '/mws/apollotech/assets/images/solutions/img_1563986768609-322da13575f3.jpg', 'image/jpeg', 62154, 0, 0, '', '2026-03-23 03:35:31'),
(108, 'img_1564227708573-03f44af0c034.jpg', 'img_1564227708573-03f44af0c034.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1564227708573-03f44af0c034.jpg', '/mws/apollotech/assets/images/solutions/img_1564227708573-03f44af0c034.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:35:31'),
(109, 'img_1581092580497-e0d23cbdf1dc.jpg', 'img_1581092580497-e0d23cbdf1dc.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1581092580497-e0d23cbdf1dc.jpg', '/mws/apollotech/assets/images/solutions/img_1581092580497-e0d23cbdf1dc.jpg', 'image/jpeg', 87252, 0, 0, '', '2026-03-23 03:35:31'),
(110, 'img_1584433144859-1e247eb98b1c.jpg', 'img_1584433144859-1e247eb98b1c.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1584433144859-1e247eb98b1c.jpg', '/mws/apollotech/assets/images/solutions/img_1584433144859-1e247eb98b1c.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:35:31'),
(111, 'img_1585246738927-aa822d5d8fb8.jpg', 'img_1585246738927-aa822d5d8fb8.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1585246738927-aa822d5d8fb8.jpg', '/mws/apollotech/assets/images/solutions/img_1585246738927-aa822d5d8fb8.jpg', 'image/svg+xml', 7167, 0, 0, '', '2026-03-23 03:35:31'),
(112, 'img_1598488035139-bdbb2231ce04.jpg', 'img_1598488035139-bdbb2231ce04.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_1598488035139-bdbb2231ce04.jpg', '/mws/apollotech/assets/images/solutions/img_1598488035139-bdbb2231ce04.jpg', 'image/jpeg', 86354, 0, 0, '', '2026-03-23 03:35:31'),
(113, 'img_69bcf71f455f2.jpg', 'img_69bcf71f455f2.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf71f455f2.jpg', '/mws/apollotech/assets/images/solutions/img_69bcf71f455f2.jpg', 'image/jpeg', 102985, 0, 0, '', '2026-03-23 03:35:31'),
(114, 'img_69bcfbc5e75bf.jpg', 'img_69bcfbc5e75bf.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcfbc5e75bf.jpg', '/mws/apollotech/assets/images/solutions/img_69bcfbc5e75bf.jpg', 'image/jpeg', 114453, 0, 0, '', '2026-03-23 03:35:31'),
(115, 'img_69bcfd0d20344.jpg', 'img_69bcfd0d20344.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcfd0d20344.jpg', '/mws/apollotech/assets/images/solutions/img_69bcfd0d20344.jpg', 'image/jpeg', 42776, 0, 0, '', '2026-03-23 03:35:31'),
(116, 'img_69bd075ebe983.jpg', 'img_69bd075ebe983.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd075ebe983.jpg', '/mws/apollotech/assets/images/solutions/img_69bd075ebe983.jpg', 'image/jpeg', 409691, 0, 0, '', '2026-03-23 03:35:31'),
(117, 'img_69bd078d21f4d.jpg', 'img_69bd078d21f4d.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd078d21f4d.jpg', '/mws/apollotech/assets/images/solutions/img_69bd078d21f4d.jpg', 'image/jpeg', 409691, 0, 0, '', '2026-03-23 03:35:31'),
(118, 'img_69bd0bcf710d1.jpg', 'img_69bd0bcf710d1.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd0bcf710d1.jpg', '/mws/apollotech/assets/images/solutions/img_69bd0bcf710d1.jpg', 'image/jpeg', 434124, 0, 0, '', '2026-03-23 03:35:31'),
(119, 'img_69bd0bdda755f.jpg', 'img_69bd0bdda755f.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd0bdda755f.jpg', '/mws/apollotech/assets/images/solutions/img_69bd0bdda755f.jpg', 'image/jpeg', 278427, 0, 0, '', '2026-03-23 03:35:31'),
(120, 'img_69bd0be168229.jpg', 'img_69bd0be168229.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd0be168229.jpg', '/mws/apollotech/assets/images/solutions/img_69bd0be168229.jpg', 'image/jpeg', 366471, 0, 0, '', '2026-03-23 03:35:31'),
(121, 'img_69bd0be634982.jpg', 'img_69bd0be634982.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bd0be634982.jpg', '/mws/apollotech/assets/images/solutions/img_69bd0be634982.jpg', 'image/jpeg', 265830, 0, 0, '', '2026-03-23 03:35:31'),
(122, 'iot-smart-control.jpg', 'iot-smart-control.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/iot-smart-control.jpg', '/mws/apollotech/assets/images/solutions/iot-smart-control.jpg', 'image/jpeg', 54486, 0, 0, '', '2026-03-23 03:35:31'),
(123, 'me-electrical.jpg', 'me-electrical.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/me-electrical.jpg', '/mws/apollotech/assets/images/solutions/me-electrical.jpg', 'image/jpeg', 94136, 0, 0, '', '2026-03-23 03:35:31'),
(124, 'me-elevator.jpg', 'me-elevator.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/me-elevator.jpg', '/mws/apollotech/assets/images/solutions/me-elevator.jpg', 'image/jpeg', 99695, 0, 0, '', '2026-03-23 03:35:31'),
(125, 'me-hvac.jpg', 'me-hvac.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/me-hvac.jpg', '/mws/apollotech/assets/images/solutions/me-hvac.jpg', 'image/jpeg', 129559, 0, 0, '', '2026-03-23 03:35:31'),
(126, 'sec-access-control.jpg', 'sec-access-control.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-access-control.jpg', '/mws/apollotech/assets/images/solutions/sec-access-control.jpg', 'image/jpeg', 69285, 0, 0, '', '2026-03-23 03:35:31'),
(127, 'sec-cctv.jpg', 'sec-cctv.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-cctv.jpg', '/mws/apollotech/assets/images/solutions/sec-cctv.jpg', 'image/jpeg', 89985, 0, 0, '', '2026-03-23 03:35:31'),
(128, 'sec-guard-tour.jpg', 'sec-guard-tour.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-guard-tour.jpg', '/mws/apollotech/assets/images/solutions/sec-guard-tour.jpg', 'image/jpeg', 508156, 0, 0, '', '2026-03-23 03:35:31'),
(129, 'sec-pa-system.jpg', 'sec-pa-system.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-pa-system.jpg', '/mws/apollotech/assets/images/solutions/sec-pa-system.jpg', 'image/jpeg', 129443, 0, 0, '', '2026-03-23 03:35:31'),
(130, 'sec-parking.jpg', 'sec-parking.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-parking.jpg', '/mws/apollotech/assets/images/solutions/sec-parking.jpg', 'image/jpeg', 125913, 0, 0, '', '2026-03-23 03:35:31'),
(131, 'sec-video-door.jpg', 'sec-video-door.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sec-video-door.jpg', '/mws/apollotech/assets/images/solutions/sec-video-door.jpg', 'image/jpeg', 79356, 0, 0, '', '2026-03-23 03:35:31'),
(132, 'soft-aconnect.jpg', 'soft-aconnect.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/soft-aconnect.jpg', '/mws/apollotech/assets/images/solutions/soft-aconnect.jpg', 'image/jpeg', 112713, 0, 0, '', '2026-03-23 03:35:31'),
(133, 'soft-aevent.jpg', 'soft-aevent.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/soft-aevent.jpg', '/mws/apollotech/assets/images/solutions/soft-aevent.jpg', 'image/jpeg', 116076, 0, 0, '', '2026-03-23 03:35:31'),
(134, 'soft-ahome.jpg', 'soft-ahome.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/soft-ahome.jpg', '/mws/apollotech/assets/images/solutions/soft-ahome.jpg', 'image/jpeg', 74996, 0, 0, '', '2026-03-23 03:35:31'),
(135, 'soft-avoucher.jpg', 'soft-avoucher.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/soft-avoucher.jpg', '/mws/apollotech/assets/images/solutions/soft-avoucher.jpg', 'image/svg+xml', 13514, 0, 0, '', '2026-03-23 03:35:31'),
(136, 'sol-av.jpg', 'sol-av.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-av.jpg', '/mws/apollotech/assets/images/solutions/sol-av.jpg', 'image/jpeg', 120315, 0, 0, '', '2026-03-23 03:35:31'),
(137, 'sol-ict.jpg', 'sol-ict.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-ict.jpg', '/mws/apollotech/assets/images/solutions/sol-ict.jpg', 'image/jpeg', 89244, 0, 0, '', '2026-03-23 03:35:31'),
(138, 'sol-iot.jpg', 'sol-iot.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-iot.jpg', '/mws/apollotech/assets/images/solutions/sol-iot.jpg', 'image/jpeg', 54486, 0, 0, '', '2026-03-23 03:35:31'),
(139, 'sol-me.jpg', 'sol-me.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-me.jpg', '/mws/apollotech/assets/images/solutions/sol-me.jpg', 'image/jpeg', 94136, 0, 0, '', '2026-03-23 03:35:31'),
(140, 'sol-security.jpg', 'sol-security.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-security.jpg', '/mws/apollotech/assets/images/solutions/sol-security.jpg', 'image/jpeg', 89985, 0, 0, '', '2026-03-23 03:35:31'),
(141, 'sol-software.jpg', 'sol-software.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-software.jpg', '/mws/apollotech/assets/images/solutions/sol-software.jpg', 'image/jpeg', 112713, 0, 0, '', '2026-03-23 03:35:31'),
(142, 'sol-telecom.jpg', 'sol-telecom.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/sol-telecom.jpg', '/mws/apollotech/assets/images/solutions/sol-telecom.jpg', 'image/jpeg', 138539, 0, 0, '', '2026-03-23 03:35:31'),
(143, 'tel-ibs.jpg', 'tel-ibs.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/tel-ibs.jpg', '/mws/apollotech/assets/images/solutions/tel-ibs.jpg', 'image/svg+xml', 11144, 0, 0, '', '2026-03-23 03:35:31'),
(144, 'tel-networking.jpg', 'tel-networking.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/tel-networking.jpg', '/mws/apollotech/assets/images/solutions/tel-networking.jpg', 'image/jpeg', 138934, 0, 0, '', '2026-03-23 03:35:31'),
(145, 'tel-pbx.jpg', 'tel-pbx.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/tel-pbx.jpg', '/mws/apollotech/assets/images/solutions/tel-pbx.jpg', 'image/jpeg', 138539, 0, 0, '', '2026-03-23 03:35:31'),
(146, 'tel-walkie-talkie.jpg', 'tel-walkie-talkie.jpg', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/tel-walkie-talkie.jpg', '/mws/apollotech/assets/images/solutions/tel-walkie-talkie.jpg', 'image/jpeg', 57850, 0, 0, '', '2026-03-23 03:35:31'),
(147, 'img_69bcf7fe06558.png', 'img_69bcf7fe06558.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf7fe06558.png', '/mws/apollotech/assets/images/solutions/img_69bcf7fe06558.png', 'image/png', 967378, 0, 0, '', '2026-03-23 03:35:31'),
(148, 'img_69bcf802d2e21.png', 'img_69bcf802d2e21.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf802d2e21.png', '/mws/apollotech/assets/images/solutions/img_69bcf802d2e21.png', 'image/png', 962430, 0, 0, '', '2026-03-23 03:35:31'),
(149, 'img_69bcf809ce5ba.png', 'img_69bcf809ce5ba.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf809ce5ba.png', '/mws/apollotech/assets/images/solutions/img_69bcf809ce5ba.png', 'image/png', 949266, 0, 0, '', '2026-03-23 03:35:31'),
(150, 'img_69bcf8132daee.png', 'img_69bcf8132daee.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf8132daee.png', '/mws/apollotech/assets/images/solutions/img_69bcf8132daee.png', 'image/png', 958464, 0, 0, '', '2026-03-23 03:35:31'),
(151, 'img_69bcf81a16e35.png', 'img_69bcf81a16e35.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf81a16e35.png', '/mws/apollotech/assets/images/solutions/img_69bcf81a16e35.png', 'image/png', 285917, 0, 0, '', '2026-03-23 03:35:31'),
(152, 'img_69bcf9334dcbe.png', 'img_69bcf9334dcbe.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf9334dcbe.png', '/mws/apollotech/assets/images/solutions/img_69bcf9334dcbe.png', 'image/png', 877054, 0, 0, '', '2026-03-23 03:35:31'),
(153, 'img_69bcf96a3b45d.png', 'img_69bcf96a3b45d.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcf96a3b45d.png', '/mws/apollotech/assets/images/solutions/img_69bcf96a3b45d.png', 'image/png', 458015, 0, 0, '', '2026-03-23 03:35:31'),
(154, 'img_69bcfdbc6b9b7.png', 'img_69bcfdbc6b9b7.png', 'C:\\xampp\\htdocs\\mws\\apollotech/assets/images/solutions/img_69bcfdbc6b9b7.png', '/mws/apollotech/assets/images/solutions/img_69bcfdbc6b9b7.png', 'image/png', 747522, 0, 0, '', '2026-03-23 03:35:31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cms_contents`
--
ALTER TABLE `cms_contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_page_key_lang` (`page`,`key_name`,`lang`);

--
-- Chỉ mục cho bảng `cms_history`
--
ALTER TABLE `cms_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx` (`page`,`key_name`);

--
-- Chỉ mục cho bảng `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cms_contents`
--
ALTER TABLE `cms_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT cho bảng `cms_history`
--
ALTER TABLE `cms_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
