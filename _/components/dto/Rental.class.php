<?php

	/**

	 * Object represents table 'prod_rental'

	 *

     	 * @author: Bonneux Wim

     	 * @date: 2014/07/09

	 */

	

	require_once "BaseValueObject.class.php";

	class Rental extends BaseValueObject{

		

		//T_I_TITLE

		var $title;

		//T_I_IMAGE_1

		var $image1;

		//T_I_IMAGE_2

		var $image2;

		//T_I_IMAGE_3

		var $image3;

		//T_I_IMAGE_4

		var $image4;

		//T_I_IMAGE_5

		var $image5;

		//C_I_PRICE_DAY
		
		var $priceDay;

		//C_I_PRICE_WEEKEND
		
		var $priceWeekend;
				
		//C_I_PRICE_WEEK
		
		var $priceWeek;
				
		//L_I_ACTIVE
		
		var $active;
				
		//T_I_DESCRIPTION
		
		var $description;
}

?>