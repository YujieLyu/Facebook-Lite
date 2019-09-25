<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-24
 * Time: 20:21
 */

class FriendRequest
{
//    private $senderID;
    private $receiverID;

    function _construct($receiverID){
       $this->receiverID=$receiverID;
    }

    function getRequest($receiverID){
        $conn=DBConnect::connect();
        $sql_getFriendRequest="select * from faceBook.UserAccounts inner join faceBook.Friendship on UserID=SenderID where ReceiverID=".$receiverID;
        $result_friendshipRequest=$conn->query($sql_getFriendRequest);

        $request_array[]=array();

        if ($result_friendshipRequest->num_rows>0){
            $request_array=$result_friendshipRequest->fetch_all(MYSQLI_ASSOC);
            return $request_array;
        }
        return NULL;
    }



}