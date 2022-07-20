<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2015
 */
echo "<ul>";
//echo "<li>" . $_POST['name'] . "</li>";
//echo "<li>" . $_POST['internet'] . "</li>";
$internet = "http://www.vb-dozent.net";
$pos = strpos($internet, ".");
echo $pos;
echo "<br>";
$domain = substr($internet,$pos + 1);
echo $domain;
echo "<a href=\"mailto:info@$domain\">Eine E-Mail senden</a><br>";

//Hier nochmal alles zusammengefasst aus Zeile 11 bis 17
echo "<a href=\"mailto:info@" . substr($internet, strpos($internet,".")+1) . "\">Eine E-Mail senden</a>";

echo "<a href=\"" .$_POST['internet'] . "\" target=\"_blank\">" .$_POST['internet'] . "</a>";

echo "</ul>";

?>