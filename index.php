<?php


$input = file_get_contents('php://input');
$update = json_decode($input);

$message = $update->message;
$chat_id = $message->chat->id;
$token = "5408077710:AAEKDl9B75vkmPYVYHxET5aW03OI6-czrJQ";
$username = $message->chat->first_name;
$username_chat = $message->from->first_name;
$message = $message->text;

$db_uri = 'postgres://sxmwymqjhierix:63cb61a19f61f365516b3ff7bd68b7d5092ac9e49e9786ed6eb30483d13696b8@ec2-54-228-218-84.eu-west-1.compute.amazonaws.com:5432/d7g25fppntp8qk';

$host = "ec2-54-228-218-84.eu-west-1.compute.amazonaws.com";
$database = "d7g25fppntp8qk";
$user = "sxmwymqjhierix";
$password = "63cb61a19f61f365516b3ff7bd68b7d5092ac9e49e9786ed6eb30483d13696b8";

$connection = pg_connect("host=$host dbname=$database user=$user password=$password");


if($message->text == '/start' && $chat_id < 0) {
    file_get_contents("https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chat_id . "&text=Приветcтвую  " . $username_chat . "!");
    $query = "INSERT INTO users (id, name, message) VALUES ($chat_id, $username_chat, '$message');";
    pg_query($connection, $query);
}
if($message->text == '/start' && $chat_id > 0) {
    file_get_contents("https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chat_id . "&text=Привет  " . $username . "!");
    $query = "INSERT INTO users (id, name, message) VALUES ($chat_id, $username, '$message');";
    pg_query($connection, $query);
}



