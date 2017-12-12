<?php
// +----------------------------------------------------------------------
// | 控制器基类
// +----------------------------------------------------------------------
// | Author: qh.cao@knowyourself.cc
// +----------------------------------------------------------------------
namespace app\common;

use think\Request;
use think\Validate;
use think\Controller as BaseController;
use app\exception\Valid;

class Controller extends BaseController
{
    public function _initialize()
    {
        $request = Request::instance();
        $result  = $this->validate($request->param(), $request->controller() . '.' . $request->action());
        if(true !== $result){
            throw new Valid($result);
        }
    }
}