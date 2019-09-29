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
//    private $receiverID;

    function _construct($receiverID)
    {
//       $this->receiverID=$receiverID;
    }

    function sendRequest()
    {
        $conn = DBConnect::connect();
        $SenderID = $_SESSION['User'][0]['UserID'];
        $sql_createFriendRequest = "insert into Friendship(SenderID,ReceiverID,is_Friendship) values ($SenderID,'$_SESSION[ReceiverID]',FALSE)";
        if ($conn->query($sql_createFriendRequest)) {
            header("Location: ../View/SearchResult.php?FriendRequest=1");
        } else {
            echo "Failed!";
        }
    }

    function getRequest($receiverID)
    {
        $conn = DBConnect::connect();
        $sql_getFriendRequest = "select 
    *
from
    faceBook.UserAccounts
        inner join
    faceBook.Friendship ON UserID = SenderID
where 
      faceBook.Friendship.ReceiverID=" . $receiverID . " and faceBook.Friendship.is_Friendship=false";
        $result_friendshipRequest = $conn->query($sql_getFriendRequest);

        $request_array[] = array();

        if ($result_friendshipRequest->num_rows > 0) {
            $request_array = $result_friendshipRequest->fetch_all(MYSQLI_ASSOC);

            return $request_array;
        }
        return NULL;
    }

    function acceptRequest($senderID, $receiverID)
    {
        $conn = DBConnect::connect();
        $sql_agreeRequest = "update faceBook.Friendship set is_Friendship=true where SenderID=" . $senderID . " and ReceiverID=" . $receiverID;
        if ($conn->query($sql_agreeRequest)) {
            return self::getRequest($senderID, $receiverID);
        } else {
            return "Update failed:" . $conn->error;
        }
    }


    function deleteRequest($senderID, $receiverID)
    {
        $conn = DBConnect::connect();
        $sql_deleteRequest = "delete from faceBook.Friendship where senderID=" . $senderID . " and ReceiverID=" . $receiverID;
        if ($conn->query($sql_deleteRequest)) {
            return self::getRequest($senderID, $receiverID);
        } else {
            return "Update failed:" . $conn->error;
        }
    }


}