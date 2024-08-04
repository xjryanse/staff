<?php

namespace xjryanse\staff\service\scoreThing;

/**
 * 分页复用列表
 */
trait FieldTraits {

    public function fDeptId() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    public function fInitScore() {
        return $this->getFFieldValue(__FUNCTION__);
    }
}
