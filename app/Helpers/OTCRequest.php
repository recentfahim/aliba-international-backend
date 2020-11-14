<?php

function OTCRequest($method_url, $extra_param=null){
    $instanceKey = env('OTCOMMERCE_INSTANCE_KEY');
    $language = env('OTCOMMERCE_LANGUAGE');

    $params = array(
        'instanceKey'=> $instanceKey,
        'language'=> $language
    );

    if($extra_param){
        foreach($extra_param as $key =>$value){
            $params[$key] = $value;
        }
    }


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('OTCOMMERCE_BASE_URL').$method_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $params
    ));

    $response = curl_exec($curl);

    return json_decode($response);
}
