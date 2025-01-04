<?php
/*
class Deck
- Deck is collection of cards
- Deck defines height and width of card, card back, card background
- Once Deck created, height and width cannot be changed
*/

require_once(PATH_CLASS."Card.php");

class Deck {
    private string $id;
    private string $name;
    private string $desc;
    private int $width; // automatically setted when card back is setted
    private int $height;
    private bool $loaded;

    function __construct($id) {
        // read deck.json
        try {
            $json = file_get_contents(PATH_DECKS.$id."/deck.json");
            $deckinfo = json_decode($json);

            $this->id = $id;
            $this->name = $deckinfo['name'];
            $this->desc = isset($deckinfo['desc'])?$deckinfo['desc']:'';

            $this->loaded = true;
        } catch (Exception $e) {
            $this->loaded = false;
        }
        
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDesc() {
        return $this->desc;
    }

    function getHeight() {
        return $this->height;
    }

    function getWidth() {
        return $this->width;
    }

    function setCardBack() {

    }

    function setCardBackground() {

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
            $list[$entry] = $deck->getName();
            unset($deck);
        }
    }
    $d->close();
    return $list;
}
