<?php
	/**
	 * Object represents table 'USR_USER'
	 *
     	 * @author: Bonneux Wim
     	 * @date: 2013/11/28
	 */
	class User extends BaseValueObject{

		//T_I_NAME
		var $name;
		//T_I_USERNAME
		var $username;
		//T_I_EMAIL
		var $email;
		//C_CODE_USER_TYPE
		var $usertype;
		//C_CODE_LANGUAGE
		var $language;
		//T_I_PASSWORD
		var $password;
		//L_I_ACTIVE
		var $active;
	}
?>