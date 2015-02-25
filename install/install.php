<?php
define("IN_STORYBOT", 1);
define("IN_INSTALL", 1);
if(isset($_GET['done'])) {
	file_put_contents("lock.true", "");
}
require_once("../config/config.php");
if(($_POST['step'] != 1) && ($_POST['step'] != 2) && ($_POST['step'] != 3)) {
	header("Location: index.php");
} elseif($_POST['step'] == 1) {
	// *** CONNECT TO DATABASE *** //
	$db = new mysqli($_POST['dbhost'], $_POST['dbuser'], $_POST['dbpass'], $_POST['dbname']); //do not edit
	if($db->connect_errno > 0){
	    die("Database connection error: ".$db->connect_error."<hr />Please press 'back' on your browser and try again.");
	} else {
		$content = file_get_contents("../config/settings.php");
		$content = str_replace("DBUSER", $_POST['dbuser'], $content);
		$content = str_replace("DBHOST", $_POST['dbhost'], $content);
		$content = str_replace("DBPASS", $_POST['dbpass'], $content);
		$content = str_replace("DBNAME", $_POST['dbname'], $content);
		file_put_contents("../config/settings.php", $content);
	}
	// *** ------------------- *** //
} elseif($_POST['step'] == 2) {
	// *** CONNECT TO SNAPCHAT *** //
	$snapchat = new Snapchat($_POST['snuser'], $_POST['snpass']);
	$array = json_decode(json_encode($snapchat), true);
	if($array['username'] == false) {
		die("Incorrect Snapchat username or password.<hr />Please press 'back' on your browser and try again.");
	} else {
		$content = file_get_contents("../config/settings.php");
		$content = str_replace("USERNAME", $_POST['snuser'], $content);
		$content = str_replace("PASSWORD", $_POST['snpass'], $content);
		file_put_contents("../config/settings.php", $content);
	}
	// *** ------------------- *** //
} elseif($_POST['step'] == 3) {
	$content = file_get_contents("../config/settings.php");
	if($_POST['mod'] == "true") {
		$content = str_replace("MODERATION", "true", $content);
	} else {
		$content = str_replace("MODERATION", "false", $content);
	}
	if($_POST['pic'] == "true") {
		$content = str_replace("PICTURES", "true", $content);
	} else {
		$content = str_replace("PICTURES", "false", $content);
	}
	if($_POST['vid'] == "true") {
		$content = str_replace("VIDEOS", "true", $content);
	} else {
		$content = str_replace("VIDEOS", "false", $content);
	}
	if($_POST['time'] > 10) {
		$time = 10;
	} elseif($_POST['time'] < 1) {
		$time = 1;
	} else {
		$time = $_POST['time'];
	}
	$content = str_replace("TIME", $time, $content);
	$content = str_replace('$config["firstsetup"] = true;', '$config["firstsetup"] = false;', $content);
	file_put_contents("../config/settings.php", $content);
	header("Location: install.php?done=1");
}
?>
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
<?php
if($_POST['step'] == 1) {
	echo 'Successful database connection!
<h3>Please input the Snapchat username and password for the account you want to use Storybot with.</h3>
<form action="install.php" method="POST">
<input type="hidden" name="step" value="2" />
<input type="text" name="snuser" placeholder="Snapchat username" /><br /><br />
<input type="password" name="snpass" placeholder="Snapchat password" /><br /><br />'; 
} elseif($_POST['step'] == 2) {
	echo 'Successful Snapchat connection!
<h3>Please customize your Storybot below.</h3>
<form action="install.php" method="POST">
<input type="hidden" name="step" value="3" />
<span class="option">Moderation (all images are manually approved)</span><br /><br />
<input type="radio" name="mod" value="true" checked="true">True
<input type="radio" name="mod" value="false">False<br /><br />
<table><tr><td><span class="option">Pictures allowed</span><br /><br />
<input type="radio" name="pic" value="true" checked="true">True
<input type="radio" name="pic" value="false">False</td><td>
<span class="option">Videos allowed</span><br /><br />
<input type="radio" name="vid" value="true" checked="true">True
<input type="radio" name="vid" value="false">False</td></tr></table><br />
<span class="option">Time for picture snaps (1-10)</span><br /><br />
<input type="number" min="1" max="10" name="time" value="5"><br /><br />'; 
}
?>
<input type="submit" />
</form>
</center>
</body>
</html>