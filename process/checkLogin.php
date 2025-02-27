<?php
include "../crud/crud.php";
$crud = new crud();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $json = $crud->checkLogin($email, $password);
    //
    $resultJson = json_decode($json);
    $checkLoginResult = $resultJson->result;
    $checkLoginMessage = $resultJson->message;
    //
    if ($checkLoginResult) {
        session_start();
        session_unset();
        $_SESSION['email'] = $email;

        $name = $crud->getName($email);
        $type = $crud->getUserType($email);
        $_SESSION['name'] = $name;
        $_SESSION['type'] = $type;
    }

    $data = array(
        'result' => $checkLoginResult,
        'message' => $checkLoginMessage
    );

    header('Content-Type: application/json'); // Important: Set the correct header
    echo json_encode($data);
}
?>