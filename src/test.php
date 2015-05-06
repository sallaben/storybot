<pre><?php
$enabled = false;
if(!$enabled) {
  die;
}
require_once("snapchat.php");

//////////// CONFIG ////////////
$username = ""; // Your snapchat username
$password = ""; // Your snapchat password
$gEmail   = ""; // Gmail account
$gPasswd  = ""; // Gmail account password
$debug = true; // Set this to true if you want to see all outgoing requests and responses from server
////////////////////////////////

$img = "../media/logo.png"; // URL or local path to a media file (image or video)

$snapchat = new Snapchat($username, $gEmail, $gPasswd, $debug);

//Login to Snapchat with your username and password
$snapchat->login($password);

// Set a story
$snapchat->setStory($img);

$snapchat->closeAppEvent();
?></pre>
