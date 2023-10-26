
<?php  
        
        $today = date("d/m/Y h:i:sa");
        $dbhost = "localhost";
        $dbuser = "varistats";
        $dbpass = "testMe#1234R";
        $db = "varistats";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
        include ('conn.php');

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://165.22.215.103:1000/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
                ),
        ));
        $response = curl_exec($curl);
        
        $res ="";
        $i=0;
        while(Strlen( $response) != 0)
        {
                
                $total_length = Strlen( $response);
                $string_length = strpos($response, '\n')+2;
                $response1 = substr($response, $string_length, $total_length);
                $string_length2 = strpos($response1, '\n');
                $response2 = substr($response, $string_length, $string_length2);
                $response3 = substr($response, $string_length2, $total_length);

                $response2 = strip_tags($response2);

                $total_length1 = Strlen( $response3);
                $string_length4 = strpos($response3, '\n')+2;
                $response5 = substr($response3, $string_length4, $total_length1);
                $string_length6 = strpos($response5, '\n');
                $response6 = substr($response5, 0, $string_length6);

                $response6 = strip_tags($response6);

                $total_length2 = Strlen( $response5);
                $string_length7 = strpos($response5, '\n')+2;
                $response7 = substr($response5, $string_length7, $total_length2);
                $string_length8 = strpos($response7, '\n');
                $response8 = substr($response7, 0, $string_length8);

                $response8 = strip_tags($response8);

                $total_length3 = Strlen( $response7);
                $string_length9 = strpos($response7, '\n')+2;
                $response9 = substr($response7, $string_length9, $total_length3);
                $string_length10 = strpos($response9, '\n');
                $response10 = substr($response9, 0, $string_length10);

                $response10 = strip_tags($response10);

                $total_length4 = Strlen( $response9);
                $string_length11 = strpos($response9, '\n')+2;
                $response11 = substr($response9, $string_length11, $total_length4);
                $string_length12 = strpos($response11, '\n');
                $response12 = substr($response11, 0, $string_length12);

                $response12 = strip_tags($response12);

                $total_length5 = Strlen( $response11);
                $string_length12 = strpos($response11, '\n')+2;
                $response13 = substr($response11, $string_length12, $total_length5);
                $string_length13 = strpos($response13, '\n');
                $response14 = substr($response13, 0, $string_length13);

                $response14 = strip_tags($response14);

                $total_length6 = Strlen( $response13);
                $string_length14 = strpos($response13, '\n')+2;
                $response17 = substr($response13, $string_length14, $total_length6);
                $string_length14 = strpos($response17, '\n');
                $response15 = substr($response17, 0, $string_length14);

                $string_length14 = $string_length14+7;
                $response16 = substr($response17, $string_length14, $total_length6);

                // echo "INSERT INTO `pslsource`(`no`, `name`, `no1`, `seat`, `price`, `price1`) VALUES ('$response2','$response6','$response8','$response10','$response12','$response14')";
                // die;
                // echo "SELECT count(*) as `total` FROM `pslsource` WHERE `no` = '$response2' AND `name` = '$response6' AND `no1` = '$response8' AND `seat` = '$response10'";
                
                $mysql_run = mysqli_query($conn,"SELECT count(*) as `total` FROM `pslsource` WHERE `no` = '$response2' AND `name` = '$response6' AND `no1` = '$response8' AND `seat` = '$response10'");
                $assoc = mysqli_fetch_all($mysql_run, MYSQLI_ASSOC);
                $result = array_column($assoc, 'total');
                // print_r($result);
                if($result[0] == 0)
                {
                        $mysql = mysqli_query($conn,"INSERT INTO `pslsource`(`no`, `name`, `no1`, `seat`, `price`, `price1`) VALUES ('$response2','$response6','$response8','$response10','$response12','$response14')");
                }	
                $response = $response16;   
                // echo "test1";
        }
    
        // echo "test2";
   

// Start atlanta-falcons

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `falcons_display` = '0' and `name` Like '%ATL%' limit 10");
        $falcons_data = "";
        
        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `falcons_display`= '1' WHERE `id` = $row[0]");
                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);

                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $falcons_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : atlanta-falcons \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {     
                        $falcons_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : atlanta-falcons \n\n";
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
                        $falcons_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                } 
        }

        if(Strlen($falcons_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $falcons_data),
                        CURLOPT_HTTPHEADER => array(
                                        'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }

//  End atlanta-falcons







 // Start baltimore-ravens
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `ravens_display` = '0' and `name` Like '%BAL%' limit 10");
        $ravens_data = "";
    
        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `ravens_display`= '1' WHERE `id` = $row[0]");
        
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        
                        $ravens_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : baltimore-ravens \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {   
                        $ravens_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : baltimore-ravens \n\n";
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
                        $ravens_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                } 
        }
    
        if( Strlen($ravens_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $ravens_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
        }
// End baltimore-ravens







// Start carolina-panthers
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `panthers_display` = '0' and `name` Like '%CAR%' limit 10");
        $panthers_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `panthers_display`= '1' WHERE `id` = $row[0]");

                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $panthers_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : carolina-panthers \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $panthers_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : carolina-panthers \n\n";
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
                        $panthers_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                } 
        }

        if( Strlen($panthers_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $panthers_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End carolina-panthers




// Start chicago-bears
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `bears_display` = '0' and `name` Like '%CHI%' limit 10");
        $bears_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `bears_display`= '1' WHERE `id` = $row[0]");
               
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $bears_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : chicago-bears \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $bears_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : chicago-bears \n\n";
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
                        $bears_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                }
        }

        if( Strlen($bears_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $bears_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End chicago-bears







// Start cincinnati-bengals

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `bengals_display` = '0' and `name` Like '%CIN%' limit 10");
        $bengals_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `bengals_display`= '1' WHERE `id` = $row[0]");
                               
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $bengals_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : cincinnati-bengals \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $bengals_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : cincinnati-bengals \n\n";
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
                        $bengals_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                }
        }
        if( Strlen($bengals_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $bengals_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }

// End cincinnati-bengals





// Start cleveland-browns

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `browns_display` = '0' and `name` Like '%CLE%' limit 10");
        $browns_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `browns_display`= '1' WHERE `id` = $row[0]");
                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $browns_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : cleveland-browns \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                { 
                        $browns_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : cleveland-browns \n\n";
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
                        $browns_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                }
        }

        if( Strlen($browns_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $browns_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
        }

// End cleveland-browns




// Start dallas-cowboys

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `cowboys_display` = '0' and `name` Like '%DAL%' limit 10");
        $cowboys_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `cowboys_display`= '1' WHERE `id` = $row[0]");
                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $cowboys_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : dallas-cowboys \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {   
                        $cowboys_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : dallas-cowboys \n\n";
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
                        $cowboys_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                }
        }

        if( Strlen($cowboys_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $cowboys_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End dallas-cowboys




// Start houston-texans

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `texans_display` = '0' and `name` Like '%HOU%'  limit 10");
        $texans_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `texans_display`= '1' WHERE `id` = $row[0]");
                                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $texans_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : houston-texans \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $texans_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : houston-texans \n\n";
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
                        $texans_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                }
        }

        if( Strlen($texans_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $texans_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End houston-texans




// Start las-vegas-raiders

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `raiders_display` = '0' and `name` Like '%LVR%' limit 10");
        $raiders_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `raiders_display`= '1' WHERE `id` = $row[0]");
                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $raiders_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : las-vegas-raiders \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $raiders_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : las-vegas-raiders \n\n";
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
                        $raiders_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                }
        }

        if( Strlen($raiders_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $raiders_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End las-vegas-raiders





// Start minnesota-vikings

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `vikings_display` = '0' and `name` Like '%MIN%' limit 10");
        $vikings_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `vikings_display`= '1' WHERE `id` = $row[0]");
                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $vikings_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : minnesota-vikings \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $vikings_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
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
                        $vikings_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : minnesota-vikings \n\n";
                }
        }

        if( Strlen($vikings_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $vikings_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End minnesota-vikings




// Start new-york-giants

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `giants_display` = '0' and `name` Like '%NYG%' limit 10");
        $giants_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `giants_display`= '1' WHERE `id` = $row[0]");
                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $giants_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : new-york-giants \n\n";
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
                                CURLOPT_POSTFIELDS => array('content' =>  $giants_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $giants_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : new-york-giants \n\n";
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
                                CURLOPT_POSTFIELDS => array('content' =>  $giants_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $giants_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                }
        }

        if( Strlen($giants_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $giants_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End new-york-giants





// Start new-york-jets

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `jets_display` = '0' and `name` Like '%NYJ%' limit 10");
        $jets_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `jets_display`= '1' WHERE `id` = $row[0]");
                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $jets_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : new-york-jets \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $jets_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
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
                        $jets_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : new-york-jets \n\n";
                }
        }

        if( Strlen($jets_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $jets_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End new-york-jets



// Start philadelphia-eagles

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `eagles_display` = '0' and `name` Like '%PHI%' limit 10");
        $eagles_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `eagles_display`= '1' WHERE `id` = $row[0]");
                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $eagles_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : philadelphia-eagles \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $eagles_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
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
                        $eagles_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : philadelphia-eagles \n\n";
                }
        }

        if( Strlen($eagles_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $eagles_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End philadelphia-eagles



// Start pittsburgh-steelers

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `steelers_display` = '0' and `name` Like '%PIT%' limit 10");
        $steelers_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `steelers_display`= '1' WHERE `id` = $row[0]");
                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $steelers_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : pittsburgh-steelers \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $steelers_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : pittsburgh-steelers \n\n";
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
                        $steelers_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                }
        }

        if( Strlen($steelers_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $steelers_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End pittsburgh-steelers



// Start san-francisco-49ers
        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `ers_display` = '0' and `name` Like '%SF%' limit 10");
        $ers_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `ers_display`= '1' WHERE `id` = $row[0]");
                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $ers_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : san-francisco-49ers \n\n";
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
                                CURLOPT_POSTFIELDS => array('content' =>  $ers_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $ers_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : san-francisco-49ers \n\n";
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
                                CURLOPT_POSTFIELDS => array('content' =>  $ers_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $ers_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                }
        }
        if( Strlen($ers_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $ers_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End san-francisco-49ers




// Start seattle-seahawks

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `seahawks_display` = '0' and `name` Like '%SEA%' limit 10");
        $seahawks_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `seahawks_display`= '1' WHERE `id` = $row[0]");
               
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $seahawks_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : seattle-seahawks \n\n";
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
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                                        $seahawks_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : seattle-seahawks \n\n";
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
                        $seahawks_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                }
        }

        if( Strlen($seahawks_data) != 0)
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
                        CURLOPT_POSTFIELDS => array('content' => $seahawks_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End seattle-seahawks     




// Start la-chargers-la-rams

        $mysql_run1 = mysqli_query($conn,"SELECT * FROM `pslsource` WHERE `rams_display` = '0' and (`name` Like '%LAR%' or `name` Like '%LAC%') limit 10");
        $rams_data = "";

        while ($row = mysqli_fetch_array($mysql_run1))
        { 
                mysqli_query($conn,"UPDATE `pslsource` SET `rams_display`= '1' WHERE `id` = $row[0]");
                
                $total_length_string = strlen($row[4]);
                $string_length_first = strpos($row[4], '/')+1;
                $response_first = substr($row[4], $string_length_first, $total_length_string);
                $string_length_second = strpos($response_first, '/');
                $Row = substr($response_first, 0, $string_length_second);
                $response_second = substr($response_first, 0, $total_length_string);
                $string_length_third = strpos($response_second, '/')+1;
                $seat = substr($response_second, $string_length_third, $total_length_string);
        
                if($Row == 1 || $Row == 'a' || $Row == 'A')
                {
                        $rams_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : la-chargers-la-rams \n\n";
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
                                CURLOPT_POSTFIELDS => array('content' =>  $rams_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else if($Row == 2 || $Row == 3 || $Row == 4 || $Row == 5  || $Row == 'b' || $Row == 'B' || $Row == 'c' || $Row == 'C' || $Row == 'd' || $Row == 'D' || $Row == 'e' || $Row == 'E')
                {
                        $rams_data3 = "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n channels Name : la-chargers-la-rams \n\n";
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
                                CURLOPT_POSTFIELDS => array('content' =>  $rams_data3),
                                CURLOPT_HTTPHEADER => array(
                                                'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                                ),
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                }
                else
                {
                        $rams_data .= "Listing #: ".$row[1]."\n Team : ".$row[2]."\n Quantity : ".$row[3]."\n Location : ".$row[4]."\n Asking : ".$row[5]."\n Per Seat : ".$row[6]."\n\n";
                }
        }

        if( Strlen($rams_data) != 0)
        {
                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://discord.com/api/webhooks/993841615439409184/MzoYJpJAcDyxsUTIP8oplII4Oj-gF7_YdYzbHhDpDotlfF43YMOI0bo3DA7PYxXaG3Sk',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('content' => $rams_data),
                        CURLOPT_HTTPHEADER => array(
                                'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
                        ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        }

// End la-chargers-la-rams




