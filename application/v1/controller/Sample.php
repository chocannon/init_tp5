<?php
namespace app\v1\controller;

use app\constant\Code;
use app\utility\Format;
use app\common\Controller;
use app\model\Sample as SampleModel;

class Sample extends Controller
{
    public function index()
    {
        $sample = SampleModel::listByCompanyId1('e895aa79b99d47369519ca8fe17cc318');
        return Format::return($sample, Code::OK);
    }
}
