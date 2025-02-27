<?php
include "../crud/crud.php";
$crud = new crud();

$res = $crud->getProductsLatest4();
echo $res;