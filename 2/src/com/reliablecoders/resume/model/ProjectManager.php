<?php
/**
 * Created by PhpStorm.
 * User: pham
 * Date: 2/13/14
 * Time: 3:57 PM
 */

namespace model;
require_once('../dao/Database.php');
require_once('../dao/Project.php');
use dao as dao;

require_once('../dto/ResumeObject.php');
use dto\ResumeObject as ResumeObject;

class ProjectManager
{
    private $database;
    private $project;

    /**
     *
     */
    function __construct()
    {
        $this->database = new dao\Database();
        $this->project = new dao\Project();
    }

    /**
     * @return array
     */
    function selectAllResumes()
    {
        $con = $this->database->getMysqlConnection();
        $result = $this->project->selectAll($con);
        if ($result)
            echo "\xA[" . __CLASS__ . "] Select All Resumes successfully \xA";
        else
            echo "\xA[" . __CLASS__ . "] Select All Resumes ERROR \xA";
        return $result;
    }

    /**
     * @param $id
     * @return array
     */
    function searchResumeByID($id)
    {
        $con = $this->database->getMysqlConnection();
        $result = $this->project->searchResumeByID($con, $id);
        if ($result)
            echo "\xA[" . __CLASS__ . "] Search Resume by ID \"" . $id . "\" successfully \xA";
        else
            echo "\xA[" . __CLASS__ . "] Search Resume by ID \"" . $id . "\" ERROR \xA";
        return $result[0];
    }

    /**
     * @param $value
     * @return array
     */
    function searchResumeByValue($value)
    {
        $con = $this->database->getMysqlConnection();
        $result = $this->project->searchResumeByValue($con, $value);
        if ($result)
            echo "\xA[" . __CLASS__ . "] Search Resume by value \"" . $value . "\" successfully \xA";
        else
            echo "\xA[" . __CLASS__ . "] Search Resume by value \"" . $value . "\" ERROR \xA";
        return $result;
    }

    /**
     * @param $resumeObj
     * @return ResumeObject
     */
    public function addResume($resumeObj)
    {
        $con = $this->database->getMysqlConnection();
        $result = $this->project->addResume($con, $resumeObj);
        if ($result)
            echo "\xA[" . __CLASS__ . "] Add new resume successfully \xA";
        else
            echo "\xA[" . __CLASS__ . "] Add new resume ERROR \xA";
        return $result;
    }

    public function updateResume($resumeObj)
    {
        $con = $this->database->getMysqlConnection();
        $result = $this->project->updateResumeByID($con, $resumeObj);
        if ($result)
            echo "\xA[" . __CLASS__ . "] Update resume successfully \xA";
        else
            echo "\xA[" . __CLASS__ . "] Update resume ERROR \xA";
        return $result;
    }
    public function deleteResume($resumeObj)
    {
        $con = $this->database->getMysqlConnection();
        $result = $this->project->deleteResumeByID($con, $resumeObj);
        if ($result)
            echo "\xA[" . __CLASS__ . "] Delete resume successfully \xA";
        else
            echo "\xA[" . __CLASS__ . "] Delete resume ERROR \xA";
        return $result;
    }
}