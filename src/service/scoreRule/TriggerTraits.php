<?php
namespace xjryanse\staff\service\scoreRule;

use xjryanse\logic\DataCheck;
use xjryanse\logic\Arrays;
use xjryanse\staff\service\StaffScoreThingService;
/**
 * 分页复用列表
 */
trait TriggerTraits{

        /**
     * 钩子-保存前
     */
    public static function extraPreSave(&$data, $uuid) {
        self::stopUse(__METHOD__);
    }

    /**
     * 钩子-更新前
     */
    public static function extraPreUpdate(&$data, $uuid) {
        self::stopUse(__METHOD__);
    }

    /**
     * 钩子-删除前
     */
    public function extraPreDelete() {
        self::stopUse(__METHOD__);
    }

    /**
     * 钩子-保存前
     */
    public static function ramPreSave(&$data, $uuid) {
        DataCheck::must($data,['thing_id']);
        $thingId = Arrays::value($data,'thing_id');
        
        $data['dept_id'] = StaffScoreThingService::getInstance($thingId)->fDeptId();
    }

    /**
     * 钩子-保存后
     */
    public static function ramAfterSave(&$data, $uuid) {

    }

    /**
     * 钩子-更新前
     */
    public static function ramPreUpdate(&$data, $uuid) {

    }

    /**
     * 钩子-更新后
     */
    public static function ramAfterUpdate(&$data, $uuid) {

    }

    /**
     * 钩子-删除前
     */
    public function ramPreDelete() {

    }

    /**
     * 钩子-删除后
     */
    public function ramAfterDelete() {

    }
    
    protected static function redunFields(&$data, $uuid){

    }
}
