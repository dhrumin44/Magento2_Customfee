<?php
namespace Dmn112\CustomFee\Plugin\Checkout\Model;


class ShippingInformationManagement
{
    /**
     * @var \Magento\Quote\Model\QuoteRepository
     */
    protected $quoteRepository;

    /**
     * @var \Dmn112\CustomFee\Helper\Data
     */
    protected $dataHelper;

    /**
     * @param \Magento\Quote\Model\QuoteRepository $quoteRepository
     * @param \Dmn112\CustomFee\Helper\Data $dataHelper
     */
    public function __construct(
        \Magento\Quote\Model\QuoteRepository $quoteRepository,
        \Dmn112\CustomFee\Helper\Data $dataHelper
    )
    {
        $this->quoteRepository = $quoteRepository;
        $this->dataHelper = $dataHelper;
    }

    /**
     * @param \Magento\Checkout\Model\ShippingInformationManagement $subject
     * @param $cartId
     * @param \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
     */
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    )
    {
        $customFee = $addressInformation->getExtensionAttributes()->getFee();
        $quote = $this->quoteRepository->getActive($cartId);
        if ($customFee) {
            $feeType = $this->dataHelper->getCustomFeeType();
            if($feeType == 'fixed'){
                $fee = $this->dataHelper->getCustomFee();
                $quote->setFee($fee);    
            }else{
                $feeInPercent = $this->dataHelper->getCustomFeeInPercent();
                $subtotal = $quote->getSubtotal();
                $feeValueInPerecent = number_format(($subtotal * $feeInPercent) / 100,0);
                $quote->setFee($feeValueInPerecent);    
            }            
        } else {
            $quote->setFee(NULL);
        }
    }
}

