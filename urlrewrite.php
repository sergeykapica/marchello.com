<?php
$arUrlRewrite=array (
  1 => 
  array (
    'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/actions/set-likes.php#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/local/php_interface/include_files/Actions/set-likes.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/actions/set-views.php#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/local/php_interface/include_files/Actions/set-views.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/online/(/?)([^/]*)#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/stssync/calendar/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/calendar/index.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/actions/set-to-online-list.php#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/local/php_interface/include_files/Actions/set-to-online-list.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/actions/unset-to-online-list.php#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/local/php_interface/include_files/Actions/unset-to-online-list.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/actions/add-chat-message-to-db.php#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/local/php_interface/include_files/Actions/add-chat-message-to-db.php',
    'SORT' => 100,
  ),
  11 => 
  array (
    'CONDITION' => '#^/actions/get-new-messages-from-chat.php#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/local/php_interface/include_files/Actions/get-new-messages-from-chat.php',
    'SORT' => 100,
  ),
  12 => 
  array (
    'CONDITION' => '#^/actions/get-online-list.php#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/local/php_interface/include_files/Actions/get-online-list.php',
    'SORT' => 100,
  ),
  13 =>
  array (
    'CONDITION' => '#^/actions/chat-ban-system.php#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/local/php_interface/include_files/Actions/chat-ban-system.php',
    'SORT' => 100,
  )
);
