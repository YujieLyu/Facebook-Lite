<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-19
 * Time: 00:02
 */
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "faceBook";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
session_start();//Need to declare session_start() if new $_SESSION is assigned in this file

$sql_loginCheck = "select Password from UserAccounts where Email= '" . $_POST["Email"] . "'";
$result = $conn->query($sql_loginCheck);
$pwd = 0;


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pwd = $row['Password'];
    }
}

$sql_getUserID = "select UserID from UserAccounts where Email='" . $_POST["Email"] . "'";
$userID = 0;
if ($pwd === $_POST["Password"]) {
    $resultID = $conn->query($sql_getUserID);
    if ($resultID->num_rows > 0) {
        while ($rowID = $resultID->fetch_assoc()) {
            $userID = $rowID['UserID'];
        }
    }
    $_SESSION['UserID'] = $userID;
    header("Location: ../View/MainPage.php"); /* Redirect browser */
    exit();
} else {
    header("Location: ../View/Login.php?loginError=1");

}

