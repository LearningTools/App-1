<?php 
require_once ('easyCRUD.class.php');
	class LogIn Extends Crud{
		#Nombre de la tabla a la que vamos hacer la consulta;
		protected $table = 'Login';
		# Variable que tiene el campo de la llave primaria de de la tabla;
		protected $pk = 'id_login';
		#varible que tiene el campo nombre en la tabla ;
		protected $NomUser = 'logUser';
		#Variable que tiene el campo del pass en la tabla;
		protected $LogPass = 'logPass';
		#Function SELECT * FROM login WHERE logUser = 'nomUser' AND logPass = 'LogPass';
		public function finAnd($var1 = "", $var2 = ""){
		$var1 = (empty($this->variables[$this->NomUser])) ? $var1 : $this->variables[$this->NomUser];
		$var2 = (empty($this->variables[$this->LogPass])) ? $var2 : $this->variables[$this->LogPass];

			if (!empty($var1) && !empty($var2)) {
			$sql = "SELECT * FROM " . $this->table ." WHERE ". $this->NomUser . "= :" .$this->NomUser . " AND " . $this->LogPass . "= :" . $this->LogPass;
			$this->variables = $this->db->row($sql,array($this->NomUser=>$var1, $this->LogPass=>$var2));	
			}
		}

		public function userLog($fields = "") {
		$fields = (empty($this->variables[$this->NomUser])) ? $fields : $this->variables[$this->NomUser];

			if(!empty($fields)) {
			$sql = "SELECT * FROM " . $this->table ." WHERE " . $this->NomUser . "= :" . $this->NomUser . " LIMIT 1";	
			$this->variables = $this->db->row($sql,array($this->NomUser=>$fields));
			}
		}


	}
 ?>