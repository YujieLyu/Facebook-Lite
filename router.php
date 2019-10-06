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
if (isset($_POST['Like'])) {
    $post_like->createPostLike();
}


$userPost = new Post();
if (isset($_POST['Post'])) {
    $userPost->createPost();
}


$requests = new FriendRequest();

if (isset($_POST['AddFriend'])) {
    $requests->sendRequest();
}

if (isset($_POST['Yes']) || isset($_POST['No'])) {
    $requests->processRequest();
}
