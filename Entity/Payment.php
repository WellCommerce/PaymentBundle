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

use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use WellCommerce\Bundle\DoctrineBundle\Entity\AbstractEntity;
use WellCommerce\Bundle\OrderBundle\Entity\OrderAwareTrait;

/**
 * Class PaymentMethod
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Payment extends AbstractEntity implements PaymentInterface
{
    use Timestampable;
    use OrderAwareTrait;

    /**
     * @var string
     */
    protected $processor;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var array
     */
    protected $configuration;

    /**
     * @var string
     */
    protected $approvalUrl;

    /**
     * @var string
     */
    protected $state;

    /**
     * {@inheritdoc}
     */
    public function getProcessor() : string
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
    public function getToken() : string
    {
        return $this->token;
    }

    /**
     * {@inheritdoc}
     */
    public function setToken(string $token)
    {
        $this->token = $token;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfiguration() : array
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
    public function getApprovalUrl() : string
    {
        return $this->approvalUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function setApprovalUrl(string $approvalUrl)
    {
        $this->approvalUrl = $approvalUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function getState() : string
    {
        return $this->state;
    }

    /**
     * {@inheritdoc}
     */
    public function setState(string $state)
    {
        $this->state = $state;
    }

    /**
     * {@inheritdoc}
     */
    public function isCreated() : bool
    {
        return $this->getState() === PaymentInterface::PAYMENT_STATE_CREATED;
    }

    /**
     * {@inheritdoc}
     */
    public function isApproved() : bool
    {
        return $this->getState() === PaymentInterface::PAYMENT_STATE_APPROVED;
    }

    /**
     * {@inheritdoc}
     */
    public function isFailed() : bool
    {
        return $this->getState() === PaymentInterface::PAYMENT_STATE_FAILED;
    }

    /**
     * {@inheritdoc}
     */
    public function isCancelled() : bool
    {
        return $this->getState() === PaymentInterface::PAYMENT_STATE_CANCELLED;
    }

    /**
     * {@inheritdoc}
     */
    public function isExpired() : bool
    {
        return $this->getState() === PaymentInterface::PAYMENT_STATE_EXPIRED;
    }

    /**
     * {@inheritdoc}
     */
    public function isPending() : bool
    {
        return $this->getState() === PaymentInterface::PAYMENT_STATE_PENDING;
    }

    /**
     * {@inheritdoc}
     */
    public function isInProgress() : bool
    {
        return $this->getState() === PaymentInterface::PAYMENT_STATE_IN_PROGRESS;
    }
}
