<?php

namespace xjryanse\staff\service;

use xjryanse\system\interfaces\MainModelInterface;
use xjryanse\logic\Debug;
/**
 * 员工入职离职登记
 */
class StaffLogService extends Base implements MainModelInterface {

    use \xjryanse\traits\InstTrait;
    use \xjryanse\traits\MainModelTrait;
    use \xjryanse\traits\MainModelRamTrait;
    use \xjryanse\traits\MainModelCacheTrait;
    use \xjryanse\traits\MainModelCheckTrait;
    use \xjryanse\traits\MainModelGroupTrait;
    use \xjryanse\traits\MainModelQueryTrait;


    protected static $mainModel;
    protected static $mainModelClass = '\\xjryanse\\staff\\model\\StaffLog';

    
    use \xjryanse\staff\service\log\TriggerTraits;
    use \xjryanse\staff\service\log\FieldTraits;
    use \xjryanse\staff\service\log\CalTraits;
    
    /*
     * 是否在职
     * @param type $userId  用户id
     * @param type $time    时间
     * @return type
     */
    public static function isStaff($userId,$time = ''){
        $con[]  = ['user_id','=',$userId];
        $lists = self::mainModel()->where($con)->select();
        Debug::debug('isStaff的$lists',$lists);
        $isStaff = false;
        foreach($lists as $v){
            $date = $time ? date('Y-m-d',strtotime($time)) : date('Y-m-d');
            if($date >= $v['join_time'] && (!$v['leave_time'] || $v['leave_time'] >= $date)){
                $isStaff = true;
            }
        }
        return $isStaff;
    }
    /*
     * 员工离职
     */
    public static function setLeave($userId,$time = ''){
        $con[]  = ['user_id','=',$userId];
        $id     = self::mainModel()->where($con)->whereNull('leave_time')->order('id desc')->value('id');
        if($id){
            $time = $time ? : date('Y-m-d H:i:s');
            $updData['leave_time'] = $time;
            self::getInstance($id)->update($updData);
        }
        return true;
    }
    /**
     * 20220811：员工入职
     * @param type $userId
     * @param type $time
     * @return boolean
     */
    public static function setJoin($userId,$time = ''){
        if(!self::isStaff($userId)){
            $data['user_id']    = $userId;
            $time = $time ? : date('Y-m-d H:i:s');
            $data['user_id']    = $userId;
            $data['join_cate']  = 'recruit';
            $data['join_time']  = $time;
            self::save($data);
        }
        return true;
    }

}
