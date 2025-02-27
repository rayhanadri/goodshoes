<?php
include "../crud/crud.php";

$crud = new crud();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Or "GET" if you used GET method

    // Get the form data (sanitize these inputs!)
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Basic validation (example)
    if (empty($first_name)) {
        $data = array(
            'result' => false,
            'message' => "First Name required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }
    if (empty($last_name)) {
        $data = array(
            'result' => false,
            'message' => "Last Name required!"
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
    if (empty($phone)) {
        $data = array(
            'result' => false,
            'message' => "Phone required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }
    if (empty($subject)) {
        $data = array(
            'result' => false,
            'message' => "Subject required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }
    if (empty($message)) {
        $data = array(
            'result' => false,
            'message' => "Message required!"
        );
        header('Content-Type: application/json'); // Important: Set the correct header
        echo json_encode($data);
        exit();
    }

    $json = $crud->inserMessage($first_name, $last_name, $email, $phone, $subject, $message);
    $resultJson = json_decode($json);

    $result = $resultJson->result;
    $message = $resultJson->message;

    $data = array(
        'result' => $result,
        'message' => $message
    );
    header('Content-Type: application/json'); // Important: Set the correct header
    echo json_encode($data);
    die;
} else {
    $data = array(
        'result' => false,
        'message' => "Request method invalid."
    );
    header('Content-Type: application/json'); // Important: Set the correct header
    echo json_encode($data);
    die;
}