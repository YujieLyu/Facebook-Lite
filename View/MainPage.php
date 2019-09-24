<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-11
 * Time: 20:34
 */
include_once 'header.php';

session_start();

//$friendRequests=new FriendRequest($_POST)

include '../Controllers/GetPost.php';
?>

<div class="container-fluid">

    <div class="row">
        <!--Left Part-->
        <div class="col-3">
            <div class="card rounded-0 border-0 bg-transparent">
                <!--Name and avatar-->
                <div class="card-body">
                    <?php
                    include '../Controllers/GetUser.php';
                    $user = $_SESSION['User'];
                    $userName = $user[0]["ScreenName"];
                    $userGender = $user[0]['Gender'];
                    $userDOB = $user[0]['DoB'];
                    $userLocation = $user[0]['Location'];
                    ?>

                    <!--                    Profile part-->
                    <div>
                        <!--                        Avatar and Screen Name-->
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
                                <p class="col-7">Friends <?php ?></p>
                            </div>
                        </div>

                    </div>
                    <!--                    Manage profile-->
                    <button class="btn bg-light text-dark mx-auto" name="ManageProfile" id="manage-profile">
                        <a href="#" class="mx-5 text-dark">Manage My Profile </a>
                    </button>

                </div>
            </div>
        </div>


        <!--Middle Part-->
        <div class="col-6 mt-3">
            <div class="card rounded-0 shadow-sm mb-3 bg-white">

                <!--What's on your mind?-->
                <div class="card-body">
                    <form id="post" action="../Controllers/CreatePosts.php" method="post">
                        <img class="rounded-circle" src="../resources/Yujie.JPG" alt="avatar" style="width: 40px;">
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
                                    <img class="flex rounded-circle mr-2" src="../resources/Yujie.JPG" alt="avatar"
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
                        <div class="row mt-2 mb-n2">
                            <div class="col-6 text-center small">
                                <a href="#" data-toggle="tooltip" title="Chenglong Ma">6 Likes</a>
                            </div>
                            <div class="col-6 text-center text-dark small">
                                <a href="#" data-toggle="tooltip" title="Chenglong Ma">1 Comment</a>
                            </div>
                        </div>
                        <hr/>

                        <script>
                            $(document).ready(function () {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        </script>

                        <!--Likes and comments operations-->
                        <div class="btn-group mt-n3">
                            <button type="button" class="btn btn-light w-50  text-dark">Like</button>
                            <button type="button" class="btn btn-light w-50 text-dark">Comment</button>

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
                        <?php
                        include '../Controllers/GetFriendRequest.php';
                        $requests = $_SESSION['FriendRequests'];
                        if ($requests !== null):
                            foreach ($requests as $index => $request):
                                $senderName = $requests[$index ]['ScreenName'];
                                ?>
                                <li class="list-group-item  border border-0">
                                    <img class="rounded-circle mr-2" src="../resources/Yujie.JPG"
                                         alt="new-friends-avatar"
                                         style="width: 40px;"> <?php echo $senderName ?> <br>
                                    <div class="btn-group mt-3">
                                        <input type="submit" class="btn btn-outline-secondary mx-3" value="No">
                                        <input type="submit" class="btn btn-outline text-white"
                                                style="background: #3b5998;" value="Yes">
                                    </div>
                                </li>
                            <?php
                            endforeach;
                        endif;
                        ?>



                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'footer.php'
?>
