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
                        <h4>All Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Brand</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $json = $crud->getProducts();
                                    $data = json_decode($json, true);

                                    foreach ($data as $item) { ?>
                                        <tr>
                                            <td><?php echo $item["merk"]; ?></td>
                                            <td><?php echo $item["nama"]; ?></td>
                                            <td><?php echo $item["kode_produk"]; ?></td>
                                            <td>Rp. <?php echo number_format($item["price"], 0, ',', '.'); ?></td>
                                            <td><img src="<?php echo $item["image"]; ?>" style="max-height:150px;" /></td>
                                            <td><?php echo $item["id"]; ?></td>
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
    document.title = "Good Shoes Inc. Homepage";
    document.getElementById('linkProducts').classList.add('active');
</script>