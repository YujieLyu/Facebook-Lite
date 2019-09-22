<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-21
 * Time: 16:16
 */

$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "faceBook";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

//session_start();//todo:为什么这里加了是重复？

$userID = $_SESSION["UserID"];

$sql_getPost = "select * from faceBook.UserPosts where UserID='" . $userID . "' order by PostTime DESC";

$result_post = $conn->query($sql_getPost);

$post_array[] = array();

if ($result_post->num_rows > 0) {
    $post_array = $result_post->fetch_all(MYSQLI_ASSOC);
    $_SESSION["Posts"] = $post_array;
} else {
    $_SESSION["Posts"] = NULL;
}

