<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Post Scheduler</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

    <!--This script basically initializes the facebook sdk-->
<!--    <script>-->
<!--        window.fbAsyncInit = function() {-->
<!--            FB.init({-->
<!--                appId            : '399058003984625',-->
<!--                autoLogAppEvents : true,-->
<!--                xfbml            : false,-->
<!--                version          : 'v3.2'-->
<!--            });-->
<!--        };-->
<!--    </script>-->


    <!--This is the div which is in the center of the screen-->
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
        </div>
    </body>
    <script src="js/script.js"></script>


    <!--This script calls the facebook site to load the facebook sdk-->
    <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
</html>