<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-10-06
 * Time: 17:52
 */
?>

<div class="card rounded-0 border-0 bg-transparent">
    <!--Name and avatar-->
    <div class="card-body">
        <!--Profile part-->
        <div>
            <!--Avatar and Screen Name-->
            <div>
                <a>
                    <img class="rounded-circle" src="../resources/Yujie.JPG" alt="avatar"
                         style="width: 30px;">
                </a>
                <a href="#" class="text-body ml-2"><span
                            style="color: #3b5998;"><b><?php echo $userName; ?></b></span></a>

            </div>
            <!--                        Personal Details-->
            <div class="text-dark mx-5 mt-3">
                <div class="row">
                    <i class="col-1 fas fa-venus-mars"></i>
                    <p class="col-7"><?php echo $userGender; ?></p>
                </div>
                <div class="row">
                    <i class="col-1 fas fa-birthday-cake"></i>
                    <p class="col-7"><?php echo $userDOB; ?></p>
                </div>
                <div class="row">
                    <i class="col-1 fas fa-map-marker-alt"></i>
                    <p class="col-7"><?php echo $userLocation; ?></p>
                </div>
                <div class="row">
                    <i class="col-1 fas fa-user-friends"></i>
                    <p class="col-7">Friends </p>
                </div>
            </div>

        </div>
        <!--                    Manage profile-->
        <button class="btn bg-light text-dark mx-auto" name="ManageProfile" id="manage-profile">
            <a href="#" class="mx-5 text-dark">Manage My Profile </a>
        </button>

    </div>
</div>