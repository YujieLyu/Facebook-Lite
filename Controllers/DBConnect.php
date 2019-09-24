<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-24
 * Time: 20:26
 */

class DBConnect
{

    private static $servername="localhost:3306";
    private static $username="root";
    private static $password="root";
    private static $dbname="faceBook";
    private static $initialised=false;


//    function _construct($servername, $username, $password, $dbname)
//    {
//        $this->servername = $servername;
//        $this->username = $username;
//        $this->password = $password;
//        $this->dbname = $dbname;
//
//    }
    private static function initialise()
    {
        if (self::$initialised)
            return;
        self::$initialised = true;
    }


   public static function connect()
    {
        self::initialise();
        $conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
        if ($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error);
        }
        return $conn;
    }

}