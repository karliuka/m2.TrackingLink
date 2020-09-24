<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\TrackingLink\Plugin\Email\Model\Template;

use Magento\Email\Model\Template\Filter as TemplateFilter;

/**
 * Filter plugin
 */
class Filter
{
    /**
     * Track email block class name
     *
     * @var string
     */
    protected $class;

    /**
     * Track email template
     *
     * @var string
     */
    protected $template;

    /**
     * Initialize plugin
     *
     * @param string $class
     * @param string $template
     */
    public function __construct(
        $class,
        $template
    ) {
        $this->class = $class;
        $this->template = $template;
    }

    /**
     * Retrieve block html directive
     *
     * @param TemplateFilter $subject
     * @param mixed[] $construction
     * @return mixed[]
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
     * Check is track template
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
     * Replace track block class name
     *
     * @param string $string
     * @return string
     */
    protected function replaceBlockClass($string)
    {
        $class = $this->class;
        return (string)preg_replace_callback(
            "#class='([^']+)'#s",
            function ($match) use ($class) {
                return "class='$class'";
            },
            $string
        );
    }

    /**
     * Replace track template filename
     *
     * @param string $string
     * @return string
     */
    protected function replaceTrackTemplate($string)
    {
        $template = $this->template;
        return (string)preg_replace_callback(
            "#template='([^']+)'#s",
            function ($match) use ($template) {
                return "template='$template'";
            },
            $string
        );
    }
}
