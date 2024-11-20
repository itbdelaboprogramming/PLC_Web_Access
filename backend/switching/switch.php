<?php
$page = $_GET['page'] ?? 'home';

// Set a default content file path
$contentFile = 'home.php';

switch ($page) {
    case 'home':
        $contentFile = 'home.php';
        break;
    case 'about':
        $contentFile = 'about.php';
        break;
    case 'contact':
        $contentFile = 'contact.php';
        break;
    default:
        $contentFile = 'error.php'; // Fallback in case of an invalid page
        break;
}

// Include the corresponding content file
include $contentFile;
