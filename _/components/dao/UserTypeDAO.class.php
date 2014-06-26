<?php
/*
 * Interface UserTypeDAO
 *
 * @author: Bonneux Wim
 * @date: 2009-11-28 17:17
 */

require_once('BaseDAO.class.php');

interface UserTypeDAO extends BaseCodeDAO{

	/**
 	 * Insert record to table
 	 *
 	 * @param language language
 	 */
	public function insert($userType);
	
	/**
 	 * Update record in table
 	 *
 	 * @param language language
 	 */
	public function update($userType);

	/**
	 * Read a row
	 * @param row(row of a language)
	 */
	
	public function readRow($row);

}
?>