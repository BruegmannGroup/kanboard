<?php

namespace Kanboard\Plugin\ModalFormExample;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        // Attach a small modal button to the project sidebar as an example
        $this->template->hook->attach('template:project:sidebar', 'modalformexample:modal/button');

        // Optional route (not required for modal forms as controller actions are resolved automatically)
        $this->route->addRoute('/modalformexample', 'ModalFormExampleController', 'index', 'ModalFormExample');
    }

    public function getPluginName()
    {
        return 'ModalFormExample';
    }

    public function getPluginDescription()
    {
        return 'Example plugin demonstrating how to open a modal form and handle its submission.';
    }

    public function getPluginAuthor()
    {
        return 'ModalFormExample';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return '';
    }

    // Keep compatible with current app version by default
    public function getCompatibleVersion()
    {
        return APP_VERSION;
    }
}
