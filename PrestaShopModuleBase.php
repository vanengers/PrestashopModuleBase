<?php

use Vanengers\PrestashopLibModule\Module\BaseModule;

class PrestaShopModuleBase extends BaseModule
{
    public function __construct()
    {
        $this->tab = 'other_modules';
        $this->name = 'PrestaShopModuleBase';
        $this->version = '0.0.1';
        $this->author = 'Vanengers';

        parent::__construct();
        $this->displayName = $this->l('PrestaShopModuleBase');
        $this->description = $this->l('This is module description');
    }

    public function preloadAssignConfigurations(): void
    {
        $this->getConfiguration()->addConfiguration('PS_VANENGERS_TEST', 'test');
    }
}