<?php
namespace Dmn112\CustomFee\Model\Config;
 
class Customfeetype implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => __('Please Select')],
            ['value' => 'fixed', 'label' => __('Fixed Amount')],
            ['value' => 'percent', 'label' => __('Percentage Amount')]
        ];
    }
}