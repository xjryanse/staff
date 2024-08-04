<?php
namespace xjryanse\staff\service\scoreLog;

/**
 * 用户维度过滤数据
 */
trait MeTraits{

    /**
     * 20240524:用于提取当前驾驶员上报的记录
     * @param type $data
     * @param type $uuid
     */
    public static function paginateUserMe($con = [], $order = '', $perPage = 10, $having = '', $field = "*", $withSum = false) {
        $con[] = ['user_id','=',session(SESSION_USER_ID)];

        $res = self::paginateX($con, $order, $perPage, $having, $field, $withSum);

        return $res;
    }
    
    
}
