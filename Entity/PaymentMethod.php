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

namespace WellCommerce\Bundle\PaymentBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Knp\DoctrineBehaviors\Model\Blameable\Blameable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use WellCommerce\Bundle\AppBundle\Entity\HierarchyAwareTrait;
use WellCommerce\Bundle\CoreBundle\Behaviours\Enableable\EnableableTrait;
use WellCommerce\Bundle\CoreBundle\Entity\IdentifiableTrait;
use WellCommerce\Bundle\OrderBundle\Entity\OrderStatusInterface;

/**
 * Class PaymentMethod
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class PaymentMethod implements PaymentMethodInterface
{
    use IdentifiableTrait;
    use Translatable;
    use Timestampable;
    use Blameable;
    use HierarchyAwareTrait;
    use EnableableTrait;
    
    /**
     * @var Collection
     */
    protected $shippingMethods;
    
    /**
     * @var OrderStatusInterface
     */
    protected $paymentPendingOrderStatus;
    
    /**
     * @var OrderStatusInterface
     */
    protected $paymentSuccessOrderStatus;
    
    /**
     * @var OrderStatusInterface
     */
    protected $paymentFailureOrderStatus;
    
    /**
     * @var string
     */
    protected $processor = '';
    
    /**
     * @var array
     */
    protected $configuration = [];
    
    public function __construct()
    {
        $this->shippingMethods = new ArrayCollection();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getProcessor(): string
    {
        return $this->processor;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setProcessor(string $processor)
    {
        $this->processor = $processor;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getShippingMethods(): Collection
    {
        return $this->shippingMethods;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setShippingMethods(Collection $shippingMethods)
    {
        $this->shippingMethods = $shippingMethods;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getConfiguration(): array
    {
        return $this->configuration;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setConfiguration(array $configuration)
    {
        $this->configuration = $configuration;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getPaymentPendingOrderStatus()
    {
        return $this->paymentPendingOrderStatus;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setPaymentPendingOrderStatus(OrderStatusInterface $paymentPendingOrderStatus)
    {
        $this->paymentPendingOrderStatus = $paymentPendingOrderStatus;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getPaymentSuccessOrderStatus()
    {
        return $this->paymentSuccessOrderStatus;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setPaymentSuccessOrderStatus(OrderStatusInterface $paymentSuccessOrderStatus)
    {
        $this->paymentSuccessOrderStatus = $paymentSuccessOrderStatus;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getPaymentFailureOrderStatus()
    {
        return $this->paymentFailureOrderStatus;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setPaymentFailureOrderStatus(OrderStatusInterface $paymentFailureOrderStatus)
    {
        $this->paymentFailureOrderStatus = $paymentFailureOrderStatus;
    }
}
