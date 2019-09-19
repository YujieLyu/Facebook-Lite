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

//Check whether email is existing or not
$email = $_POST['Email'];
$sql_emailUniqueCheck = "SELECT * FROM UserAccounts WHERE email='" . $email . "'";
$result = $conn->query($sql_emailUniqueCheck);
if ($email != "" && $result->num_rows > 0) {
    echo "email is invalid as it has existed in db";
    exit();
}

//Create new account
$sql_createNewAccount = "INSERT INTO UserAccounts (firstname,lastname,screenname,email,password,location,dob,gender)
     VALUES('$_POST[FirstName]','$_POST[LastName]','$_POST[ScreenName]','$_POST[Email]','$_POST[Password]','$_POST[Location]','$_POST[DateOfBirth]','$_POST[Gender]')";

if ($conn->query($sql_createNewAccount) === TRUE) {
    header("Location: MainPage.php");
    exit();
} else {
    echo "Error:" . $sql_createNewAccount . "<br>" . $conn->error;
}
$conn->close();

