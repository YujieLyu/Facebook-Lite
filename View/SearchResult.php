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
                    <h5 class="my-3 font-weight-bold">Search Result:</h5>
                    <ul class="my-2 list-group">
                        <?php
                        $searchResult = $_SESSION['SearchResult'];
                        foreach ($searchResult as $index => $user):
                            $screeName = $user['ScreenName'];
                            $location = $user['Location'];
                            $_SESSION["ReceiverID"] = $user['UserID'];
                            ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-1 mx-2 ">
                                        <a href="#">
                                            <img class="rounded-circle" src="../resources/Yujie.JPG" alt="avatar"
                                                 style="width: 50px;">
                                        </a>
                                    </div>
                                    <div class="col-6 mx-2">
                                        <p style="color: #3b5998;"><b><?php echo $screeName ?><br></b></p>
                                        <?php echo $location ?>
                                    </div>

                                    <div class="col-4 h-50 float-right btn-group">
<!--                                        todo:有问题，需要继续调整按钮显示-->
                                        <?php
                                        if (!isset($_GET['FriendRequest'])):
                                        ?>
                                            <form method="post" action="../Controllers/SendFriendRequest.php">
                                                <input type="submit" class="btn btn-outline-dark" value="Add friend">
                                            </form>
                                        <?php
                                        else:
                                            ?>
                                            <form method="post" action="../Controllers/SendFriendRequest.php">
                                                <input type="submit" class="btn btn-dark" value="Request Sent" disabled>
                                            </form>
                                        <?php
                                        endif;
                                        ?>


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
