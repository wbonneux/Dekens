<?php
	/**
	 * Object represents table 'cont_frontpage'
	 *
     	 * @author: Bonneux Wim
     	 * @date: 2014/07/14
	 */

	require_once "BaseValueObject.class.php";
	class ContentFrontPage extends BaseValueObject{
		
		//T_I_TITLE
		var $title;
		//T_I_DESCRIPTION
		var $description;
		//T_I_IMAGE
		
		var $image;
		
		//T_I_IMAGE_POS
		
		var $imagePos;
		
		//L_I_ACTIVE
		var $active;
	}
?>