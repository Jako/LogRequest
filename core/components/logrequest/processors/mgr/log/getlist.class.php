<?php

/**
 * Get Log
 *
 * @package logrequest
 * @subpackage processors
 */
class LogrequestLogGetProcessor extends modObjectGetListProcessor
{
    public $classKey = 'LogRequestLog';
    public $languageTopics = array('logrequest:default');
    public $defaultSortField = 'loggedon';
    public $defaultSortDirection = 'DESC';
    public $objectType = 'logrequest.log';

    public function prepareRow(xPDOObject $object)
    {
        $ta = $object->toArray('', false, false);
        $ta['loggedon'] = !empty($ta['loggedon']) ? strftime('%Y-%m-%d %H:%M:%S', $ta['loggedon']) : '';
        $ta['value'] = htmlspecialchars($ta['value']);
        return $ta;
    }
}

return 'LogrequestLogGetProcessor';