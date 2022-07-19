<?php



echo "<ul>";
echo "<li>". $_POST["Vorname"] . "</li><br>";
echo "<li>". $_POST["Name"] . "</li><br>";
echo "<li>". $_POST["Straße"] . "</li><br>";
echo "<li>". $_POST["Ort"] . "</li><br>";
echo "<li>". $_POST["Internet"] . "</li><br>";
echo "<li>". $_POST["Bemerkung"] . "</li><br>";
echo "<li>". $_POST["Datenschutz"] . "</li><br>";
$internet = "http://www.vb-dozent.de";
$pos = strpos($internet,".");
echo $pos;
echo "<br>";
$domain = substr($internet, $pos + 1 );
echo "<a href=\"info@$domain\">Eine Mail senden</a>";
echo "<br><br>";
echo "<a href=\"info@". substr($internet,strpos($internet,".")+1) ."\">Eine Mail senden</a>";




echo "</ul>";


?>