<?php
// Include environment configuration
require_once __DIR__ . '/environment.php';

if (!defined('SMTP_HOST')) define('SMTP_HOST', 'localhost');
if (!defined('SMTP_PORT')) define('SMTP_PORT', 1025);
if (!defined('SMTP_USERNAME')) define('SMTP_USERNAME', '');
if (!defined('SMTP_PASSWORD')) define('SMTP_PASSWORD', '');
if (!defined('SMTP_SECURE')) define('SMTP_SECURE', false);
if (!defined('FROM_EMAIL')) define('FROM_EMAIL', 'test.cj@gmail.com');
if (!defined('TO_EMAIL')) define('TO_EMAIL', 'test.cj@gmail.com');
if (!defined('COMPANY_NAME')) define('COMPANY_NAME', 'テスト株式会社');

// Email Configuration
class EmailConfig {
    // SMTP settings
    const HOST = SMTP_HOST;
    const PORT = SMTP_PORT;
    const USERNAME = SMTP_USERNAME;
    const PASSWORD = SMTP_PASSWORD;
    const SECURE = SMTP_SECURE;
    
    // Email Addresses
    const FROM = FROM_EMAIL;
    const TO = TO_EMAIL;
    const COMPANY = COMPANY_NAME;
    
    /**
     * Check if running in development mode
     */
    public static function isDevelopment() {
        return defined('ENVIRONMENT') && ENVIRONMENT === 'development';
    }
    
    // Email Templates
    public static function getNotificationEmailTemplate($data) {
        $text = "";
        $text .= '<p><span class="label">ホームページよりお問い合わせがありました。<br>ご対応お願い致します。</p>';
        $text .= '<p><span class="label">───────────────────────────────────</p>';
        $text .= '<p><span class="label">お問い合わせ内容</p>';
        $text .= '<p><span class="label">───────────────────────────────────</p>';
        $text .= '<p><span class="label">貴社名:</span><span>'.($data['company_name'] ? $data['company_name'] : '未入力').'</span></p>';
        $text .= '<p><span class="label">お名前:</span><span>'.$data['full_name'].'</span></p>';
        $text .= '<p><span class="label">メールアドレス:</span><span>'.$data['email'].'</span></p>';
        $text .= '<p><span class="label">電話番号:</span><span>'.($data['phone'] ? $data['phone'] : '未入力').'</span></p>';
        $text .= '<p><span class="label">お問い合わせ内容:</span></p>';
        $text .= '<p>'.$data['message'].'</p>';
        
        return $text;
    }
    
    public static function getConfirmationEmailTemplate($data) {
        $text = '<p>お世話になっております。<br>
        '.self::COMPANY.'です。<br>
        このたびは、お問い合わせいただきまして誠にありがとうございます。<br>
        お問い合わせいただいた内容をもとに、<br>
        3営業日以内に担当よりあらためてご連絡を差し上げますので<br>
        今しばらくお待ちくださいませ。<br>
        <br>
        -----<br>
        ※こちらのメールは、自動送信メールです。<br>
        本メールに覚えのない場合は、お手数ですが、<br>
        '.self::COMPANY.'までご連絡ください。<br>
        <br>
        ──────────────<br>
        '.self::COMPANY.'<br>
        〒105-0004<br>
        東京都港区新橋1-12-9 新橋プレイス6F・7F・8F<br>
        TEL：03-4400-4113<br>
        URL：<a href="https://cloud-innovation.co.jp/">https://cloud-innovation.co.jp/</a>
        </p>';
        
        return $text;
    }
}
?> 