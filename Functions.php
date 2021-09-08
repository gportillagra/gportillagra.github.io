<?php
    $TOKEN = "1974165593:AAFzRbljC46jFBEaASXpVcoZYlocO-Aoj2c";
    $URL = "https://api.telegram.org/bot$TOKEN";
    
    function sendMessage($chat_id, $text)
    {
        global $URL;
        $json = ['chat_id'       =--><html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></head><body>$chat_id,
                 'text'          =&gt; $text,
                 'parse_mode'    =&gt; 'Markdown'];
        return http_post($URL.'/sendMessage', $json);
    }
    
    function sendReplyMessage($chat_id, $reply_to_message_id, $text)
    {
        global $URL;
        $json = ['chat_id'              =&gt; $chat_id,
                 'text'                 =&gt; $text,
                 'reply_to_message_id'  =&gt; $reply_to_message_id,
                 'parse_mode'    =&gt; 'Markdown'];
        return http_post($URL.'/sendMessage', $json);
    }
    
    function sendChatAction($chat_id, $action)
    {
        global $URL;
        $json = ['chat_id'       =&gt; $chat_id,
                 'action'          =&gt; $action];
        return http_post($URL.'/sendChatAction', $json);
    }
    
    function setChatTitle($chat_id, $title)
    {
        global $URL;
        $json = ['chat_id'       =&gt; $chat_id,
                 'title'          =&gt; $title];
        return http_post($URL.'/setChatTitle', $json);
    }
    
    
    function http_post($url, $json)
    {
        $ans = null;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        try
        {
            $data_string = json_encode($json);
            // Disable SSL verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            // Will return the response, if false it print the response
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
            );
            $ans = json_decode(curl_exec($ch));
            if($ans-&gt;ok !== TRUE)
            {
                $ans = null;
            }
        }
        catch(Exception $e)
        {
            echo "Error: ", $e-&gt;getMessage(), "\n";
        }
        curl_close($ch);
        return $ans;
    }
?>
