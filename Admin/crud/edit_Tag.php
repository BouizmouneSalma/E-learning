<?php

require_once  '../../autoload.php';
use Classes\Tag;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editThemeId'])) {
    $tags = explode(',', $_POST['tags']);
    try {
        $theme = new Tag($idTag, $tags);
        $isUpdated = $theme->UpdateTag();
        if ($isUpdated) {
            header("Location: ../listTheme.php");
            exit;
        } else {
            echo "Failed to update the Tage.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
