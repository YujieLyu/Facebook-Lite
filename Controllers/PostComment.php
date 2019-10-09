<?php

/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-10-08
 * Time: 16:05
 */
class PostComment
{
    function _construct()
    {

    }

    function createComment()
    {
        $conn = DBConnect::connect();
        $content = $_POST['replyContent'];
        $postID = $_POST['postID'];
        $replierID = $_POST['replierID'];
        $sql_createComment = "insert into faceBook.PostComments(CommentContent, CommentTime, PostID, ReplierID) values ('$content',now(),'$postID','$replierID ')";
        if ($conn->query($sql_createComment)) {
            header("Location: View/MainPage.php");
        } else {
            echo "Comment failed:" . $conn->error;
        }
    }

    function getComment($post_id)
    {
        $conn = DBConnect::connect();
        $sql_getComment = "select * from faceBook.PostComments inner join faceBook.UserAccounts on ReplierID=UserID where PostID=" . $post_id;
        $result_comment = $conn->query($sql_getComment);
        $comment_array[] = array();
        if ($result_comment->num_rows > 0) {
            $comment_array = $result_comment->fetch_all(MYSQLI_ASSOC);
            return $comment_array;
        } else {
            return null;
        }
    }
}