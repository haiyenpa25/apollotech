<?php
$items = [
    [ "title_vi" => "Động Cơ 30 kVA", "title_en" => "Engine 30 kVA", "title_ja" => "エンジン 30 kVA", "title_ko" => "엔진 30 kVA", "img" => "24", "src" => "SITE.\"/img/dzima/DZM-DE424G.png\"", "spec1" => "<strong>Model:</strong> DE436G", "spec2" => "<strong>Động cơ:</strong> 30-33kW", "spec3" => "<strong>Kích thước:</strong> 1.7x0.7x1.07 m", "spec4" => "<strong>Khối lượng:</strong> 360 kg" ],
    [ "title_vi" => "Động Cơ 20 kVA", "title_en" => "Engine 20 kVA", "title_ja" => "エンジン 20 kVA", "title_ko" => "엔진 20 kVA", "img" => "25", "src" => "SITE.\"/img/dzima/DZM-DE424G.png\"", "spec1" => "<strong>Model:</strong> DE427G", "spec2" => "<strong>Động cơ:</strong> 22-24.2kW", "spec3" => "<strong>Kích thước:</strong> 900x650x800 mm", "spec4" => "<strong>Khối lượng:</strong> 230 kg" ],
    [ "title_vi" => "Đầu Phát 31.3 kVA", "title_en" => "Alternator 31.3 kVA", "title_ja" => "オルタネーター 31.3 kVA", "title_ko" => "교류 발전기 31.3 kVA", "img" => "26", "src" => "SITE.\"/img/dzima/DZM-DG184H.jpg\"", "spec1" => "<strong>Model:</strong> DG184G", "spec2" => "<strong>Kích thước:</strong> 522x410x434 mm", "spec3" => "<strong>Khối lượng:</strong> 56.0 kg", "spec4" => "" ],
    [ "title_vi" => "Đầu Phát 20 kVA", "title_en" => "Alternator 20 kVA", "title_ja" => "オルタネーター 20 kVA", "title_ko" => "교류 발전기 20 kVA", "img" => "27", "src" => "SITE.\"/img/dzima/DZM-DG184H.jpg\"", "spec1" => "<strong>Model:</strong> DG184F-S", "spec2" => "<strong>Kích thước:</strong> 522x410x434 mm", "spec3" => "<strong>Khối lượng:</strong> 49.7 kg", "spec4" => "" ],
    [ "title_vi" => "Đầu Phát 13 kVA", "title_en" => "Alternator 13 kVA", "title_ja" => "オルタネーター 13 kVA", "title_ko" => "교류 발전기 13 kVA", "img" => "28", "src" => "SITE.\"/img/dzima/DZM-DG184H.jpg\"", "spec1" => "<strong>Model:</strong> DG164D-S", "spec2" => "<strong>Kích thước:</strong> 392x403x456 mm", "spec3" => "<strong>Khối lượng:</strong> 34.5 kg", "spec4" => "" ],
    [ "title_vi" => "Đầu Phát 11 kVA", "title_en" => "Alternator 11 kVA", "title_ja" => "オルタネーター 11 kVA", "title_ko" => "교류 발전기 11 kVA", "img" => "29", "src" => "SITE.\"/img/dzima/DZM-DG184H.jpg\"", "spec1" => "<strong>Model:</strong> DG164C-S", "spec2" => "<strong>Kích thước:</strong> 392x403x456 mm", "spec3" => "<strong>Khối lượng:</strong> 31.4 kg", "spec4" => "" ],
    [ "title_vi" => "Tủ Hòa Đồng Bộ 2640 kVA", "title_en" => "Synchronization Panel 2640 kVA", "title_ja" => "同期パネル 2640 kVA", "title_ko" => "동기화 패널 2640 kVA", "img" => "30", "src" => "SITE.\"/img/dzima/4c2cda0885c674982dd7.jpg\"", "spec1" => "<strong>Model:</strong> VG4000SM", "spec2" => "", "spec3" => "", "spec4" => "" ],
    [ "title_vi" => "Tủ Hòa Đồng Bộ 2112 kVA", "title_en" => "Synchronization Panel 2112 kVA", "title_ja" => "同期パネル 2112 kVA", "title_ko" => "동기화 패널 2112 kVA", "img" => "31", "src" => "SITE.\"/img/dzima/4c2cda0885c674982dd7.jpg\"", "spec1" => "<strong>Model:</strong> VG3200SM", "spec2" => "<strong>Kích thước:</strong> 80x140x220 cm", "spec3" => "", "spec4" => "" ],
    [ "title_vi" => "Tủ Hòa Đồng Bộ 1650 kVA", "title_en" => "Synchronization Panel 1650 kVA", "title_ja" => "同期パネル 1650 kVA", "title_ko" => "동기화 패널 1650 kVA", "img" => "32", "src" => "SITE.\"/img/dzima/4c2cda0885c674982dd7.jpg\"", "spec1" => "<strong>Model:</strong> VG2500SM", "spec2" => "<strong>Kích thước:</strong> 80x140x220 cm", "spec3" => "", "spec4" => "" ],
    [ "title_vi" => "Tủ Hòa Đồng Bộ 1320 kVA", "title_en" => "Synchronization Panel 1320 kVA", "title_ja" => "同期パネル 1320 kVA", "title_ko" => "동기화 패널 1320 kVA", "img" => "33", "src" => "SITE.\"/img/dzima/4c2cda0885c674982dd7.jpg\"", "spec1" => "<strong>Model:</strong> VG2000SM", "spec2" => "<strong>Kích thước:</strong> 80x140x220 cm", "spec3" => "", "spec4" => "" ],
];

$paths = [
    [ "file" => "san-pham-co-dien.php", "lang" => "vi" ],
    [ "file" => "en/san-pham-co-dien.php", "lang" => "en" ],
    [ "file" => "ja/san-pham-co-dien.php", "lang" => "ja" ],
    [ "file" => "ko/san-pham-co-dien.php", "lang" => "ko" ],
];

foreach ($paths as $p) {
    if (!file_exists($p["file"])) continue;
    $content = file_get_contents($p["file"]);
    
    $injectedHtml = "";
    foreach ($items as $item) {
        $title = $item["title_" . $p["lang"]];
        $contactText = "Liên hệ báo giá";
        $labelModel = "Model";
        $labelEngine = "Động cơ";
        $labelSize = "Kích thước";
        $labelWeight = "Khối lượng";

        if ($p["lang"] === "en") {
            $contactText = "Contact for quote";
            $labelEngine = "Engine";
            $labelSize = "Dimensions";
            $labelWeight = "Weight";
        } elseif ($p["lang"] === "ja") {
            $contactText = "見積もりを依頼する";
            $labelModel = "モデル";
            $labelEngine = "エンジン";
            $labelSize = "寸法";
            $labelWeight = "重量";
        } elseif ($p["lang"] === "ko") {
            $contactText = "견적 문의";
            $labelModel = "모델";
            $labelEngine = "엔진";
            $labelSize = "치수";
            $labelWeight = "무게";
        }

        $r_spec1 = str_replace("Model", $labelModel, $item["spec1"]);
        $r_spec2 = str_replace(["Động cơ", "Kích thước"], [$labelEngine, $labelSize], $item["spec2"]);
        $r_spec3 = str_replace(["Kích thước", "Khối lượng"], [$labelSize, $labelWeight], $item["spec3"]);
        $r_spec4 = str_replace("Khối lượng", $labelWeight, $item["spec4"]);

        $specsHtml = "";
        if ($r_spec1) $specsHtml .= "<div style=\"font-size:0.9rem; color:#555; margin-bottom:4px;\">{$r_spec1}</div>\n                        ";
        if ($r_spec2) $specsHtml .= "<div style=\"font-size:0.9rem; color:#555; margin-bottom:4px;\">{$r_spec2}</div>\n                        ";
        if ($r_spec3) $specsHtml .= "<div style=\"font-size:0.9rem; color:#555; margin-bottom:4px;\">{$r_spec3}</div>\n                        ";
        if ($r_spec4) $specsHtml .= "<div style=\"font-size:0.9rem; color:#555; margin-bottom:4px;\">{$r_spec4}</div>\n                        ";

        $injectedHtml .= "
            <div class=\"product-card item-gen\" data-page=\"1\" style=\"display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;\">
                <div class=\"pc-img\" style=\"position: relative; width: 100%; padding-top: 100%; background: #fff;\">
                    <img class=\"img-fluid\" src=\"<?php echo get_content(\x27san-pham-co-dien\x27, \x27prod_img_{$item["img"]}\x27, {$item["src"]}); ?>\" <?php echo cms_img_attr(\x27san-pham-co-dien\x27, \x27prod_img_{$item["img"]}\x27); ?> alt=\"{$title}\"  style=\"position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;\">
                </div>
                <div class=\"pc-body\" style=\"padding: 20px; display: flex; flex-direction: column; flex-grow: 1;\">
                    <h3 style=\"font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;\">{$title}</h3>
                    <div class=\"pc-spec\" style=\"flex-grow: 1; margin-bottom: 20px;\">
                        ".trim($specsHtml)."
                    </div>
                    <a href=\"<?php echo SITE;?>/lien-he.php\" class=\"btn btn-outline\" style=\"text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;\">
                        <i class=\"fas fa-phone-alt\"></i> {$contactText}
                    </a>
                </div>
            </div>";
    }

    if (strpos($content, "prod_img_24") === false) {
        // Regex match
        $replacement = $injectedHtml . "\n            </div>\n\n        </div>\n\n        <!-- Pagination UI -->";
        $newContent = preg_replace("/\s+<\/div>\s+<\/div>\s+<!-- Pagination UI -->/", $replacement, $content, 1);
        if ($newContent && $newContent !== $content) {
            file_put_contents($p["file"], $newContent);
            echo "Updated " . $p["file"] . "\n";
        } else {
            echo "Failed to match in " . $p["file"] . "\n";
        }
    } else {
        echo "Already updated " . $p["file"] . "\n";
    }
}
?>
