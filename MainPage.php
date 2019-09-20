<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-11
 * Time: 20:34
 */
include_once('header.php');
session_start();
?>
<div class="container-fluid">

    <div class="row">
        <!--Left Part-->
        <div class="col-3">
            <div class="card rounded-0 border-0 bg-transparent">
                <!--Name and avatar-->
                <div class="card-body">
                    <a>
                        <img class="rounded-circle" src="YujieJPG.JPG" alt="avatar" style="width: 30px;">
                    </a>
                    <a href="#" class="text-body ml-2">Yujie Lyu</a>
                </div>
            </div>
        </div>


        <!--Middle Part-->
        <div class="col-6 mt-3">
            <div class="card rounded-0 shadow-sm mb-3 bg-white">
                <!--What's on your mind?-->
                <div class="card-body">
                    <form id="post" action="CreatePosts.php" method="post" >
                        <img class="rounded-circle" src="YujieJPG.JPG" alt="avatar" style="width: 40px;">
                        <textarea class="form-control text-dark mt-2" rows="2" name="Post" id="post"
                                  placeholder="What's on your mind?"></textarea>

                        <input type="submit" class="btn text-white mt-2 border-0 float-sm-right px-2"
                               style="background: #3b5998">
                    </form>
                </div>
            </div>

            <!--Posts with likes and comments-->
            <div class="card rounded-0 shadow-sm mb-3 bg-white">
                <div class="card-body">
                    <div>
                        <img class="rounded-circle mr-2" src="YujieJPG.JPG" alt="avatar" style="width: 40px;">Yujie
                    </div>
                </div>

                <div class="ml-4 mb-2">
                 <?php echo $_SESSION['NewPost']; ?>
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
