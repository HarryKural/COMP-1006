<?php
    $recipeName = "Grilled Cheese";

    $ingredients = ['2 tble spoons of butter', '2 slices of home baked bread', '2 slices of monetray jack cheese', '1 slice of old cheddar', '1 slice of mozzarella'];

    $preparationSteps = ['Butter one side of each slice of bread', 'Place buttered side of each slice on griddle', 'Place on piece of monteray jack on each piece of bread', 'Place cheddar cheese on one slice of bread', 'Place mozzarella on the opposite piece', 'Once golden brown, combine both pieces', 'Cut into triangles and serve with favourite your ketchup'];

    $date = date("l jS \of F Y", strtotime('2016-04-28'));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <title>Title</title>
</head>
    <body>
        <div class="container">
            <h1 class="page-header">Lesson 01 Examples<small> - Grilled Static Pages</small></h1>
            
            <div class="panel panel-default">
                <div class="pull-left">
                    <img src="http://www.weewatch.com/wp-content/uploads/2016/04/grilled-cheese-_-sex.jpg" class="img-responsive thumbnail">
                </div>

                <div class="pull-right">
                    <h3>Recipe Ingredients</h3>
                    <ul>
                        <?php foreach ($ingredients as $ingredient) {
                            echo '<li>' . $ingredient . '</li>';
                        } ?>
                    </ul>

                    <h3>Recipe Preparation Method</h3>
                    <ol>
                        <?php foreach ($preparationSteps as $step): ?>
                            <li>
                                <?= $step ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>

        <div class="panel-footer">
            <small><strong>Preparation Date: <?= $date ?></strong></small>
        </div>

    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>