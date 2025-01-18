<?php
    
    require_once("initsession.php");
    require_once('config.php');
    require_once("ext_libs.php");

    // die(0) --> error session
    // die(1) --> token not defined
    // die(10) --> fail to update
    // die(100) --> no process made (no token match)  
    // VALIDASI ======================================
    // if(count($_SESSION)==0 && !isset($_GET['debug'])) {
    //   die('0');
    // }
    
    if(isset($_POST['token'])) {
        $token = $_POST['token'];
    } else {
        die('1');
    }
    // END: VALIDASI =======================================

    if($token=='test') {
        die('ok');
    }

    if($token=='setcardname') {
        $deckId = getParam('deckId','');
        $cardId = getParam('cardId','');
        $newname = getParam('newname','');

        //TODO:validation

        require_once(PATH_CLASS."Card.php");
        $card = new Card($deckId, $cardId);
        $card->setName($newname);
        die('ok');
    }
    
    die('100');