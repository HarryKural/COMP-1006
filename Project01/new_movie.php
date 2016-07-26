<?php

// connect to the DB
require "connect.php";

// build the SQL statement with placeholders
$sql = 'SELECT id, first_name, last_name FROM actors';

// prepare, execute, and fetch our result test
$actors = $dbh->query( $sql );

// count the rows returned
$row_count = $actors->rowCount();

// close the DB connection
$dbh = null;

?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="materialize.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Add New Movie</title>
</head>

<body>
<div class="navbar-fixed">
<nav>
    <div class="nav-wrapper">
        <a href="new_actor.php" class="brand-logo">ActorMovie</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="new_actor.php">Add New Actor</a></li>
            <li><a href="actors.php">Show Actors</a></li>
            <li class="active"><a href="new_movie.php">Add New Movie</a></li>
            <li><a href="movies.php">Show Movies</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="new_actor.php">Add New Actor</a></li>
            <li><a href="actors.php">Show Actors</a></li>
            <li class="active"><a href="new_movie.php">Add New Movie</a></li>
            <li><a href="movies.php">Show Movies</a></li>
        </ul>
    </div>
</nav>
</div>
<div class="container">
    <h1 class="page-header">Add New Movie</h1>
    <div class="row">
        <div class='col-xs-12'>
            <section>
                <?php if ($row_count > 0 ): ?>
                    <form action="add_movie.php" method="post">
                        <legend>Movie Information</legend>
                            <div class='form-group'>
                                <label for='actor'>
                                    Actor
                                </label>
                                <select class='form-control' id='actor' name='actor' type='text' required>
                                    <option value="">...select an actor...</option>
                                    <?php foreach ( $actors as $actor ): ?>
                                        <option value="<?= htmlspecialchars($actor['id']) ?>"><?= strip_tags($actor['first_name'] . ' ' . $actor['last_name']) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="movie_name" name="movie_name" type="text" class="validate" required>
                                    <label for="movie_name">Movie Name</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <input id="genre" name="genre" type="text" class="validate" required>
                                    <label for="genre">Genre</label>
                                </div>

                                <div class="input-field col s12 m6 l6">
                                    <input id="category" name="category" type="text" class="validate" required>
                                    <label for="category">Category</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <input id="release_date" name="release_date" type="date" class="datepicker" required>
                                    <label for="release_date">Release Date</label>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='form-inline'>
                                    <div class='input-group col s12 m4 l4'>
                                        <label class='input-group-addon' for="length[hours]">hours</label>
                                        <input class='form-control' max='59' min='0' name='length[hours]' type="number" value="0">
                                    </div>
                                    <div class='input-group col s12 m4 l4'>
                                        <label class='input-group-addon' for="length[minutes]">minutes</label>
                                        <input class='form-control' max='59' min='0' name='length[minutes]' type="number" value="0">
                                    </div>
                                    <div class='input-group col s12 m4 l4'>
                                        <label class='input-group-addon' for="length[seconds]">seconds</label>
                                        <input class='form-control' max='59' min='0' name='length[seconds]' type="number" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="review" name="review" type="text" class="materialize-textarea" length="500" required></textarea>
                                    <label for="review">Review</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <button class="btn waves-effect waves-green" type="submit" name="action">Add Movie
                                        <i class="material-icons left">add_circle</i>
                                    </button>
                                </div>
                                <div class="input-field col s6">
                                    <button class="btn waves-effect waves-red" type="reset" name="action">Reset
                                        <i class="material-icons left">delete_sweep</i>
                                    </button>
                                </div>
                            </div>
                    </form>
                <?php else: ?>
                    <div class="alert alert-warning">
                        You must add an actor first.
                    </div>
                <?php endif ?>
            </section>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="materialize.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>
