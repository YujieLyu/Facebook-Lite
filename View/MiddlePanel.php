<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-10-06
 * Time: 17:56
 */
?>
<div class="card rounded-0 shadow-sm mb-3 bg-white">

    <!--What's on your mind?-->
    <div class="card-body">
        <div class="row">
            <div class="col-1">
                <img class="rounded-circle" src="../resources/Yujie.JPG" alt="avatar" style="width: 40px;">
            </div>
            <div class="col-11">
                <form id="post" action="../router.php" method="post">
            <textarea class="form-control text-dark mt-2" rows="4" name="Post" id="post"
                      placeholder="What's on your mind?" style="resize: none"></textarea>
                    <input type="hidden" name="userID" value="<?php echo $userID ?>">
                    <input type="submit" class="btn text-white mt-2 border-0 float-sm-right px-2"
                           style="background: #3b5998">
                </form>
            </div>
        </div>


    </div>
</div>

<?php
if ($posts != NULL):
    foreach ($posts as $index => $value) :
        $post_time = $value['PostTime'];
        $post_content = $value['Content'];
        $post_name = $value['ScreenName'];
        $post_id = $value['PostID'];
        $post_like = new PostLike();
        $likes = $post_like->getPostLike($post_id);
        $post_comment = new PostComment();
        $comments = $post_comment->getComment($post_id);
        $comment_no = 0;
        $comment_time = null;
        $comment_content = null;
        $replierScreenName = null;
        if ($likes != null):
            $likes_num = count($likes);
        else:
            $likes_num = 0;
        endif;
        if ($comments != null):
            $comments_num = count($comments);
        else:
            $comments_num = 0;
        endif;

        ?>
        <!-- Posts content showing card-->
        <div class="card rounded-0 shadow-sm mb-3 bg-white">
            <div class="card-body">
                <div class="row">
                    <!-- User's avatar-->
                    <div class="col-1">
                        <img class="flex rounded-circle mr-2" src="../resources/Yujie.JPG" alt="avatar"
                             style="width: 40px;">
                    </div>
                    <!--User's name and post published time-->
                    <div class="col-3">
                        <span style="color: #3b5998"><b><?php echo $post_name; ?><br></b></span>
                        <span><small><?php echo $post_time ?></small></span>
                    </div>
                </div>
            </div>
            <!-- Post content-->
            <div class="ml-4 mb-2">
                <?php echo $post_content; ?>
            </div>

            <!--Likes & comments number-->
            <div class="row mt-2 mb-n4">
                <div class="col-6 text-center small">
                    <a href="#" data-toggle="tooltip" title="Chenglong Ma"><?php echo $likes_num ?>
                        Likes</a>
                </div>
                <div class="col-6 text-center text-dark small">
                    <a href="#" data-toggle="tooltip" title="Chenglong Ma"
                       onclick="showCommentArea<?php echo $post_id ?>()"><?php echo $comments_num ?> Comment</a>
                </div>
                <hr/>

                <script>
                    $(document).ready(function () {
                        $('[data-toggle="tooltip"]').tooltip();
                    });

                </script>
            </div>
            <hr/>
            <!--Likes & comments buttons-->
            <div class="btn-group mt-n3">
                <form action="../router.php" method="post" class="w-50">
                    <input type="hidden" name="postID" value="<?php echo $post_id ?>">
                    <input type="hidden" name="likerID" value="<?php echo $userID ?>">
                    <button type="submit" id="like" name="Like" class="btn btn-light btn-block text-dark"
                            onclick="changeButtonStatus()">Like
                    </button>
                </form>
                <button type="button" class="btn btn-light w-50 text-dark"
                        onclick="showCommentArea<?php echo $post_id ?>()">Comment
                </button>
            </div>


            <!--Comments display area-->
            <div id="CommentArea<?php echo $post_id ?>" style="display: none;">
                <!-- Reply box-->
                <div class="row">
                    <div class="col-1">
                        <img class="rounded-circle mx-2 my-2" src="../resources/Yujie.JPG" alt="avatar"
                             style="width: 40px;">
                    </div>
                    <div class="col-10">
                        <form action="../router.php" method="post">
                            <input type="hidden" name="postID" value="<?php echo $post_id ?>">
                            <input type="hidden" name="replierID" value="<?php echo $userID ?>">
                            <div class="input-group">
                                <textarea name="replyContent" id="reply" class="form-control text-dark mt-2 ml-"
                                          rows="1"
                                          style="resize: none"></textarea>
                                <div class="input-group-append">
                                    <input type="submit" name="Comment"
                                           class="btn text-white mt-2 border-0 float-sm-right px-2"
                                           style="background: #3b5998"
                                           value="Reply">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                if ($comments != null):
                    foreach ($comments as $commentIndex => $comment):
                        $comment_no = $comment['PostCommentID'];
                        $comment_content = $comment['CommentContent'];
                        $comment_time = $comment['CommentTime'];
                        $replierScreenName = $comment['ScreenName'];
                        ?>
                        <!-- Comments list-->
                        <div class="row p-2">
                            <div class="col-1 ">
                                <img class="rounded-circle mx-4 mb-2" src="../resources/reply.JPG" alt="avatar"
                                     style="width: 30px;">
                            </div>
                            <div class="col-10">
                                <div class="mx-2 px-3 py-1"
                                     style="display: inline-block;border-radius: 30px; background-color: #E9EBEE">
                                    <span style="color: #3b5998"><b><?php echo $replierScreenName ?>: </b></span>
                                    <span><?php echo $comment_content ?></span>
                                </div>
                                <br>
                                <div class="mt-1">
                                    <button type="button" class="mx-2 border-0" style="color: #3b5998">
                                        <small>Reply</small>
                                    </button>
                                    <span><small><?php echo $comment_time ?></small></span>
                                </div>

                            </div>
                        </div>
                    <?php
                    endforeach;
                endif;
                ?>
            </div>


            <script>
                function changeButtonStatus() {
                    document.getElementById("like").innerHTML = "Liked";
                }

                function showCommentArea<?php echo $post_id ?>() {
                    let x = document.getElementById("CommentArea<?php echo $post_id ?>");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                }
            </script>

        </div>
    <?php
    endforeach;
endif;
?>

