<?php

	/**

	 * Object represents table 'prod_category'

	 *

     	 * @author: Bonneux Wim

     	 * @date: 2014/12/07

	 */

	

	require_once "BaseValueObject.class.php";

	class Product extends BaseValueObject{

		
		//T_I_TITLE_NED
		var $titleNed;
		//T_I_TITLE_FR
		var $titleFr;
		//T_I_DESCR_NED
		var $descrNed;
		//T_I_DESCR_FR
		var $descrFr;
		//T_I_PAGE_NED
		var $pageNed;
		//T_I_PAGE_FR
		var $pageFr;
		//T_I_IMAGE
		var $image;
		//L_I_ACTIVE
		var $active;
	}

?>