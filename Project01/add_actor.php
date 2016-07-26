<?php

// assign post values to variables
$first_name     = $_POST['first_name'];
$last_name      = $_POST['last_name'];
$gender         = $_POST['gender'];
$nationality    = $_POST['nationality'];
$bio_link       = $_POST['bio_link'];

/* Validate User Input */
// start the session
session_start();

// create a flag variable to manage validation state
$validated = true;

// create a message variable to hold our error message
$error_msg = "";

    // check if the name was passed empty
    if ( empty( $first_name ) || empty( $last_name ) ) {
        // concatenate an error message
        $error_msg .= "The actor's name cannot be empty. <br>";

        // set the validation state
        $validated = false;
    } else {
        // sanitize the data
        $first_name = filter_var( $first_name , FILTER_SANITIZE_STRING );
        $last_name = filter_var( $last_name , FILTER_SANITIZE_STRING );
    }

    if ( empty( $gender ) ) {
        // concatenate an error message
        $error_msg .= "You must select a gender. <br>";

        // set the validation state
        $validated = false;
    } else {
        // sanitize the data
        $gender = filter_var( $gender, FILTER_SANITIZE_STRING );
    }

    if ( empty( $nationality ) ) {
        // concatenate an error message
        $error_msg .= "You must enter your nationality. <br>";

        // set the validation state
        $validated = false;
    } else {
        // sanitize the data
        $nationality = filter_var( $nationality, FILTER_SANITIZE_STRING );
    }

    // check if the URL is empty, and IF it isn't, validate that its an URL
    if ( !empty( $bio_link ) && !filter_var( $bio_link, FILTER_VALIDATE_URL ) ) {
        // concatenate an error message
        $error_msg .= "The bio link must be in a valid URL format. <br>";

        // set the validation state
        $validated = false;
    }
    // DON'T FORGET TO FORMAT THE URL IN actor.php //

    // if the validation has failed, redirect the user to the our confirmation page
    if ( $validated == false ) {
        // set our session variable with the error message
        $_SESSION['fail'] = "The actor could not be added: <br>{$error_msg}";

        // redirect the user and exit the script
        header( 'Location: confirmed.php' );
        exit;
    }

// connect to the DB
require "connect.php";

// build the SQL
$sql = 'INSERT INTO actors (first_name, last_name, gender, nationality, bio_link) VALUES (:first_name, :last_name, :gender, :nationality, :bio_link)';

// prepare our SQL
$sth = $dbh->prepare( $sql );

// bind our values
$sth->bindParam( ':first_name', $first_name, PDO::PARAM_STR, 50 );
$sth->bindParam( ':last_name', $last_name, PDO::PARAM_STR, 50 );
$sth->bindParam( ':gender', $gender, PDO::PARAM_STR, 10 );
$sth->bindParam( ':nationality', $nationality, PDO::PARAM_STR, 10 );
$sth->bindParam( ':bio_link', $bio_link, PDO::PARAM_STR, 100 );

// execute the SQL
$sth->execute();

// close our connection
$dbh = null;

// provide confirmation
// set our session variable with the error message
$_SESSION['success'] = "You have added the actor, {$first_name} {$last_name}, successfully.";

// redirect the user and exit the script
header( 'Location: confirmed.php' );
exit;
