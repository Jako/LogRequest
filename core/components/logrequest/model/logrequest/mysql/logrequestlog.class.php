<?php
/**
 * @package logrequest
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/logrequestlog.class.php');
class LogRequestLog_mysql extends LogRequestLog {}
?>