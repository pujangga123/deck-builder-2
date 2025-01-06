<?php
/*
card.create
- Create draft

*/

require_once(PATH_CLASS."Card.php");
$deckId = getParam('deckId','');

if($deckId=="") die("deckId not defined");

$card = cardCreate($deckId);
header("location:?p=card.edit&deckId=$deckId&cardId=".$card->getId());