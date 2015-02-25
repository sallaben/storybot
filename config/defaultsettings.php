<?php

// *** DISALLOWS DIRECT ACCESS OF FILES, DETERS HACKERS *** //
if(!defined("IN_STORYBOT")) {
	die("Invalid access!");
}
// *** ------------------------------------------------ *** //

$config = array(); //initialize the $config array

$config["firstsetup"] = false;

// *** IS STORYBOT ENABLED? *** //
$config['enabled'] = "ENABLED";
// *** -------------------- *** //

// *** DATABASE VALUES *** //
$config['dbhost'] = "DBHOST"; //database host
$config['dbuser'] = "DBUSER"; //database user
$config['dbpass'] = 'DBPASS'; //database password
$config['dbname'] = "DBNAME"; //database we're connecting to
// *** --------------- *** //

// *** REPLACE THIS WITH YOUR SNAPCHAT seents AND japlq4rq82 *** //
$config['username'] = "USERNAME"; //snapchat username
$config['password'] = 'PASSWORD'; //snapchat password
// *** ----------------------------------------------------- *** //

// *** EDIT THIS TO FALSE FOR INSTANT POSTING AND TRUE FOR MODQUEUE *** //
$config['moderation'] = "MODERATION"; //default: true
// !!! IF SET TO FALSE, MAKE SURE TO CREATE AN AUTOMATIC CRON JOB "curl http://www.yourhost.com/bot.php" !!!
// *** ------------------------------------------------------------ *** //

// *** EDIT TRUE OR FALSE IF YOU WANT TO ALLOW OR DISALLOW A TYPE OF SNAP *** //
$config['picturesallowed'] = "PICTURES"; //default: true
$config['videosallowed'] = "VIDEOS"; //default: true
// *** ------------------------------------------------------------------ *** //

// *** 5 FOR true IN SECONDS *** //
$config['picturetime'] = "TIME"; //default: 3
// *** ---------------------------- *** //

?>