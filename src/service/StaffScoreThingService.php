<?php

namespace xjryanse\staff\service;

use xjryanse\system\interfaces\MainModelInterface;
/**
 * 
 */
class StaffScoreThingService extends Base implements MainModelInterface {

    use \xjryanse\traits\InstTrait;
    use \xjryanse\traits\MainModelTrait;
    use \xjryanse\traits\MainModelRamTrait;
    use \xjryanse\traits\MainModelCacheTrait;
    use \xjryanse\traits\MainModelCheckTrait;
    use \xjryanse\traits\MainModelGroupTrait;
    use \xjryanse\traits\MainModelQueryTrait;


    protected static $mainModel;
    protected static $mainModelClass = '\\xjryanse\\staff\\model\\StaffScoreThing';

    use \xjryanse\staff\service\scoreThing\TriggerTraits;
    use \xjryanse\staff\service\scoreThing\FieldTraits;

}
