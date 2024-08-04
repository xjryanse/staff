<?php
namespace xjryanse\staff\service\log;

use xjryanse\logic\Datetime;
use xjryanse\logic\Debug;
/**
 * 分页复用列表
 */
trait CalTraits{
    
    /**
     * 20240602:提取员工的入职日期
     */
    public static function calUserJoinDate($userId){
        $con = [['user_id','=',$userId]];
        $lists = self::where($con)->cache(1)->order('join_date desc')->select();
//        Debug::dump($con);
        foreach($lists as $v){
            return $v['join_date'];
        }
        return null;
    }
    
    /**
     * 20240602：计算员工工龄
     */
    public static function calUserYears($userId , $time =''){
        $joinDate = self::calUserJoinDate($userId);
        if(!$joinDate){
            return null;
        }
        $timeN = $time ? :date('Y-m-d');
        //20240617以第一天算
        $joinDateN = date('Y-m-01 00:00:00',strtotime($joinDate));
        // Debug::dump('calUserYears');
        // Debug::dump($timeN);
        // Debug::dump($joinDateN);
        
        return Datetime::calDiffYears($joinDateN, $timeN);
    }
}
