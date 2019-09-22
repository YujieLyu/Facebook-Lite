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
session_start();

$sql_loginCheck = "SELECT Password FROM UserAccounts WHERE Email= '" . $_POST["Email"] . "'";
$result = $conn->query($sql_loginCheck);
$pwd = 0;


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pwd = $row['Password'];
    }
}

$sql_getUserID = "SELECT UserID FROM UserAccounts WHERE Email='" . $_POST["Email"] . "'";
$userID = 0;
if ($pwd === $_POST["Password"]) {
    $resultID = $conn->query($sql_getUserID);
    if ($resultID->num_rows > 0) {
        while ($rowID = $resultID->fetch_assoc()) {
            $userID = $rowID['UserID'];
        }
    }
    $_SESSION['UserID'] = $userID;
    header("Location: MainPage.php"); /* Redirect browser */
    exit();
} else {
    echo "Please Check your login info";
}