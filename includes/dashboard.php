<?php
/**'
 * checks if session of time is set if not then sets it to the default value i.e 1.
 */
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
    if(!isset($_SESSION['time_interval']))
        $_SESSION['time_interval'] = 1;
}
?>
<!--the form which allows the user to set time interval of post and schedule posts.-->
<div class="form">
    <form>
        <h3>Post Scheduler</h3>
        <div class="form-control">
            <label for="time_interval" class="input-label">Time interval(Hours): </label><br>
            <input type="number" id="time_interval" class="input-type" name="time_interval" value="<?php echo $_SESSION['time_interval']; ?>">
        </div>
        <button type="button" class="btn" name="schedule_btn" onclick="schedule()">Schedule</button>
    </form>
</div>