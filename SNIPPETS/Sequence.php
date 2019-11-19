Magento 2 Module load Last order position Sequence

Sometimes you want to load a Module at the end of the sort order. In Magento 1 this could be done by changing the Vendor and/or Module name for the alphabetical order.


In Magento 2 you have to do a little more to load you module at the end of the sort order. Create a simple plugin on Magento\Framework\Module\ModuleList\Loader to change the sort order.

Example Module can be found in Mage2Gen
https://mage2gen.com/load/f3b3a7ce-bf5c-4a09-93a4-d3a1fbdfc717

Example of how you can create this simple Plugin with just 2 files.
Create or Update the global di.xml with the following Plugin:

<?xml version="1.0" ?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:ObjectManager/etc/config.xsd">
	<type name="Magento\Framework\Module\ModuleList\Loader">
		<plugin disabled="false" name="Vendor_Module_Plugin_Magento_Framework_Module_ModuleList_Loader" sortOrder="10" type="Vendor\Module\Plugin\Magento\Framework\Module\ModuleList\Loader"/>
	</type>
</config>

Create the Plugin Class

<?php

namespace Vendor\Module\Plugin\Magento\Framework\Module\ModuleList;

class Loader
{
    public function afterLoad(
        \Magento\Framework\Module\ModuleList\Loader $subject,
        $result
    ) {
        if (!isset($result['Vendor_Module'])){
            return $result;
        }
        $baseConfigModule = $result['Vendor_Module'];
        unset($result['Vendor_Module']);
        $result['Vendor_Module'] = $baseConfigModule;
        return $result;
    }
}