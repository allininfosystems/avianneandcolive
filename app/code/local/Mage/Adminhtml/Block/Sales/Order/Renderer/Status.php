<?php

class Mage_Adminhtml_Block_Sales_Order_Renderer_Status
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {


$value = $row->getData('eye4_status');

     if($value == 'I')
     {
     	$value='Insured';
     }else{
     	$value='Declined';
     }


        return $value;
    }
}