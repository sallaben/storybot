<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
<head>
<title>Storybot Mod</title>
<link rel="stylesheet" type="text/css" href="media/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body onload="document.getElementById('refresh').style.display = 'block'; document.getElementById('loading').style.display = 'none';">
<center>
<a href='index.php'><img src="media/logo.png" /></a>
<br />
<?php
define("IN_STORYBOT", 1);
require_once("config/config.php");
if(!is_mod(mod_id())) {
	die("Registration is required! Please visit <a href='index.php'>this link</a>.");
}
$admin = is_admin(mod_id());
$sid = oldestImage();
if($sid != "") {
	echo displayImage($sid);
	echo "<br />";
	echo "<a href='action.php?type=0&sid=".$sid."' class='accept'>ACCEPT</a>";
	echo "<a href='action.php?type=1&sid=".$sid."' class='reject'>REJECT</a>";
	echo "<a href='action.php?type=2&sid=".$sid."' class='report'>REPORT</a>";
} else {
	echo "<br /><div id='loading'>Looking for new snaps...</div><div id='refresh' style='display: none;'>Refresh this page now and there may be more images. Thanks for your hard work!</div>";
}
if($admin) {
	echo "<br /><br /><br /><table><tr><td><a href='admin.php' class='settings'>Admin panel</a></td>";
	if($sid != "") {
		echo "<td><a href='action.php?type=-1&sid=".$sid."' class='ban'>Ban sender</a></td>";
	}
	echo "<td><a href='reports.php' class='reports'>Report log</a></td></tr></table>";
}
	echo "<iframe style='height: 0px; width: 0px; border: none;' src='bot.php' />";
?>
</center>
</body>
</html>