<?php
require_once(PATH_CLASS."Deck.php");
require_once(PATH_CLASS."Card.php");


$_title = "Deck Edit";
$id = getParam('id','');

$deck = new Deck($id);

$smarty->assign("deck", $deck);
