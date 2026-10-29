<?php
class MM_CmsContentFileMode_Block_Adminhtml_System_Config_Importfromfiles extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    /**
     * Read-only row: no "Use Default/Website" checkbox and no scope label, the flag is per host
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $element->setCanUseWebsiteValue(false)
            ->setCanUseDefaultValue(false)
            ->setScope(false);
        return parent::render($element);
    }

    /**
     * Show whether file → database import is enabled on the host that rendered this page
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $hostname = gethostname() ?: $this->__('unknown host');
        if (Mage::helper('mm_cmscontentfilemode')->isImportFromFilesEnabled()) {
            $text = $this->__('Enabled on this host (%s): mirror files are imported into the database on load.', $hostname);
        } else {
            $text = $this->__('Disabled on this host (%s): mirror files are not imported into the database.', $hostname);
        }
        return '<strong>' . $this->escapeHtml($text) . '</strong>';
    }
}
