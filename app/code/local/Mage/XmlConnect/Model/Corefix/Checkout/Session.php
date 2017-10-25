<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_XmlConnect
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Override the original Checkout session model
 * The represented methods are overridden to fix Core bug:
 *   Order review - no data verifying in "Billing address" and "Shiping address" fields
 *
 * @author Magento Core Team <core@magentocommerce.com>
 */
class Mage_XmlConnect_Model_Corefix_Checkout_Session extends Mage_Checkout_Model_Session
{
    /**
     * Get checkout quote instance by current session
     * Core fix
     *
     * @return Mage_XmlConnect_Model_Corefix_Sales_Quote
     */
    public function getQuote()
    {
        if ($this->_quote === null) {
            $quote = Mage::getModel('xmlconnect/corefix_sales_quote')
                ->setStoreId(Mage::app()->getStore()->getId());

            /** @var $quote Mage_XmlConnect_Model_Corefix_Sales_Quote */
            if ($this->getQuoteId()) {
                $quote->loadActive($this->getQuoteId());
                if ($quote->getId()) {
                    /**
                     * If current currency code of quote is not equal current currency code of store,
                     * need recalculate totals of quote. It is possible if customer use currency switcher or
                     * store switcher.
                     */
                    if ($quote->getQuoteCurrencyCode() != Mage::app()->getStore()->getCurrentCurrencyCode()) {
                        $quote->setStore(Mage::app()->getStore());
                        $quote->collectTotals()->save();
                        /**
                         * We mast to create new quote object, because collectTotals()
                         * can to create links with other objects.
                         */
                        $quote = Mage::getModel('xmlconnect/corefix_sales_quote')
                            ->setStoreId(Mage::app()->getStore()->getId());
                        $quote->load($this->getQuoteId());
                    }
                } else {
                    $this->setQuoteId(null);
                }
            }

            $customerSession = Mage::getSingleton('customer/session');

            if (!$this->getQuoteId()) {
                if ($customerSession->isLoggedIn()) {
                    $quote->loadByCustomer($customerSession->getCustomer());
                    $this->setQuoteId($quote->getId());
                } else {
                    $quote->setIsCheckoutCart(true);
                    Mage::dispatchEvent('checkout_quote_init', array('quote' => $quote));
                }
            }

            if ($this->getQuoteId()) {
                if ($customerSession->isLoggedIn()) {
                    $quote->setCustomer($customerSession->getCustomer());
                }
            }

            $quote->setStore(Mage::app()->getStore());
            $this->_quote = $quote;
        }

        if ($remoteAddr = Mage::helper('core/http')->getRemoteAddr()) {
            $this->_quote->setRemoteIp($remoteAddr);
            $xForwardIp = Mage::app()->getRequest()->getServer('HTTP_X_FORWARDED_FOR');
            $this->_quote->setXForwardedFor($xForwardIp);
        }
        return $this->_quote;
    }

    /**
     * Load data for customer quote and merge with current quote
     * Core fix
     *
     * @return Mage_XmlConnect_Model_Corefix_Checkout_Session
     */
    public function loadCustomerQuote()
    {
        if (!Mage::getSingleton('customer/session')->getCustomerId()) {
            return $this;
        }
        $customerQuote = Mage::getModel('xmlconnect/corefix_sales_quote')
            ->setStoreId(Mage::app()->getStore()->getId())
            ->loadByCustomer(Mage::getSingleton('customer/session')->getCustomerId());

        if ($customerQuote->getId() && $this->getQuoteId() != $customerQuote->getId()) {
            if ($this->getQuoteId()) {
                $customerQuote->merge($this->getQuote())
                    ->collectTotals()
                    ->save();
            }

            $this->setQuoteId($customerQuote->getId());

            if ($this->_quote) {
                $this->_quote->delete();
            }
            $this->_quote = $customerQuote;
        } else {
            $this->getQuote()->setCustomer(Mage::getSingleton('customer/session')->getCustomer())
                ->save();
        }
        return $this;
    }
}
