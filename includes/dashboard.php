<?php
    /*
     * This file is dashboard which has the form for setting time interval of posting
     * */
?>
<div class="form">
    <form action="includes/schedule.php">
        <h3>Post Scheduler</h3>
        <div class="form-control">
            <label for="time" class="input-label">Time interval(Hours): </label><br>
            <input type="number" id="time" class="input-type">
        </div>
        <button type="submit" class="btn">Set Interval</button>
    </form>
</div>