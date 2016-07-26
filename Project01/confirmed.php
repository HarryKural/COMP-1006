<?php

    // start the session
    session_start();

    // check if the session variables are NOT empty
    if ( !empty( $_SESSION['success'] ) ) {
        // if there is a success message
        $class = 'success';
        $message = $_SESSION['success'];
    } else if ( !empty( $_SESSION['fail'] ) ) {
        // if there is a fail message
        $class = 'danger';
        $message = $_SESSION['fail'];
    } else {
        // user has arrived to this page accidentally
        // redirect the user to artists
        header( 'Location: actors.php' );
    }

    // clear the session variables
    session_unset();

?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="materialize.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <title>Confirmation</title>
</head>

<body>
<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->

<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="new_actor.php" class="brand-logo">ActorMovie</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="new_actor.php">Add New Actor</a></li>
                <li><a href="actors.php">Show Actors</a></li>
                <li><a href="new_movie.php">Add New Movie</a></li>
                <li><a href="movies.php">Show Movies</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="new_actor.php">Add New Actor</a></li>
                <li><a href="actors.php">Show Actors</a></li>
                <li><a href="new_movie.php">Add New Movie</a></li>
                <li><a href="movies.php">Show Movies</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="alert alert-<?= $class ?>">
    <?= strip_tags($message) ?>
</div>

<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="materialize.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>

</html>
