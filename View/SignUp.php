<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-17
 * Time: 23:41
 */

include_once 'header.php';
require_once("../Controllers/DBConnect.php");
require_once("../Controllers/UserAccount.php");

if (isset($_POST['Email'])){
    $createAccount = new UserAccount();
//    $userID=$createAccount->createAccount();
        $createAccount->createAccountResult();
}
//session_start();
?>
<h2 class="text-center text-dark mt-5">Create a new account</h2>
<p class="text-center">It's quick and easy.</p>

<?php
if (isset($_GET['emailExist'])):
    ?>
    <div class="alert alert-danger">Sorry, this email is already registered.</div>
<?php
elseif(isset($_GET['errorCreate'])):
    ?>
    <div class="alert alert-danger">Sorry, this email is already registered.</div>
<?php
endif;
?>
<div class="d-flex justify-content-center mt-4">
    <div>
        <form class="form" action="<?php  $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="on">
            <div class="input-group mb-3">
                <input type="text" class="form-control mr-2" placeholder="First Name" name="FirstName" id="fname"
                       autofocus
                       required>
                <input type="text" class="form-control ml-2" placeholder="Last name" name="LastName" id="lname"
                       required>
            </div>
            <input type="text" class="form-control mb-3" placeholder="Screen Name" name="ScreenName" id="sname">
            <input type="email" class="form-control mb-3" placeholder="Email" name="Email" id="email" autocomplete="on"
                   required>
            <p style="color:Tomato" id="errorEmail"></p>
            <script>
                function ValidateEmail(email) {
                    let re = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
                    return re.test(email);
                }

                $('#email').blur(function () {
                    let email = $('#email').val();
                    let errorEmail = $('#errorEmail');
                    if (!ValidateEmail(email)) {
                        errorEmail.text("Invalid Email address");
                    } else {
                        errorEmail.text("");
                    }
                })
            </script>


            <input type="password" class="form-control mb-3" placeholder="Password" name="Password"
                   required>
            <input type="text" class="form-control mb-3" placeholder="Location" name="Location">

            <label for="dob"><b>Date of birth:</b></label>
            <input type="date" class="form-control mb-3" name="DateOfBirth" id="dob"
                   max="<?php echo date('Y-m-d'); ?>">

            <label for="gender"><b>Gender:</b></label>
            <select class="form-control mb-3" name="Gender" id="gender">
                <option>Prefer not to say</option>
                <option>Female</option>
                <option>Male</option>
            </select>


            <div class="d-flex justify-content-center">
                <input type="submit" value="Sign up" class="btn text-white" style="background: #3b5998">

            </div>
        </form>
    </div>

</div>
<?php
include_once 'footer.php'
?>
