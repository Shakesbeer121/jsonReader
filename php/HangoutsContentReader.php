<?php
require_once 'modules/Chat.php';
require_once 'modules/Message.php';

/**
 * Created by PhpStorm.
 * User: Ludwig
 * Date: 23.11.2016
 * Time: 15:34
 */
class HangoutsContentReader extends JsonParser
{
    private $chats = [];

    /**
     * HangoutsContentReader constructor.
     * @overwrite JsonParser
     * @param $fileName
     * @param $path
     */
    public function __construct($fileName, $path)
    {
        parent::__construct($fileName, $path);
    }

    private function setChats(){
        $tempChats = $this->json->conversation_state;
        foreach($tempChats as $chat){
            array_push($this->chats, new Chat($this->getSender($chat), $this->getRecipient($chat), $this->getMessages($chat)));
        }
    }

    private function getMessages($chat){
        $messages = [];

        $events = $chat->conversation_state->event;
        foreach($events as $event){
            if($event->event_type == "REGULAR_CHAT_MESSAGE"){
                //get sender id
                $sender = $this->getUserName($event->sender_id->gaia_id);
                //get text and save message
                if(property_exists($event->chat_message->message_content, 'segment')){
                    $segment = $event->chat_message->message_content->segment;
                    foreach($segment as $value){
                        array_push($messages, new Message($value->text, $sender));
                    }
                }
            }
        }

        return $messages;
    }

    private function getSender($chat){
        $sender = '';

        $tempParticipantData = $chat->conversation_state->conversation->participant_data;
        foreach($tempParticipantData as $participant){
            if(!isset($participant->fallback_name)){
                $sender = $this->getUserName($participant->id->gaia_id);
            }
        }

        return $sender;
    }

    private function getRecipient($chat){
        $recipient = '';

        $tempParticipantData = $chat->conversation_state->conversation->participant_data;
        foreach($tempParticipantData as $participant){
            if(isset($participant->fallback_name)){
                $recipient = $this->getUserName($participant->id->gaia_id);
            }
        }

        return $recipient;
    }

    private function getUserName($id){
        $user = '';

        $jsonParser = new JsonParser('Users.json', '../config/');
        $config = $jsonParser->getJson();

        foreach($config as $item){
            if($item->id == $id){
                $user = $item->name;
            }
        }

        return $user;
    }

    public function getChats(){
        $this->setChats();
        return $this->chats;
    }
}