<?php
/*
 * Interface ProdXCategoryDAO
 *
 * @author: Bonneux Wim
 * @date: 2009-11-24 17:17
 */

require_once('BaseCodeDAO.class.php');

interface ProdXCategoryDAO extends BaseCodeDAO{
	
	/**
 	 * Insert record to table
 	 *
 	 * @param language language
 	 */
	public function insert($prodxcategory);
	
	/**
 	 * Update record in table
 	 *
 	 * @param language language
 	 */
	public function update($prodxcategory);

	/**
	 * Read a row
	 * @param row(row of a language)
	 */
	
	public function readRow($row);

}
?>