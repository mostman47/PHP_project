<?php
/**
 * Created by PhpStorm.
 * User: pham
 * Date: 2/12/14
 * Time: 1:05 PM
 */
namespace dao;
require_once('../dto/ResumeObject.php');
use dto\ResumeObject as ResumeObject;

class Project
{
    private $tableName;

    /**
     *
     */
    public function __construct()
    {
        $config = parse_ini_file("../../../../../WEB-INF/classes/config.properties");
        $this->tableName = $config["resumeTable"];
    }

    /**
     * @param $con
     * @return array
     */
    public function selectAll($con)
    {
        echo "\xA[" . __CLASS__ . "] Beginning selectAll \xA";
        return $this->doQueryGetArray($con, "SELECT * FROM " . $this->tableName);
    }

    /**
     * @param $con
     * @param $id
     * @return array
     */
    public function searchResumeByID($con, $id)
    {
        echo "\xA[" . __CLASS__ . "] Beginning searchResumeByID \xA";
        return $this->doQueryGetArray($con, "SELECT * FROM $this->tableName WHERE ID = " . $id);
    }

    /**
     * @param $con
     * @param $value
     */
    public function searchResumeByValue($con, $value)
    {
        echo "\xA[" . __CLASS__ . "] Beginning searchResumeByValue \xA";
        $query = "SELECT * FROM " . $this->tableName
            . " WHERE First_Name LIKE '%" . $value . "%' "
            . " OR Last_Name LIKE '%" . $value . "%' " . "OR Email LIKE '%"
            . $value . "%' " . " OR Phone LIKE '%" . $value . "%' "
            . " OR Skills LIKE '%" . $value . "%' "
            . " OR Description LIKE '%" . $value . "%' "
            . " OR Resume_Directory LIKE '%" . $value . "%' "
            . " ORDER BY id DESC";
        return $this->doQueryGetArray($con, $query);
    }

    /**
     * @param $con
     * @param $query
     * @return array
     */
    public function doQueryGetArray($con, $query)
    {
        $result = mysqli_query($con, $query);
        $resumeArray = array();
        while ($row = mysqli_fetch_array($result)) {
            $resumeObj = new ResumeObject();
            $resumeObj->setResId($row['ID']);
            $resumeObj->setFirstName($row['First_Name']);
            $resumeObj->setLastName($row['Last_Name']);
            $resumeObj->setEmail($row['Email']);
            $resumeObj->setPhone($row['Phone']);
            $resumeObj->setDescription($row['Description']);
            $resumeObj->setSkills($row['Skills']);
            $resumeObj->setResURL($row['Resume_Directory']);
            $resumeArray[] = $resumeObj;
        }
        mysqli_close($con);
        return $resumeArray;
    }

    /**
     * @param $con
     * @param ResumeObject $resumeObj
     * @return ResumeObject
     */
    public function addResume($con, ResumeObject $resumeObj)
    {
        echo "\xA[" . __CLASS__ . "] Beginning addResume \xA";
        $query = "INSERT INTO " . $this->tableName
            . " (First_Name, Last_Name, Email, Phone, Skills, Description, Resume_Directory) "
            . "VALUES ('"
            . $resumeObj->getFirstName() . "','"
            . $resumeObj->getLastName() . "','"
            . $resumeObj->getEmail() . "','"
            . $resumeObj->getPhone() . "','"
            . $resumeObj->getSkills() . "','"
            . $resumeObj->getDescription() . "','"
            . $resumeObj->getResURL() . "')";
        // echo $query;
        $result = mysqli_query($con, $query);
        $lastID = $this->getLastInsertedID($con);
        mysqli_close($con);
        if ($result) {

            $resumeObj->setResId($lastID);

            return $resumeObj;
        } else
            return $result;
    }

    /**
     * @param $con
     * @param ResumeObject $resumeObj
     * @return ResumeObject
     */
    public function updateResumeByID($con, ResumeObject $resumeObj)
    {
        echo "\xA[" . __CLASS__ . "] Beginning updateResumeByID \xA";
        $query = "UPDATE " . $this->tableName . " SET " . "First_Name = '" . $resumeObj->getFirstName()
            . "', Last_Name = '" . $resumeObj->getLastName() . "', Email = '" . $resumeObj->getEmail() . "', Phone = '" . $resumeObj->getPhone()
            . "', Skills = '" . $resumeObj->getSkills() . "', Description = '" . $resumeObj->getDescription()
            . "', Resume_Directory = '" . $resumeObj->getResURL() . "' WHERE ID = " . $resumeObj->getResId();
//        echo $query;
        $result = mysqli_query($con, $query);
        mysqli_close($con);
        if ($result)
            return $resumeObj;
        else
            return $result;
    }

    public function deleteResumeByID($con, ResumeObject $resumeObj)
    {
        echo "\xA[" . __CLASS__ . "] Beginning deleteResumeByID \xA";
        $query = "DELETE FROM " . $this->tableName . " WHERE ID = " . $resumeObj->getResId();
        echo $query;
        $result = mysqli_query($con, $query);
        if ($result)
            return $resumeObj;
        else
            return $result;
    }

    /**
     * @param $con
     * @return mixed
     */
    private function getLastInsertedID($con)
    {
        $query = "SELECT MAX(ID) as ID FROM ".$this->tableName;
        //echo $query;
        $result = mysqli_query($con, $query);
       // print_r(mysqli_fetch_array($result));
        return mysqli_fetch_array($result)['ID'];
    }
}
