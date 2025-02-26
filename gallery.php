<!doctype html>
<html lang="en">
<?php
include "views/header.php";
include "crud/crud.php";
$crud = new crud();
?>

<body>
    <div class="container-fluid" style="padding: 15px;">
        <?php include "views/navbar.php"; ?>

        <div class="row" style="padding-top: 15px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Our Store</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $json = $crud->getGallery();
                            $data = json_decode($json, true);

                            foreach ($data as $item) { ?>
                                <div class="col-lg-3 col-md-6 text-center">
                                    <img class="img element" src="<?php echo $item["image"]; ?>" style="max-width: 250px; margin-top: 10px;" />
                                </div>

                            <?php } ?>

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
    document.title = "Good Shoes Inc. Gallery";
    document.getElementById('linkGallery').classList.add('active');
</script>