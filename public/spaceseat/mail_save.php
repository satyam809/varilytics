<?php

    $today = date("d/m/Y H:i:s");
    $dbhost = "localhost";
    $dbuser = "varistats";
    $dbpass = "testMe#1234R";
    $db = "varistats";

    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

    

    $order_no = $_POST['order_no'];

    $quanity = $_POST['quanity'];

    $section = $_POST['section'];

    $row = $_POST['row'];

    $seat = $_POST['seat'];

    $url = $_POST['url'];

    $date =   $_POST['date'];

    $url =   $_POST['url'];
    
    mysqli_query($conn,"INSERT INTO `spaceseat_mail`(`order_no`, `quanity`, `section`, `row`, `seat`, `url`, `date`, `created_at`, `updated_at`) VALUES ('$order_no','$quanity','$section','$row','$seat','$url','$date','$today','$today')");
    
