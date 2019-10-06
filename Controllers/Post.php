<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-26
 * Time: 01:52
 */

class Post
{

    function _construct()
    {
    }

    function createPost()
    {
        $conn = DBConnect::connect();
        $userID = $_POST['userID'];
        //Avoid empty post content to be inserted
        if ($_POST['Post'] != null) {
            $postContent = self::formatInput($_POST['Post']);
            $sql_createPost = "insert into UserPosts(Content,PostTime,UserID) values ('$postContent',now(),$userID)";

            if ($conn->query($sql_createPost)) {
                header("Location: View/MainPage.php");
            } else {
                echo "post failed:" . $conn->error;
            }
        }else{
            header("Location: View/MainPage.php");
        }

    }

    function formatInput($input)
    {
        $key = "'";

        if (strpos($input, $key)) {
            $input = str_ireplace($key, "\'", $input);
        }
        return $input;

    }

    function getPosts($userID)
    {
        $conn = DBConnect::connect();

        $sql_getPost = "select 
    *
from
    faceBook.UserPosts
        inner join
    faceBook.UserAccounts ON faceBook.UserPosts.UserID = faceBook.UserAccounts.UserID
where
    faceBook.UserPosts.UserID = " . $userID . "
        or faceBook.UserPosts.UserID in (select 
            SenderID
        from
            faceBook.Friendship
        where
            ReceiverID = " . $userID . " and is_Friendship = true union select 
            ReceiverID
        from
            faceBook.Friendship
        where
            SenderID = " . $userID . " and is_Friendship = true) order by PostTime DESC";

//        "select * from faceBook.UserPosts where UserID='" . $userID . "' order by PostTime DESC";

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