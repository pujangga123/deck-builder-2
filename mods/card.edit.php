<?php
require_once(PATH_CLASS."Card.php");

$_title = "Card Editor";

$cardId = getParam('cardId','');
$deckId = getParam('deckId','');

$card = new Card($deckId, $cardId);

$smarty->assign("card", $card);