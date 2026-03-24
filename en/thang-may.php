<?php include '../includes/header.php'; ?>

<!-- Page Hero -->
<section class="page-hero" style="background: linear-gradient(135deg, #0d2b5e 0%, #1a4a8a 60%, #0066CC 100%);">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php">Trang chủ</a>
            <span>/</span>
            <a href="<?php echo SITE;?>/san-pham-co-dien.php">Sản phẩm</a>
            <span>/</span>
            <span>Thang máy</span>
        </nav>
        <h1 <?php echo cms_attr('thang-may', 'hero_title'); ?>><?php echo get_content('thang-may', 'hero_title', 'SẢN PHẨM <span>THANG MÁY</span>'); ?></h1>
        <p <?php echo cms_attr('thang-may', 'hero_desc'); ?>><?php echo get_content('thang-may', 'hero_desc', 'Apollo Technologies là nhà phân phối, tư vấn và triển khai giải pháp thang máy Hyundai tại Việt Nam. Chúng tôi cung cấp đầy đủ các loại thang máy chất lượng cao, đáp ứng nhu cầu đa dạng từ nhà ở, văn phòng, bệnh viện đến các công trình quy mô lớn.'); ?></p>
    </div>
</section>

<!-- Danh mục -->
<section style="background:#f8fafc; padding:72px 0;">
    <div class="container">
        <div style="text-align:center;margin-bottom:56px;">
            <h2 <?php echo cms_attr('thang-may','sec1_title'); ?> style="font-size:2rem;color:var(--c-navy);font-weight:700;margin-bottom:12px;"><?php echo get_content('thang-may','sec1_title','Các loại thang máy Apollo cung cấp'); ?></h2>
            <p <?php echo cms_attr('thang-may','sec1_desc'); ?> style="color:#6b7280;max-width:640px;margin:0 auto;"><?php echo get_content('thang-may','sec1_desc','Danh mục sản phẩm đa dạng, phù hợp với mọi nhu cầu và loại công trình — từ nhà ở đến bệnh viện, từ nhà máy đến trung tâm thương mại.'); ?></p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:40px;">

            <!-- Card 1: Thang máy khách -->
            <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,.07);display:flex;flex-direction:column;">
                <div style="height:280px;overflow:hidden;">
                    <img <?php echo cms_img_attr('thang-may', 'img_passenger'); ?>
                         src="<?php echo get_content('thang-may','img_passenger','https://images.unsplash.com/photo-1559827260-dc66d52bef19?auto=format&fit=crop&w=800&q=80'); ?>"
                         alt="Thang máy khách"
                         style="width:100%;height:100%;object-fit:cover;transition:transform .4s;<?php echo is_admin()?'cursor:pointer;outline:2px dashed #0066CC;outline-offset:-2px;':''; ?>"
                         title="<?php echo is_admin()?'Click để thay ảnh':''; ?>">
                </div>
                <div style="padding:28px 32px;flex:1;display:flex;flex-direction:column;">
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                        <div style="width:40px;height:40px;background:#EEF5FF;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-users" style="color:#0066CC;font-size:1.1rem;"></i></div>
                        <div>
                            <h3 <?php echo cms_attr('thang-may','h_passenger'); ?> style="font-size:1.25rem;font-weight:700;color:#0d2b5e;margin:0;"><?php echo get_content('thang-may','h_passenger','Thang máy tải khách'); ?></h3>
                            <small style="color:#6b7280;">Passenger Elevator</small>
                        </div>
                    </div>
                    <p <?php echo cms_attr('thang-may','p_passenger'); ?> style="color:#4b5563;line-height:1.75;font-size:.95rem;flex:1;"><?php echo get_content('thang-may','p_passenger','Thang máy tải khách được sử dụng phổ biến trong các tòa văn phòng, chung cư, khách sạn và trung tâm thương mại. Hệ thống được thiết kế tối ưu cho lưu lượng hành khách cao, đảm bảo vận hành ổn định, an toàn và êm ái. Đa dạng tải trọng, kích thước cabin và nội thất theo yêu cầu.'); ?></p>
                    <a href="<?php echo SITE;?>/lien-he.php" style="display:inline-flex;align-items:center;gap:8px;color:#0066CC;font-weight:600;text-decoration:none;margin-top:16px;font-size:.9rem;">Tư vấn báo giá <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Card 2: Thang máy bệnh viện -->
            <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,.07);display:flex;flex-direction:column;">
                <div style="height:280px;overflow:hidden;">
                    <img <?php echo cms_img_attr('thang-may', 'img_hospital'); ?>
                         src="<?php echo get_content('thang-may','img_hospital','https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=800&q=80'); ?>"
                         alt="Thang máy bệnh viện"
                         style="width:100%;height:100%;object-fit:cover;transition:transform .4s;<?php echo is_admin()?'cursor:pointer;':''; ?>"
                         title="<?php echo is_admin()?'Click để thay ảnh':''; ?>">
                </div>
                <div style="padding:28px 32px;flex:1;display:flex;flex-direction:column;">
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                        <div style="width:40px;height:40px;background:#FFF3E0;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-hospital-alt" style="color:#E65100;font-size:1.1rem;"></i></div>
                        <div>
                            <h3 <?php echo cms_attr('thang-may','h_hospital'); ?> style="font-size:1.25rem;font-weight:700;color:#0d2b5e;margin:0;"><?php echo get_content('thang-may','h_hospital','Thang máy bệnh viện'); ?></h3>
                            <small style="color:#6b7280;">Hospital Elevator</small>
                        </div>
                    </div>
                    <p <?php echo cms_attr('thang-may','p_hospital'); ?> style="color:#4b5563;line-height:1.75;font-size:.95rem;flex:1;"><?php echo get_content('thang-may','p_hospital','Được thiết kế chuyên dụng để vận chuyển bệnh nhân, cáng stretcher và thiết bị y tế một cách an toàn và nhanh chóng. Cabin rộng rãi, cửa mở lớn, vận hành êm – chính xác, giảm thiểu rung động, đảm bảo sự thoải mái cho bệnh nhân.'); ?></p>
                    <a href="<?php echo SITE;?>/lien-he.php" style="display:inline-flex;align-items:center;gap:8px;color:#0066CC;font-weight:600;text-decoration:none;margin-top:16px;font-size:.9rem;">Tư vấn báo giá <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Card 3: Thang máy ô tô -->
            <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,.07);display:flex;flex-direction:column;">
                <div style="height:280px;overflow:hidden;">
                    <img <?php echo cms_img_attr('thang-may', 'img_car'); ?>
                         src="<?php echo get_content('thang-may','img_car','https://images.unsplash.com/photo-1590674899484-d5640e854abe?auto=format&fit=crop&w=800&q=80'); ?>"
                         alt="Thang máy ô tô hàng hóa"
                         style="width:100%;height:100%;object-fit:cover;transition:transform .4s;<?php echo is_admin()?'cursor:pointer;':''; ?>"
                         title="<?php echo is_admin()?'Click để thay ảnh':''; ?>">
                </div>
                <div style="padding:28px 32px;flex:1;display:flex;flex-direction:column;">
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                        <div style="width:40px;height:40px;background:#E8F5E9;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-car" style="color:#2E7D32;font-size:1.1rem;"></i></div>
                        <div>
                            <h3 <?php echo cms_attr('thang-may','h_car'); ?> style="font-size:1.25rem;font-weight:700;color:#0d2b5e;margin:0;"><?php echo get_content('thang-may','h_car','Thang máy tải ô tô &amp; hàng hóa'); ?></h3>
                            <small style="color:#6b7280;">Car &amp; Cargo Elevator</small>
                        </div>
                    </div>
                    <p <?php echo cms_attr('thang-may','p_car'); ?> style="color:#4b5563;line-height:1.75;font-size:.95rem;flex:1;"><?php echo get_content('thang-may','p_car','Là giải pháp tối ưu cho bãi đậu xe, nhà máy, kho bãi và trung tâm logistics. Với tải trọng lớn, kết cấu chắc chắn và vận hành đáng tin cậy, thang máy tải ô tô và hàng hóa giúp việc vận chuyển xe hoặc hàng nặng dễ dàng và an toàn.'); ?></p>
                    <a href="<?php echo SITE;?>/lien-he.php" style="display:inline-flex;align-items:center;gap:8px;color:#0066CC;font-weight:600;text-decoration:none;margin-top:16px;font-size:.9rem;">Tư vấn báo giá <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Card 4: Thang thực phẩm -->
            <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,.07);display:flex;flex-direction:column;">
                <div style="height:280px;overflow:hidden;">
                    <img <?php echo cms_img_attr('thang-may', 'img_food'); ?>
                         src="<?php echo get_content('thang-may','img_food','https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=800&q=80'); ?>"
                         alt="Thang máy thực phẩm"
                         style="width:100%;height:100%;object-fit:cover;transition:transform .4s;<?php echo is_admin()?'cursor:pointer;':''; ?>"
                         title="<?php echo is_admin()?'Click để thay ảnh':''; ?>">
                </div>
                <div style="padding:28px 32px;flex:1;display:flex;flex-direction:column;">
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                        <div style="width:40px;height:40px;background:#FFF8E1;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-utensils" style="color:#F57F17;font-size:1.1rem;"></i></div>
                        <div>
                            <h3 <?php echo cms_attr('thang-may','h_food'); ?> style="font-size:1.25rem;font-weight:700;color:#0d2b5e;margin:0;"><?php echo get_content('thang-may','h_food','Thang máy tải thực phẩm'); ?></h3>
                            <small style="color:#6b7280;">Food Lift (Dumbwaiter)</small>
                        </div>
                    </div>
                    <p <?php echo cms_attr('thang-may','p_food'); ?> style="color:#4b5563;line-height:1.75;font-size:.95rem;flex:1;"><?php echo get_content('thang-may','p_food','Thang mini chuyên dụng cho nhà hàng, khách sạn, café và bếp công nghiệp. Giúp vận chuyển thức ăn, đồ uống và vật dụng giữa các tầng nhanh chóng, giảm thiểu công sức của nhân viên và nâng cao hiệu quả phục vụ.'); ?></p>
                    <a href="<?php echo SITE;?>/lien-he.php" style="display:inline-flex;align-items:center;gap:8px;color:#0066CC;font-weight:600;text-decoration:none;margin-top:16px;font-size:.9rem;">Tư vấn báo giá <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hyundai Brand -->
<section style="background:#fff;padding:72px 0;">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;">
            <div style="border-radius:16px;overflow:hidden;box-shadow:0 8px 32px rgba(0,0,0,.12);">
                <img <?php echo cms_img_attr('thang-may', 'img_brand'); ?>
                     src="<?php echo get_content('thang-may','img_brand','https://images.unsplash.com/photo-1486325212027-8081e485255e?auto=format&fit=crop&w=800&q=80'); ?>"
                     alt="Hyundai Elevators"
                     style="width:100%;height:420px;object-fit:cover;<?php echo is_admin()?'cursor:pointer;':''; ?>"
                     title="<?php echo is_admin()?'Click để thay ảnh':''; ?>">
            </div>
            <div>
                <div style="display:inline-block;background:#EEF5FF;color:#0066CC;font-size:.8rem;font-weight:700;padding:5px 14px;border-radius:20px;letter-spacing:.08em;margin-bottom:16px;">ĐỐI TÁC THƯƠNG HIỆU</div>
                <h2 <?php echo cms_attr('thang-may','brand_title'); ?> style="font-size:2.2rem;font-weight:800;color:#0d2b5e;margin-bottom:20px;line-height:1.2;"><?php echo get_content('thang-may','brand_title','HYUNDAI<br>ELEVATORS'); ?></h2>
                <p <?php echo cms_attr('thang-may','brand_desc'); ?> style="color:#4b5563;line-height:1.8;margin-bottom:28px;"><?php echo get_content('thang-may','brand_desc','Apollo Technologies là <strong>nhà phân phối, tư vấn và triển khai giải pháp thang máy Hyundai</strong> tại Việt Nam. Với thiết kế hiện đại, vận hành êm ái và bền bỉ, thang máy Hyundai đáp ứng nhu cầu đa dạng từ nhà ở, văn phòng đến các công trình quy mô lớn trên toàn quốc.'); ?></p>
                <div style="display:flex;gap:16px;flex-wrap:wrap;">
                    <div style="display:flex;align-items:center;gap:8px;color:#059669;font-weight:600;font-size:.9rem;"><i class="fas fa-check-circle"></i> Chính hãng 100%</div>
                    <div style="display:flex;align-items:center;gap:8px;color:#059669;font-weight:600;font-size:.9rem;"><i class="fas fa-check-circle"></i> Bảo hành toàn diện</div>
                    <div style="display:flex;align-items:center;gap:8px;color:#059669;font-weight:600;font-size:.9rem;"><i class="fas fa-check-circle"></i> Hỗ trợ kỹ thuật 24/7</div>
                </div>
                <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary" style="margin-top:28px;display:inline-flex;align-items:center;gap:8px;"><i class="fas fa-paper-plane"></i> Liên hệ tư vấn ngay</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('thang-may','cta_title'); ?>><?php echo get_content('thang-may','cta_title','Cần tư vấn và lắp đặt Thang máy?'); ?></h2>
        <p <?php echo cms_attr('thang-may','cta_desc'); ?>><?php echo get_content('thang-may','cta_desc','Đội ngũ kỹ sư Apollo luôn sẵn sàng khảo sát, thiết kế và triển khai giải pháp thang máy phù hợp với công trình của bạn.'); ?></p>
        <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
            <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Yêu cầu báo giá</a>
            <a href="tel:+84823436996" class="btn btn-ghost"><i class="fas fa-phone-alt"></i> (+84) 82 343 6996</a>
        </div>
    </div>
</section>

<style>
@media(max-width:768px){
    div[style*="grid-template-columns:repeat(2,1fr)"],
    div[style*="grid-template-columns:1fr 1fr"]{grid-template-columns:1fr !important;}
}
</style>

<?php include '../includes/footer.php'; ?>
