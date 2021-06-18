<?php
// include('simple_html_dom.php');
 

// $html=file_get_html("https://google-translate1.p.rapidapi.com/language/translate/v2");

// // foreach($html->find('h5') as $article) {
// //     echo $article."<br>";
// // }
//  echo "<pre>";
//  print_r($html);

 



?>
<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://google-translate1.p.rapidapi.com/language/translate/v2",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "q=Hello%2C%20world!&target=es&source=en",
    CURLOPT_HTTPHEADER => [
        "accept-encoding: application/gzip",
        "content-type: application/x-www-form-urlencoded",
        "x-rapidapi-host: google-translate1.p.rapidapi.com",
        "x-rapidapi-key: a1967d24f2msh10d2dbd7180ea2cp1909eajsn0401d52f9739"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}

?>