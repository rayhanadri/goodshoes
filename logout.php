<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
unset($_SESSION['username']);
session_unset();

header("Location: login.php");
exit();