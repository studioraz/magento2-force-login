<?php

/*
 * This file is part of the Force Login module for Magento2.
 *
 * (c) bitExpert AG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BitExpert\ForceCustomerLogin\Controller;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Class ModuleCheck
 *
 * @package BitExpert\ForceCustomerLogin\Controller
 */
class ModuleCheck
{
    /*
     * Configuration
     */
    const MODULE_CONFIG_ENABLED = 'customer/BitExpert_ForceCustomerLogin/enabled';
    const MODULE_CONFIG_ALLOWED_GROUP = 'customer/BitExpert_ForceCustomerLogin/allowed_customer_group';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * ModuleCheck constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return bool
     */
    public function isModuleEnabled()
    {
        return !!$this->scopeConfig->getValue(
            self::MODULE_CONFIG_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getAllowedCustomerGroups()
    {
        $groups = $this->scopeConfig->getValue(
            self::MODULE_CONFIG_ALLOWED_GROUP,
            ScopeInterface::SCOPE_STORE
        );
        return explode(',', $groups);
    }
}
