<?php

  $dbh = new PDO( "mysql:host=sql.computerstudi.es;dbname=gc200333254", "gc200333254", "7aULr7wU");
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  // build the SQL statement
  $sql = 'SELECT * FROM artists';

  // prepare, execute, and fetchAll
  $artists = $dbh->query( $sql );

  // count the rows
  $row_count = $artists->rowCount();

  // close the DB connection
  $dbh = null;

?>

<!DOCTYPE html>
<html>
  <head>
    <link crossorigin='anonymous' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' rel='stylesheet'>
    <link crossorigin='anonymous' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css' integrity='sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O' rel='stylesheet'>
    <title>All Artists</title>
  </head>
  <body>
    <div class='container'>
      <header>
        <h3 class='page-header'>All Artists</h3>
      </header>
      <section>
        <?php if ( $row_count > 0 ): ?>
          <table class='table'>
            <thead>
              <tr>
                <th>Artist</th>
                <th>Bio</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ( $artists as $artist ): ?>
                <tr>
                  <td><a href="artist_songs.php?id=<?= $artist['id'] ?>"><?= $artist['name'] ?></a></td>
                  <td><a href="<?= $artist['bio_link'] ?>"><?= $artist['bio_link'] ?></a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="alert alert-warning">
            No song information to display.
          </div>
        <?php endif ?>
      </section>
    </div>
  </body>
</html>
