<?php 
	/**
	* clase para el modelo del usuarios
	* Te retorna los valores de la consulta en la tabla usuarios
	*/
	class User_model extends Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function signUp($data)
		{
			return $this->db->insert('usuarios',$data);
		}

		//where puede llegar o no puede llegar
		// esta funcion la activa el controlador User
		function signIn($fields,$where='')
		{
			return $this->db->select($fields,'usuarios',$where);
		}

		function getUser($id)
		{
			return $this->db->select('*','usuarios','id='.$id);
		}

		function update($id,$data)
		{
			return $this->db->update('usuarios',$data,'id='.$id);
		}

		function delete($id)
		{
			return $this->db->delete('usuarios','id ='.$id,true);
		}
	}

 ?>