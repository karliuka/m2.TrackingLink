<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 *
 * See COPYING.txt for license details.
 */
namespace Faonni\TrackingLink\Plugin\Email\Model\Template;

/**
 * Filter Plugin
 */
class Filter
{
    /**
     * Track Email Block Class Name
     *
     * @var string
     */
    protected $_class;
	
    /**
     * Track Email Template
     *
     * @var string
     */
    protected $_template;
	
    /**
	 * Initialize Plugin
	 *
     * @param array $class
     * @param array $template	 
     */
    public function __construct(
		$class = null,
		$template = null
	) {
		$this->_class = $class;
		$this->_template = $template;
    }    
    
    /**
     * Retrieve Block Html Directive
     *
     * @param \Magento\Email\Model\Template\Filter $subject
     * @param array $construction
     * @return array
     */     
    public function beforeBlockDirective($subject, $construction)
    {
        if ($this->_isDefaultTrackTemplate($construction[2])) {
			$construction[2] = $this->_replaceBlockClass(
				$this->_replaceTrackTemplate($construction[2])
			);
		}
        return [$construction];
    }
	
    /**
     * Check is Track Template
     *
     * @param string $string
     * @return bool
     */    
    protected function _isDefaultTrackTemplate($string)
    {
        return (bool) preg_match(
			"#template='Magento_Sales::email\/shipment\/track\.phtml'#s", 
			$string
		);
    }
	
    /**
     * Replace Track Block Class Name
     *
     * @param string $string
     * @return string
     */  	
    protected function _replaceBlockClass($string)
    {
        $class = $this->_class;
		return preg_replace_callback(
            "#class='([^']+)'#s",
            function($match) use ($class) { 
				return "class='$class'";
			}, 
            $string
        ); 
    } 
	
    /**
     * Replace Track Template Filename
     *
     * @param string $string
     * @return string
     */  	
    protected function _replaceTrackTemplate($string)
    {
        $template = $this->_template;
		return preg_replace_callback(
            "#template='([^']+)'#s",
            function($match) use ($template) { 
				return "template='$template'";
			}, 
            $string
        ); 
    }   	
}