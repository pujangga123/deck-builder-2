<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty Markdown function plugin
 *
 * Type:     markdown<br>
 * Name:     lower<br>
 * Purpose:  convert string to markdown format
 *
 * @link davidscherer.blogspot.com
 * @author David Scherer <scherer dot david dot h at gmail dot com>
 * @param array $params parameters
 * @return string with converted text
 */

//require_once('PHP-Markdown-Lib-1.2.7/Michelf/Markdown.php');
//require_once('php-markdown-lib/Michelf/Markdown.php');
require_once('Parsedown.php');
//use \Michelf\Markdown;

function smarty_function_rlmarkdown($params, &$smarty) {

    if (!in_array('text', array_keys($params))) {
            trigger_error("markdown missing 'text' parameter", E_USER_NOTICE);
    return;
    }

    $Parsedown = new Parsedown();

    return $Parsedown->text($params['text']);

    //return Markdown::defaultTransform($params['text']);

}

?>
