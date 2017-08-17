<?php
/**
 * CustomOdnoklassnikiService class file.
 *
 * @author Sergey Vardanyan <rakot.ss@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

require_once dirname(dirname(__FILE__)) . '/services/OdnoklassnikiOAuthService.php';

class CustomOdnoklassnikiService extends OdnoklassnikiOAuthService {

//	protected $scope = 'VALUABLE ACCESS';

	protected function fetchAttributes() {
		$info = $this->makeSignedRequest('http://api.odnoklassniki.ru/fb.do', array(
			'query' => array(
				'method' => 'users.getCurrentUser',
                'fields' => 'UID, LOCALE, FIRST_NAME, LAST_NAME, NAME, GENDER, AGE, BIRTHDAY, HAS_EMAIL, CURRENT_STATUS, CURRENT_STATUS_ID, CURRENT_STATUS_DATE, ONLINE, PHOTO_ID, PIC_1, PIC_2, LOCATION, pic190x190, email',
				'format' => 'JSON',
				'application_key' => $this->client_public,
				'client_id' => $this->client_id,
			),
		));



		$this->attributes = json_decode(json_encode($info), true);

		$this->attributes['id'] = $info->uid;
		$this->attributes['name'] = $info->first_name;
		$this->attributes['first_name'] = $info->first_name;

		if (!empty($info->email))
			$this->attributes['email'] = $info->email;

		$this->attributes['last_name'] = $info->last_name;
        $this->attributes['avatar'] = $info->pic190x190;

        if (!empty($info->birthday))
	        $this->attributes['birthday'] = $info->birthday;

		if (!empty($this->attributes['location']))
	        $this->attributes['city'] = $this->attributes['location']['city'];

		if ($this->scope == 'VALUABLE ACCESS') {
			$this->getRealIdAndUrl();
		}
	}

	/**
	 * Avable only if VALUABLE ACCESS is on
	 * you should ask for enable this scope for odnoklassniki administration
	 */
	protected function getRealIdAndUrl() {
		$info = $this->makeSignedRequest('http://api.odnoklassniki.ru/fb.do', array(
			'query' => array(
				'method' => 'users.getInfo',
				'uids' => $this->attributes['id'],
				'fields' => 'url_profile, pic_1',
				'format' => 'JSON',
				'application_key' => $this->client_public,
				'client_id' => $this->client_id,
			),
		));

		preg_match('/\d+\/{0,1}$/', $info[0]->url_profile, $matches);
		$this->attributes['id'] = (int)$matches[0];
		$this->attributes['url'] = $info[0]->url_profile;

    }

	public function wallPost($data) {
		$post = array(
			'application_key' => $this->client_public,
			'method' => 'share.addLink',
			'format' => 'JSON',
		);
		if (isset($data['link'])) {
			$post['linkUrl'] = $data['link'];
		}

		if (isset($data['message'])) {
			$post['comment'] = $data['message'];
		}
		$this->makeSignedRequest('http://api.odnoklassniki.ru/fb.do', array(
			'query' => $post
		));
	}

}
