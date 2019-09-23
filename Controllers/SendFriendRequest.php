<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-24
 * Time: 00:09
 */
$servername="localhost:3306";
$username="root";
$password="root";
$dbname="faceBook";

$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

session_start();

$sql_createFriendRequest="insert into Friendship(SenderID,ReceiverID,is_Friendship) values ('$_SESSION[UserID]','$_SESSION[ReceiverID]',FALSE)";
if ($conn->query($sql_createFriendRequest)){
    header("Location: ../View/SearchResult.php?FriendRequest=1");
}else{
    echo "Failed!";
}