<?php
/**
 * An example of extending the provider class.
 *
 * @author Maxim Zemskov <nodge@yandex.ru>
 * @link http://github.com/Nodge/yii-eauth/
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

require_once dirname(dirname(__FILE__)) . '/services/VKontakteOAuthService.php';

class CustomVKontakteService extends VKontakteOAuthService {

	 protected $scope = 'friends';

	protected function fetchAttributes() {
		$info = (array)$this->makeSignedRequest('https://api.vk.com/method/users.get.json', array(
			'query' => array(
				'uids' => $this->uid,
				//'fields' => '', // uid, first_name and last_name is always available
				'fields' => 'nickname, sex, bdate, city, timezone, photo, photo_medium, photo_big, photo_rec, photo_50, photo_100, photo_200, photo_200_orig, email',
			),
		));

		$info = $info['response'][0];

		$this->attributes['id'] = $info->uid;
		$this->attributes['name'] = $info->first_name;
		$this->attributes['first_name'] = $info->first_name;
		$this->attributes['last_name'] = $info->last_name;
		$this->attributes['url'] = 'http://vk.com/id' . $info->uid;

		if (!empty($info->bdate))
			$this->attributes['birthday'] = date('Y-m-d', strtotime($info->bdate));

		if (!empty($info->nickname)) {
			$this->attributes['username'] = $info->nickname;
		}
		else {
			$this->attributes['username'] = 'id' . $info->uid;
		}

		$this->attributes['gender'] = $info->sex == 1 ? 'F' : 'M';


		if (!empty($info->country))
			$this->attributes['country'] = $info->country;

		$this->attributes['timezone'] = timezone_name_from_abbr('', $info->timezone * 3600, date('I'));

		$this->attributes['photo'] = $info->photo;
		$this->attributes['photo_medium'] = $info->photo_medium;
		$this->attributes['photo_big'] = $info->photo_big;
		$this->attributes['photo_rec'] = $info->photo_rec;

		if (!empty($info->photo_200))
			$this->attributes['avatar'] = $info->photo_200;
		else if (!empty($info->photo_100))
			$this->attributes['avatar'] = $info->photo_100;
		else
			$this->attributes['avatar'] = $info->photo_200_orig;

        if(!empty($info->city)) {
            $city_info = (array)$this->makeSignedRequest('https://api.vk.com/method/database.getCitiesById.json', array(
                'query' => array(
                    'city_ids' => $info->city,
                ),
            ));

            $city_info = $city_info['response'][0];
            if(!empty($city_info->name))
                $this->attributes['city'] = $city_info->name;
        }

	}
}
