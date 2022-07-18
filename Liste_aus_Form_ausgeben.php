<?php

// Daten aus Formular in Liste ausgeben

echo "<h1>Sie haben fogende Daten übermittelt</h1>";

echo "<list>";
 echo "<li>Name: " . $_POST['Name'] . "</li>";
 echo "<li>E-mail: " . $_POST['Mail'] . "</li>";
echo "</list>"

?>