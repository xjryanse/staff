<?php
namespace xjryanse\staff\service\scoreLog;

use xjryanse\logic\DataCheck;
use xjryanse\sql\service\SqlService;
use xjryanse\logic\Arrays2d;
use xjryanse\logic\Arrays;
use xjryanse\staff\service\StaffScoreThingService;
/**
 * 年度积分
 */
trait DoTraits{

    /**
     * 年度积分初始化
     * 特点：一批人；固定值；固定事项
     */
    public static function doScoreInit($data){
        // 提取一下用户名单
        $mustKeys = ['thing_id','userSqlKey','userField','year'];
        DataCheck::must($data,$mustKeys);
        // userSqlKey:提取自定义sql的用户
        
        $userList = SqlService::keySqlQueryData($data['userSqlKey']);
        
        $con    = [];
        $con[]  = ["date_format( `score_time`, '%Y' )",'=',$data['year']];
        $con[]  = ["cate",'=','init'];
        $hasUserIds = self::where($con)->column('user_id');
        
        $score = StaffScoreThingService::getInstance($data['thing_id'])->fInitScore();
        
        $sArr = [];
        foreach($userList as $uItem){
            $uid = Arrays::value($uItem, $data['userField']);
            if(in_array($uid, $hasUserIds)){
                continue;
            }
            
            $sData      = [];
            $sData['dept_id']       = Arrays::value($uItem, 'dept_id');
            $sData['thing_id']      = Arrays::value($data,'thing_id');
            $sData['user_id']       = $uid;
            $sData['score']         = $score;
            $sData['cate']          = 'init';
            $sData['reason']        = $data['year'].'年度积分初始化';
            $sData['score_time']    = $data['year'].'-01-01 00:00:00';
            
            $sArr[] = $sData;
        }
        
        return self::saveAllRam($sArr);
    }
    
    
    
}
