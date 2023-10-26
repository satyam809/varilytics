<?php

use Google\Client;

function drive()
{
    $client = new Client();
    $client->setClientId('218707217628-d6su947hfk0d2mcanm3mn610rgp8rr99.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setRedirectUri('http://127.0.0.1:8000/google-drive/callback');
    $client->setScopes([
        'https://www.googleapis.com/auth/drive',
        'https://www.googleapis.com/auth/drive.file',
    ]);
    $url = $client->createAuthUrl();
    return $url;
    //header("Location: " .$url);
    //call_back();
}

// function call_back()
// {
//     //return request('code');
//     $client = new Client();
//     $client->setClientId('218707217628-d6su947hfk0d2mcanm3mn610rgp8rr99.apps.googleusercontent.com');
//     $client->setClientSecret('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');
//     $client->setRedirectUri('http://127.0.0.1:8000/google-drive/callback');
//     $code = Request::get('code');
//     $access_token = $client->fetchAccessTokenWithAuthCode($code);
//     return $access_token;
// }

// function upload()
// {
//     $client = new Client();
//     $access_token = 'ya29.a0AVA9y1uNzD1CqIQU83yBfZNvUTIVL-6u_j4jwMLGVrbQse2Odt91OrqFwmnemo1F9dQBvbrwKdqnqxom_Ts2ziankyS9JDx0AYtrOD2eTVOurmJHX06d39nyM_22zE63vaC03nM3xbwqLbllIFUjIwctRQDjIAaCgYKATASAQASFQE65dr86Q4m5iySLP55sTam2ar7VQ0165';

//     $client->setAccessToken($access_token);
//     $service = new Google\Service\Drive($client);
//     $file = new Google\Service\Drive\DriveFile();

//     DEFINE("TESTFILE", 'testfile-small.txt');
//     if (!file_exists(TESTFILE)) {
//         $fh = fopen(TESTFILE, 'w');
//         fseek($fh, 1024 * 1024);
//         fwrite($fh, "!", 1);
//         fclose($fh);
//     }

//     $file->setName("satyam6");
//     $service->files->create(
//         $file,
//         array(
//             'data' => file_get_contents(TESTFILE),
//             'mimeType' => 'application/octet-stream',
//             'uploadType' => 'multipart'
//         )
//     );
// }
$data = drive();
//echo $data;die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        // window.open(
        //     '<?php //echo $data; ?>',
        //     '_blank' // <- This is what makes it open in a new window.
        // );
        window.location = '<?php echo $data; ?>'
    </script>
    <?php
    // if (isset($code)) {
    //     print_r($code);
    // } else {
    //     echo "no token";
    // }
    ?>
</body>

</html>
<?php
// if(isset($access_token)){
// print_r($access_token);
// }else{
// echo "no token";
// }
?>