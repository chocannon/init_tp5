<?php
// +----------------------------------------------------------------------
// | 模型基类
// +----------------------------------------------------------------------
// | Author: qh.cao@knowyourself.cc
// +----------------------------------------------------------------------
namespace app\common;
use think\Model as BaseModel;
use app\utility\Format;

class Model extends BaseModel
{
    protected $resultSetType      = 'collection';
    protected static $instance    = null;
    protected $autoWriteTimestamp = false;


    /**
     * 定义类静态调用
     * @param  [type] $method 请求方法
     * @param  [type] $args   请求参数
     * @return [type]         
     */
    public static function __callStatic($method, $args)
    {
        if (null === self::$instance) {
            self::$instance = new static();
        }

        // 解析 listBy 函数
        if (preg_match('~^(listBy)([A-Z])(.*)$~', $method, $matches)) {
            if (method_exists(self::$instance, $matches[1])) {
                $method = $matches[1];
                $param  = Format::humpToLine(strtolower($matches[2]) . $matches[3]);
                array_unshift($args, $param);
                return call_user_func_array([self::$instance, $method], $args);
            }
        }
    }
}
