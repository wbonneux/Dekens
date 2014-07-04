<?php
/*
 * Class that operate on table 'Language'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-10-17 03:43
 */
class LanguageMySqlExtDAO extends LanguageMySqlDAO{

	function getLanguageByCode($code){
		$sql = 'SELECT * FROM CODE_LANGUAGE WHERE T_I_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($code);
		return $this->getRow($sqlQuery);
	}
}
?>