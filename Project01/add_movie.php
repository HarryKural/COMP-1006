<?php

// assign $_POST values to variables
$id             = $_POST['actor'];
$movie_name     = $_POST['movie_name'];
$genre          = $_POST['genre'];
$category       = $_POST['category'];
$release_date   = $_POST['release_date'];
$length         = implode(":", $_POST['length']);
$review         = $_POST['review'];

/* Validate User Input */
// start the session
session_start();

// create a flag variable to manage validation state
$validated = true;

// create a message variable to hold our error message
$error_msg = "";

// validate that the actor has been selected
if ( empty( $id ) ) {
    // concatenate an error message
    $error_msg .= "An actor must be selected.<br>";

    // set the validation state
    $validated = false;
}

// validate the movie name isn't empty
if ( empty( $movie_name ) ) {
    // concatenate an error message
    $error_msg .= "The movie name can't be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $movie_name = filter_var( $movie_name, FILTER_SANITIZE_STRING );
}

// validate the movie genre isn't empty
if ( empty( $genre ) ) {
    // concatenate an error message
    $error_msg .= "The movie's genre can't be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $genre = filter_var( $genre, FILTER_SANITIZE_STRING );
}

// validate the movie category isn't empty
if ( empty( $category ) ) {
    // concatenate an error message
    $error_msg .= "The movie's category can't be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $category = filter_var( $category, FILTER_SANITIZE_STRING );
}

// validate the movie release_date isn't empty
if ( empty( $release_date ) ) {
    // concatenate an error message
    $error_msg .= "The movie's release date can't be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $release_date = filter_var( $release_date, FILTER_SANITIZE_STRING );
}

// convert length to null if its empty
if ( preg_match( "/^\:\:$/", $length ) ) {
    $length = null;
}

// validate if the length isn't empty and doesn't match the time pattern
if ( !empty( $length ) && !preg_match("/^([0-9]|0[0-9]|1[0-9]|2[0-3])\:([0-9]|[0-5][0-9])\:([0-9]|[0-5][0-9])$/", $length) ) {
    // concatenate an error message
    $error_msg .= "The movie length isn't in the valid format.<br>";

    // set the validation state
    $validated = false;
}

// validate the movie review isn't empty
if ( empty( $review ) ) {
    // concatenate an error message
    $error_msg .= "The movie's review can't be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $review = filter_var( $review, FILTER_SANITIZE_STRING );
}

// if the validation has failed, redirect the user to the our confirmation page
if ( $validated == false ) {
    // set our session variable with the error message
    $_SESSION['fail'] = "The movie could not be added:<br>{$error_msg}";

    // redirect the user and exit the script
    header( 'Location: confirmed.php' );
    exit;
}

// connect to the DB
require "connect.php";

// build the SQL statement with placeholders
$sql = 'INSERT INTO movies (actor_id, movie_name, genre, category, release_date, length, review) VALUES (:id, :movie_name, :genre, :category, :release_date, :length, :review)';

// assign our values to variables
$id             = $_POST['actor'];
$genre          = $_POST['genre'];
$category       = $_POST['category'];
$release_date   = $_POST['release_date'];
$length         = implode(":", $_POST['length']);
$review         = $_POST['review'];

// prepare the SQL statement
$sth = $dbh->prepare($sql);

// bind the values
$sth->bindParam( ':id', $id, PDO::PARAM_INT, 11 );
$sth->bindParam( ':movie_name', $movie_name, PDO::PARAM_STR, 100 );
$sth->bindParam( ':genre', $genre, PDO::PARAM_STR, 20 );
$sth->bindParam( ':category', $category, PDO::PARAM_STR, 20 );
$sth->bindParam( ':release_date', $release_date, PDO::PARAM_STR );
$sth->bindParam( ':length', $length, PDO::PARAM_STR );
$sth->bindParam( ':review', $review, PDO::PARAM_STR, 500 );

// execute the SQL
$sth->execute();

// close the DB connection
$dbh = null;

// provide confirmation
// set our session variable with the error message
$_SESSION['success'] = "You have added the movie, {$movie_name}, successfully.";
// redirect the user and exit the script
header( 'Location: confirmed.php' );
exit;
