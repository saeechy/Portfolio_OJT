<?php
require("../config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';

header('Content-Type: application/json'); //  Tell AJAX this is JSON
error_reporting(E_ALL); //  Helpful while testing
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $activation_token = bin2hex(random_bytes(16));
    $activation_token_hash = hash("sha256", $activation_token);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, account_activation_hash) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $name, $email, $hashedPassword, $activation_token_hash);

    if ($stmt->execute()) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'localhost';
            $mail->Port = 1025;
            $mail->SMTPAuth = false;

            $mail->setFrom("noreply@example.com", "Your App");
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Account Activation";

            $activationLink = "http://localhost/Portfolio_OJT_PHP/src/activateaccount.php?token=$activation_token";

            $mail->Body = <<<HTML
                <p>Hello $name,</p>
                <p>Thank you for registering. Please click the link below to activate your account:</p>
                <p><a href="$activationLink">Activate My Account</a></p>
            HTML;

            $mail->AltBody = "Hello $name,\n\nPlease activate your account here: $activationLink";

            $mail->send();

            echo json_encode(['status' => 'success', 'message' => 'Registered successfully. Activation email sent.']);
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Registered, but email failed: ' . $mail->ErrorInfo
            ]);
        }
    } else {
        if ($conn->errno === 1062) {
            echo json_encode(['status' => 'error', 'message' => 'Email already taken.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
        }
    }

    $stmt->close();
    $conn->close();
}
?>
