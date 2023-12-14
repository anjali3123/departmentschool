<?php

namespace App\Library;

class SmsClass {

  public static function send($parm)
  {
    return true;
    $conf = config('app.sms');
    $token = base64_encode($conf['user'].':'.$conf['token']);
    // exit;
    $post = [
      "to" => $parm['number'],
      "from" => $conf['from'],
      "body" => $parm['text']
    ];
    //   CURLOPT_POSTFIELDS =>'{
      //     "to": 3189009579,
      //     "from": 9165475345,
      //     "body": "hello, api testing."
      // }',
    try {
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $conf['url'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($post),
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization: Bearer '.$token
        ),
      ));
      $response = curl_exec($curl);
      curl_close($curl);
      return $response;
    } catch(\RuntimeException $e) {
        return false;
    }
  }
}
