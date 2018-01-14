<?php
	/**
	* 
	*/
	class hash
	{
		static function passwordhash($string){
			return hash('sha256', $string);
		}

	}