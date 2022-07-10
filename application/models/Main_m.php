<?php

	/**
	* Model for Clerk Controller
	*/
	class Main_m extends CI_Model{


		public function insertAccount($data){
			

			$this->db->insert('accounts', $data);

			// $this->db->select("id")
			// 	->from('csv_import');

			// $query = $this->db->get();	
			
			$account_id = $this->db->insert_id();
			return $account_id;
			
		}

		function check_if_exists($id_no){
			$this->db->select("id")
				->from('accounts')	
				->where('id_no', $id_no);
					
			$query = $this->db->get();

			if($query->num_rows()<1)
				return FALSE;
			else
				return $query->row();
		}


	}		


?>