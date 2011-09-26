<?php

class LightController extends Zend_Controller_Action
{

    public function indexAction() {
    	$code = $this->_getParam('code');
		$switch = $this->_getParam('switch');
		$pronto = Model_EpxProntoCodeMap::getPronto($code,$switch);
		echo $pronto;
    	try {
	    	$url = 'http://robot/?wsdl';
	    	$clientSOAP = new Zend_Soap_Client($url);    		    	
            $clientSOAP->addTask('Light', array("code" => $pronto));

    	}
    	catch (SoapFault $e) {
    		echo $e->__toString();
    	}
    }
}

