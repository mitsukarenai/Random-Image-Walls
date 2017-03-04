<?php

######  REMOVE LINE BELOW
die("That's just a proof of concept: Twitter's random id assigning leaves more possibilities to bruteforce than the amount of atoms in the galaxy. If you feel lucky, remove this message from the script and execute it again.");
###########################

ini_set('user_agent', 'Mozilla/5.0 (X11; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0');

function generateRandomString($length = 14) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sprefix($length = 1) {
    $characters = 'ABC';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$found = FALSE;
$tries = 0;

while ($found !== TRUE) {
    $img = sprefix().generateRandomString();
    $url = 'http://pbs.twimg.com/media/'.$img.'.jpg';

    $response = get_headers($url, 1)[0];

    if (strpos($response, '404') !== FALSE) {
        $tries++;
        echo '|'.$tries;
    }
    else {
        echo "\n\n".$img.' → POSITIVE !';
        $found = TRUE;
    }
}


?>
