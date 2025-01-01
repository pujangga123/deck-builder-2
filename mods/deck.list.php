<?php
$_title = "Deck List";


$d = dir(PATH_DECKS);
$list = array();
while (false !== ($entry = $d->read())) {
    if(is_dir(getcwd().'/'.PATH_DECKS.$entry) && $entry!='.' && $entry!='..') {
        $list[] = $entry;
    }
}
$d->close();

$smarty->assign("list", $list);


