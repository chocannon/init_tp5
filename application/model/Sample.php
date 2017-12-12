<?php
// +----------------------------------------------------------------------
// | 样本模型
// +----------------------------------------------------------------------
// | Author: qh.cao@knowyourself.cc
// +----------------------------------------------------------------------
namespace app\model;

use app\common\Model;

class Sample extends Model 
{
    const SEX = [
        1 => '男',
        2 => '女',
    ];
    const STATE = [
        0 => '在库', 
        1 => '绑定',
        2 => '到达', 
        3 => '结果已出',
        4 => '报告发放',
    ];

    /**
     * 获取所有样本数据根据公司ID
     * @return [type] [description]
     */
    public function listBy($field = '', $value)
    {
        $ret = self::field('t_s.sample_sn,t_s.state,t_p.project_name,
                    t_m.name,t_m.mobile,t_m.sex,t_s.arived_time,t_s.out_time,
                    t_s.detection_time,t_s.report_create_time,t_s.report_arrvie_time')
                ->where('t_s.' . $field, $value)
                ->alias('t_s')
                ->join('t_member t_m','t_m.member_id = t_s.member_id')
                ->join('t_project t_p','t_p.project_id = t_s.project_suite_id')
                ->limit(2)
                ->select();

        return $ret->toArray();
    }


    /**
     * 性别属性获取器
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    protected function getSexAttr($value)
    {
        return self::SEX[$value];
    }


    /**
     * 样本状态属性获取器
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    protected function getStateAttr($value)
    {
        return self::STATE[$value];
    }
}
