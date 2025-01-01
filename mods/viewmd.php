<?php

$mdfile = $_GET['md'];

$content = file_get_contents(PATH_MD.$mdfile.".md");

// get first line as page title
preg_match('/^#\s(.*)/', $content, $arr);
if($arr) {
    $_title = trim($arr[1]);
} else {
    $_title = trim("MD: $mdfile");
}

if(file_exists(PATH_MD.$mdfile.".css")) {
    $smarty->assign("style",PATH_MD.$mdfile.".css");
} else {
    $smarty->assign("style","");
}

$smarty->assign("text", $content);