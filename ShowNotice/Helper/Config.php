<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\ShowNotice\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Config extends AbstractHelper
{
    const XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_ENABLED             = 'codelegacy_shownotice/general/enabled';
    const XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_DISPLAY_ADMIN_LOGIN = 'codelegacy_shownotice/general/display_admin_login';
    const XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_INSTANCE_TYPE       = 'codelegacy_shownotice/general/instance_type';
    const XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_CUSTOM_LABEL        = 'codelegacy_shownotice/general/custom_label';
    const XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_DEVELOP             = 'codelegacy_shownotice/general/dev';
    const XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_PREPROD             = 'codelegacy_shownotice/general/preprod';
    const XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_PRODUCTION          = 'codelegacy_shownotice/general/production';
    const XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_CUSTOM              = 'codelegacy_shownotice/general/custom';
    const XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_LABEL_COLOR         = 'codelegacy_shownotice/general/label_color';

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_ENABLED);
    }

    /**
     * @return boolean
     */
    public function isDisplayedOnAdminLogin()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_DISPLAY_ADMIN_LOGIN);
    }

    /**
     * @return mixed
     */
    public function getInstance()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_INSTANCE_TYPE);
    }

    /**
     * @return mixed
     */
    public function getInstanceName()
    {
        if ($this->scopeConfig->getValue(self::XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_INSTANCE_TYPE) == 'custom') {
            return $this->scopeConfig->getValue(self::XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_CUSTOM_LABEL);
        }
        return $this->scopeConfig->getValue(self::XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_INSTANCE_TYPE);
    }

    /**
     * @return mixed
     */
    public function getColorByInstance()
    {
        $instance = $this->getInstance();
        return '#' . $this->scopeConfig->getValue(constant('self::XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_' . strtoupper($instance)));
    }

    /**
     * @return mixed
     */
    public function getLabelColor()
    {
        return '#' . $this->scopeConfig->getValue(self::XML_PATH_CODELEGACY_SHOWNOTICE_GENERAL_LABEL_COLOR);
    }
}
