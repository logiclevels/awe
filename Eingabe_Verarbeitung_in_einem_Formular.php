<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="template.css" rel="stylesheet" type="text/css" />

</head>

<body>
	<?php
	//Vorlagendatei für die Prüfung AWE München 2015 Vollzeit

	$server ="localhost";
	$user = "root";
	$pass = "";
	$database = "uebung2022";

$verbindung = mysqli_connect($server, $user, $pass, $database)
	or die("Verbindung konnte nicht hergestellt werden.");

?>
    <script language="JavaScript">
    function hallo(){
    alert ("\n Hallo auf meiner Siete");

    }
	</script>
<html>
    <body>
    	<body onLoad="hallo()">


        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <h1>Neuer Datensatz:</h1<br><br>
                    <p>Vorname</p>
                    <input type="text" name="Vorname" class="txtField"><br><br>
                    <p>Nachname</p>
                    <input type="text" name="Nachname" class="txtField"><br><br>
                    <p>Kundengruppe</p>
                    <select name="Kundengruppe">
					   <option value="Privat">Privat</option>
					    <option value="Kunde">Kunde</option>
					    <option value="Einzelhaendler">Einzelhändler</option>
					    <option value="Großhaendler">Großhändler</option>
					  </select>
                    <p>EMail</p>
                    <input type="email" name="EMail" class="txtField"><br><br><br>

                    <input type="submit" name="save_datensatz" value="Kategorie speichern" class="buttom"><br /><br />
        </form>
    </body>
</html>

	<?php
	if (isset($_POST['save_datensatz'])) {
		$katbezeichnung = $_POST["Vorname"];
		$katbezeichnung = $_POST["Nachname"];
		$katbezeichnung = $_POST["Kundengruppe"];
		$katbezeichnung = $_POST["EMail"];
		$sql = "INSERT INTO adressen (Vorname, Nachname, Kundengruppe, EMail)";
		$sql .= " VALUES ('Vorname', 'Nachname', 'Kundengruppe', 'EMail')";




		if (mysqli_query($verbindung, $sql)) {
			echo "Neuer Eintrag hinzugefügt\"<br><br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($verbindung);
		}
				mysqli_close($verbindung);

				echo $sql;


	}
?>


</body>
</html>