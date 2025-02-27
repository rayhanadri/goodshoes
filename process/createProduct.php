<?php
include "../crud/crud.php";

$crud = new crud();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Or "GET" if you used GET method

    // Get the form data (sanitize these inputs!)
    $type = htmlspecialchars($_POST["type"]);
    $merk = htmlspecialchars($_POST["merk"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $kode_produk = htmlspecialchars($_POST["kode_produk"]);
    $price = htmlspecialchars($_POST["price"]);
    // Basic validation (example)
    if (empty($type)) {
        $data = array(
            'result' => false,
            'message' => "Name required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }
    if (empty($merk)) {
        $data = array(
            'result' => false,
            'message' => "Email required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }
    if (empty($nama)) {
        $data = array(
            'result' => false,
            'message' => "Password required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }
    if (empty($kode_produk)) {
        $data = array(
            'result' => false,
            'message' => "Password required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }
    if (empty($price)) {
        $data = array(
            'result' => false,
            'message' => "Password required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }

    //
    $result = false;
    $message = "Failed.";
    $imagePath = "";
    // 
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {

        // Get file details
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $fileType = $_FILES['foto']['type'];
        // Use pathinfo to get the file extension
        $fileInfo = pathinfo($fileName);
        $fileExtension = strtolower($fileInfo['extension']);

        // Specify the allowed file types (MIME types)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        // Check if the file type is allowed
        if (in_array($fileType, $allowedTypes)) {
            // Set the upload directory
            $uploadDir = '../img/products/';

            // Create the upload directory if it doesn't exist
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $currentTimestamp = date('YmdHis');
            $imagePath = $currentTimestamp . '.' . $fileExtension;

            // Set the file path where the image will be saved
            $destinationPath = $uploadDir . $imagePath;

            // Move the uploaded file from the temporary directory to the upload directory
            if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                $message = "File successfully uploaded: " . $fileName;
            } else {
                $message = "Error uploading file.";
            }
        } else {
            $message = "Only JPEG, PNG, and GIF files are allowed.";
        }
    } else {
        $message = "No file uploaded or there was an upload error.";
    }

    // 
    $imagePath = "./img/products/" . $imagePath;
    $json = $crud->insertProduct($type, $merk, $nama, $kode_produk, $price, $imagePath);
    $resultJson = json_decode($json);

    $result = $resultJson->result;
    $message = $resultJson->message;

    $data = array(
        'result' => $result,
        'message' => $message
    );
    header('Content-Type: application/json'); // Important: Set the correct header
    echo json_encode($data);
    exit();
} else {
    $data = array(
        'result' => false,
        'message' => "Request method invalid."
    );
    header('Content-Type: application/json'); // Important: Set the correct header
    echo json_encode($data);
    exit();
}