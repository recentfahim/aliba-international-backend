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

    $client = new GuzzleHttp\Client(['base_uri' => env('OTCOMMERCE_BASE_URL')]);
    $req = $client->request('GET', $method_url, ['query' => $params]);

    $response = $req->getBody();

    return json_decode($response);
}
