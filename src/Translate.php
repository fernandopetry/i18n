<?php

namespace Adara\i18n;

/**
 * Tradução do sistema pelo padrão i18n    
 * 
 * Classe: Translate
 * 
 * @filesource Translate.php
 * @package i18n
 * @subpackage 
 * @category
 * @version v1.0
 * @since 28/06/2017 17:37:18
 * @copyright (cc) 2017, Fernando Petry
 * 
 * @author Fernando Petry <fernando@ideia.ppg.br>                                                  
 */
class Translate
{

    private $locale;
    private $domain;
    private $directory;

    public function __construct($locale, $domain, $directory)
    {
        $this->locale    = $locale;
        $this->domain    = $domain;
        $this->directory = $directory;

        $i18nLocale = filter_input(INPUT_GET, 'locale');

        if (!is_null($i18nLocale))
            $this->locale = $i18nLocale;

        $this->alter();
        $this->requireGetText();
        $this->setsInternal();
    }

    private function requireGetText()
    {
        require_once(dirname(__FILE__) . '/gettext.inc');
    }

    private function alter()
    {
        putenv('LANGUAGE=' . $this->locale);
        putenv('LANG=' . $this->locale);
        putenv('LC_ALL=' . $this->locale);
        putenv('LC_MESSAGES=' . $this->locale);
    }

    private function setsInternal()
    {
        _setlocale(LC_ALL, $this->locale);
        _setlocale(LC_CTYPE, $this->locale);

        _bindtextdomain($this->domain, $this->directory);
        _bind_textdomain_codeset($this->domain, 'UTF-8');
        _textdomain($this->domain);
    }

}