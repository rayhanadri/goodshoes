<?php
include "../crud/crud.php";

$crud = new crud();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Or "GET" if you used GET method

    // Get the form data (sanitize these inputs!)
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    // $type = htmlspecialchars($_POST["type"]);
    $type = isset($_POST["type"]) ? htmlspecialchars($_POST["type"]) : "user";
    $password = htmlspecialchars($_POST["password"]);

    // Basic validation (example)
    if (empty($username)) {
        $data = array(
            'result' => false,
            'message' => "Username required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }
    if (empty($email)) {
        $data = array(
            'result' => false,
            'message' => "Email required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }
    if (empty($password)) {
        $data = array(
            'result' => false,
            'message' => "Password required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }

    $json = $crud->insertUser($username, $email, $type, $password);
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