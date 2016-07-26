<?php

    /* Validate User Input */
    // start the session
    session_start();

    // assign the $_POST values to variables
    $artist_id = $_POST['id'];
    $name = $_POST['name'];
    $bio_link = $_POST['bio_link'];

    // create a flag variable to manage validation state
    $validated = true;

    // create a message variable to hold our error message
    $error_msg = "";

    // is artist TD empty?
    if ( empty( $artist_id )) {
        $_SESSION['fail'] = "You have not selected an artist to edit.<br>";
        header( 'Location: confirmed.php' );
        exit;
    }

    // check if the name was passed empty
    if ( empty( $name ) ) {
        // concatenate an error message
        $error_msg .= "The artist name cannot be empty.<br>";

        // set the validation state
        $validated = false;
    } else {
        // sanitize the data
        $name = filter_var( $name, FILTER_SANITIZE_STRING );
    }

    // check if the URL is empty, and IF it isn't, validate that its an URL
    if ( !empty( $bio_link ) && !filter_var( $bio_link, FILTER_VALIDATE_URL ) ) {
        // concatenate an error message
        $error_msg .= "The bio link must be in a valid URL format.<br>";

        // set the validation state
        $validated = false;
    }
    // DON'T FORGET TO FORMAT THE URL IN artists.php AND artist_songs.php //

    // if the validation has failed, redirect the user to the our confirmation page
    if ( $validated == false ) {
        // set our session variable with the error message
        $_SESSION['fail'] = "The artist could not be added:<br>{$error_msg}";

        // redirect the user and exit the script
        header( 'Location: confirmed.php' );
        exit;
    }

    // connect to the DB
    $dbh = new PDO( "mysql:localhost;dbname=comp-1006", "root", "" );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    // build the SQL
    $sql = 'UPDATE artists SET name = :name, bio_link = :bio_link WHERE id = :id';

    // prepare our SQL
    $sth->bindParam( ':name', $name, PDO::PARAM_STR, 50 );
    $sth->bindParam( ':bio_link', $bio_link, PDO::PARAM_STR, 100 );
    $sth->bindParam( ':id', $artist_id, PDO::PARAM_INT );

    // execute
    $sth->execute();

    // close the DB
    $dbh = null;
