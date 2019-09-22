<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-18
 * Time: 12:31
 */

$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "faceBook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
//echo "Connected successfully";

//Create faceBook database
//$createDB = "CREATE DATABASE faceBook";
//if ($conn->query($createDB) === TRUE) {
//    echo "Database created successfully";
//} else {
//    echo "Error creating database:" . $conn->error;
//}

//Create UserAccount table
$sql_createUserAccounts = "CREATE TABLE UserAccounts(
    UserID INT(6) UNSIGNED AUTO_INCREMENT,
    FirstName VARCHAR(30) NOT NULL,
    LastName VARCHAR (30) NOT NULL,
    ScreenName VARCHAR(30),
    Email VARCHAR (30) NOT NULL,
    Password VARCHAR (20) NOT NULL,
    Location VARCHAR (10),
    DoB DATE,
    Gender VARCHAR (50),
    PRIMARY KEY(UserID)
     )";

if ($conn->query($sql_createUserAccounts) === TRUE) {
    echo "Table UserAccounts created successfully";
} else {
    echo "Error creating table:" . $conn->error;
}

//Create UserPosts table
$sql_createUserPosts = "CREATE TABLE UserPosts(
    PostID INT(6) UNSIGNED AUTO_INCREMENT,
    Content VARCHAR(500) NOT NULL,
    PostTime DATETIME NOT NULL, 
    UserID INT(6) UNSIGNED,
    PRIMARY KEY (PostID),
    FOREIGN KEY (UserID) REFERENCES UserAccounts (UserID)
)";

if ($conn->query($sql_createUserPosts) === TRUE) {
    echo "Table UserPosts created successfully";
} else {
    echo "Error creating table:" . $conn->error;
}


//Create Friendship table
$sql_createFriendship = "CREATE TABLE Friendship(
  FriendshipID INT(6) UNSIGNED AUTO_INCREMENT,
  SenderID INT(6) UNSIGNED, 
  ReceiverID INT(6) UNSIGNED,
  is_Friendship BOOLEAN NOT NULL,
  PRIMARY KEY (FriendshipID),
  FOREIGN KEY (SenderID) REFERENCES UserAccounts (UserID),
  FOREIGN KEY (ReceiverID) REFERENCES UserAccounts (UserID)
)";

if ($conn->query($sql_createFriendship)==TRUE){
    echo "Table Friendship created successfully";
}else {
    echo "Error creating table:" . $conn->error;
}


$conn->close();


