<?php
    include ('conn.php');
    header("Access-Control-Allow-Origin: *");
    date_default_timezone_set('Asia/Kolkata');

    $id = $_GET['id'];

    $mysql_run = mysqli_query($conn,"SELECT * FROM `spaceseat_facebook` WHERE `event_id` = '$id'");
    $result = mysqli_num_rows($mysql_run);

    $data = mysqli_fetch_assoc($mysql_run);

    echo $data['url'];