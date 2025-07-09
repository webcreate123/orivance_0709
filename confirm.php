<?php
// Check if form data was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : '';
    $company_name = isset($_POST['company_name']) ? htmlspecialchars($_POST['company_name']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
    
    // Validate required fields
    $errors = [];
    if (empty($full_name)) $errors[] = 'お名前は必須項目です。';
    if (empty($email)) $errors[] = 'メールアドレスは必須項目です。';
    if (empty($message)) $errors[] = 'お問い合わせ内容は必須項目です。';
    
    // Get category display name
    $category_names = [
        'web_design' => 'Webデザイン',
        'web_development' => 'Web開発',
        'system_development' => 'システム開発',
        'consulting' => 'コンサルティング',
        'recruitment' => '採用について',
        'other' => 'その他'
    ];
    $category_display = isset($category_names[$category]) ? $category_names[$category] : $category;
}
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,user-scalable=0">
    <title>お問い合わせ確認</title>
    <link rel="icon" type="image/vnd.microsoft.icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Noto+Sans+JP:wght@100..900&family=Zen+Kaku+Gothic+New:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <style>
        .confirm-content {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin: 20px 0;
        }
        
        .confirm-row {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }
        
        .confirm-label {
            width: 200px;
            font-weight: bold;
            color: #333;
        }
        
        .confirm-value {
            flex: 1;
            color: #666;
        }
        
        .confirm-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        
        .btn-back, .btn-submit {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-back {
            background: #6c757d;
            color: white;
        }
        
        .btn-submit {
            background: #007bff;
            color: white;
        }
        
        .btn-back:hover {
            background: #5a6268;
        }
        
        .btn-submit:hover {
            background: #0056b3;
        }
        
        .required {
            color: #ff0000;
        }
        
        .error-content {
            text-align: center;
            color: #ff0000;
        }
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
                        <h3 class="c-sub_jp">お問い合わせ確認</h3>
                    </div>
                </div>
                
                <?php if (!empty($errors)): ?>
                    <div class="confirm-content error-content">
                        <h3>エラーが発生しました</h3>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="confirm-buttons">
                            <a href="contact.php" class="btn-back">お問い合わせフォームに戻る</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="confirm-content">
                        <h3>以下の内容で送信します。よろしいですか？</h3>
                        
                        <div class="confirm-row">
                            <div class="confirm-label">お名前<span class="required">*</span></div>
                            <div class="confirm-value"><?php echo $full_name; ?></div>
                        </div>
                        
                        <div class="confirm-row">
                            <div class="confirm-label">会社名</div>
                            <div class="confirm-value"><?php echo $company_name ? $company_name : '未入力'; ?></div>
                        </div>
                        
                        <div class="confirm-row">
                            <div class="confirm-label">TEL</div>
                            <div class="confirm-value"><?php echo $phone ? $phone : '未入力'; ?></div>
                        </div>
                        
                        <div class="confirm-row">
                            <div class="confirm-label">E-MAIL<span class="required">*</span></div>
                            <div class="confirm-value"><?php echo $email; ?></div>
                        </div>
                        
                        <div class="confirm-row">
                            <div class="confirm-label">お問い合わせカテゴリー</div>
                            <div class="confirm-value"><?php echo $category_display ? $category_display : '未選択'; ?></div>
                        </div>
                        
                        <div class="confirm-row">
                            <div class="confirm-label">お問い合わせ内容<span class="required">*</span></div>
                            <div class="confirm-value"><?php echo nl2br($message); ?></div>
                        </div>
                        
                        <div class="confirm-buttons">
                            <a href="contact.php?full_name=<?php echo urlencode($full_name); ?>&company_name=<?php echo urlencode($company_name); ?>&phone=<?php echo urlencode($phone); ?>&email=<?php echo urlencode($email); ?>&category=<?php echo urlencode($category); ?>&message=<?php echo urlencode($message); ?>" class="btn-back">修正する</a>
                            <form method="post" action="send.php" style="display: inline;">
                                <input type="hidden" name="full_name" value="<?php echo htmlspecialchars($full_name); ?>">
                                <input type="hidden" name="company_name" value="<?php echo htmlspecialchars($company_name); ?>">
                                <input type="hidden" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
                                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                                <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
                                <input type="hidden" name="message" value="<?php echo htmlspecialchars($message); ?>">
                                <button type="submit" class="btn-submit">送信する</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
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
    </script>
</body>
</html> 