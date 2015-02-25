<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
<head>
<title>Storybot Admin</title>
<link rel="stylesheet" type="text/css" href="media/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<center>
<a href='index.php'><img src="media/logo.png" /></a>
<h2>Admin Panel</h2>
<h3>Edit settings, change accounts, disable Storybot, and more!</h3>
<?php
define("IN_STORYBOT", 1);
require_once("config/config.php");
if(!is_admin(mod_id())) {
	die("Administrator rights required!");
}
if($config['moderation'] == "true") {
	$mod = "checked";
	$auto = "";
} else {
	$mod = "";
	$auto = "checked";
}
if($config['picturesallowed'] == "true") {
	$pic = "checked";
	$nopic = "";
} else {
	$pic = "";
	$nopic = "checked";
}
if($config['videosallowed'] == "true") {
	$vid = "checked";
	$novid = "";
} else {
	$vid = "";
	$novid = "checked";
}
if($config['enabled'] == "true") {
	$enabled = "checked";
	$noenabled = "";
} else {
	$enabled = "";
	$noenabled = "checked";
}
?>
<i>Any values modified here will be changed immediately.</i><br /><br />
<form action="update.php" method="POST">
<table>
<tr><td>Snapchat username:</td><td><input type="text" name="snuser" value="<? echo $config['username']; ?>" /></td></tr>
<tr><td>Snapchat password:</td><td><input type="password" name="snpass" value="<? echo $config['password']; ?>" /></td></tr>
<tr><td><hr></td><td><hr></td></tr>
<tr><td>Moderation:</td><td>True: <input type="radio" value="true" name="mod" <? echo $mod; ?> /> False: <input type="radio" value="false" name="mod" <? echo $auto; ?> /></td></tr>
<tr><td><hr></td><td><hr></td></tr>
<tr><td>Pictures allowed:</td><td>True: <input type="radio" value="true" name="pic" <? echo $pic; ?> /> False: <input type="radio" value="false" name="pic" <? echo $nopic; ?> /></td></tr>
<tr><td>Videos allowed:</td><td>True: <input type="radio" value="true" name="vid" <? echo $vid; ?> /> False: <input type="radio" value="false" name="vid" <? echo $novid; ?> /></td></tr>
<tr><td><hr></td><td><hr></td></tr>
<tr><td>Picture display time:</td><td><input type="number" min="1" max="10" name="time" value="<? echo $config['picturetime']; ?>"></td></tr>
<tr><td><hr></td><td><hr></td></tr>
<tr><td>Enabled:</td><td>True: <input type="radio" value="true" name="enable" <? echo $enabled; ?> /> False: <input type="radio" value="false" name="enable" <? echo $noenabled; ?> /></td></tr>
</table>
<input type="submit" value="Update settings" />
<br /><br />
</form>
</center>
</body>
</html>