<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-10-06
 * Time: 23:43
 */

require_once 'Controllers/DBConnect.php';
require_once 'Controllers/FriendRequest.php';
require_once 'Controllers/Post.php';
require_once 'Controllers/PostLike.php';
$post_like = new PostLike();
if (isset($_POST['Like']) && isset($_POST['postID']) && isset($_POST['userID'])) {
    $post_like->createPostLike();
}
$userPost = new Post();
if (isset($_POST['Post'])){
    $userPost->createPost();
}

