<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-17
 * Time: 12:10
 */
session_start();
include_once 'header.php';
require_once("../Controllers/DBConnect.php");
require_once("../Controllers/UserAccount.php");
if (isset($_POST['Email'])){
    $userAccount=new UserAccount();
    $userAccount->login();

}
?>
<h2 class="text-center text-dark mt-5">Welcome to Facebook-Lite!</h2>

<div class="d-flex justify-content-center mt-5">
    <div>
        <form class="form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <input type="text" class="form-control mb-3" placeholder="Email" name="Email">
            <input type="password" class="form-control mb-3" placeholder="Password" name="Password">

            <a href="SignUp.php" class="text-primary mr-3">Don't have account? Create a new one!</a>
            <input type="submit" value="Login" class="btn text-white" style="background: #3b5998">
            <?php
            if (isset($_GET['loginError'])) :
                 ?>
                <div class="alert alert-danger">
                    <strong>Sorry!</strong> Email or password is invalid.
                </div>
                <?php
            endif;
            ?>
        </form>
    </div>

</div>

<?php
session_destroy();
include_once 'footer.php'
?>


