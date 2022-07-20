<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Daten auslesen</title>
  </head>
  <body>
    <h1>Daten aus einer Tabelle auslesen und darstellen</h1>
    <?php
    $server = "localhost";
    $user = "php-user";
    $pass = "DS5JiWHLqrYsPsJS";
    $database = "obstladen";

    $verbindung = mysqli_connect($server, $user, $pass, $database)
            or die("Verbindung konnte nicht hergestellt werden.");

    $sql = "SELECT * FROM bestellung";
    $abfrage = mysqli_query($verbindung, $sql);
    if (!$abfrage) {
      echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
    }
    $anzahl = mysqli_num_rows($abfrage);
    echo "<p>In der Tabelle befinden sich $anzahl Datensätze:</p>";
    echo "<ul>";
    while ($zeile = mysqli_fetch_array($abfrage)) {
      echo "<li>" . $zeile["id"] . ": "
      . $zeile["vorname"] . " "
      . $zeile["nachname"] . ", "
      . $zeile["ort"] . ", "
      . $zeile["menge"] . " kg "
      . $zeile["sorte"] . ".";
    }
    echo "</ul>";
    $return = mysqli_close($verbindung);
    if (!$return) {
      echo "<p>Die Verbindung mit dem Server konnte nicht geschlossen werden.</p>";
    }
    ?>
  </body>
</html>