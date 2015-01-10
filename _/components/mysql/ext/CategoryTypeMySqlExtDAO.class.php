<?php
/*
 * Class that operate on table 'CategoryType'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-10-17 03:43
 */
class CategoryTypeMySqlExtDAO extends CategoryTypeMySqlDAO{

	function getCategoryTypeByCode($code){
		$sql = 'SELECT * FROM CODE_CATEGORY_TYPE WHERE T_I_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($code);
		return $this->getRow($sqlQuery);
	}
}
?>