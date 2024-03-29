<?php

$form_submit_success = false;
$form_submit_error = false;

if (isset($_POST['first_name'])) {
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $database = "php_contact_form";

    $connection = mysqli_connect($server_name, $username, $password);

    if (!$connection) {
        die("Connection to database failed: " . mysqli_connect_error());
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $insert_message_query = "INSERT INTO `php_contact_form`.`contact_messages` (`first_name`, `last_name`, `email`, `company`, `subject`, `message`, `submitted_at`) VALUES ('$first_name', '$last_name', '$email', '$company', '$subject', '$message', current_timestamp());";

    if (mysqli_query($connection, $insert_message_query)) {
        // echo "Data inserted successfully!";
        $form_submit_success = true;
    } else {
        // echo "Data insertion failed: " . mysqli_error($connection);
        $form_submit_error = true;
    }

    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Us</title>
    <!-- importing fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- importing bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- importing custom styles -->
    <link href="./styles/globals.css" rel="stylesheet" />
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh">
    <section class="border shadow-lg d-flex container justify-content-between m-auto rounded">
        <div class="w-50 p-5">
            <h3 class="fw-bold mb-3">Our Contact Details</h3>
            <div class="d-flex flex-column gap-3">
                <div>
                    <p class="fs-5 my-0">Phone:</p>
                    <p class="">
                        <a href="tel:+9876543210" class="text-body text-opacity-75 text-decoration-none">(+977) 9876543210</a>
                    </p>
                </div>
                <div>
                    <p class="fs-5 my-0">Email:</p>
                    <p class="">
                        <a href="mailto:gcenterprises1111@gmail.com
                " class="text-body text-opacity-75 text-decoration-none">gcenterprises1111@gmail.com
                        </a>
                    </p>
                </div>
                <div>
                    <p class="fs-5 my-0">Address:</p>
                    <p class="text-body text-opacity-75">
                        Butwal (32907), Lumbini Province, Nepal
                        <br />
                        <a href="https://maps.app.goo.gl/uQ1mJykprcq9t5TL9" target="_blank">View on Google Maps</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="w-50 p-5">
            <div class="mb-3">
                <h3 class="fw-bold">Get in touch</h3>
                <p class="text-body text-opacity-75">
                    Send us a message and we will get back to you as soon as possible.
                </p>
                <?php
                if ($form_submit_success == true) {
                    echo "<p class=\"text-success\">Form submitted!</p>";
                } else if ($form_submit_error == true) {
                    echo "<p class=\"text-error\">Error submitting form! Try again.</p>";
                }
                ?>
            </div>
            <form action="index.php" method="post">
                <div class="my-2 d-flex gap-3 justify-content-between">
                    <div class="form-group">
                        <label> First Name </label>
                        <input type="text" name="first_name" id="first_name" placeholder="Your first name" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label> Last Name </label>
                        <input type="text" name="last_name" id="last_name" placeholder="Your last name" class="form-control" required />
                    </div>
                </div>

                <div class="form-group my-2">
                    <label>Email</label>

                    <input type="text" name="email" id="email" placeholder="Your email address" class="form-control" required />
                </div>
                <div class="form-group my-2">
                    <label> Company </label>

                    <input type="text" name="company" id="company" placeholder="Your company name" class="form-control" />
                </div>
                <div class="form-group my-2">
                    <label> Subject </label>

                    <input type="text" name="subject" id="subject" placeholder="Subject for the message" class="form-control" required />
                </div>

                <div class="form-group my-2">
                    <label> Message </label>

                    <textarea type="text" name="message" id="message" placeholder="Enter your message" class="form-control" required></textarea>
                </div>

                <div class="form-group my-3">
                    <button type="
            submit" class="btn btn-primary w-100 form-control">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- importing bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>