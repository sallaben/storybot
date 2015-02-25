<?php
define("IN_STORYBOT", 1);
require_once("config/config.php");

if(!is_mod(mod_id())) {
	header("Location: index.php");
}

$_GET['sid'] = $db->real_escape_string($_GET['sid']);

if(($_GET['sid'] != "") && ($_GET['type'] != "")) {
	if($_GET['type'] == "0") {
		postMedia($_GET['sid']);
		header("Location: mod.php");
	} elseif($_GET['type'] == "1") {
		rejectImage($_GET['sid']);
		header("Location: mod.php");
	} elseif($_GET['type'] == "2") {
		reportImage($_GET['sid']);
		header("Location: mod.php");
	} elseif($_GET['type'] == "-1") {
		if(is_admin(mod_id())) {
			banUser($_GET['sid'], 0);
		}
		header("Location: mod.php");
	} elseif($_GET['type'] == "-2") {
		if(is_admin(mod_id())) {
			banUser($_GET['sid'], 1);
		}
		header("Location: reports.php");
	} elseif($_GET['type'] == "-3") {
		if(is_admin(mod_id())) {
			removeReport($_GET['sid']);
		}
		header("Location: reports.php");
	}
}

if($_GET['type'] == "register") {
	if(!is_mod(mod_id())) {
		addModerator(mod_id());
		header("Location: mod.php");
	} else {
		header("Location: mod.php");
	}
}
?>