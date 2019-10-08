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
//    $comment_no = 0;
foreach ($posts

as $index => $value) :
//        ++$comment_no;
$post_time = $value['PostTime'];
$post_content = $value['Content'];
$post_name = $value['ScreenName'];
$post_id = $value['PostID'];
$post_like = new PostLike();
$likes = $post_like->getPostLike($post_id);
$post_comment = new PostComment();
$comments = $post_comment->getComment($post_id);
if ($likes != null):
    $likes_num = count($likes);
else:
    $likes_num = 0;
endif;
if ($comments != null):
    $comments_num = count($comments);
    foreach ($comments as $commentIndex => $comment):
        $comment_no = $comment['PostCommentID'];
        $comment_content = $comment['CommentContent'];
    endforeach;
else:
    $comments_num = 0;
endif;

?>
<div class="card rounded-0 shadow-sm mb-3 bg-white">
    <div class="card-body">
        <div class="row">
            <div class="col-1">
                <img class="flex rounded-circle mr-2" src="../resources/Yujie.JPG" alt="avatar"
                     style="width: 40px;">
            </div>
            <div class="col-3">
                <span style="color: #3b5998"><b><?php echo $post_name; ?><br></b></span>
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
            <a href="#" data-toggle="tooltip" title="Chenglong Ma"><?php echo $likes_num ?>
                Likes</a>
        </div>
        <div class="col-6 text-center text-dark small">
            <a href="#" data-toggle="tooltip" title="Chenglong Ma"
               onclick="showReplyList<?php echo $comment_no ?>()"><?php echo $comments_num ?> Comment</a>
        </div>

        <hr/>

        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });

            function showReplyList<?php echo $comment_no ?>() {
                let x = document.getElementById("replyList<?php echo $comment_no ?>");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
    </div>
    <!--Likes & comments buttons-->
    <div class="row mt-2">
        <div class="col-6 text-center">
            <form action="../router.php" method="post">
                <input type="hidden" name="postID" value="<?php echo $post_id ?>">
                <input type="hidden" name="likerID" value="<?php echo $userID ?>">
                <input type="submit" name="Like" class="btn btn-light w-50  text-dark" value="Like">

            </form>
        </div>
        <div class="col-6 text-center text-dark ">
            <input type="button" class="btn btn-light w-50 text-dark" value="Comment"
                   onclick="showReplyBox<?php echo $post_id ?>()">
        </div>

        <hr/>

        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });

            function showReplyList<?php echo $comment_no ?>() {
                let x = document.getElementById("replyList<?php echo $comment_no ?>");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
    </div>
<!--    <div class="input-group mt-n3">-->
<!--        <form action="../router.php" method="post">-->
<!--            <input type="hidden" name="postID" value="--><?php //echo $post_id ?><!--">-->
<!--            <input type="hidden" name="likerID" value="--><?php //echo $userID ?><!--">-->
<!--            <input type="submit" name="Like" class="btn btn-light w-50  text-dark" value="Like">-->
<!--            <input type="button" class="btn btn-light w-50 text-dark" value="Comment"-->
<!--                   onclick="showReplyBox--><?php //echo $post_id ?>
<!--//        </form>-->
<!--//-->
<!--//    </div>-->


    <div id="replyBox<?php echo $post_id ?>" class="m-4" style="display: none;">
        <div class="row">
            <div class="col-1">
                <img class="rounded-circle mx-2 my-2" src="../resources/Yujie.JPG" alt="avatar"
                     style="width: 40px;">
            </div>
            <div class="col-10">
                <form action="../router.php" method="post">
                    <input type="hidden" name="postID" value="<?php echo $post_id ?>">
                    <input type="hidden" name="replierID" value="<?php echo $userID ?>">
                    <textarea name="replyContent" id="reply" class="form-control text-dark mt-2 mx-4" rows="1"
                              style="resize: none"></textarea>
                    <input type="submit" name="Comment"
                           class="btn text-white mt-2 border-0 float-sm-right px-2"
                           style="background: #3b5998"
                           value="Reply">
                </form>
            </div>
        </div>

    </div>
    <script>
        function showReplyBox<?php echo $post_id ?>() {
            var x = document.getElementById("replyBox<?php echo $post_id ?>");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <div id="replyList<?php echo $comment_no ?>" class="m-4" style="display: none;">
        <div class="row">
            <div class="col-1">
                <img class="rounded-circle mx-2 my-2" src="../resources/Yujie.JPG" alt="avatar"
                     style="width: 40px;">
            </div>
            <div class="col-10">
                <p>
                    <?php echo $comment_content ?>
                </p>
            </div>
        </div>
    </div>
</div>
    <?php
    endforeach;
    endif;
    ?>

