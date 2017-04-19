<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Vault\Model;

use Magento\Framework\ObjectManagerInterface;
use Magento\Vault\Api\Data\PaymentTokenInterface;
use Magento\Vault\Api\Data\PaymentTokenFactoryInterface;

/**
 * Class AbstractPaymentTokenFactory
 * @api
 */
abstract class AbstractPaymentTokenFactory implements PaymentTokenFactoryInterface
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * AccountPaymentTokenFactory constructor.
     * @param ObjectManagerInterface $objectManager
     */
    public function __construct(ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Create payment token entity
     * @return PaymentTokenInterface
     */
    public function create()
    {
        /** @var PaymentTokenInterface $paymentToken */
        $paymentToken = $this->objectManager->create(PaymentTokenInterface::class);
        $paymentToken->setType($this->getType());
        return $paymentToken;
    }
}
