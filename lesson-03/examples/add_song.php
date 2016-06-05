<?php

  // assign $_POST values to variables
  $artist_id = $_POST['artist'];
  $title = $_POST['title'];
  $length = $_POST['length'];

  $dbh = new PDO( "mysql:host=sql.computerstudi.es;dbname=comp-1006", "gc200333254", "7aULr7wU");
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

  // build the SQL statement with placeholders
  $sql = 'INSERT INTO songs (artist_id, title, length) VALUES (:artist_id, :title, :length)';

  // assign our values to variables
  $artist_id = $_POST['artist'];
  $title = $_POST['title'];

  // convert our time to time stamp format
  $length = "{$length['hours']}:{$length['minutes']}:{$length['seconds']}";

  // prepare the SQL statement
  $sth = $dbh->prepare($sql);

  // bind the values
  $sth->bindParam(':artist_id', $artist_id);
  $sth->bindParam(':title', $title, PDO::PARAM_STR, 100);
  $sth->bindParam(':length', $length, PDO::PARAM_STR);

  // execute the SQL
  $sth->execute();

  // close the DB connection
  $dbh = null;

  // provide confirmation
  echo "Your song was saved successfully";

