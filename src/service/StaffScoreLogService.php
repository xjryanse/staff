<?php

namespace xjryanse\staff\service;

use xjryanse\system\interfaces\MainModelInterface;
/**
 * 
 */
class StaffScoreLogService extends Base implements MainModelInterface {

    use \xjryanse\traits\InstTrait;
    use \xjryanse\traits\MainModelTrait;
    use \xjryanse\traits\MainModelRamTrait;
    use \xjryanse\traits\MainModelCacheTrait;
    use \xjryanse\traits\MainModelCheckTrait;
    use \xjryanse\traits\MainModelGroupTrait;
    use \xjryanse\traits\MainModelQueryTrait;


    protected static $mainModel;
    protected static $mainModelClass = '\\xjryanse\\staff\\model\\StaffScoreLog';

    use \xjryanse\staff\service\scoreLog\TriggerTraits;
    use \xjryanse\staff\service\scoreLog\MeTraits;
    use \xjryanse\staff\service\scoreLog\DoTraits;

    
    
    
}
