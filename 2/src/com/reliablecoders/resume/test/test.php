<?php
/**
 * Created by PhpStorm.
 * User: pham
 * Date: 2/12/14
 * Time: 12:50 PM
 */
namespace test;
require_once('../dao/Database.php');
require_once('../dao/Project.php');
use dao as dao;
require_once('../dto/ResumeObject.php');
use dto\ResumeObject as ResumeObject;
require_once('../model/ProjectManager.php');
use model as model;

$projectM = new model\ProjectManager();
$database = new dao\Database();
$project = new dao\Project();
$con = $database->getMysqlConnection();
function printArray(array $arr)
{
    foreach($arr as $row)
    {
    echo $row->__toString()."\xA";
    }
}
function testConnection()
{
    $GLOBALS['database']->testConnection();
}
function testSelectAllResume(){
    $result = $GLOBALS['projectM']->selectAllResumes();
    printArray($result);
}
function testSearchResumeByID(){
    $result = $GLOBALS['projectM']->searchResumeByID(172);
    echo $result->__toString();
}
function testSearchResumeByValue(){
    $result = $GLOBALS['projectM']->searchResumeByValue("adf");
    printArray($result);
}
function testAddResume(){
    $resumeObj = new ResumeObject();
    $resumeObj->setFirstName("bbb");
    $result = $GLOBALS['projectM']->addResume($resumeObj);
    echo $result->__toString();
//    $result = $GLOBALS['projectM']->addResume(["s"]);
//    echo $result->__toString();
}
function testUpdateByID(){
    $rs =  $GLOBALS['projectM']->searchResumeByID(172);
    $resumeObj = ResumeObject::objectToObject($rs);
    echo $resumeObj->getResId();
    $resumeObj->setFirstName("c");
    $result = $GLOBALS['projectM']->updateResume($resumeObj);
    echo $result->__toString();
}
function testDeleteResumeByID(){
    $resumeObj = new ResumeObject();
    $resumeObj->setResId("171");
    $result = $GLOBALS['projectM']->deleteResume($resumeObj);
    echo $result->__toString();
}
//testConnection();
//testSelectAllResume();
testSearchResumeByID();
//testSearchResumeByValue();
testAddResume();
//testUpdateByID();
//testDeleteResumeByID();
?>