<?php

function getDeviceTimezone() : string {
    $ip = file_get_contents("http://ipecho.net/plain");
    $url = 'http://ip-api.com/json/'.$ip;

    return json_decode(file_get_contents($url), true)['timezone'];
}