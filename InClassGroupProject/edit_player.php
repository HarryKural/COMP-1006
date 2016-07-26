<?php

// validate
session_start();

// assign the get param to variable
$id         = $_GET['id'];
$name       = $_GET['name'];
$team_id    = $_GET['team_id'];
$sport      = $_GET['sport'];
$number     = $_GET['number'];
$hometown   = $_GET['hometown'];

if ( empty( $id )) {
    $_SESSION['fail'] = "Please enter the correct player name<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $name )) {
    $_SESSION['fail'] = "Please enter the player name<br>";
    header( 'Location: confirmed.php' );
    exit;
}


if ( empty( $team_id )) {
    $_SESSION['fail'] = "Please enter team Id of player<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $sport )) {
    $_SESSION['fail'] = "Please enter the sport of the player<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $number )) {
    $_SESSION['fail'] = "Please enter the player number<br>";
    header( 'Location: confirmed.php' );
    exit;
}

if ( empty( $hometown )) {
    $_SESSION['fail'] = "Please enter the hometown of the player<br>";
    header( 'Location: confirmed.php' );
    exit;
}

// build the artist SQL
$sql = 'SELECT * FROM players WHERE id = :id LIMIT 1';

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
    <title>Add New Player</title>
</head>

<body>
<?php require 'navigation.php' ?>
<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
<div class="container">
    <h1 class="page-header">Add New Player</h1>
    <section>
        <form action="update_player.php" method="post">
            <fieldset>
                <legend>Player Information</legend>
                <div class="form-group">
                    <label for="name">Player Name</label>
                    <input class="form-control" type="text" name="name" required value="<?= $player['name'] ?>">
                </div>

                <div class="form-group">
                    <label for="team_id">Team Id</label>
                    <input class="form-control" type="number" name="team_id" value="<?= $player['team_id'] ?>">
                </div>

                <div class="form-group">
                    <label for="sport">Sport</label>
                    <input class="form-control" type="text" name="sport" value="<?= $player['sport'] ?>">
                </div>

                <div class="form-group">
                    <label for="number">Number</label>
                    <input class="form-control" type="number" name="number" value="<?= $player['number'] ?>">
                </div>

                <div class="form-group">
                    <label for="hometown">Hometown of the Player</label>
                    <input class="form-control" type="text" name="hometown" value="<?= $player['hometown'] ?>">
                </div>

                <div>
                    <input type="hidden" name="id" value="<?= $player['id'] ?>">
                    <button class="btn btn-danger">Add Player</button>
                </div>
            </fieldset>
        </form>
    </section>
</div>

<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
