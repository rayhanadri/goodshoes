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
                        <h3>Login Page</h3>
                    </div>
                    <div class="card-body">
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg mx-auto">Login</button>

                            </div>
                            <br />
                            <br />
                            <br />
                            <a href="./register.php">
                                Register new account here
                            </a>


                        </form>
                    </div>

                </div>
            </div>
        </div>
        <?php include "views/footer.php"; ?>
</body>

</html>
<script>
    document.title = "Good Shoes Inc. Login";
    document.getElementById('linkLogin').classList.add('active');

    // --- login check
    // Add event listener for form submission
    document.getElementById('loginForm').addEventListener('submit', async function (event) {
        event.preventDefault();  // Prevent default form submission

        const formData = new FormData(this);

        try {
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

            alert(data.message);
            if (data.result === true) {
                window.location.href = "index.php";
            }

        } catch (error) {
            console.error('Error:', error);
            alert('There was an issue with the login form.');
        }
    });



</script>