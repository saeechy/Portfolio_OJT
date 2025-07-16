<?php
session_start();
include 'config.php'; // DB connection

// Fetch content from the database
$sql = "SELECT key_name, content FROM content";
$result = $conn->query("SELECT key_name, content FROM content");

$content = [
    'intro_paragraph' => '',
    'about_me' => '',
    'my_work' => '',
    'get_in_touch' => ''
];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $content[$row['key_name']] = $row['content'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jose's Portfolio</title>
  <link rel="stylesheet" href="/Portfolio_OJT_PHP/src/src/style.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <?php include 'src/navigation.php'; ?>
</head>
<body>
  <div class="bg"></div>
  <div class="bg bg2"></div>

  <div class="container fade-in">
    <figure class="text-center my-4">
      <h1 class="display-1 fw-bold playfair-display-sc-bold">Jose Favian Reyes</h1>
    </figure>

    <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center my-5 gap-4">
      <div class="container">
        <h2 class="display-5 mb-3">Web Developer | Frontend Developer</h2>

        <?php if (isset($_SESSION['user_id'])): ?>
          <form method="POST" action="save_cms.php" id="">
            <textarea name="intro_paragraph" class="form-control mb-3" rows="10"><?php echo htmlspecialchars($content['intro_paragraph']); ?></textarea>
            <button type="submit" class="btn btn-success">Save Changes</button>
          </form>
        <?php else: ?>
          <p class="h5 text-justify">
            <?php echo htmlspecialchars($content['intro_paragraph']); ?>
          </p>
        <?php endif; ?>
    </div>

      <img class="imgsize rounded shadow-lg" style="width: 100%; height: auto; max-width: 400px;" src="/Portfolio_OJT_PHP/img/pic_imresizer.png" alt="josepic"/>
    </div>

    <div class="container text-center my-6 fade-in">
      <blockquote class="blockquote">
        <p class="mb-0 h4 edu-nsw-act-cursive">
          "Turning imagination into reality."
        </p>
        <footer class="blockquote-footer mt-2">Always be open for growth</footer>
      </blockquote>
    </div>

    <div class="container text-center my-5 fade-in">
      <a href="/Portfolio_OJT/files/CV.pdf" download="CV.pdf" class="btn btn-outline-dark btn-lg px-5">
        CV/Resume
      </a>
    </div>
  </div>

  <section class="container my-5">
    <div class="row g-4 text-center">
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm rounded-4 fade-in">
          <div class="card-body">
            <i class="fa-solid fa-user-astronaut fa-3x text-primary mb-3"></i>
            <h5 class="card-title fw-bold">About Me</h5>
            <p class="card-text text-muted">
              <?php echo htmlspecialchars($content['about_me']); ?>
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm rounded-4 fade-in">
          <div class="card-body">
            <i class="fa-solid fa-code fa-3x text-success mb-3"></i>
            <h5 class="card-title fw-bold">My Work</h5>
            <p class="card-text text-muted">
              <?php echo htmlspecialchars($content['my_work']); ?>
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm rounded-4 fade-in">
          <div class="card-body">
            <i class="fa-solid fa-envelope-open-text fa-3x text-danger mb-3"></i>
            <h5 class="card-title fw-bold">Get In Touch!</h5>
            <p class="card-text text-muted">
              <?php echo htmlspecialchars($content['get_in_touch']); ?>
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <h2 class="text-center my-9 fw-bold display-3 fw-bold playfair-display-sc-bold">Testimonials</h2>

    <div class="testimonial-container">
        <div class="testimonial">
            <i class="fa-solid fa-user-circle testimonial-icon"></i>
            <div>
            <p class="testimonial-text">
                "Always love working with Jose! He is proactive in group works which makes every project better.
                He’s also very easy to talk to, and gets the job done better than what you ask for."
            </p>
            <h4 class="testimonial-author">- June Sarah</h4>
            </div>
        </div>
        <div class="testimonial">
            <i class="fa-solid fa-user-circle testimonial-icon"></i>
            <div>
            <p class="testimonial-text">
                "Jose is a talented developer with great problem-solving skills. Highly recommend working with him!"
            </p>
            <h4 class="testimonial-author">- Anonymous Person</h4>
            </div>
        </div>
        <div class="testimonial">
            <i class="fa-solid fa-user-circle testimonial-icon"></i>
            <div>
            <p class="testimonial-text">
                "Great attention to detail and very efficient. Jose is a great asset to any team!"
            </p>
            <h4 class="testimonial-author">- Anonymous Person II</h4>
            </div>
        </div>
    </div>

  <footer class="py-4 mt-5">
    <div class="container">
      <div class="row text-center text-md-start align-items-center">
        <div class="col-md-4 mb-3 mb-md-0">
          <p class="mb-0">&copy; 2025 Jose Reyes. All rights reserved.</p>
        </div>
        <div class="col-md-4 mb-3 mb-md-0 text-center">
          <a href="/Portfolio_OJT/src/contactme.html" class="mb-1 no-underline">Connect with me!</a>
        </div>
        <div class="col-md-4 text-md-end text-center">
          <p class="mb-0">Designed by Jose Reyes</p>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
