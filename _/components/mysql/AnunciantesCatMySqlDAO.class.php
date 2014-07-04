<?php
/*
 * Class that operate on table 'anunciantes_cat'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
class AnunciantesCatMySqlDAO implements AnunciantesCatDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AnunciantesCatMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM anunciantes_cat WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM anunciantes_cat';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM anunciantes_cat ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param anunciantesCat primary key
 	 */
	public function delete($codigo){
		$sql = 'DELETE FROM anunciantes_cat WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnunciantesCatMySql anunciantesCat
 	 */
	public function insert($anunciantesCat){
		$sql = 'INSERT INTO anunciantes_cat (cod_anunciante, cod_categoria) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anunciantesCat->codAnunciante);
		$sqlQuery->setNumber($anunciantesCat->codCategoria);

		$id = $this->executeInsert($sqlQuery);	
		$anunciantesCat->codigo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnunciantesCatMySql anunciantesCat
 	 */
	public function update($anunciantesCat){
		$sql = 'UPDATE anunciantes_cat SET cod_anunciante = ?, cod_categoria = ? WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anunciantesCat->codAnunciante);
		$sqlQuery->setNumber($anunciantesCat->codCategoria);

		$sqlQuery->setNumber($anunciantesCat->codigo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM anunciantes_cat';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodAnunciante($value){
		$sql = 'SELECT * FROM anunciantes_cat WHERE cod_anunciante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodCategoria($value){
		$sql = 'SELECT * FROM anunciantes_cat WHERE cod_categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodAnunciante($value){
		$sql = 'DELETE FROM anunciantes_cat WHERE cod_anunciante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodCategoria($value){
		$sql = 'DELETE FROM anunciantes_cat WHERE cod_categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AnunciantesCatMySql 
	 */
	protected function readRow($row){
		$anunciantesCat = new AnunciantesCat();
		
		$anunciantesCat->codigo = $row['codigo'];
		$anunciantesCat->codAnunciante = $row['cod_anunciante'];
		$anunciantesCat->codCategoria = $row['cod_categoria'];

		return $anunciantesCat;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return AnunciantesCatMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>