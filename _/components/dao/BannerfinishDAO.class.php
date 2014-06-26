<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface BannerfinishDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Bannerfinish 
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
 	 * @param bannerfinish primary key
 	 */
	public function delete($bid);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Bannerfinish bannerfinish
 	 */
	public function insert($bannerfinish);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Bannerfinish bannerfinish
 	 */
	public function update($bannerfinish);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCid($value);

	public function queryByType($value);

	public function queryByName($value);

	public function queryByImpressions($value);

	public function queryByClicks($value);

	public function queryByImageurl($value);

	public function queryByDatestart($value);

	public function queryByDateend($value);


	public function deleteByCid($value);

	public function deleteByType($value);

	public function deleteByName($value);

	public function deleteByImpressions($value);

	public function deleteByClicks($value);

	public function deleteByImageurl($value);

	public function deleteByDatestart($value);

	public function deleteByDateend($value);


}
?>