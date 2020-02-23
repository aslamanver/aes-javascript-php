<?php

function decryptAES($edata, $password)
{
    $data = base64_decode($edata);
    $salt = substr($data, 8, 8);
    $ct = substr($data, 16);
    $rounds = 3;
    $data00 = $password . $salt;
    $md5_hash = array();
    $md5_hash[0] = md5($data00, true);
    $result = $md5_hash[0];

    for ($i = 1; $i < $rounds; $i++) {
        $md5_hash[$i] = md5($md5_hash[$i - 1] . $data00, true);
        $result .= $md5_hash[$i];
    }

    $key = substr($result, 0, 32);
    $iv  = substr($result, 32, 16);
    $decrypted = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
    return $decrypted;
}


$password = 'MYKEY';
$edata = 'U2FsdGVkX1+H/Mqv5QgZzAHAXdoGVE1kY9uyfYJKbaA=';

echo decryptAES($edata, $password) . "\n";
// Output - I am a hacker
