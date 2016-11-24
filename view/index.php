<?php

    require_once '../php/JsonParser.php';
    require_once '../php/HangoutsContentReader.php';
    require_once '../php/modules/Chat.php';

    try{
        $parser = HangoutsContentReader::getInstance('Hangouts.json', '../json-files/');
        $chats = $parser->getChats();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>JsonParser</title>
    </head>
    <body>
        <?php
            foreach($chats as $chat){
                echo "<a href='/jsonParser/view/chat.php?chat_partner=".$chat->getChatPartner()."'>".$chat->getChatPartner()."</a><br>";
            }
        ?>
    </body>
</html>