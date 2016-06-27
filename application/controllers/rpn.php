<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rpn extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
    $this->load->library('form_validation');
		$this->load->library('guzzle');

	}

	public function index()
	{
		$this->load->view('form');
	}

	public function test(){
		$client     = new GuzzleHttp\Client();

	  #This url define speific Target for guzzle
	  $url        = 'http://services.groupkt.com/state/get/IND/all';

	  #guzzle
	  try {
	    # guzzle post request example with form parameter
	    $response = $client->request( 'GET',
	                                   $url,
	                                  [ 'form_params'
	                                        => [ 'processId' => '2' ]
	                                  ]
	                                );
	    #guzzle repose for future use
	    echo $response->getStatusCode(); // 200
	    echo $response->getReasonPhrase(); // OK
	    echo $response->getProtocolVersion(); // 1.1
	    echo $response->getBody();
	  } catch (GuzzleHttp\Exception\BadResponseException $e) {
	    #guzzle repose for future use
	    $response = $e->getResponse();
	    $responseBodyAsString = $response->getBody()->getContents();
	    print_r($responseBodyAsString);
	  }
	}
}
