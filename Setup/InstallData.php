<?php
/**
 * Copyright © 2018 TechNWeb, Inc. All rights reserved.
 * See TNW_LICENSE.txt for license details.
 */
namespace TNW\Marketing\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->getConnection()->insertOnDuplicate(
            $setup->getTable('core_config_data'),
            [
                'scope' => 'default',
                'scope_id' => 0,
                'path' => 'tnw_marketing/survey/start_date',
                'value' => date_create()->modify('+7 day')->getTimestamp()
            ]
        );
    }
}
