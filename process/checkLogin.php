<?php
include "../crud/crud.php";
$crud = new crud();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $json = $crud->checkLogin($username, $password);
    //
    $resultJson = json_decode($json);
    $checkLoginResult = $resultJson->result;
    $checkLoginMessage = $resultJson->message;
    //
    if ($checkLoginResult) {
        session_start();
        session_unset();
        $_SESSION['username'] = $username;
    }

    $data = array(
        'result' => $checkLoginResult,
        'message' => $checkLoginMessage
    );

    header('Content-Type: application/json'); // Important: Set the correct header
    echo json_encode($data);
}
?>