<?php

namespace Vanengers\PrestashopBaseModule\Composer;

use Composer\Script\Event;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateProject
{
    public static function postCreateProject(Event $event)
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        require $vendorDir . '/autoload.php';

        shell_exec('php '.$vendorDir.'/../bin/run Play');
    }
}