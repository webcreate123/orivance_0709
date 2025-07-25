<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,user-scalable=0">
    <title>お問い合わせ完了</title>
    <link rel="icon" type="image/vnd.microsoft.icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Noto+Sans+JP:wght@100..900&family=Zen+Kaku+Gothic+New:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <style>
        .complete-content {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin: 20px 0;
            text-align: center;
        }
        
        .complete-icon {
            width: 80px;
            height: 80px;
            background: #28a745;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 40px;
        }
        
        .complete-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        
        .complete-message {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .complete-button {
            display: inline-block;
            padding: 12px 30px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s;
        }
        
        .complete-button:hover {
            background: #0056b3;
            color: white;
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
                        <h3 class="c-sub_jp">お問い合わせ完了</h3>
                    </div>
                </div>
                
                <div class="complete-content">
                    <div class="complete-icon">✓</div>
                    <h2 class="complete-title">お問い合わせを受け付けました</h2>
                    <div class="complete-message">
                        <p>お問い合わせいただき、ありがとうございます。</p>
                        <p>ご入力いただいた内容を確認の上、3営業日以内に担当者よりご連絡いたします。</p>
                        <p>今しばらくお待ちくださいませ。</p>
                    </div>
                    <a href="/" class="complete-button">ホームに戻る</a>
                </div>
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