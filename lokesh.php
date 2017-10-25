<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('app/Mage.php'); //Path to Magento
umask(0);
Mage::app();



//--------------------------------------------------------------------------------------------------------------------------------------------------------

if(0==1){

$transactions = Mage::getModel('sales/order_payment')->getCollection()
        ->addFieldToFilter('main_table.method', 'authorizenet');

$query = $transactions->getSelect()->join( array('transaction' => 'sales_payment_transaction'), 'transaction.payment_id = main_table.entity_id' )
        ->where("transaction.created_at >= '" . date('Y-m-d H:i:s', strtotime('-31 days')) . "'")
        ->where("transaction.is_closed != 1")
        ->where("transaction.txn_type NOT IN ('void')");

$order_id=100031881;
$order = Mage::getModel('sales/order')->loadByIncrementId($order_id);
echo $order->getId();


echo $transactions->getSelect();
echo '<pre>';
print_r($transactions->getData());

$order = Mage::getModel('sales/order')->load($order->getId());
echo $transactionId = $order->getPayment()->getLastTransId(); die;

$fraudData = Mage::helper('eye4fraud_connector')->getOrderStatus($order_id);



        
        if (in_array($fraudData['StatusCode'], array('D','F'))) {
        		$templateId = 54;
    			$sender = array('name' => 'Avianne & Co. Customer Service', 'email' => 'service@avianneandco.com');
    			
    			$order = Mage::getModel('sales/order')->loadByIncrementId($order_id);
    			$storeId = Mage::app()->getStore()->getId();
    			$address = $order->getBillingAddress();
    			$email = $order->customer_email;
    			$emailName = ($order->customer_firstname ? $order->customer_firstname : $address->firstname) . ' ' . ($order->customer_lastname ? $order->customer_lastname : $address->lastname);
    			$vars = array(
    					'customername'		=> ($order->customer_firstname ? $order->customer_firstname : $address->firstname) . ' ' . ($order->customer_lastname ? $order->customer_lastname : $address->lastname),
    					'ordernumber'		=> $order->increment_id
    			);
    			Mage::getModel('core/email_template')->addBcc('avianneandco@gmail.com')->sendTransactional($templateId, $sender, $email, $emailName, $vars, $storeId);
        }
        $item = Mage::getModel("eye4fraud_connector/status");
        if($fraudData['error']){
            $item->setData('error', true);
        }

        $item->setData('status', $fraudData['StatusCode']);
        $item->setData('description', $fraudData['Description']);
        $item->setData('updated_at', Mage::getModel('core/date')->date('Y-m-d H:i:s'));
        /**
         * A little hack to restore order_id field after model was saved
         */
        $tmp_order_id = $order_id;
        $item->setData('order_id',$tmp_order_id);
        if($item->save()){

        	echo 'done';
        }else{
        	echo 'not done';
        }
       
        

print_r($fraudData);

echo 'fff';

}

//======================================================================================================================================================================


if(0==1){

$transactionId=60032060090;
$referId=123456;

$paygate = Mage::getModel('paygate/authorizenet');
            
        $requestBody = sprintf('<?xml version="1.0" encoding="utf-8"?>'
                . '<createTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">'
                . '<merchantAuthentication><name>%s</name><transactionKey>%s</transactionKey></merchantAuthentication>'
                . '<refId>%s</refId>'
                .'<transactionRequest><transactionType>voidTransaction</transactionType><refTransId>%s</refTransId></transactionRequest>'
                . '</createTransactionRequest>',
                $paygate->getConfigData('login'),
                $paygate->getConfigData('trans_key'),
                $referId,
                $transactionId
                );
            
        $client = new Varien_Http_Client();
        $uri = $paygate->getConfigData('cgi_url_td');
        $uri = $uri ? $uri : $paygate::CGI_URL_TD;
        $client->setUri($uri);
        $client->setConfig(array('timeout'=>45));
        $client->setHeaders(array('Content-Type: text/xml'));
        $client->setMethod(Zend_Http_Client::POST);
        $client->setRawData($requestBody);
            
        $debugData = array(
                'url' => $uri,
                'request' => $requestBody
        );
            
        try {
            $responseBody = $client->request()->getBody();
            $debugData['result'] = $responseBody;
            echo 'dddddd';
            echo $debugData['result'];
            libxml_use_internal_errors(true);
            $responseXmlDocument = new Varien_Simplexml_Element($responseBody);
            libxml_use_internal_errors(false);
        } catch (Exception $e) {
            $debugData['exception'] = $e->getMessage();
//          $paygate->_debug($debugData);
            Mage::throwException(Mage::helper('paygate')->__('Transaction status fetching error.'));
        }


}



//-----------------------------------------------------------------------------------------------------------------------------------------------------------------



$order_id=100031880;
$order = Mage::getModel('sales/order')->loadByIncrementId($order_id);
echo $order->getId();

$fraudData = Mage::helper('eye4fraud_connector')->getOrderStatus($order_id);

echo $fraudData['StatusCode'];


     // $order->cancel();
     //          $order->setStatus('canceled');
     //          $order->save();

$order->setData('state', "canceled");
    $order->setStatus("canceled");
    $history = $order->addStatusHistoryComment('Order marked as cancelled.', false);
    $history->setIsCustomerNotified(false);
    $order->save();