<?php
    
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lesson-08/examples/classes/class.database.php';

    //instantiate Database Class
    $dbh = new Database;

    var_dump( $dbh->all( 'songs' ) );

    if ( $err = $dbh->getError() )
    {
        echo $err;
    }
    else
    {
        echo "We are connected successfully.";
    }

    $result = $dbh->prepare( "SELECT * FROM artists" )->execute()->fetchAll();

    if ( $err = $dbh->getError() )
    {
        echo $err;
    }
    else
    {
        var_dump( $result );
    }
