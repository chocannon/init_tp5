<?php
// +----------------------------------------------------------------------
// | 自定义错误处理器
// +----------------------------------------------------------------------
// | Author: qh.cao@knowyourself.cc
// +----------------------------------------------------------------------

namespace app\exception;

use Exception;
use think\Env;
use think\Log;
use think\Response;
use app\constant\Code;
use app\utility\Format;
use think\exception\Handle;
use app\exception\Valid as ValidException;
use think\exception\RouteNotFoundException;

class Http extends Handle {
    public function render(Exception $e)
    {
        if(Env::get('debug.status')){
            return parent::render($e);
        }else{
            Log::error(
                'FILE: ' . $e->getFile() .
                '; LINE: ' . $e->getLine() .
                '; MESSAGE: ' . $e->getMessage()
            );
            if ($e instanceof RouteNotFoundException) {
                return Response::create(Format::return([], Code::API_NOT_FOUND), 'json');
            }
            if ($e instanceof ValidException) {
                return Response::create(Format::return([], Code::INVALID_PARAM, $e->getMessage()), 'json');
            }
            return Response::create(Format::return([], Code::SYSTEM_ERROR), 'json');
        }
    }
}
