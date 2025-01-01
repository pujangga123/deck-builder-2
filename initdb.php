<?php
    require_once(PATH_LIBS."ADOdb/adodb.inc.php");
    // https://adodb.org/dokuwiki/doku.php
    $driver = 'mysqli';
 
    $db = newAdoConnection($driver);
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $db->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    //$db->debug = true;