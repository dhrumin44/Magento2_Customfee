<?php

namespace Dmn112\CustomFee\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * Custom fee config path
     */
    const CONFIG_CUSTOM_IS_ENABLED = 'customfee/customfee/status';
    const CONFIG_CUSTOM_FEE = 'customfee/customfee/customfee_amount';
    const CONFIG_FEE_LABEL = 'customfee/customfee/name';
    const CONFIG_MINIMUM_ORDER_AMOUNT = 'customfee/customfee/minimum_order_amount';
    
    const CONFIG_FEE_COMMENT = 'customfee/customfee/comment';
    const CONFIG_CUSTOM_PERCENT_FEE = 'customfee/customfee/customfee_percent_amount';
    const CONFIG_CUSTOM_FEE_TYPE = 'customfee/customfee/customfee_type';

    /**
     * @return mixed
     */
    public function isModuleEnabled()
    {

        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $isEnabled = $this->scopeConfig->getValue(self::CONFIG_CUSTOM_IS_ENABLED, $storeScope);
        return $isEnabled;
    }

    /**
     * Get custom fee
     *
     * @return mixed
     */
    public function getCustomFee()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $fee = $this->scopeConfig->getValue(self::CONFIG_CUSTOM_FEE, $storeScope);
        return $fee;
    }

    /**
     * Get custom fee
     *
     * @return mixed
     */
    public function getFeeLabel()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $feeLabel = $this->scopeConfig->getValue(self::CONFIG_FEE_LABEL, $storeScope);
        return $feeLabel;
    }

    /**
     * @return mixed
     */
    public function getMinimumOrderAmount()
    {

        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $MinimumOrderAmount = $this->scopeConfig->getValue(self::CONFIG_MINIMUM_ORDER_AMOUNT, $storeScope);
        return $MinimumOrderAmount;
    }
    
    /**
     * Get custom fee comment
     *
     * @return mixed
     */
    public function getFeeComment()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $feeComment = $this->scopeConfig->getValue(self::CONFIG_FEE_COMMENT, $storeScope);
        return $feeComment;
    }
    
    /**
     * Get custom fee in percent
     *
     * @return mixed
     */
    public function getCustomFeeInPercent()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $feeInPercent = $this->scopeConfig->getValue(self::CONFIG_CUSTOM_PERCENT_FEE, $storeScope);
        return $feeInPercent;
    }
    
    /**
     * Get custom fee type
     *
     * @return mixed
     */
    public function getCustomFeeType()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $feeType = $this->scopeConfig->getValue(self::CONFIG_CUSTOM_FEE_TYPE, $storeScope);
        return $feeType;
    }
}
