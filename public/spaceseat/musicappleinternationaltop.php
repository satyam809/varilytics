<?php
header('Access-Control-Allow-Origin:  *');
$data = $_GET['term'];




//-------------------------------------------------------------------Start Seoul----------------------------------------------------------------------------------------
  
$curl = curl_init();

$seoul_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-seoul/pl.d6f003a501da4b3c9d33b0c7b8cfa0ae',
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
  $seoul_table = "";
  $seoul_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $seoul_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $seoul_count++;

  }

  $seoul_table .= "</table>";

}
//-------------------------------------------------------------------End Seoul----------------------------------------------------------------------------------------



//-------------------------------------------------------------------Start Guadalajara----------------------------------------------------------------------------------------
  
$curl = curl_init();

$guadalajara_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-guadalajara/pl.e14841f3daf24aafb292466ad010eba9',
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
  $guadalajara_table = "";
  $guadalajara_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $guadalajara_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $guadalajara_count++;

  }

  $guadalajara_table .= "</table>";

}
//-------------------------------------------------------------------End Guadalajara----------------------------------------------------------------------------------------




//-------------------------------------------------------------------Start Paris----------------------------------------------------------------------------------------
  
$curl = curl_init();

$paris_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-paris/pl.ab3e1b83c13744aa958ba2b334ba0e6d',
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
  $paris_table = "";
  $paris_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $paris_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $paris_count++;

  }

  $paris_table .= "</table>";

}
//-------------------------------------------------------------------End Paris----------------------------------------------------------------------------------------














$dat = "";

if($seoul_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Seoul </b></h1>\n";
    $dat .= "\n".$seoul_table."\n";
}


if($quebec_city_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Quebe City </b></h1>\n";
    $dat .= "\n".$quebec_city_table."\n";
}



if($paris_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Paris </b></h1>\n";
    $dat .= "\n".$paris_table."\n";
}





if($dat != "")
{
    echo $dat;
}
else
{
    echo "No Data Found";
}
