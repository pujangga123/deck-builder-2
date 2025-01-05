<?php
require_once(PATH_CLASS."Deck.php");

$_title = "Deck List";

$list = deckList();

$smarty->assign("list", $list);


