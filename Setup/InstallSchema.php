<?php
/**
 *  Mage-World
 *
 * @category    Mage-World
 * @package     MW
 * @author      Mage-world Developer
 *
 * @copyright   Copyright (c) 2018 Mage-World (https://www.mage-world.com/)
 */

namespace MW\SalesUserDetecter\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $setup->startSetup();
        $setup->getConnection()->addColumn(
            $setup->getConnection()->getTableName("sales_order"),
            'admin_user_id',
            array(
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                'nullable' => true,
                'comment' => 'Admin User Id'
            )
        );

        $setup->getConnection()->addColumn(
            $setup->getConnection()->getTableName("sales_order"),
            'admin_user_name',
            array(
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'nullable' => true,
                'comment' => 'Admin User Name'
            )
        );

        $setup->endSetup();
    }
}

