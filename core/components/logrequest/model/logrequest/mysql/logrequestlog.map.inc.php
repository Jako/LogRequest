<?php
/**
 * @package logrequest
 */
$xpdo_meta_map['LogRequestLog']= array (
  'package' => 'logrequest',
  'version' => '1.1',
  'table' => 'logrequest_log',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'trigger' => '',
    'value' => '',
    'request' => NULL,
    'loggedon' => 0,
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
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 0,
    ),
  ),
);
