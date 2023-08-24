<?php

namespace Vanengers\PrestashopBaseModule\Composer;

use Composer\Script\Event;

class CreateProject
{
    public static function postCreateProject(Event $event)
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        require $vendorDir . '/autoload.php';

        echo 'hello there! we are in folder: '.$vendorDir;
    }
}