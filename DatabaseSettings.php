<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-18
 * Time: 12:31
 */

$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname="faceBook";

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
//echo "Connected successfully";

//Create faceBook database
//$createDB = "CREATE DATABASE faceBook";
//if ($conn->query($createDB) === TRUE) {
//    echo "Database created successfully";
//} else {
//    echo "Error creating database:" . $conn->error;
//}

$sql_createTable = "CREATE TABLE UserAccounts(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR (30) NOT NULL,
    screenname VARCHAR(30),
    email VARCHAR (30) NOT NULL,
    password VARCHAR (20) NOT NULL,
    location VARCHAR (10),
    dob DATE,
    gender VARCHAR (50)
     )";

if ($conn->query($sql_createTable)===TRUE){
    echo "Table UserAccounts created successfully";
}else{
    echo "Error creating table:".$conn->error;
}
$conn->close();


