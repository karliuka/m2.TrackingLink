<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\TrackingLink\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Store\Api\Data\StoreInterface;
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
     * @param int|null $store
     * @return string
     */
    public function getCarrierUrl($carrierCode, $store = null)
    {
        return $this->getConfig("faonni_tracking/service_url/{$carrierCode}", $store);
    }

    /**
     * Retrieve store configuration data
     *
     * @param string $path
     * @param int|null $store
     * @return mixed
     */
    protected function getConfig($path, $store = null)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, $store);
    }
}
