<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Post Scheduler</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="center fixed">
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active li" value="1">
                        Dashboard
                    </li>
                    <li class="li" value="2">
                        View All Posts
                    </li>
                </ul>
            </div> <!--.center .fixed-->
            <div id="content">
                <?php
                /**
                 * Including the dashboard
                 */
                    include_once ('includes/dashboard.php');
                ?>
            </div>
            <div class="button"><button class="btn schedule-post">Schedule Post</button></div>
        </div>
    </body>
    <script src="js/script.js"></script>
</html>