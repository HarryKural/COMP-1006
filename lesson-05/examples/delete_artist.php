<?php

    // session start
    session_start();

    // assign the post value to a variable
    $artist_id = $_POST['id'];

    // is artist TD empty?
    if ( empty( $artist_id )) {
        $_SESSION['fail'] = "You have not selected an artist to delete.<br>";
        header( 'Location: confirmed.php' );
        exit;
    }

    // connect to the DB
    $dbh = new PDO( "mysql:localhost;dbname=comp-1006", "root", "" );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    // build the SQl
    $sql = 'DELETE FROM artists WHERE id = :id';

    // prepare the SQL
    $sth = $dbh->prepare( $sql );

    // bind the value
    $sth->  bindParam( ':id', $artist_id, PDO::PARAM_INT );

    // execute
    $sth->execute();

    // close the DB
    $dbh = null;

    //redirect to confirm with a success message
    $_SESSION['success'] = "You have successfully deleted the artist.<br>";
    header( 'Location; confirmed.php' );
    exit;
