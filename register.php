<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<?php include "views/header.php"; ?>

<body>

    <div class="container-fluid" style="padding: 15px;">
        <?php include "views/navbar.php"; ?>
        <div class="row" style="padding-top: 15px;">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Register Page</h3>
                    </div>
                    <div class="card-body">
                        <form id="registerForm">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password"
                                    name="confirm_password" placeholder="Confirm Password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg mx-auto">Register</button>
                            </div>
                            <br />
                            <br />
                            <br />
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <?php include "views/footer.php"; ?>
</body>

</html>
<script>
    document.title = "Good Shoes Inc. Register";
    document.getElementById('linkRegister').classList.add('active');

    // --- regist
    document.getElementById('registerForm').addEventListener('submit', async function (event) {
        event.preventDefault();  // Prevent default form submission

        const formData = new FormData(this);
        const password = document.getElementById('password').value;
        const confirm_password = document.getElementById('confirm_password').value;

        if (password !== confirm_password) {
            alert('Password and Confirm Password does not match!');
            return false;
        }

        try {
            //Register
            const responseRegist = await fetch('process/createUser.php', {
                method: 'POST',
                body: formData,
            });

            // Check if the response is OK (status 200–299)
            if (!responseRegist.ok) {
                throw new Error('Register error.');
            }

            const dataRegist = await responseRegist.json();  // Parse JSON response

            alert(dataRegist.message);
            if (dataRegist.result === true) {
                //Lanjut Login
                // Send the form data to the server
                const response = await fetch('process/checkLogin.php', {
                    method: 'POST',
                    body: formData,
                });

                // Check if the response is OK (status 200–299)
                if (!response.ok) {
                    throw new Error('Login error.');
                }

                const data = await response.json();  // Parse JSON response

                // alert(data.message);
                if (data.result === true) {
                    window.location.href = "index.php";
                }
            }
        } catch (error) {
            console.error('Error:', error);
            alert('There was an issue with the register form.');
        }
    });



</script>