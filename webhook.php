<!--?php
    include_once 'funciones.php';
    
    $request = file_get_contents("php://input");
    $request = json_decode($request);
    
    if ($request---><html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></head><body>message-&gt;text == '/start') {
        $user_name = $request-&gt;message-&gt;chat-&gt;first_name;
        
        sendChatAction($request-&gt;message-&gt;chat-&gt;id, 'typing');
        sleep(1);
        
        sendMessage($request-&gt;message-&gt;chat-&gt;id, "¡Genial *$user_name*!\n\nSoy Juan, un bot para realizar pruebas sobre las funciones de Telegam.");
    } else {
        sendChatAction($request-&gt;message-&gt;chat-&gt;id, 'typing');
        sleep(1);
        
        sendReplyMessage('@vportolla', $request-&gt;message-&gt;message_id, $request);
    }
?>
