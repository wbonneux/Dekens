<?php
	/**
	 * Object represents table 'cont_sections'
	 *
     	 * @author: Bonneux Wim
     	 * @date: 2013/11/28	 
	 */
	require_once "BaseValueObject.class.php";
	
	class Section extends BaseValueObject{
		
		//T_I_TITLE
		var $title;
		//C_CODE_LANGUAGE
		var $languageId;
		//L_I_PUBLISHED
		var $published;
		//S_I_CREATE_TECH
	}
?>