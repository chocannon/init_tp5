<?php
// +----------------------------------------------------------------------
// | AES加解密类
// +----------------------------------------------------------------------
// | Author: qh.cao@knowyourself.cc
// +----------------------------------------------------------------------

namespace app\utility;

class Crypt
{
    private static $key = 'nLtYPzLun6hGfslQhKx0c5DIFzl+oiJtT4NvMMdrf5Y=';
    private static $iv  = 'wumIF56KP+UL4k5qN/QiPQ==';


    /**
     * 加密
     */
    public static function encode($text)
    {
        $encrypted = openssl_encrypt(
            $text,
            'aes-256-cbc',
            base64_decode(self::$key),
            OPENSSL_RAW_DATA,
            base64_decode(self::$iv)
        );
        return base64_encode($encrypted);
    }


    /**
     * 解密
     */
    public static function decode($text)
    {
        $encrypted = base64_decode($text);
        $decrypted = openssl_decrypt(
            $encrypted,
            'aes-256-cbc',
            base64_decode(self::$key),
            OPENSSL_RAW_DATA,
            base64_decode(self::$iv)
        );
        return $decrypted;
    }
}
