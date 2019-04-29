<?php
/**
 * Created by yunusem.
 * Developer: Yunusemre Şentürk
 * Date: 23/6/16
 * Time: 12:06 AM
 */
header('Content-type: application/json');
setlocale(LC_ALL,'turkish');

class DataBaseConnection
{
    private $servername = "localhost";
    private $username = "";
    private $password = "";
    private $dbname = "etaregister";

    function getServername()
    {
        return $this->servername;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function getDbname()
    {
        return $this->dbname;
    }

    function getCountCity($city)
    {
        return "SELECT COUNT(*) FROM `boards` WHERE `city` = \"" . $city . "\"";
    }

    function getCountAll()
    {
        return "SELECT COUNT(*) FROM `boards`";
    }
}

?>
