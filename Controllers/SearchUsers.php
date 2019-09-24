<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-22
 * Time: 20:53
 */
$servername="localhost:3306";
$searchName="root";
$password="root";
$dbname="faceBook";

$conn=new mysqli($servername,$searchName,$password,$dbname);
if ($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

session_start(); //Need to declare session_start() if new $_SESSION is assigned in this file

$searchName=$_POST["SearchRequest"];

$sql_getUsersResult="select * from faceBook.UserAccounts where ScreenName='".$searchName."'";
$result_users=$conn->query($sql_getUsersResult);

if ($result_users->num_rows>0){
    $users_array=$result_users->fetch_all(MYSQLI_ASSOC);
    $_SESSION['SearchResult']=$users_array;
    header("Location: ../View/SearchResult.php");
}else{
  header("Location: ../View/SearchResult.php?noResult=1");
}
