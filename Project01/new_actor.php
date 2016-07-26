<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="materialize.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Add New Actor</title>
</head>

<body>
<div class="navbar-fixed">
<nav>
    <div class="nav-wrapper">
        <a href="new_actor.php" class="brand-logo">ActorMovie</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li class="active"><a href="new_actor.php">Add New Actor</a></li>
            <li><a href="actors.php">Show Actors</a></li>
            <li><a href="new_movie.php">Add New Movie</a></li>
            <li><a href="movies.php">Show Movies</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li class="active"><a href="new_actor.php">Add New Actor</a></li>
            <li><a href="actors.php">Show Actors</a></li>
            <li><a href="new_movie.php">Add New Movie</a></li>
            <li><a href="movies.php">Show Movies</a></li>
        </ul>
    </div>
</nav>
</div>
<div class="container">
    <h1 class="page-header">Add New Actor</h1>
    <div class="row">
        <form action="add_actor.php" method="post" class="col s12">
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="first_name" name="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>

                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="last_name" name="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <p>
                        <input class="with-gap" name="gender" type="radio" id="male" value="male" />
                        <label for="male">Male</label>
                    </p>
                    <p>
                        <input class="with-gap" name="gender" type="radio" id="female" value="female" />
                        <label for="female">Female</label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="nationality" name="nationality" type="text" class="validate">
                    <label for="nationality">Nationality</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="bio_link" name="bio_link" type="url" class="validate">
                    <label for="bio_link" data-error="Please enter a URL" data-success="Perfect!">Bio Link</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <button class="btn waves-effect waves-green" type="submit" name="action">Add Artist
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
    </div>
</div>
<?php include "footer.php" ?>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="materialize.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>
