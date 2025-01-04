<?php
/*
class Card
- Card always belong to Deck
- Height & Width of card defined in Deck

*/
class Card {
    public $id;
    public $deckId;
    public $name;

    function __construct($deckId, $id) {

    }

    function getDeck() {

    }

}

function cardCreate($deckId, $name) {

}

function cardList($deckId) {

}
