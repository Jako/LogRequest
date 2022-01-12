<?php
/**
 * LogRequest Plugin
 *
 * @package logrequest
 * @subpackage plugin
 *
 * @var modX $modx
 * @var array $scriptProperties
 */

$className = 'TreehillStudio\LogRequest\Plugins\Events\\' . $modx->event->name;

$corePath = $modx->getOption('logrequest.core_path', null, $modx->getOption('core_path') . 'components/logrequest/');
/** @var LogRequest $logrequest */
$logrequest = $modx->getService('logrequest', 'LogRequest', $corePath . 'model/logrequest/', [
    'core_path' => $corePath
]);

if ($logrequest) {
    if (class_exists($className)) {
        $handler = new $className($modx, $scriptProperties);
        if (get_class($handler) == $className) {
            $handler->run();
        } else {
            $modx->log(xPDO::LOG_LEVEL_ERROR, $className. ' could not be initialized!', '', 'LogRequest Plugin');
        }
    } else {
        $modx->log(xPDO::LOG_LEVEL_ERROR, $className. ' was not found!', '', 'LogRequest Plugin');
    }
}

return;