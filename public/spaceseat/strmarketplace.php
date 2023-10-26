<?php


$today = date("d/m/Y h:i:sa");
$dbhost = "localhost";
$dbuser = "varistats";
$dbpass = "testMe#1234R";
$db = "varistats";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
$stri="";
$ddf=0;



// Start atlanta-falcons

        $curl = curl_init();

        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://falcons.strmarketplace.com/WebServices/json/F02B765/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                        
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);
        
        
        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'falcons'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','falcons')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'falcons'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $falcons_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $falcons_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }
        }
        $falcons_data1 = "";
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `falcons_Display` = '0' And `key_place` = 'falcons' limit 15");while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `falcons_Display`= '1' WHERE `id` = $row[0]");
        
                if($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $falcons_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : atlanta-falcons \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $falcons_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $falcons_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : atlanta-falcons \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $falcons_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $falcons_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        }
        if( Strlen($falcons_data1) != 0)
        {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993827933233889310/6K1INVvHadcWPT6DBGQ0Tjtme8poo1I28NFZ8exrgoHQDGsPIuBHcAwIrkAQ_4ab3jKG',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $falcons_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }

// End atlanta-falcons







// Start baltimore-ravens
        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://ravens.strmarketplace.com/WebServices/json/F0153E8/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS'  AND `key_place` = 'ravens'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','ravens')");
                }
                else
                {
                       
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'ravens'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $ravens_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : baltimore-ravens \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $ravens_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }
        }

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ravens_Display` = '0' And `key_place` = 'ravens' limit 15");
        $ravens_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `ravens_Display`= '1' WHERE `id` = $row[0]");
                if($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                                        $ravens_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : baltimore-ravens \n\n";
                                        $curl = curl_init();

                                        curl_setopt_array($curl, array(
                                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                                CURLOPT_RETURNTRANSFER => true,
                                                CURLOPT_ENCODING => '',
                                                CURLOPT_MAXREDIRS => 10,
                                                CURLOPT_TIMEOUT => 0,
                                                CURLOPT_FOLLOWLOCATION => true,
                                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                CURLOPT_CUSTOMREQUEST => 'POST',
                                                CURLOPT_POSTFIELDS => array('content' =>  $ravens_data3),
                                                CURLOPT_HTTPHEADER => array(
                                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                                ),
                                        ));
                                        $response = curl_exec($curl);
                                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $ravens_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : baltimore-ravens \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $ravens_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $ravens_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        }
        if( Strlen($ravens_data1) != 0)
        {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/978604076080168980/iuYTMPrR5HQ-vXLaaeXbW3wwNyBSiBIQuDLxWPe0h2F8BdfTsyf8dcS4Pq6a-IY_Eit7',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $ravens_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }

// End  baltimore-ravens




//Start carolina-panthers

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://panthers.strmarketplace.com/WebServices/json/F009476/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS'  AND `key_place` = 'panthers'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','panthers')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'panthers'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $panthers_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : carolina-panthers \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $panthers_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }	
        }

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `panthers_Display` = '0' And `key_place` = 'panthers' limit 15");
        $panthers_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `panthers_Display`= '1' WHERE `id` = $row[0]");
                if($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $panthers_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : carolina-panthers \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $panthers_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $panthers_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : carolina-panthers \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $panthers_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $panthers_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        }
        if( Strlen($panthers_data1) != 0)
        {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993832255132815391/1NOEp5pL4TedX0TSevOzmd0pRHkP0sXNpi8ZE6oiBwAp40DuA-qHAauGw37i3plZFxGt',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $panthers_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }

// End carolina-panthers




// Start chicago-bears
        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://bears.strmarketplace.com/WebServices/json/F0105C3/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'bears'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','bears')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'bears'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $bears_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : chicago-bears \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $bears_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }		
        }
        
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `bears_Display` = '0' And `key_place` = 'bears' limit 15");
        $bears_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `bears_Display`= '1' WHERE `id` = $row[0]");
                if($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $bears_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : chicago-bears \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $bears_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $bears_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : chicago-bears \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $bears_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $bears_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }

        }
        if( Strlen($bears_data1) != 0)
        {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993832965962465390/on1mFlSopFMkPI4Q6j-smaq6pBt2c5vxdLEk2rSlQp57a9mX4bl3gWcCt_lqk7mUsOQ0',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $bears_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End chicago-bears







// Start cincinnati-bengals

        $curl = curl_init();

        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://bengals.strmarketplace.com/WebServices/json/F00E299/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'bengals'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','bengals')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'bengals'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $bengals_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : cincinnati-bengals \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $bengals_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }	
        }
        
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `bengals_Display` = '0' And `key_place` = 'bengals' limit 15");
        $bengals_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `bengals_Display`= '1' WHERE `id` = $row[0]");
                if($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $bengals_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : cincinnati-bengals \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $bengals_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $bengals_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : cincinnati-bengals \n\n";
                                $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $bengals_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $bengals_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        
        }

        if( Strlen($bengals_data1) != 0)
        {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993836722897035324/ePcd4FT66_N-VZkhsJPie4OtedoFqCfAgO228zGyPdDEclUSaql0UjBM4lCbUOaXJ7ve',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $bengals_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }

// End cincinnati-bengals





// Start cleveland-browns

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://browns.strmarketplace.com/WebServices/json/F01A213/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'browns'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','browns')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'browns'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $browns_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : cleveland-browns \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $browns_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }	
        }
        
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `browns_Display` = '0' And `key_place` = 'browns' limit 15");
        $fbrowns_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `browns_Display`= '1' WHERE `id` = $row[0]");
                if($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $browns_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : cleveland-browns \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $browns_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $browns_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : cleveland-browns \n\n";
                                $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $browns_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $browns_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        }
        if( Strlen($browns_data1) != 0)
        {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993837348959830037/-Ra7_507GUa3jfz4y3qR65IitY-MjSE5DlQO0ITckJZoKE2mGfKQzVSBpL4k2do-kkub',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $browns_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }

// End cleveland-browns




// Start dallas-cowboys

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://cowboys.strmarketplace.com/WebServices/json/F02A006/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'cowboys'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','cowboys')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'cowboys'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $cowboys_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : dallas-cowboys \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $cowboys_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }	
        }
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `cowboys_Display` = '0' And `key_place` = 'cowboys' limit 15");
        $cowboys_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `cowboys_Display`= '1' WHERE `id` = $row[0]");
                if($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $cowboys_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $cowboys_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $cowboys_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : dallas-cowboys \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $cowboys_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $cowboys_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        
        }
        if( Strlen($cowboys_data1) != 0)
        {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993837724207435776/2rPQq5ejcxZad9zj_GyRMaXUVLgT2boVyp_YaeAb-I_gnalpzNnuF37Jl4GrcPgG__YE',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $cowboys_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }
        
// End dallas-cowboys




// Start houston-texans

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://texans.strmarketplace.com/WebServices/json/F00C352/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'texans'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','texans')");
                }	
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'texans'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $texans_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : houston-texans \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $texans_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }
        }

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `texans_Display` = '0' And `key_place` = 'texans' limit 15");
        $texans_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `texans_Display`= '1' WHERE `id` = $row[0]");
                if($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $texans_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : houston-texans \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $texans_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $texans_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : houston-texans \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $texans_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $texans_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        }
        if( Strlen($texans_data1) != 0)
        {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993838257441878036/lgCLN4os9dyiYSzjpz4antsIvEHBwqDsb9ZxuwzARTniGEriIKbUVEh8t3UIBOSHCZ7A',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $texans_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }

// End houston-texans




// Start las-vegas-raiders

        $curl = curl_init();

        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://raiders.strmarketplace.com/WebServices/json/F02E65F/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'raiders'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','raiders')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'raiders'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $raiders_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : las-vegas-raiders \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $raiders_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }		
        }

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `raiders_Display` = '0' And `key_place` = 'raiders' limit 15");
        $raiders_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `raiders_Display`= '1' WHERE `id` = $row[0]");
                if ($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $raiders_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : las-vegas-raiders \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $raiders_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $raiders_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : las-vegas-raiders \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $raiders_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $raiders_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
       
        }

        if( Strlen($raiders_data1) != 0)
        {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993838773513224262/KFhIV17Js0KONKtlL03e8s9vvE9JRxxfHAsejJGA_SFfwRXlpWs1OSpBAxOoRtFb-QM0',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $raiders_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End las-vegas-raiders





// Start minnesota-vikings

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://vikings.strmarketplace.com/WebServices/json/F0055F4/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'vikings'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','vikings')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'vikings'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $vikings_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : minnesota-vikings \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $vikings_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }	
        }
        
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `vikings_Display` = '0' And `key_place` = 'vikings' limit 15");
        $vikings_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `vikings_Display`= '1' WHERE `id` = $row[0]");
                if ($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $vikings_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : minnesota-vikings \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $vikings_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $vikings_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : minnesota-vikings \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $vikings_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $vikings_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        
        }
        if(Strlen($vikings_data1) != 0)
        {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993839146747564072/GTFV_nMn1gNYRN8ZnpueNzj655jFzquUqMOI1k9Z-4mMTQp63GoCUgcUswZwBeqFygqn',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $vikings_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }

// End minnesota-vikings




// Start new-york-giants

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://nygiants.strmarketplace.com/WebServices/json/F0182CB/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'nygiants'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','nygiants')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'nygiants'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $nygiants_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : new-york-giants \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $nygiants_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }		
        }



        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `giants_Display` = '0' And `key_place` = 'nygiants' limit 15");
        $nygiants_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `giants_Display`= '1' WHERE `id` = $row[0]");
                if ($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $nygiants_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : new-york-giants \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $nygiants_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $nygiants_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : new-york-giants \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $nygiants_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $nygiants_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        }
        if( Strlen($nygiants_data1) != 0)
        {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993839404844072980/A4lxVtP-rcLs-zesiG1ZC2wufbVTHk3Hju9mhE6AMVzcgKJE15QdPCmlsVUXtmIkAwMh',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $nygiants_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);

        }

// End new-york-giants





// Start new-york-jets

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://jets.strmarketplace.com/WebServices/json/F01F038/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'jets'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','jets')");
                }	
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'jets'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $jets_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : new-york-jets \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $jets_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }	
        }



        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `jets_Display` = '0' And `key_place` = 'jets' limit 15");
        $jets_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `jets_Display`= '1' WHERE `id` = $row[0]");
                if ($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $jets_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : new-york-jets \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $jets_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $jets_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : new-york-jets \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $jets_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $jets_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        }
        if( Strlen($jets_data1) != 0)
        {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993839723720216576/UzbXFhfJ6ntDSsALCbux7_ZkiWHQ3iA1W9SuY7UBmz8nUjA_U2QzQmmFvsQSpWU8BPhS',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $jets_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }
// End new-york-jets




// Start philadelphia-eagles

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://eagles.strmarketplace.com/WebServices/json/F01B1B4/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'eagles'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','eagles')");
                }	
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'eagles'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $eagles_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : philadelphia-eagles \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $eagles_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }	
        }
        
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `eagles_Display` = '0' And `key_place` = 'eagles' limit 15");
        $eagles_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `eagles_Display`= '1' WHERE `id` = $row[0]");
                if ($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $eagles_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : philadelphia-eagles \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $eagles_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $eagles_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : philadelphia-eagles \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $eagles_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $eagles_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        }
        if( Strlen($eagles_data1) != 0)
        {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993840155385405511/TfmvBfoxcuGLlDhjGIx4zoPQ_k6KaCVNtsrhing6JNWVCE9oqTYciDoOH60bOpbCtw0j',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $eagles_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }

// End philadelphia-eagles



// Start pittsburgh-steelers

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://steelers.strmarketplace.com/WebServices/json/F01732A/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'steelers'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);

                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','steelers')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'steelers'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $steelers_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : pittsburgh-steelers \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $steelers_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }	
        }
        
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `steelers_Display` = '0' And `key_place` = 'steelers' limit 15");
        $steelers_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `steelers_Display`= '1' WHERE `id` = $row[0]");
                if ($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $steelers_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : pittsburgh-steelers \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $steelers_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $steelers_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : pittsburgh-steelers \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $steelers_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $steelers_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        }

        if( Strlen($steelers_data1) != 0)
        {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993840396549492866/OSOU-cNNNqLsVJdCs54lNfe71awBuElPzWm6fDPMXMt6esCL9VIm6PameKLNIi2Fgwko',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $steelers_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }
 // End pittsburgh-steelers





// Start san-francisco-49ers

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://sfgiants.strmarketplace.com/WebServices/json/F0134A6/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'francisco'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);

                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','francisco')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'francisco'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $francisco_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : san-francisco-49ers \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $francisco_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }	
        }
        
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ers_Display` = '0' And `key_place` = 'francisco' limit 15");
        $sfgiants_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `ers_Display`= '1' WHERE `id` = $row[0]");
                if ($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $sfgiants_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : san-francisco-49ers \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $sfgiants_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $sfgiants_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : san-francisco-49ers \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $sfgiants_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $sfgiants_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
        }

        if(Strlen($sfgiants_data1) != 0)
        {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993840599587364895/s5_PeCOUwPBJzuWaA1u3hYwthIzB7xkbdHTOowmjZznzr4-8qqx0IhtVwCFHYrGnhN0Y',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $sfgiants_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);
                curl_close($curl);
        }
        
// End san-francisco-49ers




// Start seattle-seahawks

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://seahawks.strmarketplace.com/WebServices/json/F021F1B/data.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                                'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
                ),
                CURLOPT_FAILONERROR =>true,
                
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response  = json_decode($response);

        foreach($response as $val)
        {
                $mysql_run = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'seahawks'");
                $assoc = mysqli_fetch_all($mysql_run);
                $result = mysqli_num_rows($mysql_run);
                if($result == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','seahawks')");
                }
                else
                {
                        if($assoc[0][8] != $val->Price)
                        {
                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                if(mysqli_num_rows($mysql_run) == 0)
                                {
                                        
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND  `PPS` = '$val->PPS' AND `key_place` = 'seahawks'");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                        $assoc1 = mysqli_fetch_all($mysql_run);
                                        $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                }
                                else
                                {
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' ORDER BY `id` DESC LIMIT 1");
                                        $assoc = mysqli_fetch_all($mysql_run);
                                        $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
                                        $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID' and `Price` = '$val->Price'");
                                        if(mysqli_num_rows($mysql_run) == 0)
                                        {
                                                $mysql = mysqli_query($conn,"INSERT INTO `levisstadium_price`(`ListingID`, `Price`, `percent`) VALUES ('$val->ListingID','$val->Price','$per')");
                                        }
                                }

                                $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `levisstadium` WHERE `ListingID` = '$val->ListingID'");
                                $row1 = mysqli_fetch_all($mysql_run1);

                                $mysql_run = mysqli_query($conn,"SELECT *  FROM `levisstadium_price` WHERE `ListingID` = '$val->ListingID'");
                                $row = mysqli_fetch_all($mysql_run);
                                $num = mysqli_num_rows($mysql_run);
                                if($num != 0)
                                {
                                        $pric .=  "$".$row1[0][8];
                                        for($i=0; $i<$num; $i++)
                                        {
                                                if($num-1 != $i)
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
                                                }
                                                else
                                                {
                                                        $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
                                                }
                                                
                                               
                                        }
                                }
                                $seahawks_data = "Listing #: ".$val->ListingID."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : seattle-seahawks \n\n";

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => array('content' => $seahawks_data),
                                        CURLOPT_HTTPHEADER => array(
                                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                        ),
                                ));
                                $response = curl_exec($curl);
                                curl_close($curl); 
                        }
                }	
        }
        
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `seahawks_Display` = '0' And `key_place` = 'seahawks' limit 15");
        $seahawks_data1 = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `levisstadium` SET `seahawks_Display`= '1' WHERE `id` = $row[0]");
                if ($row[4] == 1 || $row[4] == 'A' || $row[4] == 'AA' || $row[4] == 'a' || $row[4] == 'aa')
                {
                        $seahawks_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : seattle-seahawks \n\n";
                                $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940044447170633/WNGZVFlYZ6AvN5qluVTCtRsXyLFj4fYAure7F-YD29vd47j4ppWTCnBge47hDxwdMTn5',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $seahawks_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($row[4] == 2 || $row[4] == 3 || $row[4] == 4 || $row[4] == 5 || $row[4] == 'b' || $row[4] == 'bb' || $row[4] == 'B' || $row[4] == 'BB' || $row[4] == 'c' || $row[4] == 'cc' || $row[4] == 'CC' || $row[4] == 'C' || $row[4] == 'd' || $row[4] == 'dd' || $row[4] == 'DD' || $row[4] == 'D' || $row[4] == 'e' || $row[4] == 'ee' || $row[4] == 'EE' || $row[4] == 'E')
                {
                        $seahawks_data3 = "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n Channel Name : seattle-seahawks \n\n";
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://discord.com/api/webhooks/1011940556462637126/UtBWm2l1zLjOY3pNZxIXidqRoQBdgMeDl5Sn90xYRYKr7nUwHwPfTc5mmQqOHBBOxR5_',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('content' =>  $seahawks_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $sfgiants_data1 .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
                }
       
        }

        if( Strlen($seahawks_data1) != 0)
        {

                $curl = curl_init();
                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993841319606747196/WHcs-2WAl5eEuq2BkcHU3w6zezegjQskypvUjwjD081O9NtJTyyILLsN5cWl6MS-uxwe',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $seahawks_data1),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End seattle-seahawks



// // // Start la-chargers-la-rams

// // $curl = curl_init();

// // curl_setopt_array($curl, array(
// //         CURLOPT_URL => 'https://seahawks.strmarketplace.com/WebServices/json/F021F1B/data.json',
// //         CURLOPT_RETURNTRANSFER => true,
// //         CURLOPT_ENCODING => '',
// //         CURLOPT_MAXREDIRS => 10,
// //         CURLOPT_TIMEOUT => 0,
// //         CURLOPT_FOLLOWLOCATION => true,
// //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// //         CURLOPT_CUSTOMREQUEST => 'GET',
// //         CURLOPT_HTTPHEADER => array(
// //                         'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
// //         ),
// //         CURLOPT_FAILONERROR =>true,
        
// // ));

// // $response = curl_exec($curl);

// // curl_close($curl);

// // $response  = json_decode($response);

// // foreach($response as $val)
// // {
// //         $mysql_run = mysqli_query($conn,"SELECT count(*) as `total` FROM `levisstadium` WHERE `ListingID` = '$val->ListingID' AND `Area` = '$val->Area' AND `Section` = '$val->Section' AND `Row` = '$val->Row' AND `Seats` = '$val->Seats' AND `Quantity` = '$val->Quantity' AND `PPS` = '$val->PPS' AND `key_place` = 'seahawks'");
// //         $assoc = mysqli_fetch_all($mysql_run, MYSQLI_ASSOC);
// //         $result = array_column($assoc, 'total');

// //         if($result[0] == 0)
// //         {
// //                 $mysql = mysqli_query($conn,"INSERT INTO `levisstadium`(`ListingID`, `Area`, `Section`, `Row`, `Seats`, `Quantity`, `PPS`, `Price`, `key_place`) VALUES ('$val->ListingID','$val->Area','$val->Section','$val->Row','$val->Seats','$val->Quantity','$val->PPS','$val->Price','seahawks')");
// //         }	
// // }



// // $mysql_run1 = mysqli_query($conn,"SELECT * FROM `levisstadium` WHERE `seahawks_Display` = '0' And `key_place` = 'seahawks' limit 15");
// // $falcons_data = "";

// // while ($row = mysqli_fetch_array($mysql_run1))
// // { 
// //         mysqli_query($conn,"UPDATE `levisstadium` SET `seahawks_Display`= '1' WHERE `id` = $row[0]");
// //         $falcons_data .= "Listing #: ".$row[1]."\n Area : ".$row[2]."\n Section : ".$row[3]."\n Row : ".$row[4]."\n Seats : ".$row[5]."\n Quantity : ".$row[6]."\n PPS : ".$row[7]."\n Price : ".$row[8]."\n\n";
// // }
// // if( Strlen($falcons_data) != 0)
// // {

// //         $curl = curl_init();

// //         curl_setopt_array($curl, array(
// //                 CURLOPT_URL => 'https://discord.com/api/webhooks/993841319606747196/WHcs-2WAl5eEuq2BkcHU3w6zezegjQskypvUjwjD081O9NtJTyyILLsN5cWl6MS-uxwe',
// //                 CURLOPT_RETURNTRANSFER => true,
// //                 CURLOPT_ENCODING => '',
// //                 CURLOPT_MAXREDIRS => 10,
// //                 CURLOPT_TIMEOUT => 0,
// //                 CURLOPT_FOLLOWLOCATION => true,
// //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// //                 CURLOPT_CUSTOMREQUEST => 'POST',
// //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
// //                 CURLOPT_HTTPHEADER => array(
// //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
// //                 ),
// //         ));

// //         $response = curl_exec($curl);

// //         curl_close($curl);
// // }

// // // End la-chargers-la-rams