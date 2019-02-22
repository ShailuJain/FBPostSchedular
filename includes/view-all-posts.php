<?php
include_once ('connection.php');

/**
 * @param $condition: condition to used in select query default is 1.
 * @return bool|mysqli_result returns the result of executing the query.
 */
function select_all_post($condition = 1){
    global $connection;
    $query = "SELECT * FROM posts WHERE ".$condition;
    return mysqli_query($connection, $query);
}
?>
<!--Table which will be shown on the dashboard(index.php) which includes all the post entries from the database.-->
<table>
    <thead>
        <tr>
            <th colspan='3'>Status</th>
            <th colspan='3'>Photo Links</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $res = select_all_post();
            for($i = 0; $i<(mysqli_num_rows($res)); $i++){
                $row = mysqli_fetch_assoc($res);
                echo "<tr>";
                echo "<td colspan='3'>".$row['status']."</td>";
                echo "<td colspan='3'>".$row['photo_path']."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
