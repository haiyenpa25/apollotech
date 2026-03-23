<?php
// Đảm bảo asset() và các biến logo đã được định nghĩa (phòng khi include độc lập)
if (!function_exists('asset') && defined('SITE')) {
    function asset($n)
    {
        return SITE . '/assets/' . $n;
    }
}
$f_logo_url = function_exists('asset') ? asset('logo.png') : '';
$f_logo_svg = function_exists('asset') ? asset('logo.svg') : '';
?>
<!-- FOOTER -->
<footer class="site-footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <!-- Brand -->
                <div>
                    <div class="footer-logo">
                        <img src="<?php echo $f_logo_url; ?>"
                             alt="Apollo Technologies"
                             onerror="this.onerror=null;this.src='<?php echo $f_logo_svg; ?>'">
                    </div>
                    <p class="footer-desc" <?php echo cms_attr('global', 'footer_desc'); ?>>
                        <?php echo get_content('global', 'footer_desc', 'Apollo Technologies Joint Stock Company – doanh nghiệp công nghệ hướng đến công nghiệp hóa, hiện đại hóa và chuyển đổi số tại Việt Nam.'); ?>
                    </p>
                    <div class="footer-social">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" aria-label="Zalo"><i class="fas fa-comment-dots"></i></a>
                    </div>
                </div>

                <!-- Sitemap -->
                <div>
                    <h5 class="footer-col-ttl" <?php echo cms_attr('global', 'footer_col1'); ?>><?php echo get_content('global', 'footer_col1', 'Trang web'); ?></h5>
                    <ul class="footer-links">
                        <li><a href="<?php echo SITE; ?>/index.php"><span <?php echo cms_attr('global', 'menu_home'); ?>><?php echo get_content('global', 'menu_home', 'Trang chủ'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/solutions.php"><span <?php echo cms_attr('global', 'menu_solutions'); ?>><?php echo get_content('global', 'menu_solutions', 'Giải pháp'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/linh-vuc-hoat-dong.php"><span <?php echo cms_attr('global', 'menu_fields'); ?>><?php echo get_content('global', 'menu_fields', 'Lĩnh vực'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/loai-hinh-du-an.php"><span <?php echo cms_attr('global', 'menu_projects'); ?>><?php echo get_content('global', 'menu_projects', 'Loại hình dự án'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/doi-tac.php"><span <?php echo cms_attr('global', 'menu_partners'); ?>><?php echo get_content('global', 'menu_partners', 'Đối tác'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/tin-tuc.php"><span <?php echo cms_attr('global', 'menu_news'); ?>><?php echo get_content('global', 'menu_news', 'Tin tức'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/lien-he.php"><span <?php echo cms_attr('global', 'menu_contact'); ?>><?php echo get_content('global', 'menu_contact', 'Liên hệ'); ?></span></a></li>
                    </ul>
                </div>

                <!-- Solutions -->
                <div>
                    <h5 class="footer-col-ttl" <?php echo cms_attr('global', 'footer_col2'); ?>><?php echo get_content('global', 'footer_col2', 'Giải pháp'); ?></h5>
                    <ul class="footer-links">
                        <li><a href="<?php echo SITE; ?>/giai-phap-cong-nghe-thong-tin.php"><span <?php echo cms_attr('global', 'menu_sol_cntt'); ?>><?php echo get_content('global', 'menu_sol_cntt', 'Công nghệ thông tin'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/giai-phap-an-ninh.php"><span <?php echo cms_attr('global', 'menu_sol_sec'); ?>><?php echo get_content('global', 'menu_sol_sec', 'Giải pháp An ninh'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/he-thong-thong-tin-lien-lac.php"><span <?php echo cms_attr('global', 'menu_sol_tel'); ?>><?php echo get_content('global', 'menu_sol_tel', 'Thông tin liên lạc'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/giai-phap-av.php"><span <?php echo cms_attr('global', 'menu_sol_av'); ?>><?php echo get_content('global', 'menu_sol_av', 'Âm thanh &amp; Hình ảnh'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/he-thong-co-dien.php"><span <?php echo cms_attr('global', 'menu_sol_me'); ?>><?php echo get_content('global', 'menu_sol_me', 'Hệ thống Cơ điện'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/giai-phap-phan-mem.php"><span <?php echo cms_attr('global', 'menu_sol_sw'); ?>><?php echo get_content('global', 'menu_sol_sw', 'Giải pháp Phần mềm'); ?></span></a></li>
                        <li><a href="<?php echo SITE; ?>/giai-phap-IoT.php"><span <?php echo cms_attr('global', 'menu_sol_iot'); ?>><?php echo get_content('global', 'menu_sol_iot', 'Giải pháp IoT'); ?></span></a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h5 class="footer-col-ttl" <?php echo cms_attr('global', 'footer_col3'); ?>><?php echo get_content('global', 'footer_col3', 'Liên hệ'); ?></h5>
                    <div class="fc-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span <?php echo cms_attr('global', 'footer_address'); ?>><?php echo get_content('global', 'footer_address', 'Tầng 8, 58 Nguyễn Đình Chiểu, P. Tân Định, Q.1, TP. Hồ Chí Minh'); ?></span>
                    </div>
                    <div class="fc-item">
                        <i class="fas fa-phone-alt"></i>
                        <span <?php echo cms_attr('global', 'footer_phone'); ?>><?php echo get_content('global', 'footer_phone', '(+84) 82 343 6996'); ?></span>
                    </div>
                    <div class="fc-item">
                        <i class="fas fa-envelope"></i>
                        <span <?php echo cms_attr('global', 'footer_email'); ?>><?php echo get_content('global', 'footer_email', 'contact@apollotech.vn'); ?></span>
                    </div>
                    <div class="fc-item">
                        <i class="fas fa-clock"></i>
                        <span <?php echo cms_attr('global', 'footer_time'); ?>><?php echo get_content('global', 'footer_time', 'Thứ Hai – Thứ Sáu: 08:00 – 17:30'); ?></span>
                    </div>
                    <!-- Cert Image -->
                    <div style="margin-top:18px;display:flex;align-items:center;gap:12px;padding:12px 14px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:10px;">
                        <img src="<?php echo get_content('global', 'footer_cert_img', 'https://apollotech.vn/wp-content/uploads/2026/02/Thiet-ke-chua-co-ten-3.png'); ?>"
                             <?php echo cms_attr('global', 'footer_cert_img'); ?>
                             alt="ISO 9001:2015"
                             style="width:56px;height:56px;object-fit:contain;flex-shrink:0;">
                        <span style="font-size:.75rem;color:rgba(255,255,255,.6);line-height:1.5;" <?php echo cms_attr('global', 'footer_cert_text'); ?>><?php echo get_content('global', 'footer_cert_text', 'Hệ thống quản lý<br>chất lượng<br><strong style="color:#fff;">ISO 9001:2015</strong>'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <p>&copy; <?php echo date('Y'); ?> <span <?php echo cms_attr('global', 'footer_copyright'); ?>><?php echo get_content('global', 'footer_copyright', 'APOLLO TECHNOLOGIES JOINT STOCK COMPANY. All rights reserved.'); ?></span></p>
                <div class="lang-sw">
                    <img src="https://cdn.gtranslate.net/flags/svg/vi.svg" alt="VI" style="width:18px;border-radius:3px;">
                    <span>VI</span>
                    <i class="fas fa-chevron-up" style="font-size:.55rem;"></i>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Counter animation -->
<script>
(function(){
    function animateNum(el){
        var target = parseInt(el.dataset.target,10);
        var dur    = 2000;
        var step   = target/(dur/16);
        var cur    = 0;
        var t = setInterval(function(){
            cur += step;
            if(cur >= target){ cur=target; clearInterval(t); }
            el.textContent = Math.floor(cur);
        },16);
    }
    var cObs = new IntersectionObserver(function(entries){
        entries.forEach(function(e){
            if(e.isIntersecting){
                e.target.querySelectorAll('[data-target]').forEach(animateNum);
                cObs.unobserve(e.target);
            }
        });
    },{threshold:0.4});
    document.querySelectorAll('.stat-strip').forEach(function(el){ cObs.observe(el); });
})();
</script>

<?php if (is_admin()): ?>
<script src="<?php echo SITE; ?>/assets/js/media-manager.js"></script>
<script src="<?php echo SITE; ?>/assets/js/tinymce-editor.js"></script>
<script src="<?php echo SITE; ?>/assets/js/inline-editor.js"></script>
<?php
endif; ?>
</body>
</html>
