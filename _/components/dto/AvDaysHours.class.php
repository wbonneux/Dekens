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
		//T_I_HRS_DAYS_BEGIN
		var $hoursDayBegin;
		//T_I_HRS_DAYS_END
		var $hoursDayEnd;
		//T_I_HRS_AM_BEGIN
		var $hoursAmBegin;
		//T_I_HRS_AM_END
		var $hoursAmEnd;
		//T_I_HRS_PM_BEGIN
		var $hoursPmBegin;
		//T_I_HRS_PM_END
		var $hoursPmEnd;
		//L_I_CLOSED
		var $closed;
		//L_I_ACTIVE
		var $active;
		//N_I_ORDER
		var $order;
	}

?>