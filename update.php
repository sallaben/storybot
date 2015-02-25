<?php
define("IN_STORYBOT", 1);
require_once("config/config.php");
if(!is_admin(mod_id())) {
	die("Administrator rights required!");
}
	$content = file_get_contents("config/defaultsettings.php");
	$content = str_replace("DBUSER", $config['dbuser'], $content);
	$content = str_replace("DBHOST", $config['dbhost'], $content);
	$content = str_replace("DBPASS", $config['dbpass'], $content);
	$content = str_replace("DBNAME", $config['dbname'], $content);
	$content = str_replace("USERNAME", $_POST['snuser'], $content);
	$content = str_replace("PASSWORD", $_POST['snpass'], $content);
	if($_POST['mod'] == "true") {
		$content = str_replace("MODERATION", "true", $content);
	} else {
		$content = str_replace("MODERATION", "false", $content);
	}
	if($_POST['enable'] == "true") {
		$content = str_replace("ENABLED", "true", $content);
	} else {
		$content = str_replace("ENABLED", "false", $content);
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
	file_put_contents("config/settings.php", $content);
	header("Location: admin.php");
?>