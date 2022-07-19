<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Prüfung Anwendungsentwickler 2009</title>
</head>

<body>
      
      <h2>Passwort eingeben</h2> 

         
         <?php
            
			$password = isset($_POST['password'])?$_POST['password']:" "; 
			if ($password == "geheim") {
				echo "Das Passwort ist korrekt";
			}
			else {
				echo "Falsches Passwort"; 
			}
            
         ?>
      
         <form action = "<?php ($_SERVER['PHP_SELF']); ?>" method = "post">

            <input type = "password" name = "password" required>

            <button class = "submit" type = "submit" name = "login">Login</button>
         </form>
			

</body>
</html>