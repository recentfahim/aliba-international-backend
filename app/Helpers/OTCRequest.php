<?php

function OTCRequest($method_url, $param_array){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('OTCOMMERCE_BASE_URL').$method_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $param_array
    ));

    $response = curl_exec($curl);

    return json_decode($response);
}
