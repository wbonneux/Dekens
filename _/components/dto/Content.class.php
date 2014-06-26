<?php
	/**
	 * Object represents table 'cont_content'
	 *
     	 * @author: Bonneux Wim
     	 * @date: 2013/11/28
	 */
	
	require_once "BaseValueObject.class.php";
	class Content extends BaseValueObject{
		
		//T_I_TITLE
		var $title;
		//T_I_INTRO_TEXT
		var $introtext;
		//T_I_FULL_TEXT
		var $fulltext;
		//O_CONTENT_SECTION
		var $sectionid;
		//C_CODE_LANGUAGE
		var $languageid;
		//T_I_AUTHOR
		var $author;
		//L_I_PUBLISHED
		var $published;
		//T_I_IMAGE
		var $imageURL;
		//N_I_ORDER
		var $order;
		
		
	}
?>