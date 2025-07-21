<?php
session_start();
session_unset();
session_destroy();
header("Location: /Portfolio_OJT_PHP/src/portfolio.php");
?>
