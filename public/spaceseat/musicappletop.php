<?php
header('Access-Control-Allow-Origin:  *');
  $data = $_GET['term'];
  

  
  //-------------------------------------------------------------------Start New york----------------------------------------------------------------------------------------
  
  $curl = curl_init();

  $newyork_count = 0;

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-new-york-city/pl.a88b5c26caea48a59484370b6f79c9df',
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
    $newyork_table = "";
    $newyork_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
      
      $newyork_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

      $response = substr($response,strpos($response,'</time>')+6,strlen($response));
      
      $newyork_count++;

    }

    $newyork_table .= "</table>";

  }
  //-------------------------------------------------------------------End New york----------------------------------------------------------------------------------------
  


  //-------------------------------------------------------------------Start Los Angeles----------------------------------------------------------------------------------------
  
  $curl = curl_init();

  $los_angeles_count = 0;

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-los-angeles/pl.a42d6fd3917f4445b18468109d27f201',
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
    $los_angeles_table = "";
    $los_angeles_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
      
      $los_angeles_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

      $response = substr($response,strpos($response,'</time>')+6,strlen($response));
      
      $los_angeles_count++;

    }

    $los_angeles_table .= "</table>";

  }
  //-------------------------------------------------------------------End Los Angeles----------------------------------------------------------------------------------------
  


  //-------------------------------------------------------------------Start Atlanta----------------------------------------------------------------------------------------
  
  $curl = curl_init();

  $atlanta_count = 0;

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-atlanta/pl.b3b5a187ce4448f1b9143185c59d7609',
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
    $atlanta_table = "";
    $atlanta_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
      
      $atlanta_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

      $response = substr($response,strpos($response,'</time>')+6,strlen($response));
      
      $atlanta_count++;

    }

    $atlanta_table .= "</table>";

  }

  //-------------------------------------------------------------------End Atlanta----------------------------------------------------------------------------------------
  

//-------------------------------------------------------------------Start Nashville----------------------------------------------------------------------------------------
  
$curl = curl_init();

$nashville_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-nashville/pl.b575f5d5635a4c64982a658f8ae5ec2a',
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
  $nashville_table = "";
  $nashville_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $nashville_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $nashville_count++;

  }

  $nashville_table .= "</table>";

}

//-------------------------------------------------------------------End Nashville----------------------------------------------------------------------------------------





//-------------------------------------------------------------------Start miami----------------------------------------------------------------------------------------
  
$curl = curl_init();

$miami_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-miami/pl.1b1c79dc0a0f4ce2a15860d358d03f68',
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
  $miami_table = "";
  $miami_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $miami_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $miami_count++;

  }

  $miami_table .= "</table>";

}

//-------------------------------------------------------------------End miami----------------------------------------------------------------------------------------




//-------------------------------------------------------------------Start Houston----------------------------------------------------------------------------------------
  
$curl = curl_init();

$houston_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-houston/pl.ea546ec49995444790e54096673b8dce',
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
  $houston_table = "";
  $houston_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $houston_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $houston_count++;

  }

  $houston_table .= "</table>";

}

//-------------------------------------------------------------------End Houston----------------------------------------------------------------------------------------




//-------------------------------------------------------------------Start San Francisco----------------------------------------------------------------------------------------
  
$curl = curl_init();

$san_francisco_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-san-francisco/pl.0f2ba910f3a64209933184678f99d6cd',
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
  $san_francisco_table = "";
  $san_francisco_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $san_francisco_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $san_francisco_count++;

  }

  $san_francisco_table .= "</table>";

}

//-------------------------------------------------------------------End San Francisco----------------------------------------------------------------------------------------





//-------------------------------------------------------------------Start Seattle----------------------------------------------------------------------------------------
  
$curl = curl_init();

$seattle_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-seattle/pl.3ca6b5a302c44ee0b67b7a18bd914686',
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
  $seattle_table = "";
  $seattle_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $seattle_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $seattle_count++;

  }

  $seattle_table .= "</table>";

}

//-------------------------------------------------------------------End Seattle----------------------------------------------------------------------------------------



//-------------------------------------------------------------------Start Austin----------------------------------------------------------------------------------------
  
$curl = curl_init();

$austin_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-austin/pl.8446e04ee80c4ff79f3631bfd9d5c405',
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
  $austin_table = "";
  $austin_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $austin_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $austin_count++;

  }

  $austin_table .= "</table>";

}

//-------------------------------------------------------------------End Austin----------------------------------------------------------------------------------------




//-------------------------------------------------------------------Start Detroit-----------------------------------------------------------------------------
  
$curl = curl_init();

$detroit_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-detroit/pl.8efc1650d4a841f8808a522b47893f07',
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
  $detroit_table = "";
  $detroit_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $detroit_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $detroit_count++;

  }

  $detroit_table .= "</table>";

}

//-------------------------------------------------------------------End Detroit----------------------------------------------------------------------------------------





//-------------------------------------------------------------------Start Dallas-----------------------------------------------------------------------------
  
$curl = curl_init();

$dallas_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-dallas/pl.799ecd771f3944df818876a9681f5548',
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
  $dallas_table = "";
  $dallas_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $dallas_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $dallas_count++;

  }

  $dallas_table .= "</table>";

}

//-------------------------------------------------------------------End Dallas----------------------------------------------------------------------------------------



//-------------------------------------------------------------------Start Denver-----------------------------------------------------------------------------
  
$curl = curl_init();

$denver_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-denver/pl.c5d2d35139864f51b851191ffa460171',
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
  $denver_table = "";
  $denver_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $denver_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $denver_count++;

  }

  $denver_table .= "</table>";

}

//-------------------------------------------------------------------End Denver----------------------------------------------------------------------------------------






//-------------------------------------------------------------------Start Honolulu-----------------------------------------------------------------------------
  
$curl = curl_init();

$honolulu_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-honolulu/pl.1f48d456fa8746b8b52a7cb276f2a166',
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
  $honolulu_table = "";
  $honolulu_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $honolulu_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $honolulu_count++;

  }

  $honolulu_table .= "</table>";

}

//-------------------------------------------------------------------End Honolulu----------------------------------------------------------------------------------------







//-------------------------------------------------------------------Start Chicago-----------------------------------------------------------------------------
  
$curl = curl_init();

$chicago_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-chicago/pl.f083772167b24f5a9d691e3c3e16f968',
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
  $chicago_table = "";
  $chicago_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $chicago_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $chicago_count++;

  }

  $chicago_table .= "</table>";

}

//-------------------------------------------------------------------End Chicago----------------------------------------------------------------------------------------







//-------------------------------------------------------------------Start Washington-----------------------------------------------------------------------------
  
$curl = curl_init();

$washington_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-washington-d-c/pl.cd75d00c00f246bc8365ae7f9ffcf7b9',
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
  $washington_table = "";
  $washington_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $washington_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $washington_count++;

  }

  $washington_table .= "</table>";

}

//-------------------------------------------------------------------End Washington----------------------------------------------------------------------------------------








//-------------------------------------------------------------------Start Calgary-----------------------------------------------------------------------------
  
$curl = curl_init();

$calgary_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-calgary/pl.fef64d04d26546139db3ec04442f8166',
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
  $calgary_table = "";
  $calgary_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $calgary_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $calgary_count++;

  }

  $calgary_table .= "</table>";

}

//-------------------------------------------------------------------End Calgary----------------------------------------------------------------------------------------








//-------------------------------------------------------------------Start Edmonton-----------------------------------------------------------------------------
  
$curl = curl_init();

$edmonton_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-edmonton/pl.56a5fa31251646a4bc63d6ddf5796b81',
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
  $edmonton_table = "";
  $edmonton_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $edmonton_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $edmonton_count++;

  }

  $edmonton_table .= "</table>";

}

//-------------------------------------------------------------------End Edmonton----------------------------------------------------------------------------------------








//-------------------------------------------------------------------Start Philadelphia-----------------------------------------------------------------------------
  
$curl = curl_init();

$philadelphia_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-philadelphia/pl.78cb14d465ce4ca8a468a587a63ccf07',
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
  $philadelphia_table = "";
  $philadelphia_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $philadelphia_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $philadelphia_count++;

  }

  $philadelphia_table .= "</table>";

}

//-------------------------------------------------------------------End Philadelphia----------------------------------------------------------------------------------------








//-------------------------------------------------------------------Start Phoenix-----------------------------------------------------------------------------
  
$curl = curl_init();

$phoenix_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-phoenix/pl.9ae13a633c7e419096f13cfb717e42d4',
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
  $phoenix_table = "";
  $phoenix_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $phoenix_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $phoenix_count++;

  }

  $phoenix_table .= "</table>";

}

//-------------------------------------------------------------------End Phoenix----------------------------------------------------------------------------------------








//-------------------------------------------------------------------Start San Diego-----------------------------------------------------------------------------
  
$curl = curl_init();

$san_diego_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-san-diego/pl.5f853ea66be94055a9d03637c1675a01',
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
  $san_diego_table = "";
  $san_diego_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $san_diego_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $san_diego_count++;

  }

  $san_diego_table .= "</table>";

}

//-------------------------------------------------------------------End San Diego----------------------------------------------------------------------------------------








//-------------------------------------------------------------------Start Toronto-----------------------------------------------------------------------------
  
$curl = curl_init();

$toronto_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-toronto/pl.14144d2c98604927ac05f222f8bafeb1',
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
  $toronto_table = "";
  $toronto_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $toronto_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $toronto_count++;

  }

  $toronto_table .= "</table>";

}

//-------------------------------------------------------------------End Toronto----------------------------------------------------------------------------------------








//-------------------------------------------------------------------Start Vancouver-----------------------------------------------------------------------------
  
$curl = curl_init();

$vancouver_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-vancouver/pl.4c17ccf006634d67b09aaac56f22d200',
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
  $vancouver_table = "";
  $vancouver_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $vancouver_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $vancouver_count++;

  }

  $vancouver_table .= "</table>";

}

//-------------------------------------------------------------------End Vancouver----------------------------------------------------------------------------------------








//-------------------------------------------------------------------Start Winnipeg-----------------------------------------------------------------------------
  
$curl = curl_init();

$winnipeg_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-winnipeg/pl.9e0ca1fb120f43489de15c99e8a93115',
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
  $winnipeg_table = "";
  $winnipeg_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $winnipeg_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $winnipeg_count++;

  }

  $winnipeg_table .= "</table>";

}

//-------------------------------------------------------------------End Winnipeg----------------------------------------------------------------------------------------








//-------------------------------------------------------------------Start San Jose-----------------------------------------------------------------------------
  
$curl = curl_init();

$san_jose_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-san-jos%C3%A9/pl.00fc149058624fb5b3cb83433591902c',
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
  $san_jose_table = "";
  $san_jose_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $san_jose_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $san_jose_count++;

  }

  $san_jose_table .= "</table>";

}

//-------------------------------------------------------------------End San Jose----------------------------------------------------------------------------------------








//-------------------------------------------------------------------Start  Quebec City-----------------------------------------------------------------------------
  
$curl = curl_init();

$quebec_city_count = 0;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://music.apple.com/us/playlist/top-25-qu%C3%A9bec-city/pl.16fd373e7ff04847bf7ed879ef463b63',
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
  $quebec_city_table = "";
  $quebec_city_table .= "<table><tr><th>Ranks</th><th>Name</th><th>Artist</th><th>Time</th></tr>";

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
    
    $quebec_city_table .= "<tr><td>".$rank."</td><td>".$song_name."</td><td>".$artist."</td><td>".$time."</td></tr>";

    $response = substr($response,strpos($response,'</time>')+6,strlen($response));
    
    $quebec_city_count++;

  }

  $quebec_city_table .= "</table>";

}

//-------------------------------------------------------------------End Quebec City----------------------------------------------------------------------------------------










$dat = "";

if($newyork_count != 0)
{
    $dat .= "\n<h1><b>City Name :- New York  </b></h1>\n";
    $dat .= "\n".$newyork_table."\n";
}
if($los_angeles_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Los Angeles  </b></h1>\n";
    $dat .= "\n".$los_angeles_table."\n";
}
if($atlanta_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Atlanta  </b></h1>\n";
    $dat .= "\n".$atlanta_table."\n";
}
if($nashville_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Nashville </b></h1>\n";
    $dat .= "\n".$nashville_table."\n";
}
if($miami_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Miami </b></h1>\n";
    $dat .= "\n".$miami_table."\n";
}
if($houston_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Houston </b></h1>\n";
    $dat .= "\n".$houston_table."\n";
}
if($san_francisco_count != 0)
{
    $dat .= "\n<h1><b>City Name :- San Francisco </b></h1>\n";
    $dat .= "\n".$san_francisco_table."\n";
}
if($seattle_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Seattle </b></h1>\n";
    $dat .= "\n".$seattle_table."\n";
}
if($austin_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Austin </b></h1>\n";
    $dat .= "\n".$austin_table."\n";
}
if($detroit_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Detroit </b></h1>\n";
    $dat .= "\n".$detroit_table."\n";
}
if($dallas_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Dallas </b></h1>\n";
    $dat .= "\n".$dallas_table."\n";
}
if($denver_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Denver </b></h1>\n";
    $dat .= "\n".$denver_table."\n";
}
if($honolulu_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Honolulu </b></h1>\n";
    $dat .= "\n".$honolulu_table."\n";
}
if($chicago_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Chicago </b></h1>\n";
    $dat .= "\n".$chicago_table."\n";
}

if($washington_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Washington </b></h1>\n";
    $dat .= "\n".$washington_table."\n";
}

if($calgary_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Calgary </b></h1>\n";
    $dat .= "\n".$calgary_table."\n";
}


if($edmonton_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Edmonton </b></h1>\n";
    $dat .= "\n".$edmonton_table."\n";
}

if($philadelphia_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Philadelphia </b></h1>\n";
    $dat .= "\n".$philadelphia_table."\n";
}

if($phoenix_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Phoenix </b></h1>\n";
    $dat .= "\n".$phoenix_table."\n";
}

if($san_diego_count != 0)
{
    $dat .= "\n<h1><b>City Name :- San Diego </b></h1>\n";
    $dat .= "\n".$san_diego_table."\n";
}

if($toronto_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Toronto </b></h1>\n";
    $dat .= "\n".$toronto_table."\n";
}

if($vancouver_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Vancouver </b></h1>\n";
    $dat .= "\n".$vancouver_table."\n";
}

if($winnipeg_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Winnipeg </b></h1>\n";
    $dat .= "\n".$winnipeg_table."\n";
}

if($san_jose_count != 0)
{
    $dat .= "\n<h1><b>City Name :- San Jose </b></h1>\n";
    $dat .= "\n".$san_jose_table."\n";
}

if($quebec_city_count != 0)
{
    $dat .= "\n<h1><b>City Name :- Quebe City </b></h1>\n";
    $dat .= "\n".$quebec_city_table."\n";
}


echo $dat;



