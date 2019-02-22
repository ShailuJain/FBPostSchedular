<?php
//including the connection variable from connection.php file
include_once ('connection.php');

$num = 0;

/**
 * This function basically get a random post(status or photo) and returns it to the js where fb api will post it to the profile.
 * @return string:returns the text ot link of image to post.
 */
function get_random_post(){
    global $connection, $num;
    $num = rand(0,10);
    $query = "SELECT * FROM posts ORDER BY RAND() LIMIT 1";
    $res = mysqli_query($connection, $query);
    if($row = mysqli_fetch_assoc($res)){
        if($num <= 5){
            $post = $row['status'];
        }else if($num <= 10){
            $post = $row['photo_path'];
        }
    }
    return $post;
}

/**
 * checks is this file was requested via post request with random_post and returns the link or text.
 */
if(isset($_GET['random_post'])){
    $random_post_param = $_GET['random_post'];
    $new_post = get_random_post();
    $arr = array();
    if($random_post_param == true){
        if($num <= 5)
            $arr['type'] = 'STATUS';
        else if($num <= 10)
            $arr['type'] = 'PHOTO';
        $arr['post'] = $new_post;
        echo json_encode($arr);
    }
}