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
session_start();//Need to declare session_start() if new $_SESSION is assigned in this file

//Check whether email is existing or not
$email = $_POST['Email'];
$sql_emailUniqueCheck = "SELECT * FROM UserAccounts WHERE Email='" . $email . "'";
$result = $conn->query($sql_emailUniqueCheck);
if ($email != "" && $result->num_rows > 0) {
    echo "Email is invalid";
//    header("Location: SignUp.php");
    exit();
}

//Create new account
$sql_createNewAccount = "insert into UserAccounts (FirstName,LastName,ScreenName,Email,Password,Location,DoB,Gender)
     values('$_POST[FirstName]','$_POST[LastName]','$_POST[ScreenName]','$_POST[Email]','$_POST[Password]','$_POST[Location]','$_POST[DateOfBirth]','$_POST[Gender]')";

$sql_getUserID = "select UserID from UserAccounts where Email='" . $email . "'";


$userID = 0;

if ($conn->query($sql_createNewAccount) === TRUE) {
    $result = $conn->query($sql_getUserID);
    $row=$result->fetch_assoc();
    $userID=$row['UserID'];
    $_SESSION['UserID'] =$userID;
    header("Location: ../View/MainPage.php");
    exit();
} else {
    echo "Error:" . $sql_createNewAccount . "<br>" . $conn->error;
}

$conn->close();



