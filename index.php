<?php


$input = file_get_contents('php://input');
$update = json_decode($input);

$message = $update->message;
$chat_id = $message->chat->id;
$token = "5408077710:AAEKDl9B75vkmPYVYHxET5aW03OI6-czrJQ";
$username = $message->chat->first_name;
$check_negative_id = gmp_sign($chat_id);

if($message->text == '/start' && $check_negative_id == 1) {
    file_get_contents("https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chat_id . "&text=Привет " . $username . "!");
}

if($message->text == '/start' && $check_negative_id == -1) {
    file_get_contents("https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chat_id . "&text=Приветствую " . $username . "!");
}
