<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
<head>
<title>Install Storybot</title>
<link rel="stylesheet" type="text/css" href="../media/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<center>
<a href='index.php'><img src="../media/logo.png" /></a>
<h2>Install Storybot</h2>
<h3>Please follow the instructions below to finish setting up Storybot for your community.</h3>
<?php
define("IN_STORYBOT", 1);
define("IN_INSTALL", 1);
require_once("../config/config.php");
?>
<form action="install.php" method="POST">
<input type="hidden" name="step" value="1" />
<input type="text" name="dbhost" placeholder="Database host (localhost if unsure)" /><br /><br />
<input type="text" name="dbname" placeholder="Database name" /><br /><br />
<input type="text" name="dbuser" placeholder="Database username" /><br /><br />
<input type="password" name="dbpass" placeholder="Database password" /><br /><br />
<input type="submit" />
</form>
</center>
</body>
</html>