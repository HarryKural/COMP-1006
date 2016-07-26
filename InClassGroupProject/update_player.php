<?php

/* Validate User Input */
// start the session
session_start();

    // assign the $_POST values to variables
    $id         = $_POST['id'];
    $name       = $_POST['name'];
    $team_id    = $_POST['team_id'];
    $sport      = $_POST['sport'];
    $number     = $_POST['number'];
    $hometown   = $_POST['hometown'];

    // create a flag variable to manage validation state
    $validated = true;

    // create a message variable to hold our error message
    $error_msg = "";

    // is artist TD empty?
    if ( empty( $id )) {
        $_SESSION['fail'] = "You have not selected an player to edit.<br>";
        header( 'Location: confirmed.php' );
        exit;
    }

    // check if the name was passed empty
    if ( empty( $name ) ) {
        // concatenate an error message
        $error_msg .= "The player name cannot be empty.<br>";

        // set the validation state
        $validated = false;
    } else {
        // sanitize the data
        $name = filter_var( $name, FILTER_SANITIZE_STRING );
    }

    // check if the team Id was passed empty
    if ( empty( $team_id ) ) {
        // concatenate an error message
        $error_msg .= "The player's Team Id cannot be empty.<br>";

        // set the validation state
        $validated = false;
    } else {
        // sanitize the data
        $team_id = filter_var( $team_id, FILTER_SANITIZE_STRING );
    }

    // check if the sport was passed empty
    if ( empty( $sport ) ) {
        // concatenate an error message
        $error_msg .= "The player sport cannot be empty.<br>";

        // set the validation state
        $validated = false;
    } else {
        // sanitize the data
        $sport = filter_var( $sport, FILTER_SANITIZE_STRING );
    }

    // check if the number was passed empty
    if ( empty( $number ) ) {
        // concatenate an error message
        $error_msg .= "The player number cannot be empty.<br>";

        // set the validation state
        $validated = false;
    } else {
        // sanitize the data
        $number = filter_var( $number, FILTER_SANITIZE_STRING );
    }

    // check if the hometown was passed empty
    if ( empty( $hometown ) ) {
        // concatenate an error message
        $error_msg .= "The player's hometown cannot be empty.<br>";

        // set the validation state
        $validated = false;
    } else {
        // sanitize the data
        $hometown = filter_var( $hometown, FILTER_SANITIZE_STRING );
    }


    // DON'T FORGET TO FORMAT THE URL IN artists.php AND artist_songs.php //

    // if the validation has failed, redirect the user to the our confirmation page
    if ( $validated == false ) {
        // set our session variable with the error message
        $_SESSION['fail'] = "The player could not be added:<br>{$error_msg}";

        // redirect the user and exit the script
        header( 'Location: confirmed.php' );
        exit;
    }

    // connect to the DB
    $dbh = new PDO( "mysql:localhost;dbname=comp-1006", "root", "" );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    // build the SQL
    $sql = 'UPDATE players SET name = :name, team_id = :team_id, sport = :sport, number = :number, hometown = :hometown WHERE id = :id';

    // prepare our SQL
    $sth->  bindParam( ':id', $id, PDO::PARAM_INT, 11 );
    $sth->  bindParam( ':name', $name, PDO::PARAM_STR, 50 );
    $sth->  bindParam( ':team_id', $team_id, PDO::PARAM_INT, 11 );
    $sth->  bindParam( ':sport', $sport, PDO::PARAM_STR, 100 );
    $sth->  bindParam( ':number', $number, PDO::PARAM_INT, 3 );
    $sth->  bindParam( ':hometown', $hometown, PDO::PARAM_STR, 200 );

// execute
$sth->execute();

// close the DB
$dbh = null;
