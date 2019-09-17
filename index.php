<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-11
 * Time: 20:34
 */
include_once('header.php');
?>
<div class="container-fluid">

    <div class="row">
        <!--        Left Part-->
        <div class="col-3">
            <div class="card rounded-0 border-0 bg-transparent">
                <div class="card-body">
                    <a>
                        <img class="rounded-circle" src="YujieJPG.JPG" alt="avatar" style="width: 30px;">
                    </a>

                    <a href="#" class="text-body ml-2">Yujie Lyu</a>

                </div>
            </div>
        </div>
        <!--        Middle Part-->
        <div class="col-6 mt-3">
            <div class="card rounded-0 shadow-sm mb-3 bg-white">
                <div class="card-body">
                    <div>
                        <img class="rounded-circle" src="YujieJPG.JPG" alt="avatar" style="width: 40px;">
                        <textarea class="form-control text-dark mt-2" rows="2" id="new_mind"
                                  placeholder="What's on your mind?"></textarea>

                        <button class="text-white mt-2 border-0 float-sm-right" style="background: #3b5998">
                            Submit
                        </button>

                    </div>
                </div>
            </div>

            <div class="card rounded-0 shadow-sm mb-3 bg-white">
                <div class="card-body">
                    <div>
                        <img class="rounded-circle mr-2" src="YujieJPG.JPG" alt="avatar" style="width: 40px;">Yujie
                    </div>
                </div>

                <div class="ml-4 mb-2">
                    Here is your post, you can post anythings here, but please respect others from heart.
                </div>

                <div class="container">
                    <div class="float-sm-left">
                        <a href="#" data-toggle="tooltip" title="Chenglong Ma">6 Likes</a>
                    </div>
                    <div class="float-sm-right">
                        <a href="#" data-toggle="tooltip" title="Chenglong Ma">1 Comment</a>
                    </div>
                </div>

                <script>
                    $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>


                <div class="btn-group">
                    <button type="button" class="btn btn-light w-50 mx-2 text-dark">Like</button>
                    <button type="button" class="btn btn-light w-50 mx-2 text-dark">Comment</button>

                </div>
            </div>
        </div>
        <!--        Right Part-->
        <div class="col-3 mt-3">
            <div class="card rounded-0 bg-light text-primary">
                <div class="card-body">
                    <b>New friend requests
                </div>
            </div>
        </div>
    </div>
</div>
