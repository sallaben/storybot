<?php
define("IN_STORYBOT", 1);
require_once("config/config.php");
if(!is_mod(mod_id())) {
	echo <<<END
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
<head>
<title>Storybot Register</title>
<link rel="stylesheet" type="text/css" href="media/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<center>
<img src="media/logo.png" />
<br />
<form action='action.php' method='GET'>
Click to register!
<br />
<input type="hidden" name="type" value="register" />
<input type="submit" value="Register" />
</form>
END;
} else {
	header("Location: mod.php");
}
?>
</center>
</body>
</html>