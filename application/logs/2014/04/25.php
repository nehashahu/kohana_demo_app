<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-04-25 09:54:58 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH\classes\Kohana\Cookie.php [ 151 ] in D:\xampp\htdocs\demo\system\classes\Kohana\Cookie.php:67
2014-04-25 09:54:58 --- DEBUG: #0 D:\xampp\htdocs\demo\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('session', NULL)
#1 D:\xampp\htdocs\demo\system\classes\Kohana\Request.php(151): Kohana_Cookie::get('session')
#2 D:\xampp\htdocs\demo\index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in D:\xampp\htdocs\demo\system\classes\Kohana\Cookie.php:67
2014-04-25 09:56:55 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH\classes\Kohana\Cookie.php [ 151 ] in D:\xampp\htdocs\demo\system\classes\Kohana\Cookie.php:67
2014-04-25 09:56:55 --- DEBUG: #0 D:\xampp\htdocs\demo\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('session', NULL)
#1 D:\xampp\htdocs\demo\system\classes\Kohana\Request.php(151): Kohana_Cookie::get('session')
#2 D:\xampp\htdocs\demo\index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in D:\xampp\htdocs\demo\system\classes\Kohana\Cookie.php:67
2014-04-25 10:00:27 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH\classes\Kohana\Cookie.php [ 151 ] in D:\xampp\htdocs\demo\system\classes\Kohana\Cookie.php:67
2014-04-25 10:00:27 --- DEBUG: #0 D:\xampp\htdocs\demo\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('session', NULL)
#1 D:\xampp\htdocs\demo\system\classes\Kohana\Request.php(151): Kohana_Cookie::get('session')
#2 D:\xampp\htdocs\demo\index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in D:\xampp\htdocs\demo\system\classes\Kohana\Cookie.php:67
2014-04-25 10:02:08 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::redirect() ~ APPPATH\classes\Controller\Welcome.php [ 7 ] in file:line
2014-04-25 10:02:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-04-25 10:03:56 --- CRITICAL: ErrorException [ 1 ]: Class 'Auth' not found ~ APPPATH\classes\Controller\User.php [ 66 ] in file:line
2014-04-25 10:03:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-04-25 10:04:23 --- CRITICAL: Kohana_Exception [ 0 ]: A valid hash key must be set in your auth config. ~ MODPATH\auth\classes\Kohana\Auth.php [ 155 ] in D:\xampp\htdocs\demo\modules\auth\classes\Kohana\Auth\File.php:40
2014-04-25 10:04:23 --- DEBUG: #0 D:\xampp\htdocs\demo\modules\auth\classes\Kohana\Auth\File.php(40): Kohana_Auth->hash('sddsds')
#1 D:\xampp\htdocs\demo\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_File->_login('sdsd', 'sddsds', false)
#2 D:\xampp\htdocs\demo\application\classes\Controller\User.php(66): Kohana_Auth->login('sdsd', 'sddsds', false)
#3 D:\xampp\htdocs\demo\system\classes\Kohana\Controller.php(84): Controller_User->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\xampp\htdocs\demo\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#6 D:\xampp\htdocs\demo\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\xampp\htdocs\demo\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 D:\xampp\htdocs\demo\index.php(118): Kohana_Request->execute()
#9 {main} in D:\xampp\htdocs\demo\modules\auth\classes\Kohana\Auth\File.php:40
2014-04-25 10:06:34 --- CRITICAL: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 67 ] in D:\xampp\htdocs\demo\modules\database\classes\Kohana\Database\MySQL.php:171
2014-04-25 10:06:34 --- DEBUG: #0 D:\xampp\htdocs\demo\modules\database\classes\Kohana\Database\MySQL.php(171): Kohana_Database_MySQL->connect()
#1 D:\xampp\htdocs\demo\modules\database\classes\Kohana\Database\MySQL.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#2 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\ORM.php(1668): Kohana_Database_MySQL->list_columns('users')
#3 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#4 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#5 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#6 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#7 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\Auth\ORM.php(79): Kohana_ORM::factory('User')
#8 D:\xampp\htdocs\demo\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login('asassa', 'assasa', false)
#9 D:\xampp\htdocs\demo\application\classes\Controller\User.php(66): Kohana_Auth->login('asassa', 'assasa', false)
#10 D:\xampp\htdocs\demo\system\classes\Kohana\Controller.php(84): Controller_User->action_login()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\xampp\htdocs\demo\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#13 D:\xampp\htdocs\demo\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\xampp\htdocs\demo\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#15 D:\xampp\htdocs\demo\index.php(118): Kohana_Request->execute()
#16 {main} in D:\xampp\htdocs\demo\modules\database\classes\Kohana\Database\MySQL.php:171
2014-04-25 10:07:16 --- CRITICAL: Database_Exception [ 1146 ]: Table 'demo.users' doesn't exist [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in D:\xampp\htdocs\demo\modules\database\classes\Kohana\Database\MySQL.php:359
2014-04-25 10:07:16 --- DEBUG: #0 D:\xampp\htdocs\demo\modules\database\classes\Kohana\Database\MySQL.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#1 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\ORM.php(1668): Kohana_Database_MySQL->list_columns('users')
#2 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 D:\xampp\htdocs\demo\modules\orm\classes\Kohana\Auth\ORM.php(79): Kohana_ORM::factory('User')
#7 D:\xampp\htdocs\demo\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login('assasa', 'sasasa', false)
#8 D:\xampp\htdocs\demo\application\classes\Controller\User.php(66): Kohana_Auth->login('assasa', 'sasasa', false)
#9 D:\xampp\htdocs\demo\system\classes\Kohana\Controller.php(84): Controller_User->action_login()
#10 [internal function]: Kohana_Controller->execute()
#11 D:\xampp\htdocs\demo\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#12 D:\xampp\htdocs\demo\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 D:\xampp\htdocs\demo\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 D:\xampp\htdocs\demo\index.php(119): Kohana_Request->execute()
#15 {main} in D:\xampp\htdocs\demo\modules\database\classes\Kohana\Database\MySQL.php:359