<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 *
 * See COPYING.txt for license details.
 */
namespace Faonni\TrackingLink\Plugin\Config\Model\Config\Structure\Element;

use Magento\Config\Model\Config\Structure\Element\Group as ElementGroup;
use Magento\Shipping\Model\Config as ShippingConfig;

/**
 * Group Plugin
 */
class Group
{
    /**
     * Shipping Config
     *
     * @var \Magento\Shipping\Model\Config
     */
    protected $_shippingConfig;

    /**
     * Initialize Plugin
     *
     * @param ShippingConfig $shippingConfig
     */
    public function __construct(
        ShippingConfig $shippingConfig
    ) {
        $this->_shippingConfig = $shippingConfig;
    }

    /**
     * Set Flyweight Data
     *
     * @param ElementGroup $subject
     * @param array $data
     * @param string $scope
     * @return array
     */
    public function beforeSetData(ElementGroup $subject, array $data, $scope)
    {
        if ($data['id'] == 'service_url' && $data['path'] == 'faonni_tracking') {
            foreach ($this->_getTrackingCarriers() as $code => $title) {
                if (isset($data['children'][$code])) {
                    continue;
                }
                $data['children'][$code] = $this->_getFieldData($code, $title);
            }
        }
        return [$data, $scope];
    }

    /**
     * Retrieve Tracking Carriers
     *
     * @param string $code
     * @param string $title
     * @return array
     */
    protected function _getFieldData($code, $title)
    {
        return [
            'id' => $code,
            'type' => 'text',
            'showInDefault' => '1',
            'showInWebsite' => '1',
            'showInStore' => '0',
            'label' => (string)__($title),
            'path' => 'faonni_tracking/service_url',
            '_elementType' => 'field'
        ];
    }

    /**
     * Retrieve Tracking Carriers
     *
     * @return array
     */
    protected function _getTrackingCarriers()
    {
        $carriers = [];
        foreach ($this->_getAllCarriers() as $code => $carrier) {
            if ($carrier->isTrackingAvailable()) {
                $carriers[$code] = $carrier->getConfigData('title');
            }
        }
        return $carriers;
    }

    /**
     * Retrieve All System Carriers
     *
     * @return  array
     */
    protected function _getAllCarriers()
    {
        return $this->_shippingConfig->getAllCarriers();
    }
}
