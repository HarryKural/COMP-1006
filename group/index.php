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
                <li role="presentation" class="active"><a href="index.php">Home</a></li>
                <li role="presentation"><a href="database.php">Database</a></li>
            </ul>
            <h1>Superhero Database</h1>
        </nav>
        <div class="well">
            <section>
                <form action="submit_data.php" method="post">
                    <fieldset>
                        <legend>Personal Information</legend>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input class="form-control" type="text" name="first_name" placeholder="Clark" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input class="form-control" type="text" name="last_name" placeholder="Kent" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="tel_Num">Alias</label>
                            <input class="form-control" type="text" name="alias" placeholder="Superman" maxlength="100" required>
                        </div>
                        <div class="form-group">
                            <label for="powers">Powers</label>
                            <input class="form-control" type="text" name="powers" placeholder="Flying" maxlength="100" required>
                        </div>
                    </fieldset>
                    <div>
                        <button class="btn btn-primary">Submit Information</button>
                        <button type="reset" class="btn btn-danger">Reset Form</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
