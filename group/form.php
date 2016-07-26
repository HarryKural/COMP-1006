<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <title>HEROES Information</title>
</head>

<body>
<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
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
            <a href="form.php" class="navbar-brand">HEROES Information</a>
        </div>

        <!-- Menu Items -->
        <!-- Basic horizontal menu -->
        <div class="collapse navbar-collapse" id="mainNavBar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="new_bike.php"><span class="glyphicon glyphicon-plus"></span> Heroes</a></li>
                <li><a href="bikes.php"><span class="glyphicon glyphicon-th"></span> Heroes Information</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <section>
        <form action="" method="post">
            <fieldset>
                <legend id="infoLegend">Heroes</legend>

                <div class="form-group">
                    <label for="first_name">First Name: </label>
                    <input class="form-control" type="text" name="first_name" id="first_name" required>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name: </label>
                    <input class="form-control" type="text" name="last_name" id="last_name" required>
                </div>

                <div class="form-group">
                    <label for="alias">Alias</label>
                    <input class="form-control" type="text" name="alias" id="alias" required>
                </div>

                <div class="form-group">
                    <label for="powers">Powers</label>
                    <input class="form-control" type="text" name="powers" id="powers" required>
                </div>

                <div class="buttons">
                    <button class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                    <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-erase"></span> Reset</button>
                </div>

            </fieldset>
        </form>
    </section>
</div>

<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
