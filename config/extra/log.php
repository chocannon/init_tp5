<?php
// +----------------------------------------------------------------------
// | Log 配置
// +----------------------------------------------------------------------
// | Author: qh.cao@knowyourself.cc
// +----------------------------------------------------------------------


return [
    'type'        => 'File',
    'path'        => LOG_PATH,
    'level'       => explode('.', \think\Env::get('log.level')),
    'apart_level' => explode('.', \think\Env::get('log.apart')),
    'file_size'   => 2097152,
    'time_format' => 'Y-m-d H:i:s',
];
