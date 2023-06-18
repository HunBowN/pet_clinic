<?php

error_reporting(E_ALL);
date_default_timezone_set('Europe/Moscow');

define('FROOT', rtrim($_SERVER["DOCUMENT_ROOT"], '/'));
define('SYSPATH',     FROOT.'/app');

spl_autoload_register(function ($class) {
    $class_name = trim($class, '\\');

    $class_name = explode('_', $class_name);
    $size       = count($class_name);

    $class_name             = array_map('lcfirst', $class_name);
    $class_name[$size - 1]  = ucfirst($class_name[$size -1]);
    $class_name             = implode('/', $class_name);

    if (file_exists(SYSPATH.'/classes/'.$class_name.'.php'))
    {
      require_once(SYSPATH.'/classes/'.$class_name.'.php');
    }
    });