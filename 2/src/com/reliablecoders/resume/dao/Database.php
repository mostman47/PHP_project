<?php
/**
 * Created by PhpStorm.
 * User: pham
 * Date: 2/12/14
 * Time: 12:40 PM
 */
namespace dao;
class Database
{
    private $host;
    private $port;
    private $databaseName;
    private $user;
    private $pass;

    function __construct()
    {
        $config = parse_ini_file("../../../../../WEB-INF/classes/config.properties");
        $this->host = $config["hostDb"];
        $this->port = $config["portDb"];
        $this->databaseName = $config["databaseDB"];
        $this->user = $config["dbuser"];
        $this->pass = $config["dbpassword"];

    }

    public function getMysqlConnection()
    {

        $connection = mysqli_connect($this->host, $this->user, $this->pass, $this->databaseName, $this->port);
        return $connection;
    }

    public function testConnection()
    {
        $database = new Database();
        $con = $database->getMysqlConnection();
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        } else {
            echo 'Connected' . "\xA";
        }
    }

}

