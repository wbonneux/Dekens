<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface BannerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Banner 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param banner primary key
 	 */
	public function delete($bid);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Banner banner
 	 */
	public function insert($banner);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Banner banner
 	 */
	public function update($banner);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCid($value);

	public function queryByType($value);

	public function queryByName($value);

	public function queryByImptotal($value);

	public function queryByImpmade($value);

	public function queryByClicks($value);

	public function queryByImageurl($value);

	public function queryByClickurl($value);

	public function queryByDate($value);

	public function queryByShowBanner($value);

	public function queryByCheckedOut($value);

	public function queryByCheckedOutTime($value);

	public function queryByEditor($value);

	public function queryByCustombannercode($value);


	public function deleteByCid($value);

	public function deleteByType($value);

	public function deleteByName($value);

	public function deleteByImptotal($value);

	public function deleteByImpmade($value);

	public function deleteByClicks($value);

	public function deleteByImageurl($value);

	public function deleteByClickurl($value);

	public function deleteByDate($value);

	public function deleteByShowBanner($value);

	public function deleteByCheckedOut($value);

	public function deleteByCheckedOutTime($value);

	public function deleteByEditor($value);

	public function deleteByCustombannercode($value);


}
?>