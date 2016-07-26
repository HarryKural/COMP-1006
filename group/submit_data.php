<?php

//Confirmation message declare
$confirmation_message = 'Your submission has been made! You can <a href="index.php" target="_blank">submit</a> again, or view the <a href="database.php" target="_blank">database</a>.';

// $_POST to variables
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$alias = $_POST['alias'];
$powers = $_POST['powers'];

// DB Connection
$dbh = new PDO("mysql:host=localhost;dbname=comp-1006", "root", "");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Build SQLs
$sql = 'INSERT INTO heroes (first_name, last_name, alias, powers) VALUES (:first_name, :last_name, :alias, :powers)';

// Prepare SQL
$sth = $dbh->prepare($sql);
$sth->bindParam(':first_name', $first_name, PDO::PARAM_STR, 50);
$sth->bindParam(':last_name', $last_name, PDO::PARAM_STR, 50);
$sth->bindParam(':alias', $last_name, PDO::PARAM_STR, 100);
$sth->bindParam(':powers', $last_name, PDO::PARAM_STR, 100);

// Execute SQL
$sth->execute();

// Close connection
$dbh = null;

// Confirmation message state
echo $confirmation_message;
