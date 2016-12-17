<?php
/**
 * @package logrequest
 */
$xpdo_meta_map['LogRequestLog']= array (
  'package' => 'logrequest',
  'version' => '1.1',
  'table' => 'logrequest_log',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'trigger' => '',
    'value' => '',
    'request' => NULL,
    'loggedon' => NULL,
  ),
  'fieldMeta' => 
  array (
    'trigger' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'value' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'request' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
    ),
    'loggedon' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => true,
    ),
  ),
);
