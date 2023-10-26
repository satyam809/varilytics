<?php

include ('conn.php');

date_default_timezone_set('Asia/Kolkata');

$html = "";

$mysql_run = mysqli_query($conn,"SELECT * FROM `spaceseat_eventseaction` JOIN `spaceseat_Event` on `spaceseat_Event`.`id` = `spaceseat_eventseaction`.`event_id` WHERE `spaceseat_eventseaction`.`seat` <4");

$num = mysqli_num_rows($mysql_run);

if($num == 0)
{
    $html .= "<ul><li><b>No data Found</b></li></ul>";
}
else
{
    $html .= "<ul>";
        while($assoc = mysqli_fetch_assoc($mysql_run))
        {
            $html .= "<div style='margin-top:15px; margin-bottom:15px; margin-right:15px;  padding:10px; background-color: #DADBDD57'>"; 
            $html .= "<li>Event :- <b>".$assoc['event_name']." </b></li>";
            $html .= "<li style='list-style-type:none;'> Venue :- <b>".$assoc['venue']."</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; City :- <b> ".$assoc['city']."</b> </li>";
            $html .= "<li style='list-style-type:none;'> Section :- <b>".$assoc['section_name']."</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Seat :- <b> ".$assoc['seat']."</b> </li>";
            $html .= "</div>";
        }
    $html .= "</ul>";
}

 echo $html;











?>