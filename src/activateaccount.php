<?php
$token = $_GET["token"];
$token_hash = hash("sha256", $token);

require "config.php";

$sql = "SELECT * FROM users WHERE account_activation_hash = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    die("Token not found.");
}

$sql = "UPDATE users SET account_activation_hash = NULL WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user["id"]);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="/Portfolio_OJT_PHP/src/src/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Aclonica&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Cursive:wght@400..700&display=swap" rel="stylesheet">
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script defer src="/Portfolio_OJT_PHP/src/src/script.js"></script>
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="card p-5 text-center shadow">
        <h1>Account Activated</h1>
        <p>Your account has been successfully activated.<br>
        You may now <a href="login.php">log in</a>.</p>
    </div>
</body>
</html>


