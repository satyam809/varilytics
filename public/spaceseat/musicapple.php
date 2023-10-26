<?php
header('Access-Control-Allow-Origin:  *');


$data = $_GET['term'];



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-100-usa/pl.606afcbb70264d2eb2b51d8dbcfa6a12',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Cookie: geo=US'
  ),
));

$response = curl_exec($curl);

curl_close($curl);



if(strpos($response,'>'.$data.'</a></span></div></div></div>'))
{
  $table = "";
  $table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

  while(strpos($response,'>'.$data.'</a></span></div></div></div>') != "")
  {
    $val = strpos($response,'>'.$data.'</a></span></div></div></div>');
    
    $response =  substr($response,$val,strlen($response));

    $start = strpos($response,'<div');
    
    $len = strpos($response,'</time>');

    
    
    $sting = substr($response,$start,$len);

    $sub_start = strpos($sting,'">')+2;
      
    $sub_len = strpos($sting,'</')-1;
    
    $rank =strip_tags(substr($sting,$sub_start,$sub_len));


    $sub_start = strpos($sting,'<a');
      
    $sub_len = strpos($sting,'</a></span></div></div>')+4;

    $artist =strip_tags(substr($sting,$sub_start,$sub_len));
    
    $sting =substr($sting,$sub_len,strlen($sting)-$sub_len);
  

   
    $sub_start = strpos($sting,'<a');
      
    $sub_len = strpos($sting,'</a></span></div></div>')+4;

    $song_name =strip_tags(substr($sting,$sub_start,$sub_len));

    $sub_start = strpos($sting,'<time');
      
    $sub_len = strpos($sting,'</time>')+6;

    $time =strip_tags(substr($sting,$sub_start,$sub_len));
    
    $table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";
    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
  }
  $table .= "</table>";



  echo $table;









}
else
{
  echo "not found";
}