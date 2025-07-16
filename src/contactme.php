<?php
session_start();
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  $stmt = $conn->prepare("INSERT INTO contact_messages (full_name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);

  if ($stmt->execute()) {
    // ✅ Only send email if DB insert is successful
    $mail = new PHPMailer(true);
    $emails = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'localhost';
        $mail->Port       = 1025;
        $mail->SMTPAuth   = false;
        $mail->SMTPSecure = '';

        $mail->setFrom('jc1289716@gmail.com', 'Mailer');
        $mail->addAddress('jb1289716@gmail.com', 'Joeyboi');
        $mail->addReplyTo('saeechy@gmail.com', 'Information');

        $mail->addAttachment('../img/businesscard.png', 'Contact me');

        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
            <strong>Full Name:</strong> {$name}<br>
            <strong>Email:</strong> {$email}<br>
            <strong>Message:</strong><br>{$message}
        ";
        $mail->AltBody = "Full Name: $name\nEmail: $email\nMessage:\n$message";

        // For email
        $emails->SMTPDebug = 0;
        $emails->isSMTP();
        $emails->Host       = 'localhost';
        $emails->Port       = 1025;
        $emails->SMTPAuth   = false;
        $emails->SMTPSecure = '';

        $emails->setFrom('noreply@gmail.com', 'noreply');
        $emails->addAddress('jb1289716@gmail.com', 'Joeyboi');
        $emails->addReplyTo('saeechy@gmail.com', 'Information');
        $emails->isHTML(true);
        $emails->Subject = 'Thank you for contacting me!';
        $emails->Body    = "
            <strong>Thank you for reaching out, {$name}!</strong><br>
            I appreciate your message and will get back to you as soon as possible.<br>
        ";
        $mail->AltBody = "Full Name: $name\nEmail: $email\nMessage:\n$message";

        $mail->send();
        $emails->send();
        echo "<script>alert('Message sent and email delivered successfully!');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Database saved, but Mailer Error: {$mail->ErrorInfo}');</script>";
    }
  } else {
    echo "<script>alert('Error saving to database.');</script>";
  }

  $stmt->close();
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'src/navigation.php'?>
    </div>
  </nav>
</head>

<body>
  <div class="bg"></div>
  <div class="bg bg2"></div>
  
  <div class="container my-5 fade-in">
    <figure class="text-center my-5">
      <h1 class="display-3 playfair-display-sc-bold">Contact Information</h1>
    </figure>

    <div class="row justify-content-center align-items-start g-5">
      <div class="col-lg-6">
        <section>
          <div class="card shadow" style="border-radius: 15px;">
            <div class="card-body p-4">
              <h1 class="mb-4 text-center playfair-display-sc-bold">Work with me!</h1>
            <form method="POST">
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control form-control-lg" required />
              </div>

              <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control form-control-lg" placeholder="example@example.com" required />
              </div>

              <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea class="form-control" name="message" rows="4" placeholder="Message sent to the employer" required></textarea>
              </div>
              <div class="text-center">
                <button  type="submit" class="btn btn-outline-dark btn-lg px-5">Send</button>
              </div>
            </form>
            </div>
          </div>
        </section>
      </div>

      <div class="col-lg-6 d-flex flex-column gap-4">
      <div class="card shadow border-0 rounded-4">
        <div class="card-body d-flex align-items-center gap-4 ps-4">
          <i class="fa-solid fa-envelope fa-2x text-dark"></i>
          <div>
            <h5 class="mb-1">Email</h5>
            <p class="mb-1 text-muted">jb1289716@gmail.com</p>
            <a href="mailto:jb1289716@gmail.com" class="btn btn-sm btn-outline-dark">Send Email</a>
          </div>
        </div>
      </div>

      <div class="card shadow border-0 rounded-4">
        <div class="card-body d-flex align-items-center gap-4 ps-4">
          <i class="fa-solid fa-phone fa-2x text-dark"></i>
          <div>
            <h5 class="mb-1">Phone</h5>
            <p class="mb-1 text-muted">+63 945 607 5477</p>
            <a href="tel:+639456075477" class="btn btn-sm btn-outline-dark">Call Now</a>
          </div>
        </div>
      </div>

      <div class="card shadow border-0 rounded-4">
        <div class="card-body d-flex align-items-center gap-4 ps-4">
          <i class="fa-brands fa-facebook fa-2x text-dark"></i>
          <div>
            <h5 class="mb-1">Facebook</h5>
            <p class="mb-1 text-muted">facebook.com/Jose.Reyes.899</p>
            <a href="https://facebook.com/Jose.Reyes.899" target="" class="btn btn-sm btn-outline-dark">Visit Profile</a>
          </div>
        </div>
      </div>

      <div class="card shadow border-0 rounded-4">
        <div class="card-body d-flex align-items-center gap-4 ps-4">
          <i class="fa-brands fa-github fa-2x text-dark"></i>
          <div>
            <h5 class="mb-1">GitHub</h5>
            <p class="mb-1 text-muted">github.com/saeechy</p>
            <a href="https://github.com/saeechy" target="" class="btn btn-sm btn-outline-dark">View Projects</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <footer class="py-4 mt-5 text-center">
        <div class="container">
            <div class="row text-center text-md-start align-items-center">
            <div class="col-md-4 mb-3 mb-md-0">
                <p class="mb-0">&copy; 2025 Jose Reyes. All rights reserved.</p>
            </div>
            </div>
        </div>
  </footer>
</body>
</html>