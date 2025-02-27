<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
unset($_SESSION['email']);
session_unset();

header("Location: login.php");
exit();