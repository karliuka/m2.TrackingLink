<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\TrackingLink\Block\Sales\Email\Shipment;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Sales\Model\ResourceModel\Order\Shipment\Track\CollectionFactory as TrackCollectionFactory;
use Faonni\TrackingLink\Helper\Data as TrackingLinkHelper;

/**
 * Track block
 */
class Track extends Template
{
    /**
     * Tracking helper
     *
     * @var \Faonni\TrackingLink\Helper\Data
     */
    protected $helper;

    /**
     * Track collection
     *
     * @var \Magento\Sales\Model\ResourceModel\Order\Shipment\Track\Collection
     */
    protected $tracksCollection;

    /**
     * Track collection factory
     *
     * @var \Magento\Sales\Model\ResourceModel\Order\Shipment\Track\CollectionFactory
     */
    protected $trackCollectionFactory;

    /**
     * Initialize block
     *
     * @param Context $context
     * @param TrackingLinkHelper $helper
     * @param TrackCollectionFactory $trackCollectionFactory
     * @param mixed[] $data
     */
    public function __construct(
        Context $context,
        TrackingLinkHelper $helper,
        TrackCollectionFactory $trackCollectionFactory,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->trackCollectionFactory = $trackCollectionFactory;

        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * Retrieve tracking url
     *
     * @param \Magento\Shipping\Model\Order\Track $track
     * @return string|null
     */
    public function getTrackingUrl($track)
    {
        $url = $this->helper->getCarrierUrl(
            $track->getCarrierCode(),
            (string)$track->getStoreId()
        );
        return $url ? str_replace('{{number}}', $track->getNumber(), $url) : null;
    }

    /**
     * Retrieve tracks collection
     *
     * @param integer $shipmentId
     * @return \Magento\Sales\Model\ResourceModel\Order\Shipment\Track\Collection
     */
    public function getTracksCollection($shipmentId)
    {
        if ($this->tracksCollection === null) {
            $this->tracksCollection = $this->trackCollectionFactory->create();
            $this->tracksCollection->setShipmentFilter($shipmentId);
        }
        return $this->tracksCollection;
    }
}
