<?php
// +----------------------------------------------------------------------
// | 系统状态码
// +----------------------------------------------------------------------
// | Author: qh.cao@knowyourself.cc
// +----------------------------------------------------------------------

namespace app\constant;

class Code
{
    const OK = [
        'code' => 200, 'tip' => '正确',
    ];
    const INVALID_PARAM = [
        'code' => 400, 'tip' => '请求参数不正确',
    ];
    const INVALID_TOKEN = [
        'code' => 401, 'tip' => '用户鉴权失败',
    ];
    const API_NOT_FOUND = [
        'code' => 404, 'tip' => 'API地址不正确',
    ];
    const SYSTEM_ERROR = [
        'code' => 500, 'tip' => '数据处理错误',
    ];
}
