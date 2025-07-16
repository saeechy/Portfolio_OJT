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
  <?php include 'src/navigation.php'?>
  <title>Jose Port | My Projects</title>
</head>

<body>
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div id="modalsContainer"></div>
  <div class="container fade-in">
    <figure class="text-center my-5">
      <h1 class="display-3 playfair-display-sc-bold">My Works</h1>
    </figure>
    <div class="text-center mb-5">
      <?php if (isset($_SESSION['user_id'])): ?>
        <form method="POST" action="save_cms.php">
          <textarea name="my_work" class="form-control mb1" rows="5"><?php echo htmlspecialchars(string: $content['my_work']);?></textarea>
          <button type="submit" class="btn btn-success my-2">Save Changes</button>
        </form>
        <?php else: ?>
        <p class="h5 text-justify">
          <?php echo htmlspecialchars(string: $content['my_work']); ?>
        </p>
      <?php endif; ?>
    </div>
    <div class="row" id="projectCards"></div> 
    <div id="modalsContainer"></div>

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

  <script src="/Portfolio_OJT/src/src/script.js"></script>
</body>
</html>
