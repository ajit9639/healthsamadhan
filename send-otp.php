<?php

if (isset($_POST['phoneNumber']) && $_POST['phoneNumber'] != '' && isset($_POST['otp']) && $_POST['otp'] != '' ) {
    $url = 'http://textup.co.in/api/send/?key_id=3DC4D74EBC37483EB4BE696FC2D4D4FE&key_secret=50DCB9B9C7B34D0CB85FF0D8188BB886&phone_number='.$_POST['phoneNumber'].'&template_id=CC9463E5C0E6449EA8DB987A32A2920F&variable='.$_POST['otp'].'';
            
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
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}

?>