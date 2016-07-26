<?php

    // validate
    session_start();

    // assign the get param to variable
    $id           = $_GET['id'];
    $name         = $_GET['name'];
    $location     = $_GET['location'];
    $sport        = $_GET['sport'];
    $team_colour  = $_GET['team_colour'];
    $founded      = $_GET['founded'];


    // is team name is empty?
    if ( empty( $name )) {
        $_SESSION['fail'] = "Please enter the team name<br>";
        header( 'Location: confirmed.php' );
        exit;
    }

    // is team location is empty?
    if ( empty( $location )) {
        $_SESSION['fail'] = "Please enter the location<br>";
        header( 'Location: confirmed.php' );
        exit;
    }


    // is team sport is empty?
    if ( empty( $sport )) {
        $_SESSION['fail'] = "Please enter the sport<br>";
        header( 'Location: confirmed.php' );
        exit;
    }

    // is team team_colour is empty?
    if ( empty( $team_colour )) {
        $_SESSION['fail'] = "Please enter the team colour<br>";
        header( 'Location: confirmed.php' );
        exit;
    }

    // is team founded is empty?
    if ( empty( $founded )) {
        $_SESSION['fail'] = "Please enter the correct date<br>";
        header( 'Location: confirmed.php' );
        exit;
    }

    // build the artist SQL
    $sql = 'SELECT * FROM teams WHERE id = :id LIMIT 1';

    // prepare the SQL
    $sth = $dbh->prepare( $sql );

    // bind the value
    $sth->  bindParam( ':id', $name, PDO::PARAM_INT );
    $sth->  bindParam( ':name', $name, PDO::PARAM_STR );
    $sth->  bindParam( ':location', $location, PDO::PARAM_STR );
    $sth->  bindParam( ':sport', $sport, PDO::PARAM_STR );
    $sth->  bindParam( ':team_colour', $team_colour, PDO::PARAM_STR );
    $sth->  bindParam( ':founded', $founded, PDO::PARAM_INT );


    // execute
    $sth->execute();

    // store the result
    $artist = $sth->fetch();

    // close the DB
    $dbh = null;

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <title>Add New Team</title>
</head>

<body>
<?php require 'navigation.php' ?>
<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
<div class="container">
    <h1 class="page-header">Add New Artist</h1>
    <section>
        <form action="update_team.php" method="post">
            <fieldset>
                <legend>Team Information</legend>
                <div class="form-group">
                    <label for="name">Team Name</label>
                    <input class="form-control" type="text" name="name" required value="<?= $team['name'] ?>">
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input class="form-control" type="text" name="location" value="<?= $team['location'] ?>">
                </div>

                <div class="form-group">
                    <label for="sport">Sport</label>
                    <input class="form-control" type="text" name="sport" value="<?= $team['sport'] ?>">
                </div>

                <div class="form-group">
                    <label for="team_colour">Team Colour</label>
                    <input class="form-control" type="text" name="team_colour" value="<?= $team['team_colour'] ?>">
                </div>

                <div class="form-group">
                    <label for="founded">Founded On</label>
                    <input class="form-control" type="number" name="founded" value="<?= $team['founded'] ?>">
                </div>

                <div>
                    <input type="hidden" name="id" value="<?= $team['id'] ?>">
                    <button class="btn btn-danger">Add Team</button>
                </div>
            </fieldset>
        </form>
    </section>
</div>

<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
