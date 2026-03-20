<?php
$page_title = "Liên hệ";
$page_desc  = "Liên hệ với Apollo Technologies - Giải pháp công nghệ toàn diện cho doanh nghiệp. Địa chỉ: Tầng 8, 58 Nguyễn Đình Chiểu, Q1, TP.HCM.";
include 'includes/header.php';
?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <span class="section-tag light" style="margin-bottom:14px;" <?php echo cms_attr('lien-he', 'hero_tag'); ?>><?php echo get_content('lien-he', 'hero_tag', 'Liên hệ với chúng tôi'); ?></span>
            <h1 <?php echo cms_attr('lien-he', 'hero_title'); ?>><?php echo get_content('lien-he', 'hero_title', 'Liên Hệ'); ?></h1>
            <p <?php echo cms_attr('lien-he', 'hero_desc'); ?>><?php echo get_content('lien-he', 'hero_desc', 'Bạn có dự án muốn thực hiện? Đội ngũ chuyên gia của chúng tôi sẵn sàng hỗ trợ. Hãy liên hệ để được tư vấn miễn phí.'); ?></p>
            <div class="page-breadcrumb">
                <a href="<?php echo SITE;?>/index.php">Trang chủ</a>
                <i class="fas fa-chevron-right"></i>
                <span>Liên hệ</span>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section style="padding:80px 0;background:var(--c-surface);">
    <div class="container">
        <div class="contact-grid">
            <!-- Info -->
            <div data-reveal>
                <span class="section-tag" style="margin-bottom:18px;" <?php echo cms_attr('lien-he', 'office_tag'); ?>><?php echo get_content('lien-he', 'office_tag', 'Văn phòng của chúng tôi'); ?></span>
                <h2 class="section-title" style="margin-bottom:8px;" <?php echo cms_attr('lien-he', 'office_title'); ?>><?php echo get_content('lien-he', 'office_title', 'CÔNG TY CỔ PHẦN<br><span>APOLLO TECHNOLOGIES</span>'); ?></h2>
                <p class="section-desc" style="margin-bottom:36px;" <?php echo cms_attr('lien-he', 'office_desc'); ?>>
                    <?php echo get_content('lien-he', 'office_desc', 'Quý khách cần hỗ trợ hoặc giải đáp thắc mắc xin gởi yêu cầu cho chúng tôi qua hệ thống hỗ trợ trực tuyến. Đội ngũ nhân viên phục vụ khách hàng của chúng tôi sẽ nhiệt tình tư vấn Quý khách.'); ?>
                </p>

                <div class="contact-info-item">
                    <div class="ci-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="ci-text">
                        <h4>Văn phòng Hồ Chí Minh (Hội sở)</h4>
                        <p>Tầng 8, 58 Nguyễn Đình Chiểu, Phường Tân Định, Quận 1, TP. Hồ Chí Minh</p>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="ci-icon"><i class="fas fa-building"></i></div>
                    <div class="ci-text">
                        <h4>Văn phòng Hà Nội</h4>
                        <p>Số 6, Tầng 13, Khu 13, Khu đô thị mới Định Công, Phường Phụng Liệt, Hoàng Mai, Hà Nội</p>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="ci-icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="ci-text">
                        <h4>Số điện thoại</h4>
                        <p><a href="tel:+84823436996">(+84) 82 343 6996</a> &nbsp;|&nbsp;
                           <a href="tel:+84971996339">(+84) 97 199 6339</a></p>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="ci-icon"><i class="fas fa-envelope"></i></div>
                    <div class="ci-text">
                        <h4>Email</h4>
                        <p><a href="mailto:contact@apollotech.vn">contact@apollotech.vn</a></p>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="ci-icon"><i class="fas fa-clock"></i></div>
                    <div class="ci-text">
                        <h4>Giờ làm việc</h4>
                        <p>Thứ Hai – Thứ Sáu: 08:00 – 17:30</p>
                    </div>
                </div>

                <!-- Map placeholder -->
                <div style="width:100%;height:250px;border-radius:12px;overflow:hidden;margin-top:10px;border:1px solid var(--c-border);">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4636396938456!2d106.68742527465397!3d10.787952989358337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528bef7e4e6b9%3A0x68a72b64b028a4cd!2s58%20Nguy%E1%BB%85n%20%C4%90%C3%ACnh%20Chi%E1%BB%83u%2C%20Ph%C6%B0%E1%BB%9Dng%20T%C3%A2n%20%C4%90%E1%BB%8Bnh%2C%20Qu%E1%BA%ADn%201%2C%20Th%C3%A0nh%20ph%E1%BB%91%20H%E1%BB%93%20Ch%C3%AD%20Minh!5e0!3m2!1svi!2svn!4v1710000000000"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <!-- Form -->
            <div data-reveal data-reveal-delay="2">
                <div class="contact-form">
                    <h3 style="font-family:'Montserrat',sans-serif;font-size:1.3rem;font-weight:800;color:var(--c-text-h);margin-bottom:6px;" <?php echo cms_attr('lien-he', 'form_title'); ?>>
                        <?php echo get_content('lien-he', 'form_title', 'Gửi yêu cầu tư vấn'); ?>
                    </h3>
                    <p style="font-size:.85rem;color:var(--c-text-soft);margin-bottom:24px;" <?php echo cms_attr('lien-he', 'form_desc'); ?>>
                        <?php echo get_content('lien-he', 'form_desc', 'Điền vào biểu mẫu và chúng tôi sẽ phản hồi trong vòng 24 giờ.'); ?>
                    </p>
                    <form action="#" method="post">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="fname">Họ <span style="color:var(--c-red);">*</span></label>
                                <input type="text" id="fname" name="fname" placeholder="Nguyễn" required>
                            </div>
                            <div class="form-group">
                                <label for="lname">Tên <span style="color:var(--c-red);">*</span></label>
                                <input type="text" id="lname" name="lname" placeholder="Văn An" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span style="color:var(--c-red);">*</span></label>
                            <input type="email" id="email" name="email" placeholder="ban@congty.com.vn" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" id="phone" name="phone" placeholder="0xxx xxx xxx">
                        </div>
                        <div class="form-group">
                            <label for="service">Dịch vụ quan tâm</label>
                            <select id="service" name="service">
                                <option value="">-- Chọn dịch vụ --</option>
                                <option>Hạ tầng CNTT</option>
                                <option>Giải pháp An ninh</option>
                                <option>Viễn thông</option>
                                <option>Âm thanh & Hình ảnh (AV)</option>
                                <option>Hệ thống Cơ điện (M&E)</option>
                                <option>Giải pháp Phần mềm</option>
                                <option>Giải pháp IoT</option>
                                <option>Nhiều dịch vụ / Khác</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="msg">Nội dung yêu cầu <span style="color:var(--c-red);">*</span></label>
                            <textarea id="msg" name="msg" placeholder="Mô tả dự án hoặc yêu cầu của bạn..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">
                            <i class="fas fa-paper-plane"></i> Gửi yêu cầu
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
