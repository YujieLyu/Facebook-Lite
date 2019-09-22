<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-22
 * Time: 11:17
 */

$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "faceBook";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

$userID=$_SESSION["UserID"];

$sql_getUser="SELECT * FROM faceBook.UserAccounts WHERE UserID='".$userID."'";

$result_user=$conn->query($sql_getUser);

$user_array[]=array();

if ($result_user->num_rows>0) {
    $user_array = $result_user->fetch_all(MYSQLI_ASSOC);
    $_SESSION["User"] = $user_array;
}else{
    $_SESSION["User"]=NULL;
}