<?php

use Vanengers\PrestashopLibModule\Module\BaseModule;

if (!defined('_PS_VERSION_')) {
    exit;
}
function upgrade_module_0_0_1($module)
{
    /** @var BaseModule $module */
    return $module->getMigrator()->migrateUp();
}