//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

class hook465 extends _HOOK_CLASS_
{
	/**
	 * Send JSON output
	 *
	 * @param	string	$data	Data to be JSON-encoded
	 * @param	int		$httpStatusCode		HTTP Status Code
	 * @return	void
	 */
	public function json( $data, $httpStatusCode=200 )
	{
		if ( is_object( $data ) AND !method_exists( $data, '__toString' ) AND in_array( 'JsonSerializable', class_implements( $data ) ) )
		{
			$this->sendOutput( json_encode( $data ), $httpStatusCode, 'application/json', $this->httpHeaders );
			return;
		}
		
		parent::json( $data, $httpStatusCode );
	}
}
