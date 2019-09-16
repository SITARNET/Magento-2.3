<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sitarnet\Vendor\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Sitarnet\Vendor\Model\Vendor;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    protected $_vendor;
    public function __construct(Vendor $vendor)
    {
        $this->_vendor = $vendor;
    }
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        // Action to do if module version is less than 1.0.0.1
        if (version_compare($context->getVersion(), '1.0.0.1') < 0) {
            $vendors = [
                [
                    'name' => 'Adidas',
                    'description' => 'adidas has its roots in Germany but we are a truly global company. Around the 
                    world we employ over 57,000 people. Employees from about 100 nations are working at our global HQ
                     in Herzogenaurach, Germany – the ‘World of Sports’. Every year we produce over 900 million sports
                      and sports lifestyle products with independent manufacturing partners worldwide. In 2018 we 
                      generated sales of € 21.915 billion. These numbers alone can easily suggest that adidas is 
                      quite a large and also multifaceted organization. True. But we keep things simple, lean and 
                      fast. And we will use this approach now to give an overview of what our company is all about.'
                ],
                [
                    'name' => 'Nike',
                    'description' => 'Our mission is what drives us to do everything possible to expand human 
                    potential. We do that by creating groundbreaking sport innovations, by making our products more
                     sustainably, by building a creative and diverse global team and by making a positive impact in
                      communities where we live and work.'
                ],
                [
                    'name' => 'Reebok',
                    'description' => 'Reebok’s story has led us to establish core ideals that allow us to remain 
                    strong, clear, and unwavering as an organization. Also at Reebok we believe that, through sport,
                     we have the power to change lives. As a brand Reebok defines sport as something greater. Greater
                      than fandom, or the lives of all-stars. As everyday participation – for anybody and any body.
                       Reebok defines sport as fitness.'
                ]
            ];
            /**
             * Insert vendors
             */
            foreach ($vendors as $data) {
                $this->_vendor->setData($data)->save();
            }
        }
        $installer->endSetup();
    }
}
