<!doctype html>
<html lang="en">
<?php
include "views/header.php";
include "crud/crud.php";
$crud = new crud();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] != "admin") {
        header("Location: index.php");
        exit();
    }
}
?>

<body>
    <div class="container-fluid" style="padding: 15px;">
        <?php include "views/navbar.php"; ?>
        <div class="row" style="padding-top: 15px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>All Message</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $json = $crud->getMessage();
                                    $data = json_decode($json, true);

                                    foreach ($data as $item) { ?>
                                        <tr>
                                            <td><?php echo $item["first_name"]; ?></td>
                                            <td><?php echo $item["last_name"]; ?></td>
                                            <td><?php echo $item["email"]; ?></td>
                                            <td><?php echo $item["phone"]; ?></td>
                                            <td><?php echo $item["subject"]; ?></td>
                                            <td><?php echo $item["message"]; ?></td>
                                            <td><?php echo $item["timestamp"]; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "views/footer.php"; ?>
    </div>
</body>

</html>
<script>
    document.title = "Good Shoes Inc. Message";
    document.getElementById('linkMessage').classList.add('active');
</script>