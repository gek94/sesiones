<?php 
	Class Database extends PDO
	{
	
		public function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS)
		{
			parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS)
		}

		/**
		 * @param String $sql La consulta
		 * @param Array $array Parametros para hacer el Bind
		 * @param constant $fetchMode el fetch mode de PDO
		 * @return mixed
		 */
		public function select($sql,$array = array(),$fetchMode = PDO::FETCH_ASSOC)
		{
			$sth = $this->prepare($sql);
			foreach ($array as $key => $value) {
				$sth->bindValue("$key",$value);
			}

			$sth->execute();
			return $sth->fetchAll($fetchMode);
		}
		// $sql = "select * from usuarios where id = :id"; $array= array('id'=>$id);

		/**
		 * @param String $table 
		 * @param Array $data Arreglo de string asociativo
		 */
		public function insert($table, $data)
		{
			ksort($data);
			$fieldNames = implode('')
		}

		public function update()
		{

		}

		public function delete()
		{

		}

	}
 ?>