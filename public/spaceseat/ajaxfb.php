<?php
    include ('conn.php');

    date_default_timezone_set('Asia/Kolkata');

    $id = $_GET['id'];

    $url = $_GET['url'];

    $date = date('Y-m-d H:i:s');

    mysqli_query($conn,"INSERT INTO `spaceseat_facebook`(`event_id`, `url`, `create_at`, `updated_at`) VALUES ('$id','$url','$date','$date')");

    