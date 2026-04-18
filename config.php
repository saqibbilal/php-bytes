<?php
// config.php
require_once __DIR__ . '/vendor/autoload.php';

// The URL where Herd serves your project
define('BASE_URL', 'http://php-bytes.test');

// Physical paths for file system checks
define('ROOT_PATH', __DIR__);
define('LEETCODE_PATH', ROOT_PATH . '/src/LeetCode');

// Helper to resolve paths to URLs
function asset_url($path) {
    return BASE_URL . '/' . ltrim($path, '/');
}