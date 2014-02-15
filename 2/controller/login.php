<?php
/**
 * Created by PhpStorm.
 * User: pham
 * Date: 2/10/14
 * Time: 2:08 PM
 */
if(!session_id()) session_start();
//print_r($_POST);
//print_r($_GET);
if (!isset($_SESSION["loginUser"])) {
   // echo $_SESSION["loginUser"];
   // echo "login not yet";
    $config = parse_ini_file("../WEB-INF/classes/config.properties");
    //print_r($config);
    $userName = $_GET["username"];
    $password = $_GET["password"];
    $u = $config["loginUser"];
    $p = $config["loginPass"];
    if (strcasecmp($userName, $u) == 0 && strcasecmp($password, $p) == 0) {

        $_SESSION["loginUser"] = $u;
        //echo $u;
        //echo $_SESSION["loginUser"];
    }
    else
    {
        $_SESSION["loginError"] = "username or password is incorrect";
    }
}
else{
    //echo "login yet";
    if(array_key_exists("logout", $_POST))
    {
        //echo "hello";
        session_destroy();
    }
}
header("Location: ../index.php");
?>