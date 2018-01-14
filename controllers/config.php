<?php
	/**
	* 
	*/
	class config
	{
		public static function get ($paths = null){
			if($paths) {
				$config = $GLOBALS['config'];
				$paths = explode('/',$paths);

				foreach ($paths as $path) {
					if(isset($config[$path])){
						$config = $config[$path];
					}
				}
				return $config;
			}
		}
	}