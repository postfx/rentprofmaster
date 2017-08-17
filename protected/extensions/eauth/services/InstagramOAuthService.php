<?php
/**
 * TwitterOAuthService class file.
 *
 * Register application: https://dev.twitter.com/apps/new
 *
 * @author Maxim Zemskov <nodge@yandex.ru>
 * @link http://github.com/Nodge/yii-eauth/
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

require_once dirname(dirname(__FILE__)) . '/EOAuthService.php';

/**
 * Twitter provider class.
 *
 * @package application.extensions.eauth.services
 */
class InstagramOAuthService extends EOAuth2Service {

	protected $name = 'instagram';
	protected $title = 'Instagram';
	protected $type = 'OAuth';
	protected $jsArguments = array('popup' => array('width' => 900, 'height' => 550));

	protected $client_id = '';
	protected $client_secret = '';

	protected $providerOptions = array(
		'authorize' => 'https://api.instagram.com/oauth/authorize',
		'access_token' => 'https://api.instagram.com/oauth/access_token',
	);


	protected function fetchAttributes() {
	}

	protected function initRequest($url, $options = array()) {

		$ch = parent::initRequest($url, $options);

		$params = array(
			'grant_type' => 'authorization_code',
			'client_id' => $this->client_id,
			'client_secret' => $this->client_secret,
			'code' => $_GET['code'],
			'redirect_uri' => $this->getState('redirect_uri'),
		);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		return $ch;
	}

	protected function makeRequest($url, $options = array(), $parseJson = true) {
		$result = parent::makeRequest($url, $options, $parseJson);

		if ($parseJson)
			$user = $result;
		else
			$user = json_decode($result);

		if ($user) {

			$user = $user->user;

			$this->attributes['id'] = $user->id;
			$this->attributes['name'] = $user->full_name;

			if (strstr($user->full_name, ' ')) {
				$names = explode(' ', $user->full_name);
				$this->attributes['first_name'] = $names[0];
				$this->attributes['last_name'] = $names[1];
			}
		}

		return $result;
	}

	protected function getCodeUrl($redirect_uri) {

		$durl = $redirect_uri;

		$durl = str_replace('/ru', '', $durl);
		$durl = str_replace('/en', '', $durl);
		$durl = str_replace('/ua', '', $durl);
		$durl = str_replace('/pl', '', $durl);
		$durl = str_replace('/cz', '', $durl);
		$durl = str_replace('/lv', '', $durl);
		$durl = str_replace('/ee', '', $durl);
		$durl = str_replace('/ge', '', $durl);
		$durl = str_replace('/kz', '', $durl);

		$redirect_uri = $durl;

		$url = parent::getCodeUrl($redirect_uri);

		return $url;
	}
}