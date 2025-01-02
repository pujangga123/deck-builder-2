<?php
require_once(PATH_CLASS."Card.php");

class Deck {
    private $id;
    public $name;
    public $desc;
    public $cards;
    public $type;
    private $loaded;

    function __construct($id) {
        // read deck.json
        try {
            $json = file_get_contents(PATH_DECKS.$id."/deck.json");
            $deckinfo = json_decode($json);

            $this->id = $id;
            $this->name = $deckinfo['name'];
            $this->desc = isset($deckinfo['desc'])?$deckinfo['desc']:'';
            $this->type = isset($deckinfo['type'])?$deckinfo['type']:'';

            $this->loaded = true;
        } catch (Exception $e) {
            $this->loaded = false;
        }
        
    }

    function isLoaded() {
        return $this->loaded;
    }
}

function deckCreate($name, $type, $description) {
    $data = array(
        "name"=>$name,
        "type"=>$type,
        "description"=>$description);
    $datajson = json_encode($data);

    // create dir;
    mkdir(PATH_DECKS.$name);

    // write deck.json
    file_put_contents(PATH_DECKS.$name."/deck.json",$datajson);
}

/*
function deckList()
return:
    array(id=>name,...)
    list of deck
*/
function deckList() {
    $d = dir(PATH_DECKS);
    $list = array();
    while (false !== ($entry = $d->read())) {
        if(is_dir(getcwd().'/'.PATH_DECKS.$entry) && $entry!='.' && $entry!='..') {
            $deck = new Deck($entry);
            $list[$entry] = $deck->name;
            unset($deck);
        }
    }
    $d->close();
    return $list;
}