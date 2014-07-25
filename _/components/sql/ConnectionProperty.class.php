<?php
/*
 * Connection properties
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class ConnectionProperty{
	//local
	private static $host = 'localhost';
	private static $user = 'root';
	private static $password = '';
	private static $database = 'dekens_it01';
	//remote
// 	private static $host = '159.253.0.86';
// 	private static $user = 'wimbogp45_dekens';
// 	private static $password = 'dekens';
// 	private static $database = 'wimbogp45_dekens';

	public static function getHost(){
		return ConnectionProperty::$host;
	}

	public static function getUser(){
		return ConnectionProperty::$user;
	}

	public static function getPassword(){
		return ConnectionProperty::$password;
	}

	public static function getDatabase(){
		return ConnectionProperty::$database;
	}
}
?>