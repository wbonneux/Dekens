<?php
/*
 * Interface LanguageDAO
 *
 * @author: Bonneux Wim
 * @date: 2009-11-24 17:17
 */

require_once('BaseCodeDAO.class.php');

interface LanguageDAO extends BaseCodeDAO{

	/**
 	 * Insert record to table
 	 *
 	 * @param language language
 	 */
	public function insert($language);
	
	/**
 	 * Update record in table
 	 *
 	 * @param language language
 	 */
	public function update($language);

	/**
	 * Read a row
	 * @param row(row of a language)
	 */
	
	public function readRow($row);

}
?>