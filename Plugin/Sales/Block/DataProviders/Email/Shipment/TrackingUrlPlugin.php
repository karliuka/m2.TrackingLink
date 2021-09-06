<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\TrackingLink\Plugin\Sales\Block\DataProviders\Email\Shipment;

use Magento\Sales\Block\DataProviders\Email\Shipment\TrackingUrl;
use Magento\Sales\Model\Order\Shipment\Track;
use Faonni\TrackingLink\Helper\Data as TrackingLinkHelper;

/**
 * Tracking email plugin
 */
class TrackingUrlPlugin
{
    /**
     * Tracking helper
     *
     * @var TrackingLinkHelper
     */
    protected $helper;

    /**
     * Initialize plugin
     *
     * @param TrackingLinkHelper $helper
     */
    public function __construct(
        TrackingLinkHelper $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * Retrieve shipping tracking url
     *
     * @param TrackingUrl $subject
     * @param callable $proceed
     * @param Track $track
     * @return string
     */
    public function aroundGetUrl(TrackingUrl $subject, callable $proceed, Track $track)
    {
        $url = $this->helper->getCarrierUrl($track->getCarrierCode(), $track->getStoreId());
        return $url ? str_replace('{{number}}', $track->getNumber(), $url) : $proceed($track);
    }
}
