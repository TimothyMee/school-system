<?php 

	/**
	* 
	*/
	class token
	{
		
		static function getToken(){
			$token = md5(uniqid());
			return $token;
		}
	}