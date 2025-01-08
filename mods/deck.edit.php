<?php
require_once(PATH_CLASS."Deck.php");
require_once(PATH_CLASS."Card.php");


$_title = "Deck Edit";
$deckId = getParam('deckId','');

$deck = new Deck($deckId);

$smarty->assign("deck", $deck);
