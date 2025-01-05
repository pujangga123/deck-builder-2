<?php
require_once(PATH_CLASS."Deck.php");

$_title = "Deck Edit";
$id = getParam('id','');

$deck = new Deck($id);

$smarty->assign("deck", $deck);
