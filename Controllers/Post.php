<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-26
 * Time: 01:52
 */

class Post
{
//    private $userID;
    function _construct()
    {
//        $this->userID=$userID;
    }

    function createPost($userID)
    {
        $conn = DBConnect::connect();
//        $userID = $_SESSION['User'][0]['UserID'];
        $sql_createPost = "insert into UserPosts(Content,PostTime,UserID) values ('$_POST[Post]',now(),$userID)";

        if ($conn->query($sql_createPost)) {

            header("Location: ../View/MainPage.php");
        } else {
            echo "post failed:" . $conn->error;
        }
    }

    function getPosts($userID)
    {
        $conn = DBConnect::connect();

        $sql_getPost = "select * from faceBook.UserPosts where UserID='" . $userID . "' order by PostTime DESC";

        $result_post = $conn->query($sql_getPost);

        $post_array[] = array();

        if ($result_post->num_rows > 0) {
            $post_array = $result_post->fetch_all(MYSQLI_ASSOC);
            return $post_array;
        } else {
            return NULL;
        }
    }
}