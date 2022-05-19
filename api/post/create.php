<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-headers: Access-Control-Allow-headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once '../../config/Database.php';
include_once '../../models/Post.php'; 

$database = new Database ();
$db = $database->connect();

$post = new Post($db);

$data = json_decode(file_get_contents('php://input'));

$post->title = $data->title;
$post->body = $data->author;
$post->author = $data->author;
$post->category_id = $data->category_id;

if($post->create()){
    echo json_encode(
        array(
            'message' =>  'Post crée avec succés.'
        )
    );
} else {
    echo json_encode(
        array(
            'message' => 'Creation du post échouée'
        )
        );
}