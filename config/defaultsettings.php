<?php

// *** DISALLOWS DIRECT ACCESS OF FILES, DETERS HACKERS *** //
if(!defined("IN_STORYBOT")) {
	die("Invalid access!");
}
// *** ------------------------------------------------ *** //

$config = array(); //initialize the $config array

$config["firstsetup"] = false;

// *** IS STORYBOT ENABLED? *** //
$config['enabled'] = "true";
// *** -------------------- *** //

// *** DEBUG MODE (OUTPUTS ALL HTTP REQUESTS) *** // (only use this on bot.php - it'll break most other pages)
$debug = false;
// *** -------------------------------------- *** //

// *** DATABASE VALUES *** //
$config['dbhost'] = "DBHOST"; //database host
$config['dbuser'] = "DBUSER"; //database user
$config['dbpass'] = 'DBPASS'; //database password
$config['dbname'] = "DBNAME"; //database we're connecting to
// *** --------------- *** //

// *** REPLACE THIS WITH YOUR SNAPCHAT USER NAME AND PASS WORD *** //
$config['username'] = "USERNAME"; //snapchat username
$config['password'] = 'PASSWORD'; //snapchat password
// *** ----------------------------------------------------- *** //

// *** REPLACE THIS WITH YOUR GOOGLE USER NAME AND PASS WORD *** //
$config['gusername'] = "GUSER-NAME"; //google username
$config['gpassword'] = 'GPASS-WORD'; //google password
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