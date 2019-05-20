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

namespace MW\SalesUserDetecter\Observer;

use Magento\Framework\Event\Observer;

/**
 * Class OrderPlaceAfter
 * @package MW\SalesUserDetecter\Observer
 */
class OrderPlaceAfter implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var \Magento\Backend\Model\Auth\Session
     */
    protected $authSession;

    /**
     * OrderPlaceAfter constructor.
     * @param \Magento\Backend\Model\Auth\Session $authSession
     */
    public function __construct(
        \Magento\Backend\Model\Auth\Session $authSession
    ) {
        $this->authSession = $authSession;
    }

    /**
     * @param Observer $observer
     * @return $this
     */
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();

        if ($user = $this->authSession->getUser()) {
            $order->setAdminUserId($user->getId());
            $order->setAdminUserName($user->getUserName());
        }

        return $this;
    }
}
