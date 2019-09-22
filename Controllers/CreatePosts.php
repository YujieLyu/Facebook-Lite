<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-19
 * Time: 17:37
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

$userID=$_SESSION['UserID'];
$sql_createPost = "insert into UserPosts(Content,PostTime,UserID) values ('$_POST[Post]',now(),'$userID')";
//$sql_getPost="SELECT Content FROM faceBook.UserPosts WHERE UserID='".$userID."' ORDER BY PostTime DESC Limit 1";

if ($conn->query($sql_createPost)){

    header("Location: ../View/MainPage.php");
}else{
    echo "post failed:".$conn->error;
}