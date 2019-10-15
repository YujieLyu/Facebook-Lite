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
//        $parentCommentID = $_POST['parentCommentID'];
        $replierID = $_POST['replierID'];
        if ($content != null) {
            if ($postID != null) {
                $sql_createComment = "insert into faceBook.PostComments(CommentContent, CommentTime, PostID,ParentCommentID, ReplierID) values ('$content',now(),'$postID',NULL,'$replierID')";
                if ($conn->query($sql_createComment)) {
                    header("Location: View/MainPage.php");
                } else {
                    echo "Comment failed:" . $conn->error;
                }
            } else {
                header("Location: View/MainPage.php");
            }
        } else {
            header("Location: View/MainPage.php");
        }
    }

    function createSubComment()
    {
        $conn = DBConnect::connect();
        $content = $_POST['replySubContent'];
        $parentCommentID = $_POST['parentCommentID'];
        $replierID = $_POST['replierID'];
        if ($content != null) {
            if ($parentCommentID != null) {
                $sql_createComment = "insert into faceBook.PostComments(CommentContent, CommentTime, PostID,ParentCommentID, ReplierID) values ('$content',now(),NULL,'$parentCommentID','$replierID')";
                if ($conn->query($sql_createComment)) {
                    header("Location: View/MainPage.php");
                } else {
                    echo "Comment failed:" . $conn->error;
                }
            } else {
                header("Location: View/MainPage.php");
            }
        } else {
            header("Location: View/MainPage.php");
        }
    }

    function getSubComment($postComment_id){
        $conn = DBConnect::connect();
        $sql_getComment = "select * from faceBook.PostComments inner join faceBook.UserAccounts on ReplierID=UserID where ParentCommentID=" . $postComment_id;
        $result_comment = $conn->query($sql_getComment);
        $subcomment_array[] = array();
        if ($result_comment->num_rows > 0) {
            $subcomment_array = $result_comment->fetch_all(MYSQLI_ASSOC);
            return $subcomment_array;
        } else {
            return null;
        }
    }

//todo:
    function deleteComment()
    {

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