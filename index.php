<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-11
 * Time: 20:34
 */
include_once('header.php');
?>
<div class="container-fluid mt-4">

    <div class="row">
        <!--        Left Part-->
        <div class="col-3">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    left
                   <?php
                   $x=1;
                   $y=2;
                   $z=$x+$y;
                   echo $z;
                   ?>
                </div>
            </div>
        </div>
        <!--        Middle Part-->
        <div class="col-6">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    middle
                </div>
            </div>
            <div class="card bg-light text-dark mt-3">
                <div class="card-body">
                    middle
                </div>
            </div>
        </div>
        <!--        Right Part-->
        <div class="col-3">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    right
                </div>
            </div>
        </div>
    </div>
</div>
