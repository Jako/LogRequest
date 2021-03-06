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

$className = 'LogRequest' . $modx->event->name;

$corePath = $modx->getOption('logrequest.core_path', null, $modx->getOption('core_path') . 'components/logrequest/');
/** @var LogRequest $logrequest */
$logrequest = $modx->getService('logrequest', 'LogRequest', $corePath . 'model/logrequest/', array(
    'core_path' => $corePath
));

$modx->loadClass('LogRequestPlugin', $logrequest->getOption('modelPath') . 'logrequest/events/', true, true);
$modx->loadClass($className, $logrequest->getOption('modelPath') . 'logrequest/events/', true, true);
if (class_exists($className)) {
    /** @var LogRequestPlugin $handler */
    $handler = new $className($modx, $scriptProperties);
    $handler->run();
}

return;
