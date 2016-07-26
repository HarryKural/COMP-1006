<?php

    // Check for Header Injections
    function has_header_injection($str) {
        return preg_match( "/[\r\n]/", $str );
    }


    if (isset($_POST['contact_submit'])) {

        // Assign trimmed form data to variables
        // Note that the value within the $_POST array is looking for the HTML "name" attribute, i.e. name="email"
        $name	= trim($_POST['name']);
        $email	= trim($_POST['email']);
        $msg	= $_POST['message']; // no need to trim message

        // Check to see if $name or $email have header injections
        if (has_header_injection($name) || has_header_injection($email)) {

            die(); // If true, kill the script

        }

        if (!$name || !$email || !$msg) {
            echo '<h4 class="error">All fields required.</h4><a href="contact.php" class="button block">Go back and try again</a>';
            exit;
        }

        // Add the recipient email to a variable
        $to	= "harrykural333@gmail.com";

        // Create a subject
        $subject = "$name sent a message via your contact form";

        // Construct the message
        $message .= "Name: $name\r\n";
        $message .= "Email: $email\r\n\r\n";
        $message .= "Message:\r\n$msg";

        $message = wordwrap($message, 72); // Keep the message neat n' tidy

        // Set the mail headers into a variable
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: " . $name . " <" . $email . ">\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n\r\n";

        // Send the email!
        mail($to, $subject, $message, $headers);
        ?>

        <!-- Show success message after email has sent -->
        <div class="container">
            <div class="jumbotron">
                <h4>Thanks for contacting HarryKural!</h4>
            </div>
        </div>

        <?php
    } else {
        ?>

        <div class="container">
        <section>
        <form method="post" action="" id="contact-form">
            <fieldset>
                <legend>Information</legend>

                <div class="form-group">
                    <label for="name">Full name</label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" class="form-control" rows="3"></textarea>
                </div>

                <div class="buttons">
                    <button type="submit" name="contact_submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Send Message</button>
                </div>

        </form>
        </section>
        </div>

        <?php
    }
    ?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>BiKeAddER</title>
</head>

<body>
<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
<nav class="navbar navbar-default navbar navbar-fixed-top" role="navigation">
    <div class="container-fluid page-scroll">

        <!-- Logo -->
        <div class="navbar-header">
            <!-- Button for NavBar appears in smaller devices -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="new_bike.php" class="navbar-brand">BiKeAddER</a>
        </div>

        <!-- Menu Items -->
        <!-- Basic horizontal menu -->
        <div class="collapse navbar-collapse" id="mainNavBar">
            <ul class="nav navbar-nav">
                <li><a href="new_bike.php"><span class="glyphicon glyphicon-plus"></span> Add BiKe</a></li>
                <li><a href="bikes.php"><span class="glyphicon glyphicon-th"></span> All BiKes</a></li>
                <li class="active"><a href="contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
