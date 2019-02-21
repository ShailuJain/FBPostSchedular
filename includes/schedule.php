<?php
//including the connection variable from connection.php file
include_once ('connection.php');

/**
 * This function basically get a random post(status or photo) and posts it to facebook using the api.
 */
function get_random_post(){
    global $connection;
    $query = "SELECT * FROM posts ORDER BY RAND() LIMIT 1";
    $res = mysqli_query($connection, $query);
    if($row = mysqli_fetch_assoc($res)){
        $num = rand(0,1);
        if($num == 0){
            $post = $row['status'];
        }else if($num == 1){
            $file_path = "../" . $row['photo_path'];
            if(file_exists("$file_path"))
                $post = file_get_contents($file_path);
            else{
                $post = $row['status'];
            }
        }
    }
}

/**
 * This part of code checks if the schedule  post was clicked and changes the time interval if was updated.
 */
if(isset($_POST['schedule_btn'])){
    //Default value of time if not provided
    $time = 1;
    $tmp_time = $_POST['time_interval'];
    if(!empty($tmp_time) && $tmp_time > 0){
        $time = $_POST['time_interval'];
    }
}
