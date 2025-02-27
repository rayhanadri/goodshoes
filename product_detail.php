<!doctype html>
<html lang="en">
<?php
include "views/header.php";
include "crud/crud.php";
$crud = new crud();

$id = isset($_GET['id']) ? $_GET['id'] : '1';
?>

<body>
    <div class="container-fluid" style="padding: 15px;">
        <?php include "views/navbar.php"; ?>
        <div class="row" style="padding-top: 15px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Product Detail</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        $json = $crud->getProductDetail($id);
                        $data = json_decode($json, true);

                        ?>
                        <img src="<?php echo $data[0]["image"]; ?>" class="rounded mx-auto d-block"
                            style="max-width:300px;" />
                        <br />
                        <table class="table table-bordered">
                            <tr>
                                <th>Merk</th>
                                <td><?php echo $data[0]["merk"]; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Model</th>
                                <td><?php echo $data[0]["nama"]; ?></td>
                            </tr>
                            <tr>
                                <th>Kode Produk</th>
                                <td><?php echo $data[0]["kode_produk"]; ?></td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>Rp. <?php echo number_format($data[0]["price"], 0, ',', '.'); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 15px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Available Stock & Variants</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $json = $crud->getProductVariant($id);
                                $data = json_decode($json, true);

                                foreach ($data as $item) { ?>
                                    <tr>
                                        <td><?php echo $item["size"]; ?></td>
                                        <td><?php echo $item["warna"]; ?></td>
                                        <td><?php echo $item["stock"]; ?></td>
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