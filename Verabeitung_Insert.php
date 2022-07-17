<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Prüfung Anwendungsentwickler 2020</title>
</head>

<body>

<?php

// Datenbankverbindung herstellen und das HTML Eingabeformular verabeiten mit INSERT

	$server ="localhost";
	$user = "root";
	$pass = "";
	$database = "vorbereitung2022";

$verbindung = mysqli_connect($server, $user, $pass, $database)
	or die("Verbindung konnte nicht hergestellt werden.");

?>

	<?php
	//Vorlagendatei für die Prüfung AWE Traunstein 2020
	if (isset($_POST['Neu'])) {
		$Anrede = $_POST["Anrede"];
		$Vorname = $_POST["Vorname"];
		$Nachname = $_POST["Nachname"];
		$Abteilung = $_POST["Abteilung"];
				$sql = "INSERT INTO adressen (Anrede, Vorname, Nachname, Abteilung)";
		$sql .= " VALUES ('$Anrede', '$Vorname', '$Nachname', 'Abteilung')";
		$abfrage = mysqli_query($verbindung, $sql);
		if (!$abfrage) {
				echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
		}
	}
	?>
</body>
</html>