<?php 
/**
 * @author Wim Bonneux <wbonneux@gmail.com>
 */

class BaseMySqlDAO implements BaseDAO
{
	/**
	 * Returns an array of the result
	 * @param  String $sqlQuery :the query
	 * @return Array            :the result of the given query
	 */
	public function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Returns the row of the result
	 * @param  String $sqlQuery :the query
	 * @return Object           :the object(result) of the given query
	 */
	public function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute the query
	 * @param  string $sqlQuery :the query
	 * @return Object           :the result(success/error)
	 */
	public function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute the query that will produce an update
	 * @param  string $sqlQuery :the query
	 * @return Object           :the result(success/error)
	 */
	public function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 * @param  String $sqlQuery :the query
	 * @return Object           :the result(success/error)
	 */
	public function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Execute the query that will produce an insert
	 * @param  String $sqlQuery :the query
	 * @return Object           :the result(success/error)
	 */
	public function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
 ?>