<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Artikel bearbeiten</title>
    <link rel="stylesheet" href="../css/layout.css">
  </head>
  <body>
    <h1>Artikel zum bearbeiten klicken</h1>

    <!-- Datenbankverbindung in externer Datei -->
<?php
    include("../inc/database.inc.php");
$verbindung = mysqli_connect($server, $user, $pass, $database)
        or die("Verbindung konnte nicht hergestellt werden.");

// Datenbankabfrage
$sql = "SELECT * FROM artikel;";
$abfrage = mysqli_query($verbindung, $sql);
if (!$abfrage) {
	echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
}

// Zählen
$anzahl = mysqli_query($verbindung, $sql);
if (!$abfrage) {
    echo "<p>Die SQL-Anweisung ist fehlgeschlagen</p>";
}
// Ausgabe der gezählten Daten
$anzahl = mysqli_num_rows($abfrage);
echo "In der Tabelle sind $anzahl Datensätze vorhanden";
echo "<table border=\"1\">";

// Tabelle inkl. Link zum beabeiten
while ($zeile = mysqli_fetch_array($abfrage)) {
  echo "<tr>
          <td>" . $zeile["id"]. "</td>
          <td>" . $zeile["catid"]. "</td>
          <td>" . $zeile["artnr"]. "</td>
          <td>" . "<a href=\"artbearbeiten.php?id=". $zeile["id"] . "\">" . $zeile["artikelbezeichnung"] ."</a>". "</td>
          <td>" . $zeile["mengeneinheit"]. "</td>
          <td align='right'>" . number_format($zeile["preis"],2,",",".") . "€</td></tr>";
}
echo "</table>";

// Datenbankverbindung schließen
$return = mysqli_close($verbindung);
if (!$return) {
  echo "<p>Die Verbindung mit dem Server konnte nicht geschlossen werden</p>";
}

// Links zu weiteren Dateien
?>
<p><a href="artbearbeiten.php">Neuen Artikel anlegen</a></p>
<p><a href="mengeneinheit-anlegen.php">Neue Mengeneinheit anlegen</a></p>
<p><a href="kategorie-anlegen.php">Neue Kategorie anlegen</a></p>
  </body>
    </html>

