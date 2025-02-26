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
                        <h3>About Us</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center" style="margin-bottom: 30px;">
                            <img src="./img/icon/GS_logo.svg" width="200"class="d-inline-block align-top"
                                alt="">
                            <h3><b>GoodShoes Inc.</b></h3>
                        </div>

                        <p>
                            We are a shoe store that offers a wide variety of shoes for men, women, and children. We
                            carry everything from casual sneakers to dress shoes to boots. We also have a large
                            selection of athletic shoes, sandals, and slippers. We are committed to providing our
                            customers with the best possible selection of shoes at the best possible prices.
                        </p>
                        <h4><b>Our Mission</b></h4>
                        <p>
                            Our mission is to provide our customers with the best possible shoe-buying experience. We
                            want to make sure that our customers are happy with their purchases and that they feel
                            confident in the shoes they choose. We are committed to providing excellent customer service
                            and to helping our customers find the perfect pair of shoes.
                        </p>
                        <h4><b>Our Values</b></h4>
                        <p>
                            We believe that everyone deserves to have a great pair of shoes. That's why we offer a wide
                            variety of shoes to fit every budget. We also believe in providing our customers with the
                            best possible service. We are always happy to answer any questions you have about our
                            products.
                        </p>
                        <h4><b>Our Guarantee</b></h4>
                        <p>
                            We are so confident in the quality of our shoes that we offer a 100% satisfaction guarantee.
                            If you are not happy with your purchase, 1 we will refund your money or exchange your shoes
                            for a different size or style.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php include "views/footer.php"; ?>
    </div>
</body>

</html>
<script>
    document.title = "Good Shoes Inc. About Us";
    document.getElementById('linkAboutUs').classList.add('active');
</script>