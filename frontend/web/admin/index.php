<?php
/*
后台引用文件
 */

error_reporting(E_ERROR | E_WARNING | E_PARSE); 

//系统根目录
defined('APP_ROOT_PATH') or define('APP_ROOT_PATH', dirname(dirname(dirname(dirname(__FILE__)))));

//引入后台index
include_once(APP_ROOT_PATH.'/backend/web/index.php');

 