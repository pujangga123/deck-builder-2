<?php
require_once(PATH_CLASS."Card.php");

class Deck {
    public $name;
    public $cards;

    function __construct($name) {
        // read deck.json
        $json = file_get_contents(PATH_DECKS."deck.json");
        $deckinfo = json_decode($json);
    }
}

function deckCreate($name, $description) {
    $data = array(
        "name"=>$name,
        "description"=>$description);
    $datajson = json_encode($data);

    // create dir;
    mkdir(PATH_DECKS.$name);

    // write deck.json
    file_put_contents(PATH_DECKS.$name."/deck.json",$datajson);
}
