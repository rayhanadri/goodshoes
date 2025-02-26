<?php
class crud
{
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "goodshoes";

    function __construct()
    {
        $koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$koneksi) {
            echo "Koneksi db gagal.";
        }
    }

    // function
    function connect()
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        return $conn;
    }

    function insertUser($username, $email, $type, $password)
    {
        $conn = $this->connect();
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $arrResult = array(
            "result" => false,   // Boolean
            "message" => "Create User Failed.",   // Boolean
        );

        try {
            $stmt = $conn->prepare("INSERT INTO users (username, email, type, password) VALUES (?, ?, ?, ?)");
            if ($stmt === false) {
                $arrResult["message"] = "Error preparing statement: " . $conn->error;
            }
            $stmt->bind_param("ssss", $username, $email, $type, $password_hashed);
            $result = $stmt->execute();
            if ($result === false) {
                $arrResult["message"] = "Error preparing statement: " . $stmt->error;
            }

            // Check for affected rows (optional but good practice)
            if ($stmt->affected_rows > 0) {
                $arrResult["result"] = true;
                $arrResult["message"] = "User registered successfully!";
            } else {
                // Handle cases where no rows were inserted (e.g., duplicate entry)
                $arrResult["message"] = "Error: No user was registered.  Possible duplicate entry or other issue.";
            }

            $stmt->close(); // Close the statement

        } catch (Exception $e) {
            error_log($e->getMessage());
            $arrResult["message"] = "An error occurred during registration. Please try again later. " . $e->getMessage();
        } finally {
            // Close the connection (if it's not already closed elsewhere)
            if (isset($conn)) {
                $conn->close();
            }
        }

        return json_encode($arrResult);
    }

    function updateUser($username, $email, $type, $password, $id)
    {
        $conn = $this->connect();
        $password_hashed = password_hash($password);
        $stmt = $conn->prepare("UPDATE username = ?, email = ?, type = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssss", $username, $email, $type, $password_hashed, $id);
        $stmt->execute();

        $isSuccess = false;
        if ($stmt->affected_rows == 1) {
            $isSuccess = true;
        }
        $stmt->close();
        $conn->close();

        return $isSuccess;
    }

    function showUsers()
    {
        $conn = $this->connect();
        $sql = "SELECT username, type FROM users";
        $result = $conn->query($sql);

        $conn->close();

        return $result;
    }


    function checkLogin($username, $password)
    {
        $conn = $this->connect();
        $sql = "SELECT password FROM users WHERE username = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        $message = "Login failed.";
        $userFound = false;
        $loginResult = false;

        if ($result->num_rows == 1) { // Check for row result
            $userFound = true;
        } else {
            $message = "User not found.";
        }

        if ($userFound) {
            $row = $result->fetch_assoc();
            $password_db = $row['password'];

            if (password_verify($password, $password_db)) {
                $loginResult = true;
                $message = "Login Success.";
            } else {
                $message = "Login failed. Please check your password.";
            }
        }


        $stmt->close();
        $conn->close();

        //
        $arrResult = array(
            "result" => $loginResult,   // Boolean
            "message" => $message,   // Boolean
        );

        //return true/false result
        return json_encode($arrResult);
    }

    function getProductBrands()
    {
        $data = [];

        $conn = $this->connect();
        $sql = "SELECT DISTINCT merk FROM products";
        $result = $conn->query($sql);

        while ($row = $result->fetch_object()) {
            $data[] = $row; // Add each object to the array
        }

        $conn->close();

        return json_encode($data);
    }


    function getProductType()
    {
        $data = [];

        $conn = $this->connect();
        $sql = "SELECT DISTINCT type FROM products";
        $result = $conn->query($sql);

        while ($row = $result->fetch_object()) {
            $data[] = $row; // Add each object to the array
        }

        $conn->close();

        return json_encode($data);
    }

    function getProducts()
    {
        $data = [];

        $conn = $this->connect();
        $sql = "SELECT id, type, merk, nama, kode_produk, price, image FROM products";
        $result = $conn->query($sql);

        while ($row = $result->fetch_object()) {
            $data[] = $row; // Add each object to the array
        }

        $conn->close();

        return json_encode($data);
    }

    function getProductsLatest4()
    {
        $data = [];

        $conn = $this->connect();
        $sql = "SELECT id, type, merk, nama, kode_produk, price, image FROM products ORDER BY id DESC LIMIT 4";
        $result = $conn->query($sql);

        while ($row = $result->fetch_object()) {
            $data[] = $row; // Add each object to the array
        }

        $conn->close();

        return json_encode($data);
    }

    function getGallery()
    {
        $data = [];

        $conn = $this->connect();
        $sql = "SELECT id, image FROM gallery";
        $result = $conn->query($sql);

        while ($row = $result->fetch_object()) {
            $data[] = $row; // Add each object to the array
        }

        $conn->close();

        return json_encode($data);
    }
}