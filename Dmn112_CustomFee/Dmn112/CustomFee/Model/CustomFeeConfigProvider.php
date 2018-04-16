<?php
namespace Dmn112\CustomFee\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

class CustomFeeConfigProvider implements ConfigProviderInterface
{
    /**
     * @var \Dmn112\CustomFee\Helper\Data
     */
    protected $dataHelper;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @param \Dmn112\CustomFee\Helper\Data $dataHelper
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Dmn112\CustomFee\Helper\Data $dataHelper,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Psr\Log\LoggerInterface $logger

    )
    {
        $this->dataHelper = $dataHelper;
        $this->checkoutSession = $checkoutSession;
        $this->logger = $logger;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $customFeeConfig = [];
        $enabled = $this->dataHelper->isModuleEnabled();
        $minimumOrderAmount = $this->dataHelper->getMinimumOrderAmount();
        $customFeeConfig['fee_label'] = $this->dataHelper->getFeeLabel();
        $customFeeConfig['fee_comment'] = ($this->dataHelper->getFeeComment()) ? $this->dataHelper->getFeeComment() : '';
        $quote = $this->checkoutSession->getQuote();
        $subtotal = $quote->getSubtotal();
        //$customFeeConfig['custom_fee_amount'] = $this->dataHelper->getCustomFee();
        $feeType = $this->dataHelper->getCustomFeeType();
        $customFeeConfig['custom_fee_amount'] = '';
        if($feeType == 'fixed'){
            $customFeeConfig['custom_fee_amount'] = $this->dataHelper->getCustomFee();    
        }else{
            $customPercentage = $this->dataHelper->getCustomFeeInPercent();
            $feeValueInPerecent = number_format(($subtotal * $customPercentage) / 100,0);
            $customFeeConfig['custom_fee_amount'] = $feeValueInPerecent;    
        }       
        $customFeeConfig['show_hide_customfee_block'] = ($enabled && ($minimumOrderAmount <= $subtotal) && $quote->getFee()) ? true : false;
        $customFeeConfig['show_hide_customfee_shipblock'] = ($enabled && ($minimumOrderAmount <= $subtotal)) ? true : false;
        
        return $customFeeConfig;
    }
}
