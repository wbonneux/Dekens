<?php
/*
 * Interface LanguageDAO
 *
 * @author: Bonneux Wim
 * @date: 2009-11-24 17:17
 */

require_once('BaseCodeDAO.class.php');

interface CategoryTypeDAO extends BaseCodeDAO{

	/**
 	 * Insert record to table
 	 *
 	 * @param language language
 	 */
	public function insert($categoryType);
	
	/**
 	 * Update record in table
 	 *
 	 * @param language language
 	 */
	public function update($categoryType);

	/**
	 * Read a row
	 * @param row(row of a language)
	 */
	
	public function readRow($row);

}
?>