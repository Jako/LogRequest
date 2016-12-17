<?php
/**
 * Resolve creating db tables
 *
 * THIS RESOLVER IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package logrequest
 * @subpackage build
 */

if ($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modelPath = $modx->getOption('logrequest.core_path', null, $modx->getOption('core_path') . 'components/logrequest/') . 'model/';
            
            $modx->addPackage('logrequest', $modelPath, null);


            $manager = $modx->getManager();

            $manager->createObjectContainer('LogRequestLog');

            break;
    }
}

return true;