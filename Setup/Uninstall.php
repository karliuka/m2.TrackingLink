<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\TrackingLink\Setup;

use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Config\Model\ResourceModel\Config\Data\CollectionFactory as ConfigCollectionFactory;

/**
 * TrackingLink Uninstall
 */
class Uninstall implements UninstallInterface
{
    /**
     * @var ConfigCollectionFactory
     */
    protected $configCollectionFactory;

    /**
     * Initialize setup
     *
     * @param ConfigCollectionFactory $configCollectionFactory
     */
    public function __construct(
        ConfigCollectionFactory $configCollectionFactory
    ) {
        $this->configCollectionFactory = $configCollectionFactory;
    }

    /**
     * Uninstall DB Schema
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->removeConfig();
        $setup->endSetup();
    }

    /**
     * Remove config
     *
     * @return void
     */
    protected function removeConfig()
    {
        $path = 'faonni_tracking/service_url';
        $collection = $this->configCollectionFactory->create();
        $collection->addPathFilter($path);
        $collection->walk('delete');
    }
}
