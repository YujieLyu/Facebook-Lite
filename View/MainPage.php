<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-11
 * Time: 20:34
 */
include_once 'header.php';
require_once '../Controllers/DBConnect.php';
require_once '../Controllers/FriendRequest.php';
require_once '../Controllers/Post.php';
require_once '../Controllers/PostLike.php';
$user = $_SESSION['User'];
$userID = $user[0]["UserID"];
$userName = $user[0]["ScreenName"];
$userGender = $user[0]['Gender'];
$userDOB = $user[0]['DoB'];
$userLocation = $user[0]['Location'];
$userPost = new Post();
$posts = $userPost->getPosts($userID);
$requests = new FriendRequest();
$requests_array = $requests->getRequest($userID);
?>

<div class="container-fluid">

    <div class="row">
        <!--Left Part-->
        <div class="col-3" id="leftPanel">
            <?php include 'LeftPanel.php' ?>
        </div>


        <!--Middle Part-->
        <div class="col-6 mt-3" id="middlePanel">
            <?php include 'MiddlePanel.php' ?>
        </div>


        <!--Right Part-->
        <div class="col-3 mt-3" id="rightPanel">
            <?php include 'RightPanel.php' ?>
        </div>
    </div>
</div>
<?php
include_once 'footer.php'
?>
