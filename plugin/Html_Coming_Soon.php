<?php

namespace PluginNamePlugin;

use Includes\Html_Coming_Soon_Activator;
use Includes\Html_Coming_Soon_Deactivator;
use Includes\Html_Coming_Soon_Core;

class Html_Coming_Soon
{
    public function __construct($plugin_file)
    {
        register_activation_hook($plugin_file, array($this, 'activate_plugin_name'));
        register_deactivation_hook($plugin_file, array($this, 'deactivate_plugin_name'));
        $this->run_plugin_name();
    }

    public function activate_plugin_name()
    {
        Html_Coming_Soon_Activator::activate();
    }

    public function deactivate_plugin_name()
    {
        Html_Coming_Soon_Deactivator::deactivate();
    }

    public function run_plugin_name()
    {
        $plugin = new Html_Coming_Soon_Core();
        $plugin->run();
    }
}
