<?php

	/**

	 * Object represents table 'av_days_open'

	 *

     	 * @author: Bonneux Wim

		* @date: 2014/08/01

	 */

	

	require_once "BaseValueObject.class.php";

	class AvDaysOpen extends BaseValueObject{
		//T_I_DAY
		var $day;
		//L_I_ACTIVE
		var $active;
	}

?>