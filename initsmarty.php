<?php
    require_once(PATH_LIBS."smarty/libs/Smarty.class.php");
    
    $smarty = new Smarty();
    $smarty->setTemplateDir(PATH_MODS);
    $smarty->setCompileDir('compiled/');
    $smarty->setConfigDir(PATH_MODS);
    $smarty->setCacheDir('cache/');
    //$smarty->setDebugging(true);
