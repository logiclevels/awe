<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<!--/**
 *
 * @access public
 * @return void
 **/-->
<!--Java MsgBox Schön, dass Sie meine grandiose Internetseite besuchen einbinden-->
<script language="JavaScript">
		function hallo (){
			alert("\nSchön, dass Sie meine grandiose Internetseite besuchen");
		}
</script>


</head>

<!-- die Java-function hallo () über den onload aufrufen-->
<body onload="hallo ()">


<h1>Aufgabe 1</h1>
<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2020
 */
//Datenbank meinedb2022 einbinden
$server = "localhost";
$user = "root";
$pass = "";
$database = "meinedb2022";

//Verbindung mit Datenbank aufbauen
$verbindung = mysqli_connect($server, $user, $pass, $database)
	or die("Verbindung konnte nicht hergestellt werden.");



if (isset($_POST['abschicken'])) {
    $Artikelname = $_POST["Artikelname"];
    $Beschreibung = $_POST["Beschreibung"];
	$Anzahl = $_POST["Anzahl"];
    $Mengeneinheit = $_POST["Mengeneinheit"];
    $Preis = $_POST["Preis"];
    $Artikelnummer = $_POST["Artikelnummer"];
    $sql = "INSERT INTO bestellungen (Artikelname, Beschreibung, Anzahl, Mengeneinheit, Preis, Artikelnummer)";
    $sql .= " VALUES ('$Artikelname', '$Beschreibung', '$Anzahl', '$Mengeneinheit', '$Preis', '$Artikelnummer')";
    $abfrage = mysqli_query($verbindung, $sql);
    if (!$abfrage) {
            echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
    } else {
	echo "<p>Die Daten aus der index.hmtl wurden erfolgreich übertragen.</p>";
	}
}

echo "<pre>";
print_r ($_POST);
echo "</pre>";
?>


<hr/>

<h1>Aufgabe 3</h1>

<?php

//vorhanende Daten abfragen:
$sql = "SELECT * FROM `bestellungen`";
$abfrage = mysqli_query($verbindung, $sql);
if (!$abfrage) {
	echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
} else {
	echo "<p><b>Die Daten wurden erfolgreich eingelesen.</b></p>";
	echo "<p><b>Die verwendete SQL-Abfrage ist:</b></p>";
	echo $sql;

//Anzahl vorhandener Datensätze ermitteln
$anzahl = mysqli_num_rows($abfrage);
echo "<p><b>Es sind $anzahl Datensätze vorhanden:</bold></b></p>";

//Datensätze in Tabelle ausgeben:
//Tabelle "zeichnen" mit Tabellenlinien
echo "<table border='1'>";
//Tabellenüberschriften
echo "<tr>
	  <th>ID</th>
	  <th>Artikelname</th>
	  <th>Beschreibung</th>
	  <th>Anzahl</th>
	  <th>Mengeneinheit</th>
	  <th>Preis in €</th>
	  <th>Artikelnummer</th>
	  </tr>";

//Inhalte einfügen
while ($zeile = mysqli_fetch_array($abfrage)) {
	echo "<tr>";
	echo "<td>" . $zeile['ID'] . "</td>";
	echo "<td>" . $zeile['Artikelname'] . "</td>";
	echo "<td>" . $zeile['Beschreibung'] . "</td>";
	echo "<td>" . $zeile['Anzahl'] . "</td>";
	echo "<td>" . $zeile['Mengeneinheit'] . "</td>";
	echo "<td>" . $zeile['Preis'] . "</td>";
	echo "<td>" . $zeile['Artikelnummer'] . "</td>";
	echo "</tr>";
}

//Tabelle schließen
echo "</table>";

?>
</body>
</html>

<!-- nach den ganzen else-Abfragen darf der schließende } nicht fehlen-->
<?php } ?>