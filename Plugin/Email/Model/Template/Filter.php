<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 *
 * See COPYING.txt for license details.
 */
namespace Faonni\TrackingLink\Plugin\Email\Model\Template;

use Magento\Email\Model\Template\Filter as TemplateFilter;

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
    protected $class;

    /**
     * Track Email Template
     *
     * @var string
     */
    protected $template;

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
        $this->class = $class;
        $this->template = $template;
    }

    /**
     * Retrieve Block Html Directive
     *
     * @param TemplateFilter $subject
     * @param array $construction
     * @return array
     */
    public function beforeBlockDirective(TemplateFilter $subject, $construction)
    {
        if ($this->isDefaultTrackTemplate($construction[2])) {
            $construction[2] = $this->replaceBlockClass(
                $this->replaceTrackTemplate($construction[2])
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
    protected function isDefaultTrackTemplate($string)
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
    protected function replaceBlockClass($string)
    {
        $class = $this->class;
        return preg_replace_callback(
            "#class='([^']+)'#s",
            function ($match) use ($class) {
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
    protected function replaceTrackTemplate($string)
    {
        $template = $this->template;
        return preg_replace_callback(
            "#template='([^']+)'#s",
            function ($match) use ($template) {
                return "template='$template'";
            },
            $string
        );
    }
}
