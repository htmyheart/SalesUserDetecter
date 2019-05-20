<?php

namespace MW\SalesUserDetecter\Model\ResourceModel\Order\Grid;

use Magento\Sales\Model\ResourceModel\Order\Grid\Collection as OriginalCollection;

class Collection extends OriginalCollection
{
//    protected function _renderFiltersBefore()
//    {
//        $joinTable = $this->getTable('sales_order_address');
//        $this->getSelect()->joinLeft($joinTable, 'main_table.entity_id = sales_order_address.parent_id', [
//            'lastname',
//            'firstname',
//        ]);
//
//        $this->getSelect()->where("sales_order_address.address_type = 'shipping'");
//        parent::_renderFiltersBefore();
//    }
}
