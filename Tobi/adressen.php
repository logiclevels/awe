<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Prüfung Anwendungsentwickler 2020</title>
</head>

<body>
    <h1>Daten in eine Tabelle einfügen</h1>
    <?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "vorbereitung2022";

    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $Abteilungen = $_POST["Abteilungen"];
    $Anrede = $_POST["Anrede"];

    $verbindung = mysqli_connect($server, $user, $pass, $database)
            or die("Verbindung konnte nicht hergestellt werden.");

    $sql = "INSERT INTO adressen (vorname, nachname, Abteilungen, Anrede)";
    $sql .= " VALUES ('$vorname', '$nachname', '$Abteilungen', '$Anrede')";

    //echo $sql;

    $abfrage = mysqli_query($verbindung, $sql);
    if ($abfrage) {
    	echo "<p>Der Datensatz wurde hinzugefügt.</p>";
    } else {
    	echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
    }
    $return = mysqli_close($verbindung);
    if (!$return) {
    	echo "<p>Die Verbindung mit dem Server konnte nicht geschlossen werden.</p>";
    }
    ?>
</body>
</html>