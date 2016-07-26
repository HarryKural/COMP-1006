<?php

// session start
session_start();

// assign the post value to a variable
$id         = $_POST['id'];
$name       = $_POST['name'];
$team_id    = $_POST['team_id'];
$sport      = $_POST['sport'];
$number     = $_POST['number'];
$hometown   = $_POST['hometown'];

if ( empty( $id )) {
    $_SESSION['fail'] = "You have not selected a player to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $name )) {
    $_SESSION['fail'] = "You have not selected a name of the player to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $team_id )) {
    $_SESSION['fail'] = "You have not selected a team Id for player to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $sport )) {
    $_SESSION['fail'] = "You have not selected a sport for player to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $number )) {
    $_SESSION['fail'] = "You have not selected a player number to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $hometown )) {
    $_SESSION['fail'] = "You have not selected a hometown for player to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

// build the SQl
$sql = 'DELETE FROM players WHERE id = :id';

// prepare the SQL
$sth = $dbh->prepare( $sql );

// bind the value
$sth->  bindParam( ':id', $id, PDO::PARAM_INT );
$sth->  bindParam( ':name', $name, PDO::PARAM_STR );
$sth->  bindParam( ':team_id', $team_id, PDO::PARAM_INT );
$sth->  bindParam( ':sport', $sport, PDO::PARAM_STR );
$sth->  bindParam( ':number', $number, PDO::PARAM_INT );
$sth->  bindParam( ':hometown', $hometown, PDO::PARAM_STR );

// execute
$sth->execute();

// close the DB
$dbh = null;

//redirect to confirm with a success message
$_SESSION['success'] = "You have successfully deleted the player.<br>";
header( 'Location; confirmed.php' );
exit;
