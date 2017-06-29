<?php

$locale      = i18n_LANG;
$textdomain  = i18n_DOMAIN;
$locales_dir = i18n_DIR;

$i18nLocale = filter_input(INPUT_GET, 'locale');

if (!is_null($i18nLocale))
    $locale = $i18nLocale;

putenv('LANGUAGE=' . $locale);
putenv('LANG=' . $locale);
putenv('LC_ALL=' . $locale);
putenv('LC_MESSAGES=' . $locale);

require_once(dirname(__FILE__) . '/src/gettext.inc');

_setlocale(LC_ALL, $locale);
_setlocale(LC_CTYPE, $locale);

_bindtextdomain($textdomain, $locales_dir);
_bind_textdomain_codeset($textdomain, 'UTF-8');
_textdomain($textdomain);

function _e($string)
{
    echo __($string);
}
