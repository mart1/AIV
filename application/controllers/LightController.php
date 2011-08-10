<?php

class LightController extends Zend_Controller_Action
{

    public function indexAction() {
    	$code = $this->_getParam('code');

    	try {
	    	$url = 'http://10.0.0.75/soap-re-1.0.php?wsdl';
	    	$clientSOAP = new Zend_Soap_Client($url);
	    	$clientSOAP->sendCode($code);
    	}
    	catch (SoapFault $e) {
    		echo $e->__toString();
    	}
    }
}

