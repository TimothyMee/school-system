<?php
	
	class DB{
		
		protected $pdo;
		private static $_instance = null;

		public function __construct(){

			try{
				$this->pdo = new PDO('mysql:host='. config::get('mysql/host').';dbname='. config::get('mysql/db'), config::get('mysql/username'), config::get('mysql/password'));
			}catch(PDOException $e){
				echo '<h1> Sorry an Error happened while connecting to the database <p>Contact the web Master @ 08121581441</p></h1>';
			}

		}
		
		public static function getInstance(){
			if(!isset(self::$_instance)){
				self::$_instance = new DB();
			}
			return self::$_instance;
		}

		

	}