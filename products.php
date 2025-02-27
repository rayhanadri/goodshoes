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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal"
            style="margin-top: 15px;">
            Add New Product
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addProductForm" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="type" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="type" name="type">
                                        <option value="Sepatu Bola" selected>Sepatu Bola</option>
                                        <option value="Sepatu Futsal">Sepatu Futsal</option>
                                        <option value="Running">Running</option>
                                        <option value="Sneakers">Sneakers</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_produk" class="col-sm-2 col-form-label">Kode Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kode_produk" name="kode_produk"
                                        placeholder="Kode Produk" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="Price" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mx-auto">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2 -->
        <div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog"
            aria-labelledby="updateProductModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateProductModalLabel">Update Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="updateProductForm" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="id_update" name="id_update" required>
                            <div class="form-group row">
                                <label for="type_update" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="type_update" name="type_update">
                                        <option value="Sepatu Bola" selected>Sepatu Bola</option>
                                        <option value="Sepatu Futsal">Sepatu Futsal</option>
                                        <option value="Running">Running</option>
                                        <option value="Sneakers">Sneakers</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="merk_update" class="col-sm-2 col-form-label">Merk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="merk_update" name="merk_update"
                                        placeholder="Merk" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_update" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_update" name="nama_update"
                                        placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_produk_update" class="col-sm-2 col-form-label">Kode Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kode_produk_update"
                                        name="kode_produk_update" placeholder="Kode Produk" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price_update" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="price_update" name="price_update"
                                        placeholder="Price" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto_update" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" id="foto_update" name="foto_update"
                                        accept="image/*">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mx-auto">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
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
                                        <th>Type</th>
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
                                            <td><?php echo $item["type"]; ?></td>
                                            <td><?php echo $item["kode_produk"]; ?></td>
                                            <td>Rp. <?php echo number_format($item["price"], 0, ',', '.'); ?></td>
                                            <td><img src="<?php echo $item["image"]; ?>" style="max-height:150px;" /></td>

                                            <td><a href="./product_detail.php?id=<?php echo $item["id"]; ?>"
                                                    class="btn btn-sm btn-primary">Product Detail</a>
                                                <br /><button type="button" class="btn btn-sm btn-secondary"
                                                    data-toggle="modal" data-target="#updateProductModal"
                                                    onclick='setModalFormData("<?php echo $item["id"]; ?>", "<?php echo $item["type"]; ?>", "<?php echo $item["merk"]; ?>", "<?php echo $item["nama"]; ?>", "<?php echo $item["kode_produk"]; ?>", "<?php echo $item["price"]; ?>" )'>
                                                    Update Product
                                                </button>
                                                <br /><button class="btn btn-sm btn-danger"
                                                    onclick='deleteConfirmation(<?php echo $item["id"]; ?>)'>Delete
                                                    Product</button>

                                            </td>
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
    document.title = "Good Shoes Inc. Products";
    document.getElementById('linkProducts').classList.add('active');

    // --- regist
    document.getElementById('addProductForm').addEventListener('submit', async function (event) {
        event.preventDefault();  // Prevent default form submission

        const formData = new FormData(this);

        try {
            //Register
            const responseRegist = await fetch('process/createProduct.php', {
                method: 'POST',
                body: formData,
            });

            // Check if the response is OK (status 200–299)
            if (!responseRegist.ok) {
                throw new Error('Register error.');
            }

            const dataRegist = await responseRegist.json();  // Parse JSON response

            alert(dataRegist.message);
            if (dataRegist.result === true) {
                window.location.href = "./products.php";
            }
        } catch (error) {
            console.error('Error:', error);
            alert('There was an issue with the register form.');
        }
    });

    async function deleteProduct(id) {
        try {
            //Register
            const responseRegist = await fetch('process/deleteProduct.php?id=' + id);

            // Check if the response is OK (status 200–299)
            if (!responseRegist.ok) {
                throw new Error('Delete error.');
            }

            const dataRegist = await responseRegist.json();  // Parse JSON response

            alert(dataRegist.message);
            if (dataRegist.result === true) {
                window.location.href = "./products.php";
            }
        } catch (error) {
            console.error('Error:', error);
            alert('There was an issue when delete');
        }
    }

    // 
    function deleteConfirmation(id) {
        // Show a confirmation dialog
        const userConfirmed = window.confirm("Do you want to delete this?");

        // Check the user's response
        if (userConfirmed) {
            deleteProduct(id);
        } else {
            alert("Delete cancelled.");
        }
    }

    //#addProductModal
    function setModalFormData(id, type, merk, nama, kode_produk, price) {
        // Set the form fields' values before showing the modal
        document.getElementById('id_update').value = id;
        document.getElementById('type_update').value = type;
        document.getElementById('merk_update').value = merk;
        document.getElementById('nama_update').value = nama;
        document.getElementById('kode_produk_update').value = kode_produk;
        document.getElementById('price_update').value = price;
    }

    $('#updateProductModal').on('show.bs.modal', function (event) {
        // You can do additional changes here if needed
        console.log("Modal is about to be shown!");
    });

    // Optional: Handle the form submission (just for demonstration)
    document.getElementById('updateProductModal').addEventListener('submit', async function (event) {
        event.preventDefault();
        const form = document.getElementById('updateProductForm');
        const formData = new FormData(form);

        try {
            //Register
            const responseRegist = await fetch('process/updateProduct.php', {
                method: 'POST',
                body: formData,
            });

            // Check if the response is OK (status 200–299)
            if (!responseRegist.ok) {
                throw new Error('Update error.');
            }

            const dataRegist = await responseRegist.json();  // Parse JSON response

            alert(dataRegist.message);
            if (dataRegist.result === true) {
                window.location.href = "./products.php";
            }
        } catch (error) {
            console.error('Error:', error);
            alert('There was an issue with the update form.');
        }
    });
</script>