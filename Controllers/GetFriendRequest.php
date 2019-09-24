<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-24
 * Time: 18:22
 */
$servername="localhost:3306";
$username="root";
$password="root";
$dbname="faceBook";

$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

$userID=$_SESSION['UserID'];
$sql_getFriendRequest="select * from faceBook.UserAccounts inner join faceBook.Friendship on UserID=SenderID where ReceiverID=".$userID;
$result_friendshipRequest=$conn->query($sql_getFriendRequest);

$request_array[]=array();

if ($result_friendshipRequest->num_rows>0){
    $request_array=$result_friendshipRequest->fetch_all(MYSQLI_ASSOC);
    $_SESSION['FriendRequests']=$request_array;

}else{
    $_SESSION['FriendRequests']=null;
}