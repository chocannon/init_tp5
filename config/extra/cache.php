<?php
// +----------------------------------------------------------------------
// | Cache 配置
// +----------------------------------------------------------------------
// | Author: qh.cao@knowyourself.cc
// +----------------------------------------------------------------------


return [
    // 驱动方式
    'type'          => 'Redis',
    'host'          => \think\Env::get("redis.host"),
    'port'          => \think\Env::get("redis.port"),
    'timeout'       => '3',
    'password'      => \think\Env::get("redis.password"),
    'persistent'    => '0',
    'select'        => \think\Env::get("redis.select"),
    'prefix'        => '',
    'expire'        => 0,
];
