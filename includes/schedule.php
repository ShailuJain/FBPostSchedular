<?php
//including the connection variable from connection.php file
include_once ('connection.php');

/**
 * This function basically get a random post(status or photo) and posts it to facebook using the api.
 */

$num = rand(0,1);
//Default value of time if not provided
$time = 1;
function get_random_post(){
    global $connection, $num;
    $query = "SELECT * FROM posts ORDER BY RAND() LIMIT 1";
    $res = mysqli_query($connection, $query);
    if($row = mysqli_fetch_assoc($res)){
        if($num == 0){
            $post = $row['status'];
        }else if($num == 1){
            $post = $row['photo_path'];
        }
    }
    return $post;
}

/**
 * This part of code checks if the schedule  post was clicked and changes the time interval if was updated.
 */
if(isset($_POST['schedule_btn'])){

    $tmp_time = $_POST['time_interval'];
    if(!empty($tmp_time) && $tmp_time > 0){
        $time = $_POST['time_interval'];
    }
}

/**
 * checks is this file was requested via post request with time parameter or random_post
 */

if(isset($_GET['time']) || isset($_GET['random_post'])){
    $time_param = $_GET['time'];
    $random_post_param = $_GET['random_post'];
    if($time_param == true){
        echo "time:".$time."<EOF>";
    }
    if($random_post_param == true){
        if($num == 0)
            echo "type:STATUS<EOF>";
        else if($num == 1)
            echo "type:PHOTO<EOF>";
        echo "post:".get_random_post()."<EOF>";
    }
}