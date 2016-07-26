<?php

// session start
session_start();

// assign the post value to a variable
$id             = $_POST['id'];
$name           = $_POST['name'];
$location       = $_POST['location'];
$sport          = $_POST['sport'];
$team_colour    = $_POST['team_colour'];
$founded        = $_POST['founded'];

if ( empty( $id )) {
    $_SESSION['fail'] = "You have not selected a team to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $name )) {
    $_SESSION['fail'] = "You have not selected a name of the team to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $location )) {
    $_SESSION['fail'] = "You have not selected a location for team to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $sport )) {
    $_SESSION['fail'] = "You have not selected a sport for team to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $team_colour )) {
    $_SESSION['fail'] = "You have not selected a team color to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $founded )) {
    $_SESSION['fail'] = "You have not selected a founded date for team to delete.<br>";
    header( 'Location: confirmed.php' );
    exit;
}

// build the SQl
$sql = 'DELETE FROM teams WHERE id = :id';

// prepare the SQL
$sth = $dbh->prepare( $sql );

// bind the value
$sth->  bindParam( ':id', $id, PDO::PARAM_INT );
$sth->  bindParam( ':name', $name, PDO::PARAM_STR );
$sth->  bindParam( ':location', $location, PDO::PARAM_STR );
$sth->  bindParam( ':sport', $sport, PDO::PARAM_STR );
$sth->  bindParam( ':team_colour', $team_colour, PDO::PARAM_STR );
$sth->  bindParam( ':founded', $founded, PDO::PARAM_INT );

// execute
$sth->execute();

// close the DB
$dbh = null;

//redirect to confirm with a success message
$_SESSION['success'] = "You have successfully deleted the Team.<br>";
header( 'Location; confirmed.php' );
exit;
