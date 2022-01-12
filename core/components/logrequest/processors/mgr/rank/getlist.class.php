<?php
/**
 * Get Rank
 *
 * @package logrequest
 * @subpackage processors
 */

use TreehillStudio\LogRequest\Processors\ObjectGetListProcessor;

class LogrequestRankGetProcessor extends ObjectGetListProcessor
{
    public $classKey = 'LogRequestLog';
    public $defaultSortField = 'count';
    public $defaultSortDirection = 'DESC';
    public $objectType = 'logrequest.log';

    public function process()
    {
        $c = $this->modx->newQuery($this->classKey);
        $c->select($this->modx->getSelectColumns($this->classKey, $this->classKey, '', ['value']));
        $c->select('COUNT(*) AS count');
        $c->groupby($this->classKey . '.value');
        $c->sortby($this->getProperty('sort', $this->defaultSortField), $this->getProperty('sort_dir', $this->defaultSortDirection));

        if ($c->prepare()) {
            $cq = new xPDOCriteria($this->modx, "SELECT COUNT(*) FROM ({$c->toSQL(false)}) cq", $c->bindings, $c->cacheFlag);
            $total = ($cq->stmt && $cq->stmt->execute()) ? intval($cq->stmt->fetchColumn()) : 0;

            $c->limit($this->getProperty('limit', 10), $this->getProperty('offset', 0));
            if ($c->prepare()) {
                $list = [];
                if ($c->stmt->execute()) {
                    while ($data = $c->stmt->fetch(PDO::FETCH_OBJ)) {
                        $list[] = [
                            'value' => $data->value,
                            'count' => $data->count
                        ];
                    }
                }
                return $this->outputArray($list, $total);
            }
        }
        return $this->failure('Could not retrieve data');
    }

    public function prepareRow(xPDOObject $object)
    {
        $ta = $object->toArray();
        $ta['value'] = htmlspecialchars($ta['value']);
        return $ta;
    }
}

return 'LogrequestRankGetProcessor';