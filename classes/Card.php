<?php
/*
class Card
- Card always belong to Deck
- Height & Width of card defined in Deck
- File:
    - ori.png
    - back.png
    - frame.png
    - card.png
*/
class Card {
    private $id;
    private $deckId;
    private $name;
    private $desc;
    private bool $frameImg;
    private bool $backImg;
    private bool $loaded;

    function __construct($deckId, $cardId) {
        // read card.json
        try {
            $json = file_get_contents(PATH_DECKS."$deckId/$cardId/card.json");
            $deckinfo = json_decode($json,true);
            $this->id = $cardId;
            $this->deckId= $deckId;
            $this->name = $deckinfo['name'];
            $this->desc = isset($deckinfo['desc'])?$deckinfo['desc']:'';
            $this->frameImg = file_exists(PATH_DECKS."$deckId/$cardId/frame.png");
            $this->backImg = file_exists(PATH_DECKS."$deckId/$cardId/back.png");

            $this->loaded = true;
        } catch (Exception $e) {
            $this->loaded = false;
        }
    }

    function getId() {
        return $this->id;
    }

    function getDeckId() {
        return $this->deckId;
    }

    function getName() {
        return $this->name;
    }

    function getDesc() {
        return $this->desc;
    }

    function isLoaded() {
        return $this->loaded;
    }

    // file path to Card Back image
    function hasBackImg() {
        return $this->backImg;
    }

    // file path to Card Frame image
    function hasFrameImg() {
        return $this->frameImg;
    }

    // get Deck object
    function getDeck() {

    }

}

function cardCreate($deckId) {
    $cardId = generateId2();

    $data = array(
        "name"=>"",
        "description"=>""
    );
    $datajson = json_encode($data);

    // create dir;
    mkdir(PATH_DECKS."$deckId/$cardId");

    // write deck.json
    file_put_contents(PATH_DECKS."$deckId/$cardId/card.json",$datajson);

    $card = new Card($deckId, $cardId);
    return $card;

}

function cardList($deckId) {

}
