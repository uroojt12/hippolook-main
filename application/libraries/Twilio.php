<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Twilio\Rest\Client;
class Twilio
{
	private $client;
	public function __construct()
	{
		$this->client = new Client(TWILIO_SID, TWILIO_TOEKN);
	}

	function send_msg($phone, $msg, $name = '')
	{
		if (empty($phone))
			return false;
		$phone = str_replace(array('-', ',', ' ', '(', ')'), '', $phone);
		eval("\$msg = \"$msg\";");
		try {
			$this->client->messages
			->create(
				'+1'.$phone,
				array(
					"from" => TWILIO_NUMBER,
					"body" => $msg
				)
			);
			return TRUE;
		} catch (Exception $e) {
			return $e->getMessage();
			// return false;
		}
	}
}
