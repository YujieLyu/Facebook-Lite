<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-18
 * Time: 17:35
 */
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "faceBook";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}


$sql = "INSERT INTO UserAccounts (firstname,lastname,screenname,email,password,location,dob,gender)
     VALUES('$_POST[FirstName]','$_POST[LastName]','$_POST[ScreenName]','$_POST[Email]','$_POST[Password]','$_POST[Location]','$_POST[DateOfBirth]','$_POST[Gender]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}
$conn->close();

