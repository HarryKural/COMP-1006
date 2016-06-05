<?php

  /* VALIDATING INPUT */

  // session start
  session_start();

  // assign post values to variables
  $name = $_POST['name'];
  $bio_link = $_POST['bio_link'];

  // set a flag variable
  $validated = true;

  // set a variable to store error messages
  $error_msg = "";

  // check for empty
  if (empty($name)) {
    $error_msg .= "You must provide an artist name.<br>";
    $validated = false;
  } else {
    // sanitize the string
    $artist_name = filter_var( $name, FILTER_SANITIZE_STRING );
    $artist_name = trim( $name );
  }

  // validate that the bio_link is in url format IF the field is'nt empty
  if (!empty($bio_link) && !filter_var($bio_link, FILTER_VALIDATE_URL)) {
    $error_msg .= "The Bio Link URL must be in the correct format.<br>";
    $validated = false;
  }

  // check if we are validated
  if ($validated == false) {
    $_SESSION['fail'] = $error_msg;
    header('Location: confirmed.php');
  }

  // connect to the DB
  $dbh = new PDO( "mysql:host=sql.computerstudi.es;dbname=comp-1006", "gc200333254", "7aULr7wU");
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

  // build the SQL
  $sql = 'INSERT INTO artists (name, bio_link) VALUES (:name, :bio_link)';

  // prepare our SQL
  $sth = $dbh->prepare( $sql );

  // bind our values
  $sth->bindParam( ':name', $name, PDO::PARAM_STR, 50 );
  $sth->bindParam( ':bio_link', $bio_link, PDO::PARAM_STR, 100 );

  // execute the SQL
  $sth->execute();

  // close our connection
  $dbh = null;

  // provide confirmation
  $_SESSION['success'] = "The artist was added successfully";
header('Location: confirmed.php');

