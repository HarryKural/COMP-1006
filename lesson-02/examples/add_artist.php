<?php
    // $_POST to variables
    $artist_name = $_POST['name'];
    $bio_link = $_POST['bio_link'];

    // connection to database
    $dbh = new PDO( "mysql:host=sql.computerstudi.es;dbname=gc200333254", "gc200333254", "7aULr7wU");
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    // build the SQL
    $sql = 'INSERT INTO artists (name, bio_link) VALUES (:name, :bio_link)';

    // prepare our SQL
    $sth = $dbh->prepare( $sql );
    $sth->bindParam( ':name', $artist_name, PDO::PARAM_STR, 50 );
    $sth->bindParam( ':bio_link', $bio_link, PDO::PARAM_STR, 100 );

    //execute the SQL
    $sth->execute();

    // close our connection
    $dbh = null;

    // provide confirmation
    echo "Your artist was saved successfully";
