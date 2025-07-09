<?php
/**
 * Environment Configuration
 * 
 * Loads settings from .env file
 */

// Load environment variables from .env file
function loadEnv($path) {
    if (!file_exists($path)) {
        return false;
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '#') === 0) {
            continue; // Skip comments
        }
        
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            
            // Remove quotes if present
            if (preg_match('/^(["\'])(.*)\1$/', $value, $matches)) {
                $value = $matches[2];
            }
            
            if (!defined($key)) {
                define($key, $value);
            }
        }
    }
    return true;
}

// Load .env file
$envLoaded = loadEnv(__DIR__ . '/../.env');

// Set default values if .env file doesn't exist
if (!$envLoaded) {
    define('DEBUG_MODE', true);
    define('ERROR_REPORTING', true);
}

// Set error reporting based on settings
if (defined('ERROR_REPORTING') && ERROR_REPORTING) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Log info for debugging
if (defined('DEBUG_MODE') && DEBUG_MODE) {
    error_log("Email Service loaded from .env file");
}
?> 