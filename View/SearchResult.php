<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-22
 * Time: 20:56
 */
include_once 'header.php';
require_once("../Controllers/DBConnect.php");
require_once("../Controllers/FriendRequest.php");
$user = $_SESSION['User'];
$userID = $user[0]["UserID"]
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
                        if (!isset($_GET['noResult'])):
                            foreach ($searchResult as $index => $userInResult):
                                $screenName = $userInResult['ScreenName'];
                                $firstName = $userInResult['FirstName'];
                                $lastName = $userInResult['LastName'];
                                $location = $userInResult['Location'];
                                $receiverID = $userInResult['UserID'];
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
                                            <span style="color: #3b5998;"><b><?php echo $screenName ?><br></b></span>
                                            <span class="text-dark"><?php echo $firstName . " " . $lastName ?></span><br>
                                            <span><?php echo $location ?></span>
                                        </div>

                                        <div class="col-4 h-50 float-right btn-group">
                                            <!--                                        todo:有问题，需要继续调整按钮显示-->
                                            <?php
                                            if (!isset($_GET['FriendRequest'])):
                                                ?>
                                                <form method="post" action="../router.php">
                                                    <input type="hidden" name="AddFriend" value="">
                                                    <input type="hidden" name="senderID" value="<?php echo $userID?>">
                                                    <input type="hidden" name="receiverID" value="<?php echo $receiverID ?>">
                                                    <input type="submit" class="btn btn-outline-dark"
                                                           value="Add friend">
                                                </form>
                                            <?php
                                            else:
                                                ?>
                                                    <input type="submit" class="btn btn-dark" value="Request Sent"
                                                           disabled>
                                            <?php
                                            endif;
                                            ?>
                                            <button class="btn btn-outline-dark">•••</button>
                                        </div>
                                    </div>

                                </li>
                            <?php endforeach;
                        else:
                            echo "No result";
                        endif; ?>
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
