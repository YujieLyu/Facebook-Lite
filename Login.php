<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-17
 * Time: 12:10
 */
include_once('header.php');
session_start();
?>
<h2 class="text-center text-dark mt-5">Welcome to Facebook-Lite!</h2>

<div class="d-flex justify-content-center mt-5">
    <div>
        <form class="form" method="post" action="LoginCheck.php">
            <!--            <div class="input-group mb-3">-->
            <!--                <input type="text" class="form-control mr-2" placeholder="First Name" id="fname" name="first-name">-->
            <!--                <input type="text" class="form-control ml-2" placeholder="Surname" id="sname" name="surname">-->
            <!--            </div>-->
            <input type="text" class="form-control mb-3" placeholder="Email"  name="Email">
            <input type="password" class="form-control mb-3" placeholder="Password"  name="Password">

            <a href="SignUp.php" class="text-primary mr-3">Don't have account? Create a new one!</a>
            <input type="submit" value="Login" class="btn text-white" style="background: #3b5998">



        </form>
    </div>

</div>




