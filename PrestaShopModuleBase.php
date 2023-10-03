<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

use Vanengers\PrestashopLibModule\Module\Abstract\ContainerFunctions;
use Vanengers\PrestashopLibModule\Module\Abstract\InstallationFunctions;
use Vanengers\PrestashopLibModule\Module\Abstract\MigrationFunctions;
use Vanengers\PrestashopLibModule\Module\Abstract\ModuleInplementation;
use Vanengers\PrestashopLibModule\Module\Hook\ActionDispatcherBefore;

class PrestaShopModuleBase extends Module
{
    /** HOOKS */
    use ActionDispatcherBefore;

    /** Abstract implementations for extendable class (module) */
    use ModuleInplementation;

    /** Installation functions */
    use InstallationFunctions;

    /** Container functions */
    use ContainerFunctions;

    /** Database Migration functions for upgrading */
    use MigrationFunctions;

    public function __construct()
    {
        $this->tab = 'other_modules';
        $this->name = 'PrestaShopModuleBase';
        $this->version = '0.0.1';
        $this->author = 'Vanengers';

        parent::__construct();
        $this->displayName = $this->l('PrestaShopModuleBase');
        $this->description = $this->l('This is module description');

        $this->autoLoad();
        try {
            $this->compile();
        } catch (Throwable $e) {
            if (_PS_MODE_DEV_) {
                dump($e);
            }
        }
    }

    public function preloadAssignConfigurations(): void
    {
        $this->getConfiguration()->addConfiguration('PS_VANENGERS_TEST', 'test');
    }
}
