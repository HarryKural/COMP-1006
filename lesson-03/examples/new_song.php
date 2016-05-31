<?php
    $dbh = new PDO( "mysql:host=localhost;dbname=comp-1006", "root", "" );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $sql = 'SELECT id, name FROM artists';

    $results = $dbh->query( $sql );
    $row_count = $results->rowCount();

    $dbh = null;
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <title>New Song</title>
</head>

<body>
<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
<div class="container">

    <header>
        <h1 class="page-header">New Song</h1>
    </header>

    <section>
        <?php if ( $row_count > 0 ): ?>
        <form action="add_song" method="post">
            <div class="form-group">
                <label for="artist">Artist</label>
                <select class="form-control" name="artist">
                    <option selected value="">...select an artist...</option>
                    <?php foreach ( $results as $result ): ?>
                        <option value="<?= $result['id'] ?>"<?= $result['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Song Title</label>
                <input class="form-control" name="title" required>
            </div>
            <div class="form-group">

                <div class="form-inline">
                    <div class="input-group">
                        <label class="input-group-addon" for="length[hours]">hours</label>
                        <input type="number" class="form-control" name="length[hours]" min="0" max="23">
                    </div>
                    <div class="input-group">
                        <label class="input-group-addon" for="length[minutes]">minutes</label>
                        <input type="number" class="form-control" name="length[minutes]" min="0" max="59">
                    </div>
                    <div class="input-group">
                        <label class="input-group-addon" for="length[seconds]">seconds</label>
                        <input type="number" class="form-control" name="length[seconds]" min="0" max="59">
                    </div>
                    <button class="btn btn-danger">Add Song</button>
                </div>

            </div>
        </form>
        <?php else: ?>
            <div class="alert alert-warning">No articles available.</div>
        <?php endif ?>
    </section>

</div>

<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
