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
    private $email;

    function _construct()
    {
    }

    function createAccount()
    {
        $conn = DBConnect::connect();
        $sql_createNewAccount = "insert into UserAccounts (FirstName,LastName,ScreenName,Email,Password,Location,DoB,Gender)
     values('$_POST[FirstName]','$_POST[LastName]','$_POST[ScreenName]','$_POST[Email]','$_POST[Password]','$_POST[Location]','$_POST[DateOfBirth]','$_POST[Gender]')";
        $sql_getUserID = "select UserID from UserAccounts where Email='" . $_POST['Email'] . "'";

        if (!self::checkEmailExist()) {
            if ($conn->query($sql_createNewAccount)) {
                $result = $conn->query($sql_getUserID);
                $row = $result->fetch_assoc();
                $this->userID = $row['UserID'];
                return $this->userID;
            } else {

                return "Error:" . $sql_createNewAccount . "<br>" . $conn->error;
            }
        } else {
            return "Email is invalid";
        }
    }

    function getUser()
    {
        $conn = DBConnect::connect();
        $sql_getUser = "select * from faceBook.UserAccounts where UserID='" . $this->userID . "'";
        $result_user = $conn->query($sql_getUser);
        $user_details[] = array();

        if ($result_user->num_rows > 0) {
            $user_details = $result_user->fetch_all(MYSQLI_ASSOC);
            return $user_details;
        } else {
            return null;
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

    function createAccountResult()
    {
        $outcome = self::createAccount();
        if (is_numeric($outcome)) {
            $_SESSION['User'] = self::getUser();
            header("Location:../View/MainPage.php");
        } else if ($outcome == "Email is invalid") {
            header("Location:../View/SignUp.php?emailExist=1");
        } else {
            header("Location:../View/SignUp.php?errorCreate=" . $outcome);
        }
    }

    function login()
    {
        $conn = DBConnect::connect();
        $sql_loginCheck = "select Password from UserAccounts where Email= '" . $_POST["Email"] . "'";
        $result = $conn->query($sql_loginCheck);
        $pwd = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pwd = $row['Password'];
            }
        }

        $sql_getUserID = "select UserID from UserAccounts where Email='" . $_POST["Email"]. "'";
        if ($pwd === $_POST["Password"]) {
            $resultID = $conn->query($sql_getUserID);
            if ($resultID->num_rows > 0) {
                while ($rowID = $resultID->fetch_assoc()) {
                    $this->userID = $rowID['UserID'];
                }
            }
            $_SESSION['User'] = self::getUser();
            header("Location: ../View/MainPage.php"); /* Redirect browser */
            exit();
        } else {
            header("Location: ../View/Login.php?loginError=1");

        }
    }
}