<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-10-06
 * Time: 17:58
 */
?>
<div class="card rounded-0 bg-light text-sm">
    <div class="card-body">
        <h6 class="text-dark">New friend requests</h6>
        <ul class="list-group mx-n3">
            <?php
            if (!isset($_POST['Yes']) && !isset($_POST['No'])) :
                $_SESSION['request_array'] = $requests->getRequest($userID);
                $requests_array = $_SESSION['request_array'];
            else :
                $requests_array = $requests->processRequest();
            endif;

            if ($requests_array !== null):
                foreach ($requests_array
                         as $index => $request):
                    $senderName = $requests_array[$index]['ScreenName'];
                    $senderID = $requests_array[$index]['SenderID'];
                    $is_friend = $requests_array[$index]['is_Friendship'];
                    if (!$is_friend):?>
                        <li class="list-group-item  border border-0">
                            <img class="rounded-circle mr-2" src="../resources/Yujie.JPG"
                                 alt="new-friends-avatar"
                                 style="width: 40px;"> <?php echo $senderName ?> <br>

                            <form method="post"
                                  action="<?php $_SERVER['PHP_SELF'] ?>">
                                <div class="btn-group mt-3" id="processRequest">
                                    <!--Should provide the sender id by the form or the form dont know which one should be pass-->
                                    <input id="senderid" name="senderID" value="<?php echo $senderID ?>"
                                           type="hidden">
                                    <input id="no" type="submit" name="No"
                                           class="btn btn-outline-secondary mx-3"
                                           value="No">
                                    <input id="yes" type="submit" name="Yes"
                                           class="btn btn-outline text-white"
                                           style="background: #3b5998;"
                                           value="Yes">
                                </div>
                            </form>
                        </li>
                    <?php
                    endif;
                endforeach;
            endif;
            ?>
        </ul>
    </div>
</div>
