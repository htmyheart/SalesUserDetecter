<?php
namespace MW\SalesUserDetecter\Block\Adminhtml\Order\View;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;

/**
 * Class Userformation
 * @package MW\SalesUserDetecter\Block\Adminhtml\Order\View
 */
class Userformation extends \Magento\Backend\Block\Template
{
    /**
     * Core registry
     *
     * @var Registry
     */
    protected $coreRegistry = null;


    /**
     * TaxInformation constructor.
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getAdminUserData()
    {
        $order_id = null;
        $current_order = $this->coreRegistry->registry('current_order');
        $current_invoice = $this->coreRegistry->registry('current_invoice');

        if ($current_order) {
            $order_id = $current_order->getId();
        } elseif ($current_invoice) {
            $order_id = $current_invoice->getOrderId();
            $current_order = $current_invoice->getOrder();
        }

        if (!$order_id) {
            return null;
        }
        $userInfo = [];
        if ($current_order->getData('admin_user_id') && $current_order->getData('admin_user_name')) {
            $userInfo = [
                'user_id' => $current_order->getData('admin_user_id'),
                'user_name' => $current_order->getData('admin_user_name'),
            ];
        }
        return $userInfo;
    }
}