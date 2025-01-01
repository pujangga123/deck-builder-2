<?php
require_once(PATH_CLASS."Deck.php");

$_title = "Deck Edit";
$deck = getParam('deck','');

$d = dir(PATH_DECKS.$deck);
$list = array();
while (false !== ($entry = $d->read())) {
    if(substr($entry,-4,4)=='.jpg') {
        $list[] = $entry;
    }
}
$d->close();

$smarty->assign("list", $list);
