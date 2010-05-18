<?php
global $smwgDIIP;
require_once("$smwgDIIP/specials/WebServices/SMW_IWebServiceClient.php");
require_once("$smwgDIIP/specials/WebServices/SMW_RESTClient.php");

/**
 * @file
 * @ingroup DIWebServices
 *
 * @author Ingo Steinbauer
 */

/**
 * Class for the access of LD sources. It implements the interface
 * <IWebServiceClient>. This class is only a wrapper for the SMWRestClient.
 *
 * @author Ingo Steinbauer
 *
 */
class SMWLinkeddataClient implements IWebServiceClient {

	private $mRESTClient;

	/**
	 * Constructor
	 * Creates an instance of an SMWLinkeddataClient with the given URI.
	 *
	 * @param string $uri
	 * 		URI of the web service
	 * @param string $authenticationType
	 * @param string $authenticationPassword
	 * @param string $authenticationlogin
	 * @return SMWRestClient
	 */
	public function __construct($uri, $authenticationType = "",
			$authenticationLogin = "", $authenticationPassword = "") {
		$this->mRESTClient = new SMWRestClient($uri, $authenticationType, $authenticationLogin, $authenticationPassword); 
	}

	/**
	 * Calls the web service
	 *
	 * @param string $operationName : post or get
	 * @param string [] $parameters : parameters for the web service call
	 */
	public function call($operationName, $parameters) {
		return $this->mRESTClient->call($operationName, $parameters); 
	}
	
	public function getURI(){
		return $this->mRESTClient->getURI();
	}
}
