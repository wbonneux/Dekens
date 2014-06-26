<?php 
/**
 * mapper class for table CODE_LANGUAGE
 * @author Wim Bonneux <wbonneux@gmail.com>
 * @date(2013/11/21)
 */
/**
* 	
*/

require_once "BaseValueObject.class.php";

class Language extends BaseValueObject
{
	//T_I_CODE
	var $code;
	//T_I_DESCR_NED
	var $descrNed;
	//T_I_DESCR_FR
	var $descrFr;
	//T_I_DESCR_EN
	var $descrEn;
}
 ?>