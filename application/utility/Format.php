<?php
// +----------------------------------------------------------------------
// | 常用工具函数
// +----------------------------------------------------------------------
// | Author: qh.cao@knowyourself.cc
// +----------------------------------------------------------------------
namespace app\utility;

class Format
{

    /**
     * 格式化返回结果
     * @param  array  $data [description]
     * @param  string $msg  [description]
     * @return [type]       [description]
     */
    public static function return($data = [], $resp = [],  $msg = '')
    {
        if (!is_array($data) || !is_array($resp) || !is_string($msg)) {
            throw new \Exception("Error Processing Request", 1);
        }
        return [
            'code'    => $resp['code'],
            'message' => empty($msg) ? $resp['tip'] : $msg,
            'data'    => $data,
        ];
    }


    /**
     * 下划线转成驼峰格式
     * @param  [type] $str [description]
     * @return [type]      [description]
     */
    public static function lineToHump($str)
    {
        $str = preg_replace_callback('/([-_]+([a-z]{1}))/i', function($matches){
            return strtoupper($matches[2]);
        }, $str);
        return $str;
    }


    /**
     * 驼峰转成下划线格式
     * @param  [type] $str [description]
     * @return [type]      [description]
     */
    public static function humpToLine($str){
        $str = preg_replace_callback('/([A-Z]{1})/', function($matches){
            return '_'.strtolower($matches[0]);
        }, $str);
        return $str;
    }
}