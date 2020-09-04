<?php


    namespace App\Features;


    class SMS {

        public function __construct()
        {
            $this->username = 'aceinstitute';
            $this->password = 'worldwar3';
            $this->from     = 'ACE';
        }

        public function singleSMS($number, $messageContent)
        {
            $url      = "http://Lifetimesms.com/plain?username=" . $this->username . "&password=" . $this->password . "&to=" .
                $number . "&from=" . urlencode($this->from) . "&message=" . urlencode($messageContent) . "";
            $this->sendUrl($url);

        }

        public function sendUrl($url){
            //Curl Start
            $ch      = curl_init();
            $timeout = 30;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $response = curl_exec($ch);
            curl_close($ch);
        }
    }