<?php
include ('conn.php');

$id = $_GET['id'];

$html = "";


$html .= "<form action='addnewsection.php' class='form-label'><input type='hidden' name='event_id' value='".$id."' ><div class='mb-3 my-5'><label for='inputState' class='form-label'>Section</label>";

$html .= "<input type='text' class='form-control' name='section' id='addneweventFormControlInput' placeholder='Add New Section'></div>";

$html .= "<div class='mb-3'><label for='inputState' class='form-label'>Seat</label>";

$html .= "<input type='text' class='form-control' name='seat' id='addneweventFormControlInput' placeholder='Add New Seat'> </div> <div class='col-auto'>
<button type='submit' class='btn btn-primary mb-3'>Confirm</button>
</div></form>";

$mysql_run = mysqli_query($conn,"SELECT * FROM `spaceseat_Event` JOIN `spaceseat_eventseaction` ON `spaceseat_eventseaction`.`event_id` = `spaceseat_Event`.`id`WHERE `spaceseat_Event`.`id` ='$id'");





$html .= "<table class='table'>";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<th scope='col'>id</th>";
$html .= "<th scope='col'>Event Name</th>";
$html .= "<th scope='col'>Section</th>";
$html .= "<th scope='col'>Seat</th>";
$html .= "<th scope='col'>Created at</th>";
$html .= "<th scope='col'>Updated at</th>";
$html .= "</tr>";
$html .= "</thead>";
$html .= "<tbody>";

    $c=1;
    while($assoc = mysqli_fetch_assoc($mysql_run))
    {
        $html .= "<tr>";
        $html .= "<td>".$c."</td>";
        $html .= "<td>". $assoc['event_name'] ."</td>";
        $html .= "<td>". $assoc['section_name'] ."</td>";
        $html .= "<td>". $assoc['seat'] ."</td>";
        $html .= "<td>". $assoc ['created_at'] ."</td>";
        $html .= "<td>". $assoc ['updated_at'] ."</td>";
        $html .= "</tr>";
        $c++;
    }
    $html .= "</tbody>";
    $html .= "</table>";



echo $html;








?>