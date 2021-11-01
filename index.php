<?php

define( 'TOKEN', '1080770740:AAFP-1wHRynILUoqv2Jmge1xMwCPC7DfdcU');

$data = json_decode(file_get_contents('php://input'), TRUE);
file_put_contents( 'file.txt', '$data: '. print_r($data,1). "\n", FILE_APPEND);




$message = mb_strtolower($data['message']['text'], 'utf-8');

switch ($message) {
    case '123':
        $method = 'sendMessage';
        $params = [
            'chat_id' => $data['message']['chat']['id'],
            'text' => 'hello'
        ];
        break;
    default:
        $method = 'sendMessage';
        $params = [
            'chat_id' => $data['message']['chat']['id'],
            'text' => 'ошибка'
        ];
}
file_get_contents('https://api.telegram.org/bot'. TOKEN . '/' . $method . '?' . http_build_query($params));


