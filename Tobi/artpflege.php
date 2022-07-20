<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>Artikel bearbeiten</title>
    <link href="../css/layout.css" type="text/css" rel="stylesheet"/>
  </head>

  <body>
	<h3>Bitte wählen Sie einen Artikel zum Bearbeiten aus</h3>

<?php
	include("../inc/database.inc..php");
	// der include-Befehl holt sich diese Abfrage in der o.g. Datei
		//$server = "localhost";
		//$user = "root";
		//$pass = "";
		//$database = "webprojekt";

	// Verbindungsaufnahme mit dem MySQL-Server und Datenbankauswahl
	$verbindung = mysqli_connect($server, $user, $pass, $database)
	    or die("Verbindung konnte nicht hergestellt werden.");

	if (!mysqli_set_charset($verbindung, "utf8")) {
		printf("Zeichensatz konnte nicht gesetzt werden: %s\n", mysqli_error($verbindung));
	}

	$sql = "SELECT * FROM artikel;";
	$abfrage = mysqli_query($verbindung, $sql);

	if (!$abfrage) {
		echo "<p>Die SQL-Anweisung ist fehlgeschlagen</p>";
	}

	$anzahl = mysqli_num_rows($abfrage);
	echo "In der Tabelle sind $anzahl Datensätze vorhanden!\"\n";

	echo "<table>";  //border = \"1\"
	echo "<tr>
                <th>ID</th>
                <th>Kategorie</th>
				<th>Artikelnummer</th>
				<th>Artikelbezeichnung</th>
                <th>Mengeneinheit</th>
                <th>Preis</th>
           </tr>";

	$i = 0;
	while ($zeile = mysqli_fetch_array($abfrage)) {
		$i++;
		if($i % 2 == 0) {
			$zformat = "class=\"trhell\"";

		} else {
			$zformat = "class=\"trdunkel\"";
		}

	echo "<tr $zformat><td>" . $zeile["id"]
			."</td><td>" . $zeile["catid"]
			."</td><td>" . $zeile["artnr"]
			."</td><td>" . "<a href=\"artbearbeiten.php?id=". $zeile["id"] . "\">" . $zeile["artikelbezeichnung"] . "</a>"
			."</td><td>" . $zeile["mengeneinheit"]
			."</td><td align= 'right'>" . number_format($zeile["preis"],2,",",".") . "€</td></tr>\n";
	}
	echo "</table>";

	$return = mysqli_close($verbindung);
	if ($return) {
		echo "<p>Die Verbindung mit dem Server wurde beendet.</p>";
		} else {
		echo "<p>Die Verbindung mit dem Server konnte nicht geschlossen werden.</p>";
	}

?>

	<!-- zum Anlegen eines neuen Artikels in artbearbeiten wird dieser Button eingefügt-->
	<p><a href="artbearbeiten.php">Neuen Artikel anlegen</a></p>

</body>
</html>