<?php
require_once(PATH_CLASS."Card.php");

$_title = "Card Editor";

$cardId = getParam('cardId','');
$deckId = getParam('deckId','');

$card = new Card($deckId, $cardId);
if($card->isLoaded()) {
    $draftDimension = $card->getDraftDimension();
} else {
    $draftDimension = array(0,0);
}

$smarty->assign("card", $card);
$smarty->assign("draftWidth", $draftDimension[0]);
$smarty->assign("draftHeight", $draftDimension[1]);