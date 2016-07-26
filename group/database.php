<?php

$dbh = new PDO("mysql:host=localhost;dbname=comp-1006", "root", "");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM heroes ORDER BY first_name';

$tables = $dbh->query($sql);
$row_count = $tables->rowCount();

//Close after complete
$dbh = null;

?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>Superhero Database</title>
</head>

<body>
<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation"><a href="index.php">Home</a></li>
                <li role="presentation" class="active"><a href="database.php">Database</a></li>
            </ul>
            <h1>Superhero Database</h1>
        </nav>
        <div class="well">
            <section>
                <?php if ($row_count > 0): ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Alias</th>
                            <th>Powers</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tables as $table): ?>
                            <tr>
                                <td><?= $table['first_name'] ?></td>
                                <td><?= $table['last_name'] ?></td>
                                <td><?= $table['alias'] ?></td>
                                <td><?= $table['powers'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div classs="alert alert-info">
                        No superhero data available.
                    </div>
                <?php endif ?>
            </section>
        </div>
        <div>
            <a href="index.php" title="Submit Again"><button class="btn btn-primary" type="button">Submit Again</button></a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
