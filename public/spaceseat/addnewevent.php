<?php
include ('conn.php');
date_default_timezone_set('Asia/Kolkata');

$name = $_GET['eventname'];
$venue = $_GET['venue'];
$city = $_GET['city'];

$date = date('Y-m-d H:i:s');

$mysql_run = mysqli_query($conn,"SELECT * FROM `spaceseat_Event` WHERE `event_name` = '$name' AND `venue` = '$venue' AND `city` = '$city'");
$result = mysqli_num_rows($mysql_run);

if($result == 0)
{
    mysqli_query($conn,"INSERT INTO `spaceseat_Event`(`event_name`, `venue`, `city`, `created_at`, `updated_at`) VALUES ('$name','$venue','$city','$date','$date')");
    echo "<script>alert('Added'); window.location.href = 'addevent.php';</script>";
    
}
else
{
    echo "<script>alert('already exists'); window.location.href = 'addevent.php';</script>";
}
// header("Location: ");

?>

