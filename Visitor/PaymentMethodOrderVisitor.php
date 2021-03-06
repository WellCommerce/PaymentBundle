<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\PaymentBundle\Visitor;

use WellCommerce\Bundle\OrderBundle\Entity\OrderInterface;
use WellCommerce\Bundle\OrderBundle\Visitor\OrderVisitorInterface;

/**
 * Class PaymentMethodOrderVisitor
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
final class PaymentMethodOrderVisitor implements OrderVisitorInterface
{
    /**
     * {@inheritdoc}
     */
    public function visitOrder(OrderInterface $order)
    {
        if (false === $order->hasShippingMethod()) {
            $order->setPaymentMethod(null);
            
            return;
        }
        
        $shippingMethod = $order->getShippingMethod();
        $paymentMethods = $shippingMethod->getPaymentMethods();
        
        if (false === $order->hasPaymentMethod() || false === $paymentMethods->contains($order->getPaymentMethod())) {
            $order->setPaymentMethod($paymentMethods->first());
        }
    }
}
