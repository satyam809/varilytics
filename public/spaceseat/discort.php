<?php
    include ('conn.php');

    date_default_timezone_set('Asia/Kolkata');

    $date = date("d/m/Y h:i:sa");
   
    $mysql_run = mysqli_query($conn,"SELECT * FROM `spaceseat_Event` JOIN `spaceseat_eventseaction` ON `spaceseat_eventseaction`.`event_id` = `spaceseat_Event`.`id` ");
    while($assoc = mysqli_fetch_assoc($mysql_run))
    {
        $event_name = $assoc ['event_name'];
        $venue = $assoc ['venue'];
        $city = $assoc ['city'];
        $section_name = $assoc ['section_name'];
        $seat = $assoc ['seat'];
        

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `spaceseat_discord` where event_name = '$event_name' AND venue = '$venue' AND city = '$city' AND section_name = '$section_name' AND seat = '$seat'");
        $result1 = mysqli_num_rows($mysql_run1);
        // if($result1 != 0)
        // {
        //     while($assoc1 = mysqli_fetch_assoc($mysql_run1))
        //     {
        //         if($seat != $assoc1['seat'])
        //         {
        //             mysqli_query($conn,"UPDATE `spaceseat_discord` SET `seat`='$seat',`display`=0 WHERE event_name = '$event_name' AND venue = '$venue' AND city = '$city' AND section_name = '$section_name'");
        //         }
        //     }
        // }
        // else
        // {
            // mysqli_query($conn,"INSERT INTO `spaceseat_discord`(`event_name`, `venue`, `city`, `section_name`, `seat`, `display`) VALUES ('$event_name','$venue','$city','$section_name','$seat', 0)");
        // }

        if($result1 == 0)
        {
            mysqli_query($conn,"INSERT INTO `spaceseat_discord`(`event_name`, `venue`, `city`, `section_name`, `seat`, `display`) VALUES ('$event_name','$venue','$city','$section_name','$seat', 0)");
        
        }

    }

    $data = "";

    $mysql_run2 = mysqli_query($conn,"SELECT * FROM `spaceseat_discord` WHERE `display` = 0 AND `seat` < 4 Limit 5");
    echo $result1 = mysqli_num_rows($mysql_run2);
    
    while($assoc1 = mysqli_fetch_assoc($mysql_run2))
    {
        $id = $assoc1['id'];  
        $event_name = $assoc1 ['event_name'];
        $venue = $assoc1 ['venue'];
        $city = $assoc1 ['city'];
        $section_name = $assoc1 ['section_name'];
        $seat = $assoc1 ['seat'];

        mysqli_query($conn,"UPDATE `spaceseat_discord` SET `display`= 1 WHERE `id` = $id");
        $data .= "Event Name :- ".$event_name."\nvenue :-".$venue." \ncity :- ".$city."\nSection :-   ".$section_name."\nSeat :-   ".$seat."\n\n";


    }

    
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://discord.com/api/webhooks/993827933233889310/6K1INVvHadcWPT6DBGQ0Tjtme8poo1I28NFZ8exrgoHQDGsPIuBHcAwIrkAQ_4ab3jKG',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => array('content' => $data),
        //     CURLOPT_HTTPHEADER => array(
        //             'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
        //     ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);


            echo $data;

        $curl = curl_init();

        curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://discord.com/api/webhooks/1063321353316474892/-5GaSJT5ujmICq3KW_0x2PLft8SbJCzLiurTPj9mnkPMC0y2Fe_cKSKwTuNu60MQMZw8',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('content' => $data),
		CURLOPT_HTTPHEADER => array(
				'Cookie: __cfruid=a22609c30af045e71f2593d108d15274f2b0da3b-1673522475; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
		),
));

$response = curl_exec($curl);

curl_close($curl);
   












