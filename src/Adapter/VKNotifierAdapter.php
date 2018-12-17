<?php


namespace NtSchool\Notifier\Adapter;

use NtSchool\Notifier\NotifierAdapterInterface;

class VKNotifierAdapter implements NotifierAdapterInterface {
	private $VK_API_VERSION = '5.67';
	private $VK_API_ENDPOINT = 'https://api.vk.com/method/';

	private $vkUserID;
	private $VK_API_ACCESS_TOKEN;

	public function __construct(string $vkApiKey, string $vkUserID) {
		$this->VK_API_ACCESS_TOKEN = $vkApiKey;
		$this->vkUserID = $vkUserID;
	}

	private function _vkApi_call( $method, $params = array() ) {
		$params['access_token'] = $this->VK_API_ACCESS_TOKEN;
		$params['v']            = $this->VK_API_VERSION;
		$url                    = $this->VK_API_ENDPOINT . $method . '?' . http_build_query( $params );
		$curl                   = curl_init( $url );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		$json = curl_exec( $curl );
		curl_close( $curl );
		$response = json_decode( $json, true );

		return $response['response'];
	}

//Функция для вызова messages.send
	private function vkApi_messagesSend( $peer_id, $message) {
		return $this->_vkApi_call( 'messages.send', array(
			'peer_id'    => $peer_id,
			'message'    => $message,
		) );
	}



	public function sendVkMessage($message) {
		$this->vkApi_messagesSend($this->vkUserID, $message);
	}

	public function debug( string $message ) {
		$this->vkApi_messagesSend($this->vkUserID, $message);
	}

	public function info( string $message ) {
		$this->vkApi_messagesSend($this->vkUserID, $message);
	}

	public function notice( string $message ) {
		// TODO: Implement notice() method.
	}

	public function warning( string $message ) {
		$this->vkApi_messagesSend($this->vkUserID, $message);
	}

	public function error( string $message ) {
		// TODO: Implement error() method.
	}

	public function critical( string $message ) {
		// TODO: Implement critical() method.
	}

	public function alert( string $message ) {
		// TODO: Implement alert() method.
	}

	public function emergency( string $message ) {
		// TODO: Implement emergency() method.
	}
}