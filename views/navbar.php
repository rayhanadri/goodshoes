<?php
// check login
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$logged_in = false;
if (isset($_SESSION['email'])) {
    $logged_in = true;
}
$is_admin = false;
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == "admin") {
        $is_admin = true;
    }
}
?>
<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="./index.php"><img src="./img/icon/GS_logo.svg" width="30" height="30"
                    class="d-inline-block align-top" alt="logo"> GoodShoes Inc.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" id="linkHome" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="linkProducts" href="./products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="linkGallery" href="./gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="linkAboutUs" href="./about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="linkContactUs" href="./contact_us.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="linkDiskon" href="./hitung_belanja.html">Hitung Diskon</a>
                    </li>
                    <?php if ($is_admin == true) { ?>
                        <li class="nav-item">
                            <a class="nav-link" id="linkMessage" href="./message.php">Message List</a>
                        </li>
                    <?php } ?>

                    <?php if ($logged_in == true) { ?>
                        <li class="nav-item">
                            <a class="nav-link" id="linkLogout" href="./logout.php">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" id="linkLogin" href="./login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="linkRegister" href="./register.php">Register</a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </nav>
    </div>
</div>
<?php if (isset($_SESSION['email'])) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div style="padding: 15px;">
                    Hello <b><?php echo $_SESSION['name'] ?></b> (<?php echo $_SESSION['type'] ?>) have a nice day!
                </div>
            </div>
        </div>
    </div>
<?php } ?>