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
    use \xjryanse\traits\MainModelQueryTrait;

    protected static $mainModel;
    protected static $mainModelClass = '\\xjryanse\\staff\\model\\StaffLog';

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
    /**
     * 钩子-保存前
     */
    public static function extraPreSave(&$data, $uuid) {
        
    }

    /**
     * 钩子-保存后
     */
    public static function extraAfterSave(&$data, $uuid) {
        
    }

    /**
     * 钩子-更新前
     */
    public static function extraPreUpdate(&$data, $uuid) {
        
    }

    /**
     * 钩子-更新后
     */
    public static function extraAfterUpdate(&$data, $uuid) {
        
    }

    /**
     * 钩子-删除前
     */
    public function extraPreDelete() {
        
    }

    /**
     * 钩子-删除后
     */
    public function extraAfterDelete() {
        
    }

    /**
     *
     */
    public function fCompanyId() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 创建时间
     */
    public function fCreateTime() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 创建者，user表
     */
    public function fCreater() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 部门id
     */
    public function fDeptId() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 有使用(0否,1是)
     */
    public function fHasUsed() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     *
     */
    public function fId() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 锁定（0：未删，1：已删）
     */
    public function fIsDelete() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 锁定（0：未锁，1：已锁）
     */
    public function fIsLock() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 岗位id
     */
    public function fJobId() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 0:未入职；1在职；2离职
     */
    public function fJobStatus() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 入职方式：recruit招聘；trans内部转岗
     */
    public function fJoinCate() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 入职时间
     */
    public function fJoinTime() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 离职时间
     */
    public function fLeaveTime() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 备注
     */
    public function fRemark() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 排序
     */
    public function fSort() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 状态(0禁用,1启用)
     */
    public function fStatus() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 更新时间
     */
    public function fUpdateTime() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 更新者，user表
     */
    public function fUpdater() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 用户id
     */
    public function fUserId() {
        return $this->getFFieldValue(__FUNCTION__);
    }

}
