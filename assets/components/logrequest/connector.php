<?php
/**
 * LogRequest connector
 *
 * @package logrequest
 * @subpackage connector
 *
 * @var modX $modx
 */

require_once dirname(__FILE__, 4) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('logrequest.core_path', null, $modx->getOption('core_path') . 'components/logrequest/');
/** @var LogRequest $logrequest */
$logrequest = $modx->getService('logrequest', 'LogRequest', $corePath . 'model/logrequest/', [
    'core_path' => $corePath
]);

// Handle request
$modx->request->handleRequest([
    'processors_path' => $logrequest->getOption('processorsPath'),
    'location' => ''
]);
