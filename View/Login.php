<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-17
 * Time: 12:10
 */
include_once 'header.php';

session_start();
?>
<h2 class="text-center text-dark mt-5">Welcome to Facebook-Lite!</h2>

<div class="d-flex justify-content-center mt-5">
    <div>
        <form class="form" method="post" action="../Controllers/LoginCheck.php">
            <input type="text" class="form-control mb-3" placeholder="Email" name="Email">
            <input type="password" class="form-control mb-3" placeholder="Password" name="Password">

            <a href="SignUp.php" class="text-primary mr-3">Don't have account? Create a new one!</a>
            <input type="submit" value="Login" class="btn text-white" style="background: #3b5998">
            <p style="color:Tomato" id="errorSuggestion"></p>
<?php
if (isset($_GET['loginError'])){
    echo "<p style=\"color:Tomato\" id=\"errorSuggestion\">Email or password is wrong</p>";
}
?>
        </form>
    </div>

</div>

<?php
include_once 'footer.php'
?>


