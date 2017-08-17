<?php
class CustomFacebookService extends FacebookOAuthService {
	/**
	 * https://developers.facebook.com/docs/authentication/permissions/
	 */
	protected $scope = 'email,user_birthday,user_hometown,user_location';

	/**
	 * http://developers.facebook.com/docs/reference/api/user/
	 *
	 * @see FacebookOAuthService::fetchAttributes()
	 */
	protected function fetchAttributes() {
		$this->attributes = (array)$this->makeSignedRequest('https://graph.facebook.com/me?fields=email,name,first_name,last_name,birthday,gender');

        $this->attributes['avatar'] = "http://graph.facebook.com/" . $this->attributes['id'] . "/picture?width=200&height=200";

        if (!empty($this->attributes['birthday']))
	        $this->attributes['birthday'] = date('Y-m-d', strtotime($this->attributes['birthday']));

        $this->attributes['name'] = $this->attributes['first_name'];

        if (!empty($this->attributes['location']) && strpos($this->attributes['location']->name, ',')) {
            list($this->attributes['city'],) = explode(',', $this->attributes['location']->name);
        } else if (!empty($this->attributes['location'])) {
            $this->attributes['city'] = $this->attributes['location']->name;
        }
	}
}
