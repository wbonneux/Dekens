<?php
/*
 * Interface ImageDAO
 *
 * @author: Bonneux Wim
 * @date: 2009-11-24 17:17
 */

require_once('BaseCodeDAO.class.php');

interface ImageDAO extends BaseCodeDAO{

	/**
 	 * Insert record to table
 	 *
 	 * @param language language
 	 */
	public function insert($image);
	
	/**
 	 * Update record in table
 	 *
 	 * @param language language
 	 */
	public function update($image);

	/**
	 * Read a row
	 * @param row(row of a language)
	 */
	
	public function readRow($row);

}
?>