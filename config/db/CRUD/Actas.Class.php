<?php 
require_once('easyCRUD.class.php');

class Actas extends Crud{
	protected $table = 'actas';
	protected $pk = 'tokenIncrement';
	protected $fechaDepo = 'fechaDepo';
	protected $consIn = 'consIn';
	#
	public function countYear($var1 = "") {
		$var1 = (empty($this->variables[$this->fechaDepo])) ? $var1 : $this->variables[$this->fechaDepo];
		//SELECT COUNT(*) + 1 FROM actas WHERE year(fechaDepo)=
		if(!empty($var1)) {
		 $sql = "SELECT count(*) + 1 FROM " . $this->table ." WHERE " . "year($this->fechaDepo)" . " = " . date('Y');	
			$this->variables = $this->db->row($sql,array($this->fechaDepo=>$var1));
		}
	}

	public function findActa($id = "") {
		$id = (empty($this->variables[$this->consIn])) ? $id : $this->variables[$this->consIn];

		if(!empty($id)) {
			$sql = "SELECT * FROM " . $this->table ." WHERE " . $this->consIn . "= :" . $this->consIn . " LIMIT 1";	
			$this->variables = $this->db->row($sql,array($this->consIn=>$id));
		}
	}
	//SELECT * FROM actas WHERE consIn='".$_POST['numDepo']."' 	AND year(fechaDepo)='".$_POST['numAno']."'
	public function finAndYear($var1 = "", $var2 = ""){
		$var1 = (empty($this->variables[$this->consIn])) ? $var1 : $this->variables[$this->consIn];
		$var2 = (empty($this->variables[$this->fechaDepo])) ? $var2 : $this->variables[$this->fechaDepo];

			if (!empty($var1) && !empty($var2)) {
			$sql = "SELECT * FROM " . $this->table ." WHERE ". $this->consIn . "= :" .$this->consIn . " AND " . "year($this->fechaDepo)" . "= :" . $this->fechaDepo;
			$this->variables = $this->db->row($sql,array($this->consIn=>$var1, $this->fechaDepo=>$var2));	
			}
		}
}

 ?>