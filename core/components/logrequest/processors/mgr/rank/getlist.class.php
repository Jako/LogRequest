<?php

/**
 * Get Rank
 *
 * @package logrequest
 * @subpackage processors
 */
class LogrequestRankGetProcessor extends modObjectGetListProcessor
{
    public $classKey = 'LogRequestLog';
    public $languageTopics = array('logrequest:default');
    public $defaultSortField = 'count';
    public $defaultSortDirection = 'DESC';
    public $objectType = 'logrequest.log';

    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $c->select($this->modx->getSelectColumns($this->classKey, $this->classKey));
        $c->select('COUNT(*) AS count');
        $c->groupby($this->classKey . '.value');

        return $c;
    }
}

return 'LogrequestRankGetProcessor';