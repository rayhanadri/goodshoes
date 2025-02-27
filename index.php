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
                        <h3>New Arrival</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $json = $crud->getProductsLatest4();
                            $data = json_decode($json, true);

                            foreach ($data as $item) { ?>
                                <div class="col-lg-3 col-md-6 text-center">
                                    <div class="card element" style="margin-top: 15px;">
                                        <div class="card-header">
                                            <?php echo $item["nama"]; ?>
                                        </div>
                                        <div class="card-body">
                                            <img src="<?php echo $item["image"]; ?>" style="max-width: 250px;" />
                                            <br />
                                            Rp. <?php echo number_format($item["price"], 0, ',', '.'); ?>
                                        </div>
                                        <div class="card-footer">

                                            <a href="./product_detail.php?id=<?php echo $item["id"]; ?>" class="btn btn-primary">Product Detail</a>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 15px;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Brands</h3>
                    </div>
                    <div class="card-body text-center">
                        <?php
                        $json = $crud->getProductBrands();
                        $data = json_decode($json, true);

                        foreach ($data as $item) {
                            echo "<a href='#'><h4>" . $item['merk'] . "</h4></a>" . "<br>";
                        }

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Type</h3>
                    </div>
                    <div class="card-body text-center">
                        <?php
                        $json = $crud->getProductType();
                        $data = json_decode($json, true);

                        foreach ($data as $item) {
                            echo "<a href='#'><h4>" . $item['type'] . "</h4></a>" . "<br>";
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include "views/footer.php"; ?>
    </div>
</body>

</html>
<script>
    document.title = "Good Shoes Inc. Homepage";
    document.getElementById('linkHome').classList.add('active');
</script>