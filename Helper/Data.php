<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 *
 * See COPYING.txt for license details.
 */
namespace Faonni\TrackingLink\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\AbstractHelper;

/**
 * TrackingLink Helper
 */
class Data extends AbstractHelper 
{
    /**
     * Retrieve carrier url
     *
     * @param string $carrierCode
     * @param int|Store $store     
     * @return string|null
     */
    public function getCarrierUrl($carrierCode, $store = null)
    {
        return $this->_getConfig("faonni_tracking/service_url/{$carrierCode}", $store);
    }
    
    /**
     * Retrieve Store Configuration Data
     *
     * @param string $path
     * @param int|Store $store	 
     * @return string|null
     */
    protected function _getConfig($path, $store = null)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, $store);
    }
}
