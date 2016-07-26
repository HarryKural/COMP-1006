<?php

    // validate
    session_start();

    // assign the get param to variable
    $artist_id = $_GET['id'];

     // is artist TD empty?
    if ( empty( $artist_id )) {
        $_SESSION['fail'] = "You have not selected an artist to edit.<br>";
        header( 'Location: confirmed.php' );
        exit;
    }

    // connect to DB
    $dbh = new PDO("mysql:host=localhost;dbname=comp-1006", "root", "");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // build the artist SQL
    $sql = 'SELECT * FROM artists WHERE id = :id LIMIT 1';

    // prepare the SQL
    $sth = $dbh->prepare( $sql );

    // bind the value
    $sth->  bindParam( ':id', $artist_id, PDO::PARAM_INT );

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
    <title>Add New Artist</title>
</head>

<body>
<?php require 'navigation.php' ?>
<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
<div class="container">
    <h1 class="page-header">Add New Artist</h1>
    <section>
        <form action="update_artist.php" method="post">
            <fieldset>
                <legend>Artist Information</legend>
                <div class="form-group">
                    <label for="name">Artist Name</label>
                    <input class="form-control" type="text" name="name" required value="<?= $artist['name'] ?>">
                </div>

                <div class="form-group">
                    <label for="bio_link">Bio Link</label>
                    <input class="form-control" type="url" name="bio_link" value="<?= $artist['bio_link'] ?>">
                </div>

                <div>
                    <input type="hidden" name="id" value="<?= $artist['id'] ?>">
                    <button class="btn btn-danger">Add Artist</button>
                </div>
            </fieldset>
        </form>
    </section>
</div>

<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
