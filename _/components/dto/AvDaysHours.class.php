<?php

	/**

	 * Object represents table 'av_days_hours'

	 *

     	 * @author: Bonneux Wim

		* @date: 2014/08/01

	 */

	

	require_once "BaseValueObject.class.php";

	class AvDaysHours extends BaseValueObject{
		//T_I_DAY
		var $day;
		//T_I_HRS_DAYS
		var $hoursDay;
		//T_I_HRS_AM
		var $hoursAm;
		//T_I_HRS_PM
		var $hoursPm;
		//L_I_CLOSED
		var $closed;
		//L_I_ACTIVE
		var $active;
	}

?>