<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>BiKeAddER</title>
</head>

<body>
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
            <a href="new_bike.php" class="navbar-brand">BiKeAddER</a>
        </div>

        <!-- Menu Items -->
        <!-- Basic horizontal menu -->
        <div class="collapse navbar-collapse" id="mainNavBar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="new_bike.php"><span class="glyphicon glyphicon-plus"></span> Add BiKe</a></li>
                <li><a href="bikes.php"><span class="glyphicon glyphicon-th"></span> All BiKes</a></li>
                <li><a href="contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h3 class="page-header">Add New BiKe <i class="fa fa-motorcycle" style="font-size:35px;"></i></h3>
    <div class="jumbotron">
        <!-- Carousel -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
                <li data-target="#myCarousel" data-slide-to="6"></li>
                <li data-target="#myCarousel" data-slide-to="7"></li>
                <li data-target="#myCarousel" data-slide-to="8"></li>
                <li data-target="#myCarousel" data-slide-to="9"></li>
                <li data-target="#myCarousel" data-slide-to="10"></li>
                <li data-target="#myCarousel" data-slide-to="11"></li>
                <li data-target="#myCarousel" data-slide-to="12"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/1.jpg" class="img-responsive img-rounded" alt="V-rod" id="biker">
                </div>

                <div class="item">
                    <img src="images/2.jpg" class="img-responsive img-rounded" alt="iron883">
                </div>

                <div class="item">
                    <img src="images/3.jpg" class="img-responsive img-rounded" alt="roadster">
                </div>

                <div class="item">
                    <img src="images/4.jpg" class="img-responsive img-rounded" alt="glide">
                </div>

                <div class="item">
                    <img src="images/5.jpg" class="img-responsive img-rounded" alt="ducati" id="ducatii">
                </div>

                <div class="item">
                    <img src="images/6.jpg" class="img-responsive img-rounded" alt="ducati1">
                </div>

                <div class="item">
                    <img src="images/7.jpg" class="img-responsive img-rounded" alt="ducati2">
                </div>

                <div class="item">
                    <img src="images/8.jpg" class="img-responsive img-rounded" alt="kawa">
                </div>

                <div class="item">
                    <img src="images/9.jpg" class="img-responsive img-rounded" alt="kawasakii" id="helmeti">
                </div>

                <div class="item">
                    <img src="images/10.jpg" class="img-responsive img-rounded" alt="honda1">
                </div>

                <div class="item">
                    <img src="images/11.jpg" class="img-responsive img-rounded" alt="CTX">
                </div>

                <div class="item">
                    <img src="images/12.jpg" class="img-responsive img-rounded" alt="sports">
                </div>

                <div class="item">
                    <img src="images/13.jpg" class="img-responsive img-rounded" alt="dirt">
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
<!-- end of carousel -->

    <section>
        <form action="add_bike.php" method="post">
            <fieldset>
                <legend id="infoLegend">BiKe Information</legend>

                <div class="form-group">
                    <label for="manufacturer">Manufacturer</label>
                    <input class="form-control" type="text" name="manufacturer" id="manufacturer" required>
                </div>

                <div class="form-group">
                    <label for="model">Model</label>
                    <input class="form-control" type="text" name="model" id="model" required>
                </div>

                <div class="form-group">
                    <label for="bike_class">Class</label>
                    <input class="form-control" type="text" name="bike_class" id="bike_class" required>
                </div>

                <div class="form-group">
                    <label for="bike_color">Color</label>
                    <input class="form-control" type="text" name="bike_color" id="bike_color" required>
                </div>

                <div class="form-group">
                    <label for="bike_year">Year</label>
                    <input class="form-control" type="number" min="0" name="bike_year" id="bike_year" required>
                </div>

                <div class="form-group">
                    <label for="bike_speed">Top Speed <small>km/h</small></label>
                    <input class="form-control" type="number" min="0" name="bike_speed" id="bike_speed" required>
                </div>

                <div class="buttons">
                    <button class="btn btn-success"><i class="fa fa-plus-square"></i> Add BiKe</button>
                    <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-erase"></span> Reset</button>
                </div>

            </fieldset>
        </form>
    </section>
    </div>
</div>

<?php include "footer.php" ?>

<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
