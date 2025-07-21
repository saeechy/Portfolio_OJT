<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Cursive:wght@400..700&display=swap" rel="stylesheet">
<script src="bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script defer src="/Portfolio_OJT_PHP/src/src/script.js"></script>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand">Jose's Portfolio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="/Portfolio_OJT_PHP/src/index.php">Home</a>
                <a class="nav-item nav-link" href="/Portfolio_OJT_PHP/src/aboutme.php">About Me</a>
                <a class="nav-item nav-link" href="/Portfolio_OJT_PHP/src/myprojects.php">My Projects</a>
                <a class="nav-item nav-link" href="/Portfolio_OJT_PHP/src/contactme.php">Contact Me</a>
            </div>
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- If logged in (admin), show Logout button -->
                <button id="logoutBtn" class="btn btn-danger btn-lg px-5 my-2 ms-auto">Logout</button>
            <?php else: ?>
                <!-- If not logged in, show Login link -->
                <a href="/Portfolio_OJT_PHP/src/login.php" class="btn btn-outline-dark btn-lg px-5 ms-auto my-2">Log-in</a>
            <?php endif; ?>

        </div>
    </div>
</nav>

<script>
        $(document).ready(function () {
            $('#logoutBtn').click(function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be logged out!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, log me out!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'backend/logout.php',
                            type: 'POST',
                            success: function (response) {
                                window.location.href = '/Portfolio_OJT_PHP/src/index.php';
                            }
                        });
                    }
                });
            });
        });
    </script>