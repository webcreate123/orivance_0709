<?php
// Get form data from GET parameters (when returning from confirm.php)
$full_name = isset($_GET['full_name']) ? htmlspecialchars($_GET['full_name']) : '';
$company_name = isset($_GET['company_name']) ? htmlspecialchars($_GET['company_name']) : '';
$phone = isset($_GET['phone']) ? htmlspecialchars($_GET['phone']) : '';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
$category = isset($_GET['category']) ? htmlspecialchars($_GET['category']) : '';
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,user-scalable=0">
    <title>お問い合わせ</title>
    <link rel="icon" type="image/vnd.microsoft.icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Noto+Sans+JP:wght@100..900&family=Zen+Kaku+Gothic+New:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <style>
        .error-field { border-color: #ff0000 !important; background-color: #fff5f5 !important; }
        .error-message { color: #ff0000; font-size: 12px; margin-top: 5px; display: none; }
        .required { color: #ff0000; }
        input:focus, textarea:focus, select:focus { outline: none; border-color: #007bff; }
        .error-field:focus { border-color: #ff0000 !important; }
    </style>
</head>

<body>
    <!-- Menu Overlay -->
    <div class="menu-overlay">
        <div class="overlay-links">
            <div class="overlay-links__group">
                <a href="/orivance" class="overlay-links__lead d-flex flex-column align-center flex-center"><span>TOP</span></a>
                <a href="service.html" class="overlay-links__lead d-flex flex-column align-center flex-center">
                    <span>SERVICE</span><span>事業内容</span>
                </a>
                <a href="achieve.html" class="overlay-links__lead d-flex flex-column align-center flex-center">
                    <span>PROJECTS</span><span>事例と実績</span>
                </a>
                <a href="about.html" class="overlay-links__lead d-flex flex-column align-center flex-center">
                    <span>ABOUT</span><span>会社概要</span>
                </a>
                <a href="recruit.html" class="overlay-links__lead d-flex flex-column align-center flex-center">
                    <span>RECRUIT</span><span>採用情報</span>
                </a>
            </div>
            <div class="overlay-links_contact d-flex flex-center">
                <a href="contact.php" class="c-btn_msg d-flex flex-row flex-center align-center">
                    <div class="c-btn_icon d-flex"><img src="assets/img/common/icon_msg_white.png" alt=""></div>
                    <div class="c-btn_contact">
                        <p class="c-btn_en">CONTACT</p><p class="c-btn_jp">お問い合わせ</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <div class="header d-flex flex-row align-center flex-between">
        <a href="/orivance" class="header-logo"><span class="d-flex"><img src="assets/img/common/hd_logo.png" alt=""></span></a>
        <div class="header-item d-flex flex-row align-center">
            <a href="service.html" class="header-item__link">
                <p class="header-item__en">SERVICE</p><p class="header-item__jp">事業内容</p>
            </a>
            <a href="achieve.html" class="header-item__link">
                <p class="header-item__en">PROJECTS</p><p class="header-item__jp">事例と実績</p>
            </a>
            <a href="about.html" class="header-item__link">
                <p class="header-item__en">ABOUT</p><p class="header-item__jp">会社概要</p>
            </a>
            <a href="recruit.html" class="header-item__link">
                <p class="header-item__en">RECRUIT</p><p class="header-item__jp">採用情報</p>
            </a>
            <a href="contact.php" class="c-btn_msg d-flex flex-row flex-center align-center">
                <div class="c-btn_icon d-flex"><img src="assets/img/common/icon_msg_white.png" alt=""></div>
                <div class="c-btn_contact">
                    <p class="c-btn_en">CONTACT</p><p class="c-btn_jp">お問い合わせ</p>
                </div>
            </a>
        </div>
        <div class="sp-menu">
            <div class="sp-menu-item"><span></span><span></span><span></span></div>
        </div>
    </div>

    <!-- Main Content -->
    <main id="contact">
        <div class="contact">
            <div class="contact-inner">
                <div data-wow-delay=".2s" class="c-sub_fv d-flex flex-center wow fadeInUp">
                    <div class="c-sub_ttl">
                        <p class="c-sub_en"><span>CONTACT</span></p>
                        <h3 class="c-sub_jp">お問い合わせ</h3>
                    </div>
                </div>
                
                <form id="contactForm" method="post" action="confirm.php">
                    <div data-wow-delay=".2s" class="contact-item wow fadeInUp">
                        <div class="contact-item_row">
                            <p class="contact-item_ttl">お名前<span class="required">*</span></p>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>" placeholder="例）田中　太郎">
                            <div class="error-message"></div>
                        </div>
                        <div class="contact-item_row">
                            <p class="contact-item_ttl">会社名</p>
                            <input type="text" name="company_name" value="<?php echo $company_name; ?>" placeholder="例）株式会社〇〇">
                            <div class="error-message"></div>
                        </div>
                        <div class="contact-item_row">
                            <p class="contact-item_ttl">TEL</p>
                            <input type="tel" name="phone" value="<?php echo $phone; ?>" placeholder="例）000-0000-0000">
                            <div class="error-message"></div>
                        </div>
                        <div class="contact-item_row">
                            <p class="contact-item_ttl">E-MAIL<span class="required">*</span></p>
                            <input type="email" name="email" value="<?php echo $email; ?>" placeholder="例）example@mail.com">
                            <div class="error-message"></div>
                        </div>
                        <div class="contact-item_row">
                            <p class="contact-item_ttl">お問い合わせカテゴリー</p>
                            <select name="category">
                                <option value="">カテゴリーを選択してください</option>
                                <option value="web_design" <?php echo ($category == 'web_design') ? 'selected' : ''; ?>>Webデザイン</option>
                                <option value="web_development" <?php echo ($category == 'web_development') ? 'selected' : ''; ?>>Web開発</option>
                                <option value="system_development" <?php echo ($category == 'system_development') ? 'selected' : ''; ?>>システム開発</option>
                                <option value="consulting" <?php echo ($category == 'consulting') ? 'selected' : ''; ?>>コンサルティング</option>
                                <option value="recruitment" <?php echo ($category == 'recruitment') ? 'selected' : ''; ?>>採用について</option>
                                <option value="other" <?php echo ($category == 'other') ? 'selected' : ''; ?>>その他</option>
                            </select>
                            <div class="error-message"></div>
                        </div>
                        <div class="contact-item_row">
                            <p class="contact-item_ttl">お問い合わせ内容をご記入ください<span class="required">*</span></p>
                            <textarea name="message" rows="8" placeholder="お問い合わせ内容を詳しくご記入ください"><?php echo $message; ?></textarea>
                            <div class="error-message"></div>
                        </div>
                        <div class="contact-item_check d-flex flex-center">
                            <div class="contact-item_checkBox">
                                <div class="contact-item_agree d-flex flex-row align-center">
                                    <input type="checkbox" name="agree" id="agree">
                                    <label for="agree">上記内容にお間違いがなければチェックをつけてください。<span class="required">*</span></label>
                                </div>
                                <div class="contact-item_privacy d-flex flex-row align-center">
                                    <input type="checkbox" name="privacy" id="privacy">
                                    <label for="privacy">プライバシーポリシーに同意します。<span class="required">*</span></label>
                                </div>
                                <div class="error-message"></div>
                            </div>
                        </div>
                        <div class="contact-item_send d-flex flex-center">
                            <button type="submit" class="c-btn">
                                <span>送信</span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-inner">
            <div class="footer-item d-flex flex-row flex-between">
                <div class="footer-company">
                    <a href="/orivance" class="footer-logo d-flex">
                        <span class="d-flex"><img src="assets/img/common/ft_logo.png" alt=""></span>
                    </a>
                    <p class="footer-company_name">株式会社orivance</p>
                    <p class="footer-company_address">〒472-0043<br>愛知県知立市東栄3丁目48番地</p>
                </div>
                <div class="footer-area d-flex flex-row flex-between">
                    <ul class="footer-area_menu">
                        <li><a href="/orivance" class="footer-area_link d-flex flex-column align-start"><span>TOP</span></a></li>
                        <li><a href="service.html" class="footer-area_link d-flex flex-column align-start"><span>SERVICE</span><span>事業内容</span></a></li>
                        <li><a href="achieve.html" class="footer-area_link d-flex flex-column align-start"><span>PROJECTS</span><span>事例と実績</span></a></li>
                        <li><a href="about.html" class="footer-area_link d-flex flex-column align-start"><span>ABOUT</span><span>会社概要</span></a></li>
                        <li><a href="recruit.html" class="footer-area_link d-flex flex-column align-start"><span>RECRUIT</span><span>採用情報</span></a></li>
                    </ul>
                    <a href="contact.php" class="c-btn_msg d-flex flex-row flex-center align-center">
                        <div class="c-btn_icon d-flex"><img src="assets/img/common/icon_msg_white.png" alt=""></div>
                        <div class="c-btn_contact">
                            <p class="c-btn_en">CONTACT</p><p class="c-btn_jp">お問い合わせ</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="footer-bottom d-flex flex-row align-center flex-between">
                <a href="privacy.html" class="footer-bottom_link">プライバシーポリシー</a>
                <p class="footer-bottom_copy">Copyright © 株式会社orivance</p>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/common.js"></script>
    <script>
        new WOW().init();
        
        // Contact form validation
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                
                $('.error-message').hide().text('');
                $('.contact-item_row input, .contact-item_row textarea, .contact-item_row select').removeClass('error-field');
                
                let isValid = true;
                const errors = {};
                
                // Validate required fields
                const fullName = $('input[name="full_name"]').val().trim();
                if (!fullName) {
                    isValid = false;
                    errors.fullName = 'お名前は必須項目です。';
                }
                
                const email = $('input[name="email"]').val().trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!email) {
                    isValid = false;
                    errors.email = 'メールアドレスは必須項目です。';
                } else if (!emailRegex.test(email)) {
                    isValid = false;
                    errors.email = '正しいメールアドレス形式で入力してください。';
                }
                
                const message = $('textarea[name="message"]').val().trim();
                if (!message) {
                    isValid = false;
                    errors.message = 'お問い合わせ内容は必須項目です。';
                }
                
                const agree = $('input[name="agree"]').is(':checked');
                const privacy = $('input[name="privacy"]').is(':checked');
                
                if (!agree) {
                    isValid = false;
                    errors.agree = '内容確認のチェックは必須です。';
                }
                
                if (!privacy) {
                    isValid = false;
                    errors.privacy = 'プライバシーポリシーへの同意は必須です。';
                }
                
                // Display errors
                if (!isValid) {
                    if (errors.fullName) {
                        $('input[name="full_name"]').addClass('error-field');
                        $('input[name="full_name"]').closest('.contact-item_row').find('.error-message').text(errors.fullName).show();
                    }
                    if (errors.email) {
                        $('input[name="email"]').addClass('error-field');
                        $('input[name="email"]').closest('.contact-item_row').find('.error-message').text(errors.email).show();
                    }
                    if (errors.message) {
                        $('textarea[name="message"]').addClass('error-field');
                        $('textarea[name="message"]').closest('.contact-item_row').find('.error-message').text(errors.message).show();
                    }
                    if (errors.agree || errors.privacy) {
                        $('.contact-item_check .error-message').text(errors.agree || errors.privacy).show();
                    }
                    return false;
                }
                
                this.submit();
            });
            
            $('input, textarea, select').on('input', function() {
                $(this).removeClass('error-field');
                $(this).closest('.contact-item_row').find('.error-message').hide();
            });
            
            $('input[type="checkbox"]').on('change', function() {
                $('.contact-item_check .error-message').hide();
            });
        });
    </script>
</body>
</html> 