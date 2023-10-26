<?php
    date_default_timezone_set('America/New_York');

    $today = date("d/m/Y");

    $dbhost = "localhost";
    $dbuser = "varistats";
    $dbpass = "testMe#1234R";
    $db = "varistats";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
    $s=0;
    ini_set('max_execution_time', 0);



// Start atlanta-falcons

    $curl = curl_init();
    curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://atlanta.craigslist.org/search/sss?query=falcon',
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
    
    echo $response = curl_exec($curl);
    $position_total = strpos($response, 'totalcount')+12;
    $response_total = substr($response, $position_total,10);
    $loop_count = (int)$response_total/120;
    $loop_count = ceil($loop_count);
    $s=0;

    for($i1=1; $i1<=$loop_count; $i1++)
    {
        if($i1==1)
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://atlanta.craigslist.org/search/sss?query=falcons',
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
            curl_close($curl);
        }
        else
        {
           // echo $s;
            $s += 120;                                      
            $url = 'https://atlanta.craigslist.org/search/sss?query=falcons&s='.$s;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
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

            curl_close($curl);
        }

        $string_length = strlen($response);

        $position = strpos($response, 'class="result-row"')-4;
        $response = substr($response, $position, $string_length);
        $string_length = strpos($response, '</ul>');
        $total_data = substr($response, 0, $string_length);
        
        $total_loop = substr_count( $total_data, 'result-row' );

        for($i=1; $i<=$total_loop; $i++)
        {
            $string_length = strpos($response, '</li>') + 5;
            $response1 = substr($response, 0, $string_length);
            
            $response2 = substr($response, $string_length);

            $start_data_length = strpos($response1, 'd="') + 3;
            $get_some_data = substr($response1, $start_data_length, 10);
            
            $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
            $response3 = substr($response, $demo_data_length);
            $demo2_data_length = strpos( $response3, '</a>');
            $response4 = substr($response1, $demo_data_length,$demo2_data_length);

            $demo3_data_length = strpos( $response3, '</span>');
            $response5 = substr($response3, 0,$demo3_data_length);
            $demo4_data_length = strpos( $response5, 'e">')+3;
            $response10 = substr($response5, $demo4_data_length);

            $demo5_data_length = strpos( $response3, '</span>')+6;
            $response6 = substr($response3, $demo5_data_length);
            $demo6_data_length = strpos( $response6, '</span>');
            $response8 = substr($response6, 0,$demo6_data_length);
            $demo7_data_length = strpos( $response6, '">')+3;
            $response9 = substr($response8, $demo7_data_length);

            $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'falcons'");

            $assoc = mysqli_fetch_all($mysql_run);
            $result = mysqli_num_rows($mysql_run);

            if($result == 0)
            {
                    $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'falcons')");
            }
            // else
            // {

            //     if($assoc[0][2] != $val->Price)
            //     {


            //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
            //         if(mysqli_num_rows($mysql_run) == 0)
            //         {
            //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
            //                 $assoc = mysqli_fetch_all($mysql_run);
            //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

            //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
            //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
            //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
            //         }
            //         else
            //         {
            //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
            //                 $assoc = mysqli_fetch_all($mysql_run);
            //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
            //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
            //                 if(mysqli_num_rows($mysql_run) == 0)
            //                 {
            //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
            //                 }
            //         }

            //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
            //         $row1 = mysqli_fetch_all($mysql_run1);

            //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
            //         $row = mysqli_fetch_all($mysql_run);
            //         $num = mysqli_num_rows($mysql_run);
            //         if($num != 0)
            //         {
            //                 $pric .=  "$".$row1[0][8];
            //                 for($i=0; $i<$num; $i++)
            //                 {
            //                         if($num-1 != $i)
            //                         {
            //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
            //                         }
            //                         else
            //                         {
            //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
            //                         }
                                    
                                    
            //                 }
            //         }
            //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

            //         $curl = curl_init();
            //         curl_setopt_array($curl, array(
            //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
            //                 CURLOPT_RETURNTRANSFER => true,
            //                 CURLOPT_ENCODING => '',
            //                 CURLOPT_MAXREDIRS => 10,
            //                 CURLOPT_TIMEOUT => 0,
            //                 CURLOPT_FOLLOWLOCATION => true,
            //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //                 CURLOPT_CUSTOMREQUEST => 'POST',
            //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
            //                 CURLOPT_HTTPHEADER => array(
            //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
            //                 ),
            //         ));
            //         $response = curl_exec($curl);
            //         curl_close($curl);

                    // }

            //     }
        
        }
    }

    $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'falcons' Limit 10");

    $data = "";

    while ($row = mysqli_fetch_array($mysql_run1))
    { 
        $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
        $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
    }

    if( Strlen($data) != 0)
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
            CURLOPT_POSTFIELDS => array('content' => $data),
            CURLOPT_HTTPHEADER => array(
                    'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
    }

// End atlanta-falcons



// // Start baltimore-ravens

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://baltimore.craigslist.org/search/sss?query=ravens',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));

//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://baltimore.craigslist.org/search/sss?query=ravens',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//             //echo $s;
//             $s += 120;                                      
//             $url = 'https://baltimore.craigslist.org/search/sss?query=ravens&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }

//         $string_length = strlen($response);

//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
//         $total_loop = substr_count( $total_data, 'result-row' );

//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
            
//             $response2 = substr($response, $string_length);

//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
            
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);

//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);

//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);

//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'ravens'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'ravens')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
        
//         }
//     }

//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'ravens' Limit 10");

//     $data = "";

//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/978604076080168980/iuYTMPrR5HQ-vXLaaeXbW3wwNyBSiBIQuDLxWPe0h2F8BdfTsyf8dcS4Pq6a-IY_Eit7',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

// // End baltimore-ravens



// // Start carolina-panthers

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://charlotte.craigslist.org/search/sss?query=carolina+panthers',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));

//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://charlotte.craigslist.org/search/sss?query=carolina+panthers',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//             //echo $s;
//             $s += 120;                                      
//             $url = 'https://charlotte.craigslist.org/search/sss?query=carolina+panthers&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }

//         $string_length = strlen($response);

//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
//         $total_loop = substr_count( $total_data, 'result-row' );

//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
            
//             $response2 = substr($response, $string_length);

//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
            
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);

//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);

//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);

//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'carolina+panthers'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'carolina+panthers')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
        
//         }
//     }

//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'carolina+panthers' Limit 10");

//     $data = "";

//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993832255132815391/1NOEp5pL4TedX0TSevOzmd0pRHkP0sXNpi8ZE6oiBwAp40DuA-qHAauGw37i3plZFxGt',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

// // End carolina-panthers




// // Start chicago-bears

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://chicago.craigslist.org/search/sss?query=chicago+bears',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));

//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://chicago.craigslist.org/search/sss?query=chicago+bears',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//             //echo $s;
//             $s += 120;                                      
//             $url = 'https://chicago.craigslist.org/search/sss?query=chicago+bears&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }

//         $string_length = strlen($response);

//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
//         $total_loop = substr_count( $total_data, 'result-row' );

//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
            
//             $response2 = substr($response, $string_length);

//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
            
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);

//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);

//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);

//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'chicago+bears'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'chicago+bears')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
        
//         }
//     }

//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'chicago+bears' Limit 10");

//     $data = "";

//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993836722897035324/ePcd4FT66_N-VZkhsJPie4OtedoFqCfAgO228zGyPdDEclUSaql0UjBM4lCbUOaXJ7ve',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

// // End chicago-bears



// // Start cincinnati-bengals

// $curl = curl_init();
// curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://cincinnati.craigslist.org/search/sss?query=bengals',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'GET',
//         CURLOPT_HTTPHEADER => array(
//                 'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//         ),
//         CURLOPT_FAILONERROR =>true,
        
// ));

// $response = curl_exec($curl);

// $position_total = strpos($response, 'totalcount')+12;
// $response_total = substr($response, $position_total,10);
// $loop_count = (int)$response_total/120;
// $loop_count = ceil($loop_count);
// $s=0;

// for($i1=1; $i1<=$loop_count; $i1++)
// {
//     if($i1==1)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://cincinnati.craigslist.org/search/sss?query=bengals',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//             'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//             ),
//         ));
//         $response = curl_exec($curl);
//         curl_close($curl);
//     }
//     else
//     {
//        // echo $s;
//         $s += 120;                                      
//         $url = 'https://cincinnati.craigslist.org/search/sss?query=bengals&s='.$s;
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => $url,
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//             'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

//     $string_length = strlen($response);

//     $position = strpos($response, 'class="result-row"')-4;
//     $response = substr($response, $position, $string_length);
//     $string_length = strpos($response, '</ul>');
//     $total_data = substr($response, 0, $string_length);
    
//     $total_loop = substr_count( $total_data, 'result-row' );

//     for($i=1; $i<=$total_loop; $i++)
//     {
//         $string_length = strpos($response, '</li>') + 5;
//         $response1 = substr($response, 0, $string_length);
        
//         $response2 = substr($response, $string_length);

//         $start_data_length = strpos($response1, 'd="') + 3;
//         $get_some_data = substr($response1, $start_data_length, 10);
        
//         $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//         $response3 = substr($response, $demo_data_length);
//         $demo2_data_length = strpos( $response3, '</a>');
//         $response4 = substr($response1, $demo_data_length,$demo2_data_length);

//         $demo3_data_length = strpos( $response3, '</span>');
//         $response5 = substr($response3, 0,$demo3_data_length);
//         $demo4_data_length = strpos( $response5, 'e">')+3;
//         $response10 = substr($response5, $demo4_data_length);

//         $demo5_data_length = strpos( $response3, '</span>')+6;
//         $response6 = substr($response3, $demo5_data_length);
//         $demo6_data_length = strpos( $response6, '</span>');
//         $response8 = substr($response6, 0,$demo6_data_length);
//         $demo7_data_length = strpos( $response6, '">')+3;
//         $response9 = substr($response8, $demo7_data_length);

//         $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'bengals'");

//         $assoc = mysqli_fetch_all($mysql_run);
//         $result = mysqli_num_rows($mysql_run);

//         if($result == 0)
//         {
//                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'bengals')");
//         }
//         // else
//         // {

//         //     if($assoc[0][2] != $val->Price)
//         //     {


//         //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//         //         if(mysqli_num_rows($mysql_run) == 0)
//         //         {
//         //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//         //                 $assoc = mysqli_fetch_all($mysql_run);
//         //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//         //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//         //                 $assoc1 = mysqli_fetch_all($mysql_run);
                        
//         //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//         //         }
//         //         else
//         //         {
//         //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//         //                 $assoc = mysqli_fetch_all($mysql_run);
//         //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//         //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//         //                 if(mysqli_num_rows($mysql_run) == 0)
//         //                 {
//         //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//         //                 }
//         //         }

//         //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//         //         $row1 = mysqli_fetch_all($mysql_run1);

//         //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//         //         $row = mysqli_fetch_all($mysql_run);
//         //         $num = mysqli_num_rows($mysql_run);
//         //         if($num != 0)
//         //         {
//         //                 $pric .=  "$".$row1[0][8];
//         //                 for($i=0; $i<$num; $i++)
//         //                 {
//         //                         if($num-1 != $i)
//         //                         {
//         //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//         //                         }
//         //                         else
//         //                         {
//         //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//         //                         }
                                
                                
//         //                 }
//         //         }
//         //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//         //         $curl = curl_init();
//         //         curl_setopt_array($curl, array(
//         //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//         //                 CURLOPT_RETURNTRANSFER => true,
//         //                 CURLOPT_ENCODING => '',
//         //                 CURLOPT_MAXREDIRS => 10,
//         //                 CURLOPT_TIMEOUT => 0,
//         //                 CURLOPT_FOLLOWLOCATION => true,
//         //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         //                 CURLOPT_CUSTOMREQUEST => 'POST',
//         //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//         //                 CURLOPT_HTTPHEADER => array(
//         //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//         //                 ),
//         //         ));
//         //         $response = curl_exec($curl);
//         //         curl_close($curl);

//                 // }

//         //     }
    
//     }
// }

// $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'bengals' Limit 10");

// $data = "";

// while ($row = mysqli_fetch_array($mysql_run1))
// { 
//     $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//     $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
// }

// if( Strlen($data) != 0)
// {
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://discord.com/api/webhooks/993836722897035324/ePcd4FT66_N-VZkhsJPie4OtedoFqCfAgO228zGyPdDEclUSaql0UjBM4lCbUOaXJ7ve',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS => array('content' => $data),
//         CURLOPT_HTTPHEADER => array(
//                 'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//         ),
//     ));

//     $response = curl_exec($curl);

//     curl_close($curl);
// }

// // End cincinnati-bengals





// // Start cleveland-browns

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://cleveland.craigslist.org/search/sss?query=browns',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));

//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://cleveland.craigslist.org/search/sss?query=browns',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//            // echo $s;
//             $s += 120;                                      
//             $url = 'https://cleveland.craigslist.org/search/sss?query=browns&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }

//         $string_length = strlen($response);

//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
//         $total_loop = substr_count( $total_data, 'result-row' );

//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
            
//             $response2 = substr($response, $string_length);

//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
            
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);

//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);

//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);

//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'browns'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'browns')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
        
//         }
//     }

//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'browns' Limit 10");

//     $data = "";

//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993837348959830037/-Ra7_507GUa3jfz4y3qR65IitY-MjSE5DlQO0ITckJZoKE2mGfKQzVSBpL4k2do-kkub',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

// // End cleveland-browns




// // Start dallas-cowboys

// $curl = curl_init();
// curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://dallas.craigslist.org/search/sss?query=cowboys',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'GET',
//         CURLOPT_HTTPHEADER => array(
//                 'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//         ),
//         CURLOPT_FAILONERROR =>true,
        
// ));

// $response = curl_exec($curl);

// $position_total = strpos($response, 'totalcount')+12;
// $response_total = substr($response, $position_total,10);
// $loop_count = (int)$response_total/120;
// $loop_count = ceil($loop_count);
// $s=0;

// for($i1=1; $i1<=$loop_count; $i1++)
// {
//     if($i1==1)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://dallas.craigslist.org/search/sss?query=cowboys',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//             'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//             ),
//         ));
//         $response = curl_exec($curl);
//         curl_close($curl);
//     }
//     else
//     {
//        // echo $s;
//         $s += 120;                                      
//         $url = 'https://dallas.craigslist.org/search/sss?query=cowboys&s='.$s;
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => $url,
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//             'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

//     $string_length = strlen($response);

//     $position = strpos($response, 'class="result-row"')-4;
//     $response = substr($response, $position, $string_length);
//     $string_length = strpos($response, '</ul>');
//     $total_data = substr($response, 0, $string_length);
    
//     $total_loop = substr_count( $total_data, 'result-row' );

//     for($i=1; $i<=$total_loop; $i++)
//     {
//         $string_length = strpos($response, '</li>') + 5;
//         $response1 = substr($response, 0, $string_length);
        
//         $response2 = substr($response, $string_length);

//         $start_data_length = strpos($response1, 'd="') + 3;
//         $get_some_data = substr($response1, $start_data_length, 10);
        
//         $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//         $response3 = substr($response, $demo_data_length);
//         $demo2_data_length = strpos( $response3, '</a>');
//         $response4 = substr($response1, $demo_data_length,$demo2_data_length);

//         $demo3_data_length = strpos( $response3, '</span>');
//         $response5 = substr($response3, 0,$demo3_data_length);
//         $demo4_data_length = strpos( $response5, 'e">')+3;
//         $response10 = substr($response5, $demo4_data_length);

//         $demo5_data_length = strpos( $response3, '</span>')+6;
//         $response6 = substr($response3, $demo5_data_length);
//         $demo6_data_length = strpos( $response6, '</span>');
//         $response8 = substr($response6, 0,$demo6_data_length);
//         $demo7_data_length = strpos( $response6, '">')+3;
//         $response9 = substr($response8, $demo7_data_length);

//         $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'cowboys'");

//         $assoc = mysqli_fetch_all($mysql_run);
//         $result = mysqli_num_rows($mysql_run);

//         if($result == 0)
//         {
//                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'cowboys')");
//         }
//         // else
//         // {

//         //     if($assoc[0][2] != $val->Price)
//         //     {


//         //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//         //         if(mysqli_num_rows($mysql_run) == 0)
//         //         {
//         //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//         //                 $assoc = mysqli_fetch_all($mysql_run);
//         //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//         //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//         //                 $assoc1 = mysqli_fetch_all($mysql_run);
                        
//         //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//         //         }
//         //         else
//         //         {
//         //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//         //                 $assoc = mysqli_fetch_all($mysql_run);
//         //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//         //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//         //                 if(mysqli_num_rows($mysql_run) == 0)
//         //                 {
//         //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//         //                 }
//         //         }

//         //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//         //         $row1 = mysqli_fetch_all($mysql_run1);

//         //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//         //         $row = mysqli_fetch_all($mysql_run);
//         //         $num = mysqli_num_rows($mysql_run);
//         //         if($num != 0)
//         //         {
//         //                 $pric .=  "$".$row1[0][8];
//         //                 for($i=0; $i<$num; $i++)
//         //                 {
//         //                         if($num-1 != $i)
//         //                         {
//         //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//         //                         }
//         //                         else
//         //                         {
//         //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//         //                         }
                                
                                
//         //                 }
//         //         }
//         //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//         //         $curl = curl_init();
//         //         curl_setopt_array($curl, array(
//         //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//         //                 CURLOPT_RETURNTRANSFER => true,
//         //                 CURLOPT_ENCODING => '',
//         //                 CURLOPT_MAXREDIRS => 10,
//         //                 CURLOPT_TIMEOUT => 0,
//         //                 CURLOPT_FOLLOWLOCATION => true,
//         //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         //                 CURLOPT_CUSTOMREQUEST => 'POST',
//         //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//         //                 CURLOPT_HTTPHEADER => array(
//         //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//         //                 ),
//         //         ));
//         //         $response = curl_exec($curl);
//         //         curl_close($curl);

//                 // }

//         //     }
    
//     }
// }

// $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'cowboys' Limit 10");

// $data = "";

// while ($row = mysqli_fetch_array($mysql_run1))
// { 
//     $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//     $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
// }

// if( Strlen($data) != 0)
// {
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://discord.com/api/webhooks/993837724207435776/2rPQq5ejcxZad9zj_GyRMaXUVLgT2boVyp_YaeAb-I_gnalpzNnuF37Jl4GrcPgG__YE',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS => array('content' => $data),
//         CURLOPT_HTTPHEADER => array(
//                 'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//         ),
//     ));

//     $response = curl_exec($curl);

//     curl_close($curl);
// }

// // End dallas-cowboys




// // Start houston-texans

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://houston.craigslist.org/search/sss?query=texans',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));

//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://houston.craigslist.org/search/sss?query=texans',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//            // echo $s;
//             $s += 120;                                      
//             $url = 'https://houston.craigslist.org/search/sss?query=texans&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }

//         $string_length = strlen($response);

//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
//         $total_loop = substr_count( $total_data, 'result-row' );

//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
            
//             $response2 = substr($response, $string_length);

//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
            
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);

//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);

//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);

//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'texans'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'texans')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
        
//         }
//     }

//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'texans' Limit 10");

//     $data = "";

//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993838257441878036/lgCLN4os9dyiYSzjpz4antsIvEHBwqDsb9ZxuwzARTniGEriIKbUVEh8t3UIBOSHCZ7A',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

// // End houston-texans




//  // Start las-vegas-raiders

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://lasvegas.craigslist.org/search/sss?query=raiders',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));

//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://lasvegas.craigslist.org/search/sss?query=raiders',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//            // echo $s;
//             $s += 120;                                      
//             $url = 'https://lasvegas.craigslist.org/search/sss?query=raiders&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }

//         $string_length = strlen($response);

//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
//         $total_loop = substr_count( $total_data, 'result-row' );

//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
            
//             $response2 = substr($response, $string_length);

//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
            
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);

//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);

//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);

//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'raiders'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'raiders')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
        
//         }
//     }

//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'raiders' Limit 10");

//     $data = "";

//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993838773513224262/KFhIV17Js0KONKtlL03e8s9vvE9JRxxfHAsejJGA_SFfwRXlpWs1OSpBAxOoRtFb-QM0',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }
    
// // End las-vegas-raiders



// // Start minnesota-vikings

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://minneapolis.craigslist.org/search/sss?query=vikings',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));

//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://minneapolis.craigslist.org/search/sss?query=vikings',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//            // echo $s;
//             $s += 120;                                      
//             $url = 'https://minneapolis.craigslist.org/search/sss?query=vikings&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }

//         $string_length = strlen($response);
    
//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
//         $total_loop = substr_count( $total_data, 'result-row' );
    
//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
            
//             $response2 = substr($response, $string_length);
    
//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
            
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);
    
//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);
    
//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);
    
//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'vikings'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'vikings')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
        
//         }
//     }

//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'vikings' Limit 10");

//     $data = "";

//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993839146747564072/GTFV_nMn1gNYRN8ZnpueNzj655jFzquUqMOI1k9Z-4mMTQp63GoCUgcUswZwBeqFygqn',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

// // End minnesota-vikings




// // Start new-york-giants

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://newyork.craigslist.org/search/tia?query=giants',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));

//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://newyork.craigslist.org/search/tia?query=giants',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//           //  echo $s;
//             $s += 120;                                      
//             $url = 'https://newyork.craigslist.org/search/tia?query=giants&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }

//         $string_length = strlen($response);
     
//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
//         $total_loop = substr_count( $total_data, 'result-row' );
     
//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
            
//             $response2 = substr($response, $string_length);
     
//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
            
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);
     
//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);
     
//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);
     
//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'giants'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'giants')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
         
//         }
//     }

//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'giants' Limit 10");

//     $data = "";

//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993839404844072980/A4lxVtP-rcLs-zesiG1ZC2wufbVTHk3Hju9mhE6AMVzcgKJE15QdPCmlsVUXtmIkAwMh',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

// // End new-york-giants





// // Start new-york-jets

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://newyork.craigslist.org/search/tia?query=jets',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));

//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://newyork.craigslist.org/search/tia?query=jets',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//            // echo $s;
//             $s += 120;                                      
//             $url = 'https://newyork.craigslist.org/search/tia?query=jets&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }

//         $string_length = strlen($response);
     
//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
//         $total_loop = substr_count( $total_data, 'result-row' );
     
//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
            
//             $response2 = substr($response, $string_length);
     
//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
            
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);
     
//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);
     
//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);
     
//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'jets'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'jets')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
         
//         }
//     }

//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'jets' Limit 10");

//     $data = "";

//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993839723720216576/UzbXFhfJ6ntDSsALCbux7_ZkiWHQ3iA1W9SuY7UBmz8nUjA_U2QzQmmFvsQSpWU8BPhS',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }
    
// // End new-york-jets



// // Start pittsburgh-steelers


//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://pittsburgh.craigslist.org/search/sss?query=steelers',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));

//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://pittsburgh.craigslist.org/search/sss?query=steelers',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//             //echo $s;
//             $s += 120;                                      
//             $url = 'https://pittsburgh.craigslist.org/search/sss?query=steelers&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }

//         $string_length = strlen($response);
     
//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
//         $total_loop = substr_count( $total_data, 'result-row' );
     
//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
            
//             $response2 = substr($response, $string_length);
     
//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
            
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);
     
//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);
     
//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);
     
//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'steelers')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'steelers'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
         
//         }
//     }

//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'steelers' Limit 10");

//     $data = "";

//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993840396549492866/OSOU-cNNNqLsVJdCs54lNfe71awBuElPzWm6fDPMXMt6esCL9VIm6PameKLNIi2Fgwko',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

// // End pittsburgh-steelers



// // // Start san-francisco-49ers

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://sfbay.craigslist.org/search/sss?query=49ers',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));	
//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://sfbay.craigslist.org/search/sss?query=49ers',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }
//         else
//         {
            
//             $s += 120;                                      
//             $url = 'https://sfbay.craigslist.org/search/sss?query=49ers&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));

//             $response = curl_exec($curl);

//             curl_close($curl);
//         }

//         $string_length = strlen($response);
        
//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
        
        
//         $total_loop = substr_count( $total_data, 'result-row' );
     
//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
        
//             $response2 = substr($response, $string_length);
        
//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
        
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);
        
//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);
        
//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);
        
//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = '49ers'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', '49ers')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'seahawks'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
            
//         }
//     }
//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = '49ers' Limit 10");

//     $data = "";
         
//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993840599587364895/s5_PeCOUwPBJzuWaA1u3hYwthIzB7xkbdHTOowmjZznzr4-8qqx0IhtVwCFHYrGnhN0Y',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

// // // End san-francisco-49ers




// // Start seattle-seahawks

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://seattle.craigslist.org/search/sss?query=seahawks',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));

//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://seattle.craigslist.org/search/sss?query=seahawks',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//             //echo $s;
//             $s += 120;                                      
//             $url = 'https://seattle.craigslist.org/search/sss?query=seahawks&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }

//         $string_length = strlen($response);
        
//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
        
//         $total_loop = substr_count( $total_data, 'result-row' );
        
//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
        
//             $response2 = substr($response, $string_length);
        
//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
        
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);
        
//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);
        
//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);
        
//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'seahawks'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'seahawks')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'seahawks'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
            
//         }
//     }
//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'seahawks' Limit 10");

//     $data = "";
            
//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993841319606747196/WHcs-2WAl5eEuq2BkcHU3w6zezegjQskypvUjwjD081O9NtJTyyILLsN5cWl6MS-uxwe',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);

//         curl_close($curl);
//     }

// // End seattle-seahawks



// // Start la-chargers-la-rams

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://losangeles.craigslist.org/search/tia?query=rams',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: ASP.NET_SessionId=hkuhy4irgb2axowpjzxy34sk'
//             ),
//             CURLOPT_FAILONERROR =>true,
            
//     ));	
//     $response = curl_exec($curl);

//     $position_total = strpos($response, 'totalcount')+12;
//     $response_total = substr($response, $position_total,10);
//     $loop_count = (int)$response_total/120;
//     $loop_count = ceil($loop_count);
//     $s=0;

//     for($i1=1; $i1<=$loop_count; $i1++)
//     {
//         if($i1==1)
//         {
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => 'https://losangeles.craigslist.org/search/tia?query=rams',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }
//         else
//         {
//            // echo $s;
//             $s += 120;                                      
//             $url = 'https://losangeles.craigslist.org/search/tia?query=rams&s='.$s;
//             $curl = curl_init();
//             curl_setopt_array($curl, array(
//                 CURLOPT_URL => $url,
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'GET',
//                 CURLOPT_HTTPHEADER => array(
//                 'Cookie: cl_b=4|83677dcaec1ea8c6322588a934644f1707e1cf9e|1651903866TrRAs; cl_def_hp=cincinnati'
//                 ),
//             ));
//             $response = curl_exec($curl);
//             curl_close($curl);
//         }

//         $string_length = strlen($response);
        
//         $position = strpos($response, 'class="result-row"')-4;
//         $response = substr($response, $position, $string_length);
//         $string_length = strpos($response, '</ul>');
//         $total_data = substr($response, 0, $string_length);
     
//         $total_loop = substr_count( $total_data, 'result-row' );
     
//         for($i=1; $i<=$total_loop; $i++)
//         {
//             $string_length = strpos($response, '</li>') + 5;
//             $response1 = substr($response, 0, $string_length);
        
        
            
//             $response2 = substr($response, $string_length);
        
        
//             $start_data_length = strpos($response1, 'd="') + 3;
//             $get_some_data = substr($response1, $start_data_length, 10);
        
            
        
//             $demo_data_length = strpos($response1, $get_some_data.'" >')+13;
//             $response3 = substr($response, $demo_data_length);
//             $demo2_data_length = strpos( $response3, '</a>');
//             $response4 = substr($response1, $demo_data_length,$demo2_data_length);
        
        
//             $demo3_data_length = strpos( $response3, '</span>');
//             $response5 = substr($response3, 0,$demo3_data_length);
//             $demo4_data_length = strpos( $response5, 'e">')+3;
//             $response10 = substr($response5, $demo4_data_length);
        
        
            
//             $demo5_data_length = strpos( $response3, '</span>')+6;
//             $response6 = substr($response3, $demo5_data_length);
//             $demo6_data_length = strpos( $response6, '</span>');
//             $response8 = substr($response6, 0,$demo6_data_length);
//             $demo7_data_length = strpos( $response6, '">')+3;
//             $response9 = substr($response8, $demo7_data_length);
        
        
        
//             $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'rams'");

//             $assoc = mysqli_fetch_all($mysql_run);
//             $result = mysqli_num_rows($mysql_run);

//             if($result == 0)
//             {
//                     $mysql = mysqli_query($conn,"INSERT INTO `craigslist` (`Name`,`Price`, `Place`, `key_place`) VALUES ('$response4', '$response10', '$response9', 'rams')");
//             }
//             // else
//             // {

//             //     if($assoc[0][2] != $val->Price)
//             //     {


//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         if(mysqli_num_rows($mysql_run) == 0)
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `Name` = '$response4'  AND `Place` = '$response9' AND `key_place` = 'seahawks'");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][8]-$val->Price)/$assoc[0][8])*100;

//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //                 $assoc1 = mysqli_fetch_all($mysql_run);
                            
//             //                 $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //         }
//             //         else
//             //         {
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' ORDER BY `id` DESC LIMIT 1");
//             //                 $assoc = mysqli_fetch_all($mysql_run);
//             //                 $per = (($assoc[0][2]-$val->Price)/$assoc[0][2])*100;
//             //                 $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4' and `Price` = '$val->Price'");
//             //                 if(mysqli_num_rows($mysql_run) == 0)
//             //                 {
//             //                         $mysql = mysqli_query($conn,"INSERT INTO `craigslist_price`(`Name`, `Price`, `percent`) VALUES ('$response4','$val->Price','$per')");
//             //                 }
//             //         }

//             //         $mysql_run1 = mysqli_query($conn,"SELECT *  FROM `craigslist` WHERE `Name` = '$response4'");
//             //         $row1 = mysqli_fetch_all($mysql_run1);

//             //         $mysql_run = mysqli_query($conn,"SELECT *  FROM `craigslist_price` WHERE `Name` = '$response4'");
//             //         $row = mysqli_fetch_all($mysql_run);
//             //         $num = mysqli_num_rows($mysql_run);
//             //         if($num != 0)
//             //         {
//             //                 $pric .=  "$".$row1[0][8];
//             //                 for($i=0; $i<$num; $i++)
//             //                 {
//             //                         if($num-1 != $i)
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2]."";
//             //                         }
//             //                         else
//             //                         {
//             //                                 $pric .= "(".$row[$i][3]."%), $".$row[$i][2];
//             //                         }
                                    
                                    
//             //                 }
//             //         }
//             //         $falcons_data = "Listing #: ".$response4."\n Area : ".$val->Area."\n Section : ".$val->Section."\n Row : ".$val->Row."\n Seats : ".$val->Seats."\n Quantity : ".$val->Quantity."\n PPS : ".$val->PPS."\n Previous = ".$pric." \n Price : ".$val->Price."\n Channel Name : atlanta-falcons \n\n";

//             //         $curl = curl_init();
//             //         curl_setopt_array($curl, array(
//             //                 CURLOPT_URL => 'https://discord.com/api/webhooks/999987994117296179/kHsPML991KLuDSQireHFY9exqIMARaNnHq-d8N6nisk8HztNw9XOv1gKwjK2kD66UzMg',
//             //                 CURLOPT_RETURNTRANSFER => true,
//             //                 CURLOPT_ENCODING => '',
//             //                 CURLOPT_MAXREDIRS => 10,
//             //                 CURLOPT_TIMEOUT => 0,
//             //                 CURLOPT_FOLLOWLOCATION => true,
//             //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             //                 CURLOPT_CUSTOMREQUEST => 'POST',
//             //                 CURLOPT_POSTFIELDS => array('content' => $falcons_data),
//             //                 CURLOPT_HTTPHEADER => array(
//             //                                 'Cookie: __cfruid=ad342e383ad9dfef48c246f2ea077f38ca0d9454-1657628500; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             //                 ),
//             //         ));
//             //         $response = curl_exec($curl);
//             //         curl_close($curl);

//                     // }

//             //     }
         
//         }
//     }

//     $mysql_run1 = mysqli_query($conn,"SELECT * FROM `craigslist` WHERE `display` = '0' AND `key_place` = 'rams' Limit 10");

//     $data = "";
         
//     while ($row = mysqli_fetch_array($mysql_run1))
//     { 
//         $mysql_run2 = mysqli_query($conn,"UPDATE `craigslist` SET `display`= '1' WHERE `id` = $row[0]");
//         $data .= "Name :-  ".$row[1]."   Price :-  ".$row[2]."   Place :-   ".$row[3]."\n\n";
//     }

//     if( Strlen($data) != 0)
//     {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://discord.com/api/webhooks/993841615439409184/MzoYJpJAcDyxsUTIP8oplII4Oj-gF7_YdYzbHhDpDotlfF43YMOI0bo3DA7PYxXaG3Sk',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS => array('content' => $data),
//             CURLOPT_HTTPHEADER => array(
//                     'Cookie: __cfruid=fc5617d8e40ed30f97914501670a4b2988289034-1657013173; __dcfduid=75614690d76911ecb36ca9baed68b6d0; __sdcfduid=75614691d76911ecb36ca9baed68b6d03e2e60e6a2601e5e02b7367e967953fe6b6337d015dfd93ffcf32b687ea44856'
//             ),
//         ));

//         $response = curl_exec($curl);
//         curl_close($curl);
//     }

// // End la-chargers-la-rams