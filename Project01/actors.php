<?php

// connect to the DB
require "connect.php";

// build the SQL statement
$sql = 'SELECT * FROM actors';

// prepare, execute, and fetchAll
$actors = $dbh->query( $sql );

// count the rows
$row_count = $actors->rowCount();

// close the DB connection
$dbh = null;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="materialize.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="material-scrolltop.css">
    <title>All Actors</title>
</head>
<body>
    <div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="new_actor.php" class="brand-logo">ActorMovie</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="new_actor.php">Add New Actor</a></li>
                <li class="active"><a href="actors.php">Show Actors</a></li>
                <li><a href="new_movie.php">Add New Movie</a></li>
                <li><a href="movies.php">Show Movies</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="new_actor.php">Add New Actor</a></li>
                <li class="active"><a href="actors.php">Show Actors</a></li>
                <li><a href="new_movie.php">Add New Movie</a></li>
                <li><a href="movies.php">Show
                        Movies</a></li>
            </ul>
        </div>
    </nav>
    </div>
<div class='container'>
    <header>
        <h3 class='page-header'>All Actors</h3>
    </header>
    <section>
        <?php if ( $row_count > 0 ): ?>
            <table class='table striped highlight responsive-table'>
                <thead>
                <tr>
                    <th>Actors</th>
                    <th>Gender</th>
                    <th>Nationality</th>
                    <th>Bio</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ( $actors as $actor ): ?>
                    <tr>
                        <td><a href="actor_movie.php?id=<?= $actor['id'] ?>" class="tooltipped" data-position="left" data-delay="50" data-tooltip="View Movie(s)"><?= strip_tags($actor['first_name']) ?> <?= strip_tags($actor['last_name']) ?></a></td>
                        <td><?= $actor['gender'] ?></td>
                        <td><?= $actor['nationality'] ?></td>
                        <td><a href="<?= $actor['bio_link'] ?>" class="tooltipped" data-position="right" data-delay="50" data-tooltip="View Profile"><?= $actor['bio_link'] ?></a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">
                No actor information to display.
            </div>
        <?php endif ?>
    </section>
</div>
    <button class="material-scrolltop grey" type="button"><i class="material-icons">keyboard_arrow_up</i></button>
<?php include "footer.php" ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('body').materialScrollTop({
                revealElement: 'header',
                revealPosition: 'bottom',
                onScrollEnd: function() {
                    console.log('Scrolling End');
                }
            });
        });
        $('body').materialScrollTop({

            // add padding 100px
            padding: 100,

            // reveal button when scrolling over <header> ...
            revealElement: 'header',

            // and do it at the end of </header> element
            revealPosition: 'bottom',

            // <a href="http://www.jqueryscript.net/animation/">Animation</a> will run 600 ms
            duration: 600,

            // easing animations
            easing: 'swing',

            // execute a function when animation ends
            onScrollEnd: function() {
                console.log('Scroll End');
            }

        });
    </script>
    <script type="text/javascript" src="materialize.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script src="material-scrolltop.js"></script>
</body>
</html>
