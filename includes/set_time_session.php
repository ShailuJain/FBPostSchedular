<?php
/**
 * check if the session is already started, start if not.
 */
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
}
/**
 * sets the session of time_interval for purpose of saving the value of time.
 * */
if(isset($_POST['schedule_btn'])){
    $time = 1;
    $tmp_time = $_POST['time_interval'];
    if($tmp_time>0){
        $time = $tmp_time;
    }
    $_SESSION['time_interval'] = $time;
}