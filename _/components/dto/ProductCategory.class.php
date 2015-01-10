<?php

	/**

	 * Object represents table 'prod_category'

	 *

     	 * @author: Bonneux Wim

     	 * @date: 2014/12/07

	 */

	

	require_once "BaseValueObject.class.php";

	class ProductCategory extends BaseValueObject{

		
		//O_SECTION_TYPE_IDF_TECH
		var $section;
		//O_CATEGORY_TYPE_IDF_TECH
		var $categoryType;
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
		//O_I_PARENT_CATEGORY_IDF_TECH
		var $parent;
		//T_I_URL_COMPANY
		var $url;
		//N_I_ORDER;
		var $order;
		//L_I_ACTIVE
		var $active;
	}

?>