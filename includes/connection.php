<?php
/**
 * This file contains the database details
 * It contains connection variable to be used for accessing database
 */

define('HOST', 'localhost');
define('DB', 'fbpost');
define('USER', 'jainshailesh91');
define('PWD', 'shailujain123');
$connection = mysqli_connect(HOST, USER, PWD, DB);