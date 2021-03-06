<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-10-06
 * Time: 23:43
 */

/**
 * This router is used to process DB add/update/delete operations from form submissions.
 */
require_once 'Controllers/DBConnect.php';
require_once 'Controllers/FriendRequest.php';
require_once 'Controllers/Post.php';
require_once 'Controllers/PostLike.php';
require_once 'Controllers/PostComment.php';

//Add new posts
$userPost = new Post();
if (isset($_POST['Post'])) {
    $userPost->createPost();
}

//Process new post like request
$post_like = new PostLike();
if (isset($_POST['Like'])) {
    $post_like->processLikeRequest();
}

//Add new post comment
$post_comment = new PostComment();
if (isset($_POST['Comment'])) {
    $post_comment->createComment();
}
if (isset($_POST['parentCommentID'])){
    $post_comment->createSubComment();
}

//Friends connecting request
$requests = new FriendRequest();

//Add new requests
if (isset($_POST['AddFriend'])) {
    $requests->sendRequest();
}

//Update friend request status
if (isset($_POST['Yes']) || isset($_POST['No'])) {
    $requests->processRequest();
}


