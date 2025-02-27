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
                        <h3>Contact Us</h3>
                    </div>
                    <div class="card-body">
                        <form id="messageForm">
                            <div class="form-group">
                                <label for="first_name">Name</label><br />
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First Name" style="width: 45%; display: inline-block;" required>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Last Name" style="width: 45%; display: inline-block;" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Message Subject" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="3"
                                    placeholder="Enter your message." required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg mx-auto">Send Message</button>
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
    document.title = "Good Shoes Inc. Contact Us";
    document.getElementById('linkContactUs').classList.add('active');

    // --- login check
    document.getElementById('messageForm').addEventListener('submit', async function (event) {
        event.preventDefault();  // Prevent default form submission

        const formData = new FormData(this);

        try {
            // Send the form data to the server
            const response = await fetch('process/sendMessage.php', {
                method: 'POST',
                body: formData,
            });

            // Check if the response is OK (status 200–299)
            if (!response.ok) {
                throw new Error('Send message error.');
            }
            const data = await response.json();  // Parse JSON response

            alert(data.message);

            document.getElementById('messageForm').reset();
            // console.log(response);

            // console.log(data);
            // alert(data.message);
            // if (data.result === true) {
            //     window.location.href = "index.php";
            // }

        } catch (error) {
            console.error('Error:', error);
            alert('There was an issue with the message form.');
        }
    });

</script>