<?php

namespace App\Utils;

use Illuminate\Support\Facades\Log;
use RuntimeException;

class SendWhatsapp {
    public static function send($number, $message) {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
            'target' => $number,
            'message' => $message,
            'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 7J1cuxXszviRWh3rCKzJ' //change TOKEN to your actual token
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
        } catch (RuntimeException $e) {
            dd($e->getMessage());
            Log::error("Error SendWhatsappJon" . $e->getMessage());
        }
    }
}
