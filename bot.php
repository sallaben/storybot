<?php
define("IN_STORYBOT", 1);
require_once("config/config.php");

$snaps = $snapchat->getSnaps(); //get feed
$snaps = json_decode(json_encode($snaps), true); //turn into php array
$i = 0;

if(!$snaps) {
    die("Could not establish a connection to Snapchat!");
}

foreach((array) $snaps as $item) {
    if($item['status'] == 1) { //if unopened
      if($item['sender'] != $config['username']) { //if not sent from yourself
        if(!is_banned($item['sender'])) {
            $snapchat->addFriend($item['sender']); //add sender as friend if not already
            if($item['media_type'] == 0) { //if still image
                if($config['picturesallowed']) {
                    $data = $snapchat->getMedia($item['id']); //get received snap
                    if ($data != "") {
                        if($config['moderation'] == false) {
                            postManualImage($data, $item['sender']);
                            saveImage($data, $item['sender'], $item['id'], 1);
                        } else {
                            saveImage($data, $item['sender'], $item['id'], 0);
                        }
                    }
                }   
            } elseif($item['media_type'] == 1) { //if moving video
                if($config['videosallowed']) {
                    $data = $snapchat->getMedia($item['id']); //get received snap
                    if ($data != "") {
                        if($config['moderation'] == false) {
                            postManualVideo($data, $item['sender']);
                            saveVideo($data, $item['sender'], $item['id'], 1);
                        } else {
                            saveVideo($data, $item['sender'], $item['id'], 0);
                        }
                    }
                }
            }
            $snapchat->markSnapViewed($item['id']); //mark as viewed
            $i++; //keep going
        } else {
            $snapchat->markSnapViewed($item['id']); //mark as viewed
        }
      }
    }
}
$snapchat->clearFeed(); //clear feed (will become VERY long VERY soon and break program)
?>
