<?php
/*
 * Intreface DAO
 *
 * @author: Bonneux Wim
 * @date: 2014/07/14
 */

require_once("BaseCommonDAO.class.php");

interface ContentFrontPageDAO extends BaseCommonDAO{

	/**
 	 * Insert record to table
 	 *
 	 * @param Content content
 	 */
	public function insert(ContentFrontPage $frontPage);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Content content
 	 */
	public function update(ContentFrontPage $frontPage);	

	/**
	 * Read a row
	 * @param row(row of a language)
	 */
	
	public function readRow($row);


}
?>