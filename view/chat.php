<?php
    require_once '../php/JsonParser.php';
    require_once '../php/HangoutsContentReader.php';
    require_once '../php/modules/Chat.php';

    $chat = null;
    $chats = [];

    try{
        $parser = HangoutsContentReader::getInstance('Hangouts.json', '../json-files/');
        $chats = $parser->getChats();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    foreach($chats as $value){
        if(isset($_GET['chat_partner']) && $_GET['chat_partner'] == $value->getChatPartner()){
            $chat = $value;
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Chat mit <?php echo $chat->getChatPartner() ?></title>
    </head>
    <body>
        <?php
            $messages = $chat->getMessages();

            foreach($messages as $message){
                $sender = $message->getSender();
                $text = $message->getContent();
                echo "Sender: ".$sender."<br>".$text."<br><br>";
            }
        ?>
    </body>
</html>
