<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
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
     * @var \Magento\Shipping\Model\Config
     */
    protected $shippingConfig;

    /**
     * Initialize plugin
     *
     * @param ShippingConfig $shippingConfig
     */
    public function __construct(
        ShippingConfig $shippingConfig
    ) {
        $this->shippingConfig = $shippingConfig;
    }

    /**
     * Set flyweight data
     *
     * @param ElementGroup $subject
     * @param mixed[] $data
     * @param string $scope
     * @return mixed[]
     */
    public function beforeSetData(ElementGroup $subject, array $data, $scope)
    {
        if ($data['id'] == 'service_url' && $data['path'] == 'faonni_tracking') {
            foreach ($this->getTrackingCarriers() as $code => $title) {
                if (isset($data['children'][$code])) {
                    continue;
                }
                $data['children'][$code] = $this->getFieldData($code, $title);
            }
        }
        return [$data, $scope];
    }

    /**
     * Retrieve tracking carriers
     *
     * @param string $code
     * @param string $title
     * @return mixed[]
     */
    protected function getFieldData($code, $title)
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
     * Retrieve tracking carriers
     *
     * @return mixed[]
     */
    protected function getTrackingCarriers()
    {
        $carriers = [];
        foreach ($this->getAllCarriers() as $code => $carrier) {
            if ($carrier->isTrackingAvailable()) {
                $carriers[$code] = $carrier->getConfigData('title');
            }
        }
        return $carriers;
    }

    /**
     * Retrieve all system carriers
     *
     * @return  mixed[]
     */
    protected function getAllCarriers()
    {
        return $this->shippingConfig->getAllCarriers();
    }
}
