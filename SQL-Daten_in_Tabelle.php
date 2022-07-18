<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Prüfung Anwendungsentwickler 2020</title>
</head>

<body>
	<?php

// Daten aus Datenbank in Tabelle ausgeben

	$server ="localhost";
	$user = "root";
	$pass = "";
	$database = "vorbereitung2022";

$verbindung = mysqli_connect($server, $user, $pass, $database)
	or die("Verbindung konnte nicht hergestellt werden.");


	$sql = "SELECT * FROM adressen;";
	$abfrage = mysqli_query($verbindung, $sql);
	if (!$abfrage) {
		echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
	}
	
	$anzahl = mysqli_query($verbindung, $sql);
	if (!$abfrage) {
		echo "<p>Die SQL-Anweisung ist fehlgeschlagen</p>";
	}
	$anzahl = mysqli_num_rows($abfrage);
	echo "In der Tabelle sind $anzahl Datensätze vorhanden";
	echo "<table border=\"1\">";
	while ($zeile = mysqli_fetch_array($abfrage)) {
	  echo "<tr>
			  <td>" . $zeile["Anrede"]. "</td>
			  <td>" . $zeile["Vorname"]. "</td>
			  <td>" . $zeile["Nachname"]. "</td>
			  <td>" . $zeile["Abteilung"]. "</td>
			</tr>";
	}
	echo "</table><br>";
	echo $sql;

	$return = mysqli_close($verbindung);
	if (!$return) {
	  echo "<p>Die Verbindung mit dem Server konnte nicht geschlossen werden</p>";
	}

	?>
</body>
</html>