<?php
include ('conn.php');

date_default_timezone_set('Asia/Kolkata');

$id = $_GET['event_id'];
$section = $_GET['section'];
$seat = $_GET['seat'];
$date = date('Y-m-d H:i:s');

$mysql_run = mysqli_query($conn,"SELECT * FROM `spaceseat_eventseaction` WHERE `event_id` = '$id' And `section_name` LIKE '%$section%'");

$num = mysqli_num_rows($mysql_run);

if($num == 0)
{
    mysqli_query($conn,"INSERT INTO `spaceseat_eventseaction`(`event_id`, `section_name`, `seat`, `create_at`, `update`) VALUES ('$id','$section','$seat','$date','$date')");
    echo "<script>alert('Added'); window.location.href = '../spaceseat/adssection.php';</script>";
}
else
{
    mysqli_query($conn,"UPDATE `spaceseat_eventseaction` SET `seat`='$seat',`update`='$date' WHERE `section_name`='$section' AND `event_id`='$id'");
    echo "<script>alert('Updated'); window.location.href = '../spaceseat/adssection.php';</script>";
}