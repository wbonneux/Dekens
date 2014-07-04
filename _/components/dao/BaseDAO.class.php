<?php
/*
 * Interface BaseDAO
 *
 * @author: Bonneux Wim
 * @date: 2013/11/22
 */
interface BaseDAO{

	/**
	 * Returns an array of the result
	 * @param  String $sqlQuery :the query
	 * @return Array            :the result of the given query
	 */
	public function getList($sqlQuery);

	/**
	 * Returns the row of the result
	 * @param  String $sqlQuery :the query
	 * @return Object           :the object(result) of the given query
	 */
	public function getRow($sqlQuery);

	/**
	 * Execute the query
	 * @param  string $sqlQuery :the query
	 * @return Object           :the result(success/error)
	 */
	public function execute($sqlQuery);

	/**
	 * Execute the query that will produce an update
	 * @param  string $sqlQuery :the query
	 * @return Object           :the result(success/error)
	 */
	public function executeUpdate($sqlQuery);

	/**
	 * Query for one row and one column
	 * @param  String $sqlQuery :the query
	 * @return Object           :the result(success/error)
	 */
	public function querySingleResult($sqlQuery);

	/**
	 * Execute the query that will produce an insert
	 * @param  String $sqlQuery :the query
	 * @return Object           :the result(success/error)
	 */
	public function executeInsert($sqlQuery);
}
?>