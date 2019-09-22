<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-22
 * Time: 20:56
 */
include_once 'header.php';

session_start();
?>


<div class="container-fluid">
    <div class="row">
        <!--        Left-->
        <div class="col-3"></div>
        <!--        Middle-->
        <div class="col-6">
            <div class="card rounded-0 border-1 shadow-sm my-5">
                <div class="card-body">
                    Search Result:
                    <ul class="my-2 list-group">
                        <?php
                        $searchResult = $_SESSION['SearchResult'];
                        foreach ($searchResult as $index => $user):
                            $screeName = $user['ScreenName'];
                            $location = $user['Location'];
                            ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-1 mx-2 ">
                                        <a href="#">
                                            <img class="rounded-circle" src="../resources/Yujie.JPG" alt="avatar" style="width: 50px;">
                                        </a>
                                    </div>
                                    <div class="col-6 mx-2">
                                        <p style="color: #3b5998;"><b><?php echo $screeName ?><br></b></p>
                                        <?php echo $location ?>
                                    </div>

                                    <div class="col-4 h-50 float-right btn-group">
                                        <button class="btn btn-outline-dark" >Add friend</button>
                                        <button class="btn btn-outline-dark">•••</button>
                                    </div>
                                </div>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!--        Right-->
            <div class="col-3">

            </div>
        </div>
    </div>
    <?php
    include_once 'footer.php'
    ?>
