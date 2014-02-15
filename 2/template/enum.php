<?php
/**
 * Created by PhpStorm.
 * User: pham
 * Date: 2/3/14
 * Time: 11:01 AM
 */

$pageNames = array("index","upload", "search");
$titles = array("Resume Uploader", "Upload", "Search");
$menuBars = array("Home", "Upload", "Search");

$pageName = currentPageName();
$index = getIndexForCurrentPage($pageName);
$title = $titles[$index];
$currentMenuBar = $menuBars[$index];

function currentPageName() {
    $p = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    $p = substr ($p,0,strrpos($p,"."));
    //echo $p;
    return trim($p);
}

function getIndexForCurrentPage($pn)
{
    global $pageNames;
    foreach($pageNames as $value)
    {
        //echo $value;
        if(strcasecmp($pn, $value) == 0)

            return array_search($value, $pageNames);
    }
    return null;
}

?>