<?php

// connect to database
$dbh = new PDO( "mysql:host=sql.computerstudi.es;dbname=gc200333254", "gc200333254", "7aULr7wU");
$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

// build the SQL statement
$sql = 'SELECT * FROM heroes';

// prepare, execute, and fetchAll
$heroes = $dbh->query( $sql );

// count the rows
$row_count = $heroes->rowCount();

// close the DB connection
$dbh = null;

?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <title>Heroes</title>
</head>

<body>
<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
    <div class='container'>
        <header>
            <h2 class='page-header'>Heroes</h2>
        </header>
        <section>
            <?php if ( $row_count > 0 ): ?>
                <div class="jumbotron">
                    <div class="table-responsive">
                        <table class='table table-striped table-bordered'>
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Alias</th>
                                <th>Power's</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ( $heroes as $heroe ): ?>
                                <tr>
                                    <td><?= $heroe['first_name'] ?></td>
                                    <td><?= $heroe['last_name'] ?></td>
                                    <td><?= $heroe['alias'] ?></td>
                                    <td><?= $heroe['powers'] ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-warning">
                    No information to display.
                </div>
            <?php endif ?>
        </section>
    </div>


<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
