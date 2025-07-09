<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/email_config.php';

class EmailService {
    private $mailer;
    private $config;
    
    public function __construct() {
        $this->config = new EmailConfig();
        $this->initializeMailer();
    }
    
    private function initializeMailer() {
        $this->mailer = new PHPMailer();
        $this->mailer->CharSet = 'UTF-8';
        $this->mailer->isSMTP();
        $this->mailer->SMTPDebug = SMTP::DEBUG_OFF;
        
        // Get SMTP settings
        $this->mailer->Host = EmailConfig::HOST;
        $this->mailer->Port = EmailConfig::PORT;
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = EmailConfig::USERNAME;
        $this->mailer->Password = EmailConfig::PASSWORD;
        
        if (EmailConfig::SECURE) {
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        }
        
        // For development (MailHog), disable authentication if no credentials
        if (EmailConfig::isDevelopment() && empty(EmailConfig::USERNAME)) {
            $this->mailer->SMTPAuth = false;
        }
    }
    
    /**
     * Send notification email to company
     */
    public function sendNotificationEmail($data) {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->setFrom(EmailConfig::FROM, EmailConfig::COMPANY);
            $this->mailer->addAddress(EmailConfig::TO, EmailConfig::COMPANY);
            
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'ホームページより新規のお問い合わせ';
            $this->mailer->Body = EmailConfig::getNotificationEmailTemplate($data);
            
            return $this->mailer->send();
        } catch (Exception $e) {
            error_log("Notification email error: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Send confirmation email to customer
     */
    public function sendConfirmationEmail($data) {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->setFrom(EmailConfig::FROM, EmailConfig::COMPANY);
            $this->mailer->addReplyTo(EmailConfig::FROM, EmailConfig::COMPANY);
            $this->mailer->addAddress($data['email'], $data['full_name']);
            
            $this->mailer->isHTML(true);
            $this->mailer->Subject = '【受付完了】お問い合わせを受け付けました';
            $this->mailer->Body = EmailConfig::getConfirmationEmailTemplate($data);
            
            return $this->mailer->send();
        } catch (Exception $e) {
            error_log("Confirmation email error: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Send both notification and confirmation emails
     */
    public function sendContactEmails($data) {
        $notificationSent = $this->sendNotificationEmail($data);
        $confirmationSent = $this->sendConfirmationEmail($data);
        
        return [
            'notification_sent' => $notificationSent,
            'confirmation_sent' => $confirmationSent,
            'success' => $notificationSent && $confirmationSent
        ];
    }
    
    /**
     * Validate email data
     */
    public function validateEmailData($data) {
        $errors = [];
        
        if (empty($data['full_name'])) {
            $errors[] = 'お名前は必須項目です。';
        }
        
        if (empty($data['email'])) {
            $errors[] = 'メールアドレスは必須項目です。';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = '正しいメールアドレス形式で入力してください。';
        }
        
        if (empty($data['message'])) {
            $errors[] = 'お問い合わせ内容は必須項目です。';
        }
        
        return $errors;
    }
    
    /**
     * Sanitize email data
     */
    public function sanitizeEmailData($data) {
        return [
            'company_name' => isset($data['company_name']) ? htmlspecialchars(trim($data['company_name'])) : '',
            'full_name' => isset($data['full_name']) ? htmlspecialchars(trim($data['full_name'])) : '',
            'email' => isset($data['email']) ? htmlspecialchars(trim($data['email'])) : '',
            'phone' => isset($data['phone']) ? htmlspecialchars(trim($data['phone'])) : '',
            'category' => isset($data['category']) ? htmlspecialchars(trim($data['category'])) : '',
            'message' => isset($data['message']) ? nl2br(htmlspecialchars(trim($data['message']))) : ''
        ];
    }
}
?> 