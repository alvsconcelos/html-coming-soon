<?php

namespace Models;

use Gamajo_Template_Loader;

class Html_Coming_Soon_Template
{
    protected static $filter_prefix = 'html_coming_soon';
    protected static $plugin_directory = HTML_COMING_SOON_PATH;
    protected static $plugin_template_directory = 'templates';
    protected static $theme_template_directory = 'coming-soon';
    protected static $template_key = 'public-template';

    public static function get_template_override_path()
    {
        return get_template() . '/' . static::$theme_template_directory . '/' . static::$template_key . '.php';
    }
}
