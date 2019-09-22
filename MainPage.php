<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-11
 * Time: 20:34
 */
include_once('header.php');

session_start();

include 'GetPost.php';
?>

<div class="container-fluid">

    <div class="row">
        <!--Left Part-->
        <div class="col-3">
            <div class="card rounded-0 border-0 bg-transparent">
                <!--Name and avatar-->
                <div class="card-body">
                    <?php
                    include 'GetUser.php';
                    $user = $_SESSION['User'];
                    $userName = $user[0]["ScreenName"];
                    $userGender = $user[0]['Gender'];
                    $userDOB=$user[0]['DoB'];
                    $userLocation = $user[0]['Location'];

                    ?>
                    <div>
                        <a>
                            <img class="rounded-circle" src="YujieJPG.JPG" alt="avatar" style="width: 30px;">
                        </a>
                        <a href="#" class="text-body ml-2"><span style="color: #3b5998;"><b><?php echo $userName; ?></b></span></a>
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
                                <p class="col-7">Friends <?php  ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="btn-group-vertical mt-3">
<!--                        <button class="btn bg-light text-dark" name="Location" id="location">-->
<!--                            <a href="#" class="mx-5 text-dark">--><?php //echo $userLocation; ?><!--</a>-->
<!--                        </button>-->
<!--                        <button class="btn bg-light text-dark" name="Location" id="location">-->
<!--                            <a href="#" class="mx-5 text-dark">Location --><?php //echo $userLocation; ?><!--</a>-->
<!--                        </button>-->
                        <button class="btn bg-light text-dark" name="FriendNumber" id="friend-num">
                            <a href="#" class="mx-5 text-dark">Friends <?php
                                //                               echo $friendNum;
                                ?></a>
                        </button>


                    </div>

                </div>
            </div>
        </div>


        <!--Middle Part-->
        <div class="col-6 mt-3">
            <div class="card rounded-0 shadow-sm mb-3 bg-white">

                <!--What's on your mind?-->
                <div class="card-body">
                    <form id="post" action="CreatePosts.php" method="post">
                        <img class="rounded-circle" src="YujieJPG.JPG" alt="avatar" style="width: 40px;">
                        <textarea class="form-control text-dark mt-2" rows="4" name="Post" id="post"
                                  placeholder="What's on your mind?" style="resize: none"></textarea>

                        <input type="submit" class="btn text-white mt-2 border-0 float-sm-right px-2"
                               style="background: #3b5998">
                    </form>
                </div>
            </div>


            <?php
            $posts = $_SESSION["Posts"];
            if ($posts != NULL):
                foreach ($posts as $index => $value) :
                    $post_time = $value['PostTime'];
                    $post_content = $value['Content'];

                    ?>
                    <div class="card rounded-0 shadow-sm mb-3 bg-white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <img class="flex rounded-circle mr-2" src="YujieJPG.JPG" alt="avatar"
                                         style="width: 40px;">
                                </div>
                                <div class="col-3">
                                    <span style="color: #3b5998"><b><?php echo $userName; ?><br></b></span>
                                    <span><small><?php echo $post_time ?></small></span>
                                </div>
                            </div>
                        </div>

                        <div class="ml-4 mb-2">
                            <?php echo $post_content; ?>
                        </div>
                        <!--Show likes and comments-->
                        <div class="row">
                            <div class="col-6 text-center">
                                <a href="#" data-toggle="tooltip" title="Chenglong Ma">6 Likes</a>
                            </div>
                            <div class="col-6 text-center text-dark">
                                <a href="#" data-toggle="tooltip" title="Chenglong Ma">1 Comment</a>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function () {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        </script>

                        <!--Likes and comments operations-->
                        <div class="btn-group">
                            <button type="button" class="btn btn-light w-50 mx-2 text-dark">Like</button>
                            <button type="button" class="btn btn-light w-50 mx-2 text-dark">Comment</button>

                        </div>
                    </div>
                <?php
                endforeach;
            endif;
            ?>
            <!--Posts with likes and comments-->

        </div>


        <!--Right Part-->
        <div class="col-3 mt-3">
            <div class="card rounded-0 bg-light text-sm">
                <div class="card-body">
                    <h6 class="text-dark">New friend requests</h6>
                    <ul class="list-group mx-n3">
                        <li class="list-group-item  border border-0">
                            <img class="rounded-circle mr-2" src="YujieJPG.JPG" alt="new-friends-avatar"
                                 style="width: 40px;">
                            Jessie Lyu
                            <div class="btn-group mt-3">
                                <button type="button" class="btn btn-outline-secondary mx-3">No</button>
                                <button type="button" class="btn btn-outline text-white" style="background: #3b5998;">
                                    Yes
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
