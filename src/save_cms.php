<?php
session_start();
include 'config.php';

// Save each text block if posted
$fields = ['intro_paragraph', 'about_me', 'my_work', 'get_in_touch'];

foreach ($fields as $field) {
    if (isset($_POST[$field])) {
        $content = $_POST[$field];
        $stmt = $conn->prepare("UPDATE content SET content = ? WHERE key_name = ?");
        $stmt->bind_param("ss", $content, $field);
        $stmt->execute();
        $stmt->close();
    }
}

header("Location: portfolio.php");
exit();
?>