<?php
if(isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = 0;
}

include("../inc/database.inc.php");
$verbindung = mysqli_connect($server, $user, $pass, $database)
        or die("Verbindung konnte nicht hergestellt werden.");

	if (!isset($_POST['Speichern']) and !isset($_POST['Neu'])) {

		if ($id > 0) {
		$sql = "SELECT * FROM artikel WHERE id=$id;";
		$abfrage = mysqli_query($verbindung, $sql);
			if (!$abfrage) {
				echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
			}
		}

		$sql = "SELECT * FROM kategorien ORDER BY katbezeichnung ASC";
		$abfrage2 = mysqli_query($verbindung, $sql);
			if (!$abfrage2) {
				echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
		}

		$sql = "SELECT * FROM mengeneinheiten ORDER BY mengeneinheit ASC";
		$abfrage3 = mysqli_query($verbindung, $sql);
			if (!$abfrage3) {
				echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
		}

		if ($id > 0){
		$zeile = mysqli_fetch_array($abfrage);
		}
?>


<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<!--ID übergeben damit eine Zuordnung stattfinden kann  -->
		<input type="hidden" name="id" class="txtField" value="<?php echo ( $id > 0 ? $zeile["id"]: "") ; ?>">
				<!-- Kategorie als Dropdown -->
				<p>Kategorie:</br>
				<select name="catid">
				<option value="">Bitte auswählen</option>
					<?php
					while ($zeilecat = mysqli_fetch_array($abfrage2)) {
						if ($id < 0) {
							if ($zeilecat['catid']== $zeile['catid']) {
								$selected = "selected";
							} else {
								$selected = "";
							}
					} else {
						$selected = "";
					}
						echo "<option value=\"" .$zeilecat['catid'] . "\" $selected>" . $zeilecat['katbezeichnung'] . "</option>";
					}
					?>
				</select></p><br>

			Artikelnummer :<br>
			<input type="text" name="artnr" class="txtField" value="<?php echo ( $id > 0 ? $zeile["artnr"]: "") ; ?>"><br><br>

			Artikelbezeichnung:<br>
			<input type="text" name="artikelbezeichnung" class="txtField" value="<?php echo ( $id > 0 ? $zeile["artikelbezeichnung"]: "") ; ?>">
			<br><br>

			<!-- Mengeneinheit als Dropdown -->
			<p>Mengeneinheitneinheit:<br />
				<select name="mengeneinheit">
					<option value="">Bitte auswählen</option>
						<?php
						while ($zeileme = mysqli_fetch_array($abfrage3)) {
							if ($id < 0) {
								if ($zeileme['mengeneinheit']== $zeile['mengeneinheit']) {
									$selected = "selected";
								} else {
									$selected = "";
								}
							} else {
								$selected = "";
							}
							echo "<option value=\"" .$zeileme['mengeneinheit'] . "\" $selected>" . $zeileme['mengeneinheit'] . "</option>";
						}
				?>


			</select></p><br>

			Preis:<br />
			<input type="text" name="preis" class="txtField" value="<?php echo ( $id > 0 ? $zeile["preis"]: "") ; ?>">



				<!-- Je nach Zusatnd wird hier entweder der Button Speichern oder Neu angezeigt -->
				<?php
				if ($id > 0) { ?>
				<p><input type="submit" name="Speichern" value="Submit" class="buttom"></p>
				<?php } else { ?>
				<p><input type="submit" name="Neu" value="Hinzufügen" class="buttom"></p>
				<?php } ?>
			</form>
				<!--Inline Style-->
				<div style="padding-bottom:5px;">
					<a href="artpflege.php">Zur&uuml;ck zur Artikelliste</a>
				</div>
			</body>
	</html>

<?php
	// Daten neu erfassen und in Datenbank speichern
	} elseif (isset($_POST['Neu'])) {
				$catid = $_POST["catid"];
				$artnr = $_POST["artnr"];
				$artikelbezeichnung = $_POST["artikelbezeichnung"];
				$mengeneinheit = $_POST["mengeneinheit"];
				$preis = $_POST["preis"];
				$sql = "INSERT INTO artikel (catid, artnr, artikelbezeichnung, mengeneinheit, preis)";
				$sql .= " VALUES ('$catid', '$artnr', '$artikelbezeichnung', '$mengeneinheit', '$preis')";
				$abfrage = mysqli_query($verbindung, $sql);
				if (!$abfrage) {
						echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
				}
				?>
				<a href="artpflege.php">Zurück zur Überischt</a>
				<?php
	} else {

	//Hier werden die Daten geupdated
				$id = $_POST["id"];
				$catid = $_POST["catid"];
				$artnr = $_POST["artnr"];
				$artikelbezeichnung = $_POST["artikelbezeichnung"];
				$mengeneinheit = $_POST["mengeneinheit"];
				$preis = $_POST["preis"];
				$sql = "UPDATE artikel SET catid = '$catid', artnr = '$artnr', artikelbezeichnung = '$artikelbezeichnung', mengeneinheit = '$mengeneinheit', preis = '$preis' WHERE id=$id";
				$abfrage = mysqli_query($verbindung, $sql);
				if (!$abfrage) {
						echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>";
					}
				?>
			}
				<a href="artpflege.php">Zurück zur Überischt</a>



<?php } ?>
