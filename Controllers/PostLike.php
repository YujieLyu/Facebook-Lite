<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-10-05
 * Time: 09:17
 */

class PostLike
{

    function _construct()
    {

    }

    function processLikeRequest()
    {
        $postID = $_POST['postID'];
        $likerID = $_POST['likerID'];
        if (!$this->checkLikeUnique($postID, $likerID)) {
            $this->createPostLike();
        } else {
            $this->deletePostLike();
        }
    }

    function checkLikeUnique($postID, $likerID)
    {
        $conn = DBConnect::connect();
        $sql_checkLikeUnique = "select * from faceBook.PostLikes where PostID=" . $postID . " and LikerID=" . $likerID;
        $result_like = $conn->query($sql_checkLikeUnique);
        return $result_like->num_rows > 0;
    }

    function createPostLike()
    {
        $conn = DBConnect::connect();
        $postID = $_POST['postID'];
        $likerID = $_POST['likerID'];
        $sql_createPostLike = "insert into faceBook.PostLikes(PostID,LikerID) values('$postID','$likerID')";
        if ($conn->query($sql_createPostLike)) {
            header("Location: View/MainPage.php");
        } else {
            echo "Like failed:" . $conn->error;
        }
    }

    function deletePostLike()
    {
        $conn = DBConnect::connect();
        $postID = $_POST['postID'];
        $likerID = $_POST['likerID'];
        $sql_deleteLike = "delete from faceBook.PostLikes where PostID=" . $postID . " and LikerID=" . $likerID;
        if ($conn->query($sql_deleteLike)) {
            header("Location: View/MainPage.php");
        } else {
            echo "Delete like failed" . $conn->error;
        }

    }

    function getPostLike($postID)
    {
        $conn = DBConnect::connect();
//        $postID = $_POST['PostID'];
        $sql_getPostLike = "select * from faceBook.PostLikes where PostID=" . $postID;
        $result_like = $conn->query($sql_getPostLike);
        $like_array[] = array();
        if ($result_like->num_rows > 0) {
            $like_array = $result_like->fetch_all(MYSQLI_ASSOC);
            return $like_array;
        }
        return null;
    }


}