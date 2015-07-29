<?php 
	
	/**
	* clase hash para encriptar!
	*/
	class Hash 
	{
		
		public static function create($data)
		{
			$context = hash_init(ALGO, HASH_HMAC,HASH_KEY);
			hash_update($context, $data);

			return hash_final($context);
		}

	}

	

 ?>