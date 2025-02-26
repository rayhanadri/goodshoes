<?php
include "../crud/crud.php";
$crud = new crud();

$res = $crud->getProductsLatest3();
echo $res;