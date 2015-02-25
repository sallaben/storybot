<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
<head>
<title>Storybot Reports</title>
<link rel="stylesheet" type="text/css" href="media/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<center>
<a href='index.php'><img src="media/logo.png" /></a>
<h2>Report Log</h2>
<h3>Displays 5 oldest reports. To see new ones, deal with the oldest ones first.</h3>
<?php
define("IN_STORYBOT", 1);
require_once("config/config.php");
if(!is_admin(mod_id())) {
	die("Administrator rights required!");
}
generateReports();
?>
<hr>
End of page.
</center>
</body>
</html>