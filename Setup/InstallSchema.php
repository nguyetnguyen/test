<?php
/**
 * @package Test_LoyaltyCardNumber
 * @author  Nguyet Nguyen <nguyetnt.it@gmail.com>
 */

namespace Test\LoyaltyCardNumber\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 */
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        //add column to order
        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order'),
            'loyalty_card_number',
            [
                'type'     => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length'   => '255',
                'nullable' => true,
                'comment'  => 'Loyalty Card Number',
            ]
        );

        $installer->getConnection()->addColumn(
            $installer->getTable('quote'),
            'loyalty_card_number',
            [
                'type'     => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length'   => '255',
                'nullable' => true,
                'comment'  => 'Loyalty Card Number',
            ]
        );

        $installer->endSetup();
    }
}
