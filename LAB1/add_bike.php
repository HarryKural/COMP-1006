<?php

// $_POST to variables
$manufacturer   = $_POST['manufacturer'];
$model          = $_POST['model'];
$bike_class     = $_POST['bike_class'];
$bike_color     = $_POST['bike_color'];
$bike_year      = $_POST['bike_year'];
$bike_speed     = $_POST['bike_speed'];

// connection to database
$dbh = new PDO( "mysql:host=sql.computerstudi.es;dbname=gc200333254", "gc200333254", "7aULr7wU");
$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

// build the SQL
$sql = 'INSERT INTO bikes (manufacturer, model, bike_class, bike_color, bike_year, bike_speed) VALUES (:manufacturer, :model, :bike_class, :bike_color, :bike_year, :bike_speed)';

// prepare our SQL
$sth = $dbh->prepare( $sql );
$sth->bindParam( ':manufacturer', $manufacturer, PDO::PARAM_STR, 50 );
$sth->bindParam( ':model', $model, PDO::PARAM_STR, 50 );
$sth->bindParam( ':bike_class', $bike_class, PDO::PARAM_STR, 20 );
$sth->bindParam( ':bike_color', $bike_color, PDO::PARAM_STR, 15 );
$sth->bindParam( ':bike_year', $bike_year, PDO::PARAM_INT, 5 );
$sth->bindParam( ':bike_speed', $bike_speed, PDO::PARAM_INT, 10 );

//execute the SQL
$sth->execute();

// close our connection
$dbh = null;

// provide confirmation & redirect to all bikes page
echo "The BiKe was added successfully";
echo "<script>setTimeout(\"location.href = 'bikes.php';\",1500);</script>";
