<?php
/**
 * Get Log
 *
 * @package logrequest
 * @subpackage processors
 */

use TreehillStudio\LogRequest\Processors\ObjectGetListProcessor;

class LogrequestLogGetProcessor extends ObjectGetListProcessor
{
    public $classKey = 'LogRequestLog';
    public $defaultSortField = 'loggedon';
    public $defaultSortDirection = 'DESC';
    public $objectType = 'logrequest.log';

    public function prepareRow(xPDOObject $object)
    {
        $ta = $object->toArray();
        $ta['loggedon'] = !empty($ta['loggedon']) ? strftime('%Y-%m-%d %H:%M:%S', $ta['loggedon']) : '';
        $ta['value'] = htmlspecialchars($ta['value']);
        return $ta;
    }
}

return 'LogrequestLogGetProcessor';