<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-19
 * Time: 00:02
 */
$servername="localhost:3306";
$username="root";
$password="root";
$dbname="faceBook";

$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

$sql_loginCheck="SELECT password FROM UserAccounts WHERE email= '".$_POST["Email"]."'";
$result=$conn->query($sql_loginCheck);
$pwd=0;

if ($result->num_rows>0){
    while ($row=$result->fetch_assoc()){
        $pwd=$row['password'];
    }
}
if ($pwd===$_POST["Password"]){
    header("Location: MainPage.php"); /* Redirect browser */
    exit();
}else{
    echo "Please Check your login info";
}