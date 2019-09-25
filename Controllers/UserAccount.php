<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-24
 * Time: 20:48
 */

class UserAccount
{
    private $userID;
    private $firstName;
    private $lastName;
    private $screenName;
    private $email;
    private $password;
    private $location;
    private $dob;
    private $gender;

    function _construct()
    {
//        $firstName, $lastName, $screenName, $email, $password, $location, $dob, $gender
//        $this->firstName = $firstName;
//        $this->lastName = $lastName;
//        $this->screenName = $screenName;
//        $this->email = $email;
//        $this->password = $password;
//        $this->location = $location;
//        $this->dob = $dob;
//        $this->gender = $gender;
    }

    function createAccount()
    {
        $conn = DBConnect::connect();
        $sql_createNewAccount = "insert into UserAccounts (FirstName,LastName,ScreenName,Email,Password,Location,DoB,Gender)
     values('$_POST[FirstName]','$_POST[LastName]','$_POST[ScreenName]','$_POST[Email]','$_POST[Password]','$_POST[Location]','$_POST[DateOfBirth]','$_POST[Gender]')";
        $this->email = $_POST['Email'];
        $sql_getUserID = "select UserID from UserAccounts where Email='" . $this->email . "'";

        if (!self::checkEmailExist()) {
            if ($conn->query($sql_createNewAccount)) {
                $result = $conn->query($sql_getUserID);
                $row = $result->fetch_assoc();
                $userID = $row['UserID'];
                return $userID;
            } else {

                return "Error:" . $sql_createNewAccount . "<br>" . $conn->error;
            }
        } else {
            return "Email is invalid";
        }
    }

    function checkEmailExist()
    {
        $conn = DBConnect::connect();
        $sql_emailUniqueCheck = "SELECT * FROM UserAccounts WHERE Email='" . $this->email . "'";
        $result = $conn->query($sql_emailUniqueCheck);
        $is_email_exist = $this->email != "" && $result->num_rows > 0;
        return $is_email_exist;
    }

    function createAccountResult(){
        $outcome=self::createAccount();
        if (is_numeric($outcome)) {
            header("Location:../View/MainPage.php");
        } else if ($outcome == "Email is invalid") {
            header("Location:../View/SignUp.php?emailExist=1");
        }else{
            header("Location:../View/SignUp.php?errorCreate=".$outcome);
        }
    }

    function login(){
        $conn = DBConnect::connect();

    }
}