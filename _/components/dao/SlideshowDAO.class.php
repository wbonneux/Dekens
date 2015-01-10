<?php
/*
 * Interface SlideshowDAO
 *
 * @author: Bonneux Wim
 * @date: 2009-11-24 17:17
 */

require_once('BaseCodeDAO.class.php');

interface SlideshowDAO extends BaseCodeDAO{

	/**
 	 * Insert record to table
 	 *
 	 * @param language language
 	 */
	public function insert($slideshow);
	
	/**
 	 * Update record in table
 	 *
 	 * @param language language
 	 */
	public function update($slideshow);

	/**
	 * Read a row
	 * @param row(row of a language)
	 */
	
	public function readRow($row);

}
?>