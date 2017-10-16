<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 *
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
    protected $_helper;
    
    /**
     * Initialize Block
     *	
     * @param TrackingLinkHelper $helper
     * @param Context $context
     * @param array $data     
     */
    public function __construct(
        TrackingLinkHelper $helper,
        Context $context, 
        array $data = []
    ) {
        $this->_helper = $helper;
        
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
        $url = $this->_helper->getCarrierUrl(
            $track->getCarrierCode()
        );
        return $url ? str_replace('{{number}}', $track->getNumber(), $url) : null;
    }
}