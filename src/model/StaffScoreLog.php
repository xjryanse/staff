<?php
namespace xjryanse\staff\model;

/**
 * 
 */
class StaffScoreLog extends Base
{
    use \xjryanse\traits\ModelUniTrait;
    // 20230516:数据表关联字段
    public static $uniFields = [
        [
            'field'     =>'dept_id',
            'uni_name'  =>'system_company_dept',
            'in_list'   => false,            
            'del_check'=> true,
        ],  
        [
            'field'     =>'thing_id',
            'uni_name'  =>'staff_score_thing',
            'in_list'   => false,            
            'del_check'=> true,
        ],
        [
            'field'     =>'user_id',
            'uni_name'  =>'user',
            'in_list'   => false,            
            'del_check'=> true,
        ],
        [
            'field'     =>'rule_id',
            'uni_name'  =>'staff_score_rule',
            'in_list'   => false,            
            'del_check'=> true,
        ],
    ];
    
    
    public static $multiPicFields = ['file_id'];

    public function getFileIdAttr($value) {
        return self::getImgVal($value, true);
    }

    public function setFileIdAttr($value) {
        return self::setImgVal($value);
    }

}