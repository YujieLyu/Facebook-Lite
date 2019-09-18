<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-17
 * Time: 23:41
 */
include_once('header.php');
?>
<h2 class="text-center text-dark mt-5">Create a new account</h2>
<p class="text-center">It's quick and easy.</p>

<div class="d-flex justify-content-center mt-4">
    <div>
        <form class="form">
            <div class="input-group mb-3">
                <input type="text" class="form-control mr-2" placeholder="First Name" id="fname" name="first-name">
                <input type="text" class="form-control ml-2" placeholder="Last name" id="lname" name="last-name">
            </div>
            <input type="text" class="form-control mb-3" placeholder="Screen Name" id="sname" name="screen-name">
            <input type="text" class="form-control mb-3" placeholder="Email" id="email" name="Email">
            <input type="password" class="form-control mb-3" placeholder="Password" id="pwd" name="Password">
            <input type="text" class="form-control mb-3" placeholder="Location" id="location" name="location">

            <label for="dob"><b>Date of birth:</b></label>
            <input type="date" class="form-control mb-3" id="dob" name="date-of-birth">


            <label for="gender"><b>Gender:</b></label>
            <select class="form-control mb-3" id="gender" name="Gender">
                <option>Prefer not to say</option>
                <option>Female</option>
                <option>Male</option>
            </select>


            <div class="d-flex justify-content-center">
                <a href="MainPage.php" role="button"
                   class="btn text-white" style="background: #3b5998"><b>Sign up</b></a>
            </div>
        </form>
    </div>

</div>
