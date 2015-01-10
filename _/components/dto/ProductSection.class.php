<?php

	/**

	 * Object represents table 'prod_section'

	 *

     	 * @author: Bonneux Wim

     	 * @date: 2014/12/14

	 */

	

	require_once "BaseValueObject.class.php";

	class ProductSection extends BaseValueObject{

		
		//T_I_MENU_NED
		var $menuNed;
		//T_I_MENU_FR
		var $menuFr;
		//T_I_URL
		var $url;
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
		//N_I_ORDER;
		var $order;
		//L_I_ACTIVE
		var $active;
	}

?>