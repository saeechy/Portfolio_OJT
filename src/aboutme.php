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
  
  <title>Jose Port | About Me</title>
  <?php include 'src/navigation.php'?>
</head>

<body>
  <div class="bg"></div>
  <div class="bg bg2"></div>
  </div>
</nav>


  <div class="container fade-in my-5">
    <div class="text-center mb-5">
      <h1 class="display-3 playfair-display-sc-bold">About Me</h1>
      <?php if (isset($_SESSION['user_id'])): ?>
        <form method="POST" action="save_cms.php">
          <textarea name="about_me" class="form-control mb1" rows="5"><?php echo htmlspecialchars(string: $content['about_me']);?></textarea>
          <button type="submit" class="btn btn-success my-2">Save Changes</button>
        </form>
      <?php else: ?>
        <p class="h5 text-justify">
          <?php echo htmlspecialchars(string: $content['about_me']); ?>
        </p>
      <?php endif; ?>
    </div>

    <div class="row g-4 mb-5">
      <div class="col-md-6">
        <div class="p-4 border rounded bg-light shadow-sm">
          <h2 class="h4 mb-3">Soft Skills</h2>
          <table class="table table-striped table-bordered">
            <tr><td>Adaptability</td><td>Creative</td></tr>
            <tr><td>Problem Solving</td><td>Patient</td></tr>
            <tr><td>Responsible</td><td>Teamwork</td></tr>
          </table>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-4 border rounded bg-light shadow-sm">
          <h2 class="h4 mb-3">Technical Skills</h2>
          <table class="table table-striped table-bordered">
            <tr><td>Languages:</td><td>HTML, CSS, JavaScript</td></tr>
            <tr><td>Frameworks:</td><td>Vue, React, Node, Angular, Bootstrap, Express</td></tr>
            <tr><td>Tools:</td><td>Github, VSC, Netlify, Wordpress, Stackblitz</td></tr>
            <tr><td>Databases:</td><td>MongoDB, MySQL</td></tr>
            <tr><td>Testing Tool:</td><td>Postman</td></tr>
          </table>
        </div>
      </div>
    </div>

    <div class="row g-4 mb-5">
      <div class="col-md-6">
        <div class="p-4 border rounded bg-white shadow-sm">
          <h2 class="h4 mb-3">Education</h2>
          <table class="table table-hover table-bordered">
            <tr><td><strong>Degree:</strong></td><td>Bachelor of IT, Major in Web Development</td></tr>
            <tr><td><strong>Institution:</strong></td><td>Holy Angel University</td></tr>
            <tr><td><strong>Years:</strong></td><td>2022 - 2026</td></tr>
          </table>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-4 border rounded bg-white shadow-sm">
          <h2 class="h4 mb-3">Certifications</h2>
          <table class="table table-hover table-bordered">
            <thead class="table-light">
              <tr><th>Title</th><th>Link</th></tr>
            </thead>
            <tr>
              <td>Responsive Web Design</td>
              <td><a href="https://www.freecodecamp.org/certification/joeyyboi/responsive-web-design" target="_blank">View</a></td>
            </tr>
            <tr>
              <td>JS Algorithm and Data Structures</td>
              <td><a href="https://www.freecodecamp.org/certification/joeyyboi/javascript-algorithms-and-data-structures" target="_blank">View</a></td>
            </tr>
            <tr>
              <td>SEO - 1</td>
              <td><a href="https://app.hubspot.com/academy/achievements/gcfsjsly/en/1/jose-reyes/seo" target="_blank">View</a></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="text-center mb-4">
      <h2 class="h1 fw-bold playfair-display-sc-bold">Major Projects</h2>
    </div>
    <div class="p-4 border rounded bg-light shadow-sm mb-5">
      <table class="table table-bordered table-striped">
        <tr>
          <td><strong>Tokyo Table</strong></td>
          <td>MEVN stack-based restaurant web app with homepage design, menu search, and CRUD functionality.</td>
        </tr>
        <tr>
          <td><strong>Library Management System</strong></td>
          <td>Designed a system to enhance book cataloging and lending processes.</td>
        </tr>
        <tr>
          <td><strong>Suburbia North (Group)</strong></td>
          <td>Developed a website for this subdivision.</td>
        </tr>
      </table>
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
