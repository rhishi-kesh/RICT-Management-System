<?php

namespace App;

trait Utils
{
    public function generateCode($model, $prefix = '')
    {
        $code = "000001";
        $model = '\\App\\Models\\' . $model;
        $num_rows = $model::count();
        if ($num_rows != 0) {
            $newCode = $num_rows + 1;
            $zeros = ['0', '00', '000', '0000', '00000'];
            $code = strlen($newCode) > count($zeros) ? $newCode : $zeros[count($zeros) - strlen($newCode)] . $newCode;
        }
        return $prefix . $code;
    }
    public function sendSMS($number, $message){
        $smsNumber = '88' . $number;
        $url = "https://880sms.com/smsapi";
        $data = [
            "api_key" => "C20070576581b892abb538.40220352",
            "type" => "text",
            "contacts" => "$smsNumber",
            "senderid" => "RAYHANS ICT",
            "msg" => "$message",
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
    }
}
