<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\TrackingLink\Block\Sales\Email\Shipment;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Faonni\TrackingLink\Helper\Data as TrackingLinkHelper;

/**
 * Email Track Block
 */
class Track extends Template
{
    /**
     * Helper
     *
     * @var \Faonni\TrackingLink\Helper\Data
     */
    protected $helper;

    /**
     * Initialize Block
     *
     * @param Context $context
     * @param TrackingLinkHelper $helper
     * @param array $data
     */
    public function __construct(
        Context $context,
        TrackingLinkHelper $helper,
        array $data = []
    ) {
        $this->helper = $helper;

        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * Retrieve Tracking Url
     *
     * @param \Magento\Shipping\Model\Order\Track $track
     * @return string
     */
    public function getTrackingUrl($track)
    {
        $url = $this->helper->getCarrierUrl(
            $track->getCarrierCode(),
            $track->getStoreId()
        );
        return $url ? str_replace('{{number}}', $track->getNumber(), $url) : null;
    }
}
