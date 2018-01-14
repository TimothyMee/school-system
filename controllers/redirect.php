<?php

	/**
	* to redirect
	*/
	class redirect
	{
		
		public static function to($page){
			if($page){
				header('location: '. $page);
			}
		}
	}