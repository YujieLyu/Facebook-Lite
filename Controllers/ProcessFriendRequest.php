<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-24
 * Time: 20:00
 */
$servername="localhost:3306";
$username="root";
$password="root";
$dbname="faceBook";

$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}
$senderID=$_SESSION['SenderID'];
$receiverID=$_SESSION['UserID'];

$sql_deleteRequest="delete from faceBook.Friendship where senderID=".$senderID." and ReceiverID=".$receiverID;

