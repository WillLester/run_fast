<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/29
 * Time: 20:53
 */
class MessageController extends Controller {
    function __construct(){
        $this->model = new MessageModel();
    }

    function sendMessage($senderName, $receiverName, $content){

    }

    function getMessageList($userId){

    }

    function deleteMessage($messageId){

    }

    function checkMessage($messageId) {

    }
}