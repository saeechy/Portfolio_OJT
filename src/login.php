<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header('Location: index.php');
    exit();
}
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Cursive:wght@400..700&display=swap" rel="stylesheet">
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script defer src="/Portfolio_OJT_PHP/src/src/script.js"></script>
    <!--Include these links -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!--Include these links -->
    
</head>

<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>

    <!-- Full-height container to center vertically -->
    <div class="container d-flex align-items-center justify-content-center min-vh-100 fade-in">
    <div class="row w-100 justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5"> <!-- Wider column for "larger" effect -->
        <div class="card shadow-lg border-0 rounded-4">
            
            <!-- Header -->
            <div class="card-header bg-dark text-white text-center rounded-top-4 py-4">
            <h4 class="card-title fw-bold mb-0">Admin Login</h4>
            </div>

            <!-- Body -->
            <div class="card-body p-5">
            <form>
                <div class="form-floating mb-4">
                <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                </div>
                <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <button type="submit" class="btn btn-dark w-100 py-3 fs-5 rounded-3">Login</button>
            </form>
            </div>

            <!-- Footer -->
            <div class="card-footer text-center bg-light rounded-bottom-4 py-3">
            <small class="text-muted">Don't have an account? <a href="register.php">Sign up</a></small>
            </div>
        </div>
        </div>
    </div>
    </div>


    <script>
        document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            $.ajax({
                url: 'backend/checklogin.php',
                method: 'POST',
                data: {
                    email: email,
                    password: password,
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loading-indicator').show();
                },
                success: function (response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            title: "Success!",
                            icon: "success",
                            text: "Login successful. Redirecting...",
                        }).then(() => {
                            window.location.href = 'index.php';
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: response.message || "Incorrect credentials.",
                        });
                    }},
            });
        });
    </script>
</body>
</html>