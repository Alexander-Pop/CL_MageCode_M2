<?php
namespace Codelegacy\ShowNotice\Block;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class ColorPicker extends Field
{
    /**
     * add color picker in admin configuration fields
     * @param AbstractElement $element
     * @return string script
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $html = $element->getElementHtml();
        $value = $element->getData('value');

        $html .= '<script type="text/javascript">
            require(["jquery"], 
            function ($) {
                $(document).ready(function (e) {
                    $("#' . $element->getHtmlId() . '").css("background-color","#' . $value . '");
                    $("#' . $element->getHtmlId() . '").colpick({
                        layout:"hex",
                        submit:0,
                        colorScheme:"dark",
                        color: "#' . $value . '",
                        onChange:function(hsb,hex,rgb,el,bySetColor) {
                            $(el).css("background-color","#"+hex);
                            if(!bySetColor) $(el).val(hex);
                        }
                    }).keyup(function(){
                        $(this).colpickSetColor(this.value);
                    });
                });
            });
            </script>';

        return $html;
    }
}
