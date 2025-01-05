<?php

require_once(PATH_CLASS."Deck.php");

deckCreate($deckName,$deckWidth,$deckHeight);

header("location:?p=deck.list");
die();