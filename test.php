<?php
// forçando a exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('i18n_LANG', 'en_US');
define('i18n_DOMAIN', 'hello_multi_world');
define('i18n_DIR', dirname(__FILE__) . '/i18n');

require_once './vendor/autoload.php';

new \Adara\i18n\Translate(i18n_LANG, i18n_DOMAIN, i18n_DIR);

// Suporte a multilinguagens
//define('LANG', 'pt_BR');
//define('LANG', 'pt_PT');
//define('i18n_LANG', 'en_US');
//define('i18n_DOMAIN', 'hello_multi_world');
//define('i18n_DIR', dirname(__FILE__) . '/i18n');
//require_once('i18n.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo __('Hello Multi World!'); ?></title>
    </head>
    <body>
        <h1><?php _e('Hello Multi World!'); ?></h1>
    </body>
</html>