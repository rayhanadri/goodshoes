<?php
include "../crud/crud.php";
$crud = new crud();

$id = isset($_GET['id']) ? $_GET['id'] : '1';

$res = $crud->getProductDetail($id);
echo $res;



