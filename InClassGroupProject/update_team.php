<?php

/* Validate User Input */
// start the session
session_start();

// assign the $_POST values to variables
$id             = $_POST['id'];
$name           = $_POST['name'];
$location       = $_POST['location'];
$sport          = $_POST['sport'];
$team_colour    = $_POST['team_colour'];
$founded        = $_POST['founded'];

// create a flag variable to manage validation state
$validated = true;

// create a message variable to hold our error message
$error_msg = "";

if ( empty( $id )) {
    $_SESSION['fail'] = "You have not selected a team to edit.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

// check if the name was passed empty
if ( empty( $name ) ) {
    // concatenate an error message
    $error_msg .= "The team name cannot be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $name = filter_var( $name, FILTER_SANITIZE_STRING );
}

// check if the team Id was passed empty
if ( empty( $location ) ) {
    // concatenate an error message
    $error_msg .= "The Team's location cannot be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $location = filter_var( $location, FILTER_SANITIZE_STRING );
}

// check if the sport was passed empty
if ( empty( $sport ) ) {
    // concatenate an error message
    $error_msg .= "The team's sport cannot be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $sport = filter_var( $sport, FILTER_SANITIZE_STRING );
}

// check if the number was passed empty
if ( empty( $team_colour ) ) {
    // concatenate an error message
    $error_msg .= "The team color cannot be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $team_colour = filter_var( $team_colour, FILTER_SANITIZE_STRING );
}

// check if the hometown was passed empty
if ( empty( $founded ) ) {
    // concatenate an error message
    $error_msg .= "The team's founded date cannot be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $founded = filter_var( $founded, FILTER_SANITIZE_STRING );
}


// DON'T FORGET TO FORMAT THE URL IN artists.php AND artist_songs.php //

// if the validation has failed, redirect the user to the our confirmation page
if ( $validated == false ) {
    // set our session variable with the error message
    $_SESSION['fail'] = "The team could not be added:<br>{$error_msg}";

    // redirect the user and exit the script
    header( 'Location: confirmed.php' );
    exit;
}

// connect to the DB
$dbh = new PDO( "mysql:localhost;dbname=comp-1006", "root", "" );
$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

// build the SQL
$sql = 'UPDATE players SET name = :name, location = :location, sport = :sport, team_colour = :team_colour, founded = :founded WHERE id = :id';

// prepare our SQL
$sth->  bindParam( ':id', $id, PDO::PARAM_INT, 11 );
$sth->  bindParam( ':name', $name, PDO::PARAM_STR, 50 );
$sth->  bindParam( ':location', $location, PDO::PARAM_STR, 100 );
$sth->  bindParam( ':sport', $sport, PDO::PARAM_STR, 50 );
$sth->  bindParam( ':team_colour', $team_colour, PDO::PARAM_STR, 100 );
$sth->  bindParam( ':founded', $founded, PDO::PARAM_INT, 5 );

// execute
$sth->execute();

// close the DB
$dbh = null;
