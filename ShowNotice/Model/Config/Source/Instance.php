<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\ShowNotice\Model\Config\Source;

class Instance implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => 'develop', 
                'label' => __('Develop') 
            ],
            [
                'value' => 'preprod', 
                'label' => __('Preprod')
            ],
            [
                'value' => 'production', 
                'label' => __('Production')
            ],
            [
                'value' => 'custom', 
                'label' => __('Custom')
            ]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            [
                'value' => 'develop', 
                'label' => __('Develop') 
            ],
            [
                'value' => 'preprod', 
                'label' => __('Preprod')
            ],
            [
                'value' => 'production', 
                'label' => __('Production')
            ],
            [
                'value' => 'custom', 
                'label' => __('Custom')
            ]
        ];
    }
}
