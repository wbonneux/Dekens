<?php

	/**

	 * Object represents table 'prod_secondhand'

	 *

     	 * @author: Bonneux Wim

     	 * @date: 2014/06/31

	 */

	

	require_once "BaseValueObject.class.php";

	class SecondHand extends BaseValueObject{

		

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

		//T_I_BUILD_YEAR

		var $buildYear;

		//T_I_SIZE_TIRE_FRONT

		var $sizeTireFront;

		//T_I_SIZE_TIRE_BACK

		var $sizeTireBack;
		
		//N_I_HOURS_WORK
		
		var $hoursWork;
		
		//C_I_PRICE
		
		var $price;
		
		//L_I_ACTIVE
		
		var $active;
		
		//L_I_SOLD
		
		var $sold;
		
		//T_I_DESCRIPTION
		
		var $description;
		

		

		

	}

?>