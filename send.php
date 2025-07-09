<?php
// Include the EmailService
require_once __DIR__ . '/includes/EmailService.php';

if (!empty($_POST)) {
    // Initialize EmailService
    $emailService = new EmailService();
    
    // Sanitize and validate the data
    $data = $emailService->sanitizeEmailData($_POST);
    $errors = $emailService->validateEmailData($data);
    
    if (!empty($errors)) {
        // If validation fails, redirect back to contact form with errors
        $errorString = urlencode(implode(', ', $errors));
        header('Location: contact.php?error=' . $errorString);
        exit;
    }
    
    // Send emails
    $result = $emailService->sendContactEmails($data);
    
    if ($result['success']) {
        // Redirect to completion page
        $url = "";
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
            $url = "https://";   
        else  
            $url = "http://";
        $url = "Location: ".$url.$_SERVER['SERVER_NAME']."/complete.php";
        header($url);
        die();
    } else {
        // Handle email sending errors
        $errorMessage = "メール送信に失敗しました。";
        if (!$result['notification_sent']) {
            $errorMessage .= " 通知メールの送信に失敗しました。";
        }
        if (!$result['confirmation_sent']) {
            $errorMessage .= " 確認メールの送信に失敗しました。";
        }
        
        // Redirect back to contact form with error
        header('Location: contact.php?error=' . urlencode($errorMessage));
        exit;
    }
} else {
    // No POST data, redirect to contact form
    header('Location: contact.php');
    exit;
}
?> 