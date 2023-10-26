<?php    
    // echo date_default_timezone_get();
    $today = date("Y-m-d");
    $dbhost = "localhost";
    $dbuser = "varistats";
    $dbpass = "testMe#1234R";
    $db = "varistats";

    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

    $mysql_run = mysqli_query($conn,"SELECT * FROM `spaceseat_mail` WHERE `date` <= date('$today') AND `status` = '0'");
    $row = mysqli_num_rows($mysql_run);
    // $assoc = mysqli_fetch_all($mysql_run, MYSQLI_ASSOC);
    if($row != 0)
    {
        $data = "\n ";
        while($row = mysqli_fetch_array($mysql_run))
        {
            $data .= "Order No: ".$row[1]."\n Quanity : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seat : ".$row[5]."\n URL : ".$row[6]."\n Date : ".$row[7]." \n\n";
        
        
        
        
        
        }
                       
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //         CURLOPT_URL => 'https://discord.com/api/webhooks/1108299317522993172/DZsvb1lkQfF-RRYmMST1Ot3r4bVhsu1huyYuzqQyQkacjQhUc0w7aTPWVXg-xZO92FWj',
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_ENCODING => '',
        //         CURLOPT_MAXREDIRS => 10,
        //         CURLOPT_TIMEOUT => 0,
        //         CURLOPT_FOLLOWLOCATION => true,
        //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //         CURLOPT_CUSTOMREQUEST => 'POST',
        //         CURLOPT_POSTFIELDS => array('content' =>  $data),
        //         CURLOPT_HTTPHEADER => array(
        //             'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
        //         ),
        // ));
        // $response = curl_exec($curl);
        // curl_close($curl);

        print_r($data);
    }