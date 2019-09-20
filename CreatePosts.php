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

session_start();
$userID=$_SESSION['userID'];
$sql_createPost = "INSERT INTO UserPosts(Content,PostTime,UserID) VALUES ('$_POST[Post]',now(),'$userID')";
$sql_getPost="SELECT Content FROM faceBook.UserPosts WHERE UserID='1' ORDER BY PostTime DESC Limit 1";

if ($conn->query($sql_createPost)){
    $result=$conn->query($sql_getPost);
    if ($result->num_rows>0){
        $row=$result->fetch_assoc();
        $newPost=$row['Content'];
        $_SESSION['NewPost']=$newPost;
    }
    header("Location: MainPage.php");
}else{
    echo "post failed:".$conn->error;
}