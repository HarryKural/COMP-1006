<?php

    // connect to database
    $dbh = new PDO( "mysql:host=sql.computerstudi.es;dbname=gc200333254", "gc200333254", "7aULr7wU");
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    // build the SQL statement
    $sql = 'SELECT * FROM bikes';

    // prepare, execute, and fetchAll
    $bikes = $dbh->query( $sql );

    // count the rows
    $row_count = $bikes->rowCount();

    // close the DB connection
    $dbh = null;

?>

<!DOCTYPE html>
<html>
<head>
    <link crossorigin='anonymous' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' rel='stylesheet'>
    <link crossorigin='anonymous' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css' integrity='sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O' rel='stylesheet'>
    <link rel="stylesheet" href="rwd-table.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="component.css">
    <script>
        (function() {
            ('.table-responsive').responsiveTable({data-displayAll(activateFocus(true));
        });
    </script>
    <title>BiKeAddER</title>
</head>
<body>

<nav class="navbar navbar-default navbar navbar-fixed-top" role="navigation">
    <div class="container-fluid page-scroll">

        <!-- Logo -->
        <div class="navbar-header">
            <!-- Button for NavBar appears in smaller devices -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="new_bike.php" class="navbar-brand">BiKeAddER</a>
        </div>

        <!-- Menu Items -->
        <!-- Basic horizontal menu -->
        <div class="collapse navbar-collapse" id="mainNavBar">
            <ul class="nav navbar-nav">
                <li><a href="new_bike.php"><span class="glyphicon glyphicon-plus"></span> Add BiKe</a></li>
                <li class="active"><a href="bikes.php"><span class="glyphicon glyphicon-th"></span> All BiKes</a></li>
                <li><a href="contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class='container'>
    <header>
        <h2 class='page-header'>All BiKes</h2>
    </header>
    <section>
        <?php if ( $row_count > 0 ): ?>
            <div class="jumbotron">
            <div class="table-responsive" data-pattern="priority-columns">
            <table class='table table-striped table-bordered'>
                <thead>
                <tr>
                    <th>Manufacturer</th>
                    <th>Model</th>
                    <th data-priority="1">Class</th>
                    <th data-priority="1">Color</th>
                    <th data-priority="1">Year</th>
                    <th data-priority="1">Top Speed <small>km/h</small></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ( $bikes as $bike ): ?>
                    <tr>
                        <td><?= $bike['manufacturer'] ?></td>
                        <td><?= $bike['model'] ?></td>
                        <td><?= $bike['bike_class'] ?></td>
                        <td><?= $bike['bike_color'] ?></td>
                        <td><?= $bike['bike_year'] ?></td>
                        <td><?= $bike['bike_speed'] ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">
                No bike information to display.
            </div>
        <?php endif ?>
    </section>
</div>

<?php include "footer.php"; ?>

<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="rwd-table.js"></script>
</body>
</html>
